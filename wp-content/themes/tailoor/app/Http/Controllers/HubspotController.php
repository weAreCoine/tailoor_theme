<?php

namespace App\Http\Controllers;

use App\ApiClients\HubSpotClient;
use App\Traits\Singleton;

class HubspotController
{
    use Singleton;


    protected HubSpotClient $hubSpotClient;

    public function __construct()
    {
        $this->hubSpotClient = new HubSpotClient();
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

        $properties = $this->mapPropertiesValues($this->mapPropertiesKeys($properties));
        $company = $this->hubSpotClient->updateOrCreateCompany($this->filterCompaniesProperties($properties));
        $contact = $this->hubSpotClient->updateOrCreateContact($this->filterContactProperties($properties));
        $this->hubSpotClient->syncSubscriptions($properties);
        if ($company !== false && $contact !== false) {
            $this->hubSpotClient->assignToOwner($contact);

            return $this->hubSpotClient->associate($company, $contact);
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
     * Filters the provided properties array, keeping only the ones that are allowed for a company.
     *
     * @param array $properties The properties array to be filtered.
     *
     * @return array The filtered properties array.
     */
    protected function filterCompaniesProperties(array $properties): array
    {
        $properties['name'] = $properties['company'];

        foreach (array_keys($properties) as $key) {
            if (!in_array($key, $this->hubSpotClient->companyProperties, true)) {
                unset($properties[$key]);
            }
        }

        return $properties;
    }

    /**
     * Filters the contact properties to only include the ones defined in $this->contactProperties.
     *
     * @param array $properties The properties to filter.
     *
     * @return array The filtered properties, including only the ones defined in $this->contactProperties.
     */
    protected function filterContactProperties(array $properties): array
    {
        foreach (array_keys($properties) as $key) {
            if (!in_array($key, $this->hubSpotClient->contactProperties, true)) {
                unset($properties[$key]);
            }
        }

        return $properties;
    }

}
