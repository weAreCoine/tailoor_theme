<?php

namespace App\ApiClients;

use App\Traits\Singleton;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use HubSpot\Client\CommunicationPreferences\ApiException as CommunicationPreferencesException;
use HubSpot\Client\CommunicationPreferences\Model\PublicSubscriptionStatus;
use HubSpot\Client\CommunicationPreferences\Model\PublicSubscriptionStatusesResponse;
use HubSpot\Client\CommunicationPreferences\Model\PublicUpdateSubscriptionStatusRequest;
use HubSpot\Client\CommunicationPreferences\Model\SubscriptionDefinition;
use HubSpot\Client\CommunicationPreferences\Model\SubscriptionDefinitionsResponse;
use HubSpot\Client\Crm\Associations\V4\ApiException as AssociationsException;
use HubSpot\Client\Crm\Associations\V4\Model\AssociationSpec;
use HubSpot\Client\Crm\Associations\V4\Model\AssociationSpecWithLabel;
use HubSpot\Client\Crm\Associations\V4\Model\Error;
use HubSpot\Client\Crm\Companies\ApiException as CompaniesException;
use HubSpot\Client\Crm\Companies\Model\Filter as CompaniesFilter;
use HubSpot\Client\Crm\Companies\Model\FilterGroup as CompaniesFilterGroup;
use HubSpot\Client\Crm\Companies\Model\PublicObjectSearchRequest as CompaniesPublicObjectSearchRequest;
use HubSpot\Client\Crm\Companies\Model\SimplePublicObject as Company;
use HubSpot\Client\Crm\Companies\Model\SimplePublicObjectInputForCreate as SimplePublicObjectInputForCreateCompany;
use HubSpot\Client\Crm\Contacts\ApiException as ContactsException;
use HubSpot\Client\Crm\Contacts\Model\Filter;
use HubSpot\Client\Crm\Contacts\Model\FilterGroup;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObject as Contact;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInputForCreate;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectWithAssociations;
use HubSpot\Delay;
use HubSpot\Discovery\Discovery;
use HubSpot\Enums\AssociationTypes;
use HubSpot\Factory;
use HubSpot\RetryMiddlewareFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class HubSpotClient
{
    protected Discovery $hubspot;
    // Luca su account DEV
    protected string $defaultOwnerID;
    use Singleton;

    protected array $contactProperties = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'company',
        'country',
        'note',
        'lifecycle stage',
        'hs_lead_status',
        'hs_legal_basis',
    ];
    protected array $companyProperties = [
        'domain',
        'e_commerce_platform',
        'business_type',
        'city',
        'name',
    ];

    private string $token;

    public function __construct()
    {

        $hubspotConfiguration = config('services.hubspot');
        /**
         * Access token is loaded according to the value of WP_DEBUG.
         * If TRUE, the DEV account token is used, otherwise the account in production is used.
         */
        $this->token = $hubspotConfiguration['auth_key'];
        assert(!empty($this->token), 'Enter a valid access token to use the Hubspot client.');
        $this->defaultOwnerID = $hubspotConfiguration['owner_id'];
        assert(!empty($this->defaultOwnerID), 'Enter a valid owner ID to use the Hubspot client.');
        $handlerStack = HandlerStack::create();
        $handlerStack->push(
            RetryMiddlewareFactory::createRateLimitMiddleware(
                Delay::getConstantDelayFunction()
            )
        );

        $handlerStack->push(
            RetryMiddlewareFactory::createInternalErrorsMiddleware(
                Delay::getExponentialDelayFunction(2)
            )
        );

        $client = new Client(['handler' => $handlerStack]);
        $this->hubspot = Factory::createWithAccessToken($this->token, $client);
    }

    /**
     * Get a collection of owners from Hubspot CRM.
     *
     * @return Collection A collection of owners.
     */
    public function owners(): Collection
    {
        return collect($this->hubspot->crm()->owners()->getAll());
    }

    /**
     * The flow for saving form content to Hubspot
     *
     * @param array $properties The properties (from the completed form) to be stored.
     *
     * @return bool True if the properties were successfully stored, false otherwise.
     */
    public function store(array $properties): bool
    {
        $this->addDefaultAttributes($properties);

        $properties = $this->mapPropertiesKeys($properties);
        $company = $this->updateOrCreateCompany($properties);
        $contact = $this->updateOrCreateContact($properties);
        $this->syncSubscriptions($properties);
        if ($company !== false && $contact !== false) {
            $this->assignToOwner($contact);

            return $this->associate($company, $contact);
        }

        return false;
    }

    /**
     * Add default attributes to the contact properties.
     *
     * @param array $properties The contact properties.
     *                         - newsletter: A flag indicating whether the contact has subscribed to the newsletter.
     *                         - lifecyclestage: The lifecycle stage of the contact.
     *                         - hs_lead_status: The lead status of the contact.
     *                         - hs_legal_basis: The legal basis of the contact.
     */
    protected function addDefaultAttributes(array &$properties): void
    {
        /**
         * FIXME Per quale motivo i nuovi lead assumono subito lo status ATTEMPTED_TO_CONTACT? Non sarebbe più corretto metterli NEW?
         */
        $properties['lifecyclestage'] = 'marketingqualifiedlead';
        $properties['hs_lead_status'] = 'NEW';
//        $properties['hs_lead_status'] = 'ATTEMPTED_TO_CONTACT';

        /**
         * Il form nativo dava sempre il consenso completo (anche a fronte del rifiuto NL)
         * TODO Era un comportamento voluto e corretto? Se sì, eliminare il caso false
         */
        $properties['hs_legal_basis'] = $properties['newsletter'] ? 'Freely given consent from contact' : 'Legitimate interest – prospect/lead';
    }

    /**
     * Maps the keys of the properties array based on predetermined mappings from HS CRM.
     *
     * @param array $properties The properties array to be mapped.
     * @return array The properties array with mapped keys.
     */
    protected function mapPropertiesKeys(array $properties): array
    {
        return array_combine(
            array_map(fn(string $property) => match ($property) {
                'first_name' => 'firstname',
                'last_name' => 'lastname',
                'website' => 'domain',
                'platform' => 'e_commerce_platform',
                'business' => 'business_type',
                default => $property
            }, array_keys($properties))
            , array_values($properties)
        );
    }

    /**
     * Updates an existing company based on provided properties or creates a new company if it doesn't exist.
     *
     * @param array $properties The properties of the company to update or create.
     *
     * FIXME Il nome dell'azienda non è sicuramente una PK valida. Uso nome azienda e città. È un'opzione valida?
     *
     * @return false|Company Returns false if the company could not be updated or created, otherwise returns the updated or newly created Company object.
     */
    public function updateOrCreateCompany(array $properties): false|Company
    {
        $company = $this->companyWhere([
            'name' => $properties['company'],
            'city' => $properties['city']
        ]);
        $company = $company === false || $company->isEmpty() ? null : $company->first();

        return $company !== null ? $this->updateCompany($company, $properties) : $this->createCompany($properties);
    }

    /**
     * Filters companies based on the provided properties and returns a collection of matching companies.
     *
     * @param array $properties The properties to filter the companies by.
     *                         Each key represents a property name and each value represents the property value.
     *
     * @return bool|Collection Returns a collection of matching companies if successful, otherwise returns false.
     *                        Each item in the collection is an instance of \HubSpot\Client\Crm\Companies\Model\Company.
     */
    public function companyWhere(array $properties): false|Collection
    {
        if (empty($properties)) return collect();
        $filters = [];
        foreach ($properties as $propertyName => $propertyValue) {
            $filters[] = (new CompaniesFilter())
                ->setPropertyName($propertyName)
                ->setOperator('EQ')
                ->setValue($propertyValue);
        }
        $filterGroup = (new CompaniesFilterGroup())->setFilters($filters);
        $searchRequest = (new CompaniesPublicObjectSearchRequest())->setFilterGroups([$filterGroup]);

        try {
            $response = $this->hubspot->crm()->companies()->searchApi()->doSearch($searchRequest);
            $results = $response->getResults();
            if (empty($results)) {
                return false;
            }
            return collect($results);
        } catch (CompaniesException $e) {
            return $this->handleExceptions($e);
        }
    }

    /**
     * Retrieves all companies from the CRM.
     *
     * @return Collection Returns a collection of all companies retrieved from the CRM.
     */
    public function companies(): Collection
    {
        return collect($this->hubspot->crm()->companies()->getAll());
    }

    /**
     * Handle exceptions and log error messages.
     *
     * @param CommunicationPreferencesException|ContactsException|CompaniesException|AssociationsException $exception The exception to be handled.
     *
     * @return bool False to indicate that the exception was handled.
     */
    protected function handleExceptions(CommunicationPreferencesException|ContactsException|CompaniesException|AssociationsException $exception): false
    {
        if (config('app.debug')) {
            if (json_validate($exception->getResponseBody())) {
                dump(json_decode($exception->getResponseBody()));
            } else {
                dump($exception->getResponseBody());
            }
            dump(sprintf('Thrown on %s at line %d', $exception->getFile(), $exception->getLine()));
        }

        Log::error($exception->getMessage(), $exception->getTrace());

        return false;

    }

    public function updateCompany(Company $company, array $companyProperties): false|Company
    {
        try {
            return $this->hubspot->crm()->companies()->basicApi()->update($company->getId(), new \HubSpot\Client\Crm\Companies\Model\SimplePublicObjectInput([
                'properties' => $this->mapPropertiesValues($this->filterCompaniesProperties($companyProperties)),
            ]));
        } catch (CompaniesException $e) {
            return $this->handleExceptions($e);
        }
    }

    /**
     * Maps the values of the provided properties array based on HS account setup.
     *
     * @param array $properties The properties array to map values for.
     *
     * @return array Returns the properties array with mapped values.
     */
    public function mapPropertiesValues(array $properties): array
    {
        foreach ($properties as $key => $value) {
            $properties[$key] = match ($key) {
                'e_commerce_platform', 'platform' => match ($value) {
                    'woocommerce' => 'Wordpress',
                    default => ucfirst($value)
                },
                'business', 'business_type' => match ($value) {
                    'negozi_su_misura' => 'Negozi su misura',
                    'altro' => 'altro',
                    default => ucwords(str_replace('_', ' ', $value)),
                },
                default => $value
            };
        }

        return $properties;
    }

    /**
     * Filters the provided properties array, keeping only the ones that are allowed for a company.
     *
     * @param array $properties The properties array to be filtered.
     *
     * @return array The filtered properties array.
     */
    protected function filterCompaniesProperties(array $properties): array
    {
        foreach ($properties as $key => $value) {
            if (!in_array($key, $this->companyProperties, true)) {
                unset($properties[$key]);
            }
        }

        return $properties;

    }

    /**
     * Create a company.
     *
     * @param array $companyProperties The properties of the company to be created.
     *
     * @return false|Company The created company object on success, or false on failure.
     */
    public function createCompany(array $companyProperties): false|Company
    {
        $companyProperties = $this->mapPropertiesValues($companyProperties);
        $simplePublicObjectInput = (new SimplePublicObjectInputForCreateCompany())
            ->setProperties($this->filterCompaniesProperties($companyProperties));
        try {
            return $this->hubspot->crm()->companies()->basicApi()->create($simplePublicObjectInput);
        } catch (CompaniesException $e) {
            return $this->handleExceptions($e);
        }
    }

    public function updateOrCreateContact(array $properties, string $emailKey = 'email'): false|Contact
    {
        $contact = $this->findContact($properties[$emailKey]);

        return $contact !== null ? $this->updateContact($contact, $properties) : $this->createContact($properties);
    }

    public function findContact(string $email): ?Contact
    {
        $exisingContact = $this->searchContactByEmail($email);
        return $exisingContact === false ? null : $exisingContact->first();
    }

    /**
     * Search for a contact by email.
     *
     * @param string $email The email address of the contact to search for.
     *
     * @return Collection|false Returns a collection of contact properties if the contact is found,
     *                                             otherwise returns false.
     */
    public function searchContactByEmail(string $email): Collection|false
    {
        // Crea il filtro per la ricerca per email.
        $filter = (new Filter())->setPropertyName('email')
            ->setOperator('EQ')
            ->setValue($email);

        // Crea il gruppo di filtri (in questo caso, solo un filtro).
        $filterGroup = (new FilterGroup())->setFilters([$filter]);

        // Crea l'oggetto di ricerca.
        $searchRequest = (new PublicObjectSearchRequest())->setFilterGroups([$filterGroup])
            ->setProperties($this->contactProperties);

        // Esegue la ricerca.
        try {
            $response = $this->hubspot->crm()->contacts()->searchApi()->doSearch($searchRequest);
            $results = $response->getResults();
            if (empty($results)) {
                return false;
            }
            return collect($response->getResults());

        } catch (ContactsException $e) {
            return $this->handleExceptions($e);
        }
    }

    /**
     * Get all contacts from HS
     *
     * @return Collection
     */
    public function contacts(): Collection
    {
        return collect($this->hubspot->crm()->contacts()->getAll($this->contactProperties))
            ->map(fn(SimplePublicObjectWithAssociations $contact) => $contact->getProperties());
    }

    /**
     * @param Contact $contact
     * @param array $contactProperties
     *
     * @return false|Contact
     */
    public function updateContact(Contact $contact, array $contactProperties): false|Contact
    {
        try {
            return $this->hubspot->crm()->contacts()->basicApi()->update($contact->getId(), new SimplePublicObjectInput([
                'properties' => $this->filterContactProperties($contactProperties)
            ]));

        } catch (ContactsException $e) {
            return $this->handleExceptions($e);

        }
    }

    protected function filterContactProperties(array $properties): array
    {
        foreach ($properties as $key => $value) {
            if (!in_array($key, $this->contactProperties, true)) {
                unset($properties[$key]);
            }
        }

        return $properties;
    }

    /**
     * Create a contact with the given properties.
     *
     * @param array $contactProperties The properties of the contact to be created.
     *
     * @return false|Contact Returns the created contact if successful, false otherwise.
     *
     */
    public function createContact(array $contactProperties): false|Contact
    {
        $contactProperties = $this->filterContactProperties($contactProperties);
        $simplePublicObjectInput = (new SimplePublicObjectInputForCreate())
            ->setProperties($contactProperties);
        try {
            return $this->hubspot->crm()->contacts()->basicApi()->create($simplePublicObjectInput);

        } catch (ContactsException $e) {
            return $this->handleExceptions($e);
        }
    }

    /**
     * Update the subscription status of a contact.
     * Currently on the Tailoor account we have two subscriptions with purposes "Sales" and "Marketing".
     *          "Sales" is considered a subscription for which legitimate interest is sufficient
     *          "Marketing" is considered a subscription for which explicit user consent is required
     * @param array $contactProperties The contact properties.
     *                                - email: The email address of the contact.
     *                                - newsletter: A flag indicating whether the contact has subscribed to the newsletter.
     */
    public function syncSubscriptions(array $contactProperties): bool
    {

        $subscriptions = $this->subscriptions();
        if ($subscriptions === false) {
            return false;
        }
        $response = true;
        $activeSubscriptions = $this->contactSubscriptions($contactProperties['email']);

        //Honor GDPR consent status
        if ($contactProperties['newsletter'] === false) {
            // Retrieve Marketing related active subscriptions
            $marketingActiveSubscriptions = $activeSubscriptions->whereIn('id', $subscriptions->where('purpose', '=', 'Marketing')->pluck('id'));
            foreach ($marketingActiveSubscriptions as $subscription) {
                $response = $this->unsubscribe($contactProperties['email'], $subscription) && $response;
            }
            $subscriptions = $subscriptions->where('purpose', '!=', 'Marketing');
        }

        $subscriptions = $subscriptions->where('is_active', '=', true);

        foreach ($subscriptions as $subscription) {
            /**
             * @var SubscriptionDefinition $subscription
             */
            $response = $this->subscribe($contactProperties['email'], $subscription, $contactProperties['newsletter']) && $response;
        }
        return $response;
    }

    /**
     * Retrieves the subscription definitions from the Hubspot communication preferences API.
     *
     * @return Collection|false Returns false if there
     */
    public function subscriptions(): Collection|false
    {
        try {
            $response = $this->hubspot->communicationPreferences()->definitionApi()->getPage();
            if (!$response instanceof SubscriptionDefinitionsResponse) {
                return false;
            }

            return collect($response->getSubscriptionDefinitions());
        } catch (CommunicationPreferencesException $e) {
            return $this->handleExceptions($e);
        }
    }

    /**
     * Retrieves the subscription status of a contact based on their email address.
     *
     * @param string $contactEmail The email address of the contact.
     *
     * @return bool|Collection Returns false if the subscription status could not be retrieved,
     *                        otherwise returns a Collection of PublicSubscriptionStatus objects.
     *                        Each PublicSubscriptionStatus object represents a subscription status for a specific communication category.
     *                        The collection may be empty if the contact has no subscription statuses.
     */
    public function contactSubscriptions(string $contactEmail): bool|Collection
    {
        try {
            $status = $this->hubspot->communicationPreferences()->statusApi()->getEmailStatus($contactEmail);
            if (!$status instanceof PublicSubscriptionStatusesResponse) {
                return false;
            }

            return collect($status->getSubscriptionStatuses())->whereNotNull('legal_basis');

        } catch (CommunicationPreferencesException $e) {
            return $this->handleExceptions($e);
        }
    }

    public function unsubscribe(string $email, SubscriptionDefinition|PublicSubscriptionStatus $subscription): bool
    {
        $publicUpdateSubscriptionStatusRequest = new PublicUpdateSubscriptionStatusRequest([
            'email_address' => $email,
            'legal_basis' => null,
            'subscription_id' => $subscription->getId(),
            'legal_basis_explanation' => null,
        ]);
        try {
            return !$this->hubspot->communicationPreferences()->statusApi()->unsubscribe($publicUpdateSubscriptionStatusRequest) instanceof Error;
        } catch (CommunicationPreferencesException $e) {
            return $this->handleExceptions($e);
        }
    }

    /**
     * Subscribes a user to a specific subscription with the provided email, subscription definition, and consent status.
     *
     * @param string $email The email address of the user to subscribe.
     * @param SubscriptionDefinition $subscription The subscription definition to subscribe the user to.
     * @param bool $consentStatus The consent status for the user's subscription.
     *
     * @return bool Returns true if the user was successfully subscribed, false otherwise.
     */
    public function subscribe(string $email, SubscriptionDefinition $subscription, bool $consentStatus): bool
    {
        $publicUpdateSubscriptionStatusRequest = new PublicUpdateSubscriptionStatusRequest([
            'email_address' => $email,
            'legal_basis' => $consentStatus ? 'CONSENT_WITH_NOTICE' : 'LEGITIMATE_INTEREST_PQL',
            'subscription_id' => $subscription->getId(),
            'legal_basis_explanation' => $this->getLegalBasis($consentStatus),
        ]);

        try {
            $response = $this->hubspot
                ->communicationPreferences()
                ->statusApi()
                ->subscribe($publicUpdateSubscriptionStatusRequest);
            return !$response instanceof Error;
        } catch (CommunicationPreferencesException $e) {
            /**
             * TODO Currently, there seems to be an issue with Hubspot's APIs on this endpoint
             * @see https://developers.hubspot.com/docs/api/marketing-api/subscriptions-preferences
             *
             * The PHP method mentioned in the documentation (erroneously) does not exist in the SDK, and even when calling
             * the endpoint via cURL, the resubscribe does not successfully occur.
             *
             * Unhandled case: a contact subscribes with marketing permissions, then subscribes without permissions, and then
             * subscribes again with permissions. At this point, I am no longer able to restore their Marketing subscription.
             */

//            if (str_contains($e->getMessage(), 'unsubscribed')) {
//                $this->resubscribe($email, $subscription, $consentStatus);
//            }
            return $this->handleExceptions($e);
        }
    }

    protected function getLegalBasis(bool $consentStatus): string
    {
        return $consentStatus ?
            'Il contatto ha prestato il consenso all\'iscrizione alla newsletter' :
            'Il contatto ha espresso interesse ma non ha prestato il consenso per l\'iscrizione alla newsletter.';
    }

    /**
     * Assigns a contact to an owner.
     *
     * @param Contact $contact The contact to assign.
     * @param string|null $ownerID The ID of the owner to assign the contact to. If null, the default owner ID will be used.
     *
     * @return bool Returns true if the contact was successfully assigned, otherwise returns false.
     */
    public function assignToOwner(Contact $contact, ?string $ownerID = null): bool
    {
        if ($ownerID === null) {
            $ownerID = $this->defaultOwnerID;
        }
        $contactUpdate = new SimplePublicObjectInput();
        $contactUpdate->setProperties([
            'hubspot_owner_id' => $ownerID,
        ]);
        try {
            $this->hubspot->crm()->contacts()->basicApi()->update($contact->getId(), $contactUpdate);

            return true;
        } catch (ContactsException $e) {
            return $this->handleExceptions($e);
        }

    }

    /**
     * Associates a company with a contact in HubSpot.
     *
     * @param Company $company The company object to associate.
     * @param Contact $contact The contact object to associate.
     *
     * @return bool Returns true if the association is successful, false otherwise.
     */
    public function associate(Company $company, Contact $contact): bool
    {
        try {
            $association = $this->hubspot->crm()->associations()->v4()->basicApi()->create(
                'companies',
                $company->getId(),
                'contacts',
                $contact->getId(),
                [
                    new AssociationSpec([
                        'association_category' => AssociationSpecWithLabel::CATEGORY_HUBSPOT_DEFINED,
                        'association_type_id' => AssociationTypes::COMPANY_TO_CONTACT
                    ])
                ]);

            return !$association instanceof Error;
        } catch (AssociationsException $e) {
            return $this->handleExceptions($e);
        }
    }

    public function resubscribe(string $email, SubscriptionDefinition $subscription, bool $consentStatus): bool
    {
        $response = $this->hubspot->apiRequest([
            'method' => 'POST',
            'endpoint' => '/communication-preferences/v3/resubscribe',
            'body' => [
                'emailAddress' => $email,
                'legalBasis' => $consentStatus ? 'CONSENT_WITH_NOTICE' : 'LEGITIMATE_INTEREST_PQL',
                'subscriptionId' => $subscription->getId(),
                'legalBasisExplanation' => $this->getLegalBasis($consentStatus),
            ],
        ]);
        return $response->getStatusCode() === 200;
    }
}
