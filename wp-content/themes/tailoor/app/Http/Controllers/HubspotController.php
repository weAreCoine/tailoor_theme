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

    public function hubspot(): HubSpotClient
    {
        return $this->hubSpotClient;

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
        $properties = $this->mapProperties($properties);

        $company = $this->hubSpotClient->updateOrCreateCompany($this->filterCompaniesProperties($properties));
        $contact = $this->hubSpotClient->updateOrCreateContact($this->filterContactProperties($properties));
        $this->hubSpotClient->syncSubscriptions($properties);
        if ($company !== false && $contact !== false) {
            $this->hubSpotClient->assignToOwner($contact);

            $this->hubSpotClient->companyBelongsToContact($company, $contact);
            $this->hubSpotClient->contactBelongsToCompany($company, $contact);
            return true;
        }

        return false;
    }

    /**
     * Maps the keys and values of the provided properties array based on predetermined mappings and HS account setup.
     *
     * @param array $properties The properties array to be mapped.
     * @return array The properties array with both keys and values mapped.
     */
    protected function mapProperties(array $properties): array
    {

        /**
         * Adding default values
         *
         * - newsletter: A flag indicating whether the contact has subscribed to the newsletter.
         * - lifecyclestage: The lifecycle stage of the contact.
         * - hs_lead_status: The lead status of the contact.
         * - hs_legal_basis: The legal basis of the contact.
         */
        $mappedProperties = [
            'lifecyclestage' => 'marketingqualifiedlead',
            'hs_lead_status' => 'ATTEMPTED_TO_CONTACT',
            'hs_legal_basis' => $properties['newsletter'] ? 'Freely given consent from contact' : 'Legitimate interest – prospect/lead',
        ];

        foreach ($properties as $key => $value) {
            // Map keys
            $mappedKey = match ($key) {
                'first_name' => 'firstname',
                'last_name' => 'lastname',
                'website' => 'domain',
                'platform' => 'e_commerce_platform',
                'business' => 'business_type',
                default => $key
            };

            // Map values
            $mappedValue = match ($key) {
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

            // Assign mapped key and value
            $mappedProperties[$mappedKey] = $mappedValue;
        }

        return $mappedProperties;
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
