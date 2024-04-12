<?php

namespace App\Http\Controllers;

use App\ApiClients\HubSpotClient;
use App\Traits\Singleton;
use HubSpot\Client\Crm\Deals\Model\AssociationSpec;
use HubSpot\Client\Crm\Deals\Model\PublicAssociationsForObject;
use HubSpot\Client\Crm\Deals\Model\PublicObjectId;
use HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInputForCreate as SimplePublicObjectInputForCreateDeal;

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
            $this->hubSpotClient->createDeal($this->getDealProperties($company->getId(), $company->getProperties()['name']));
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
        $host = $_SERVER['HTTP_REFERER'] ?? '';
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
            'hs_latest_source' => match (true) {
                request()->has('hsa_net') => match (request('hsa')) {
                    'facebook', 'instagram', 'linkedin', 'youtube' => 'PAID_SOCIAL',
                    'google', 'bing', 'yahoo' => 'PAID_SEARCH'
                },
                str_contains($host, 'google') => 'ORGANIC_SEARCH',
                str_contains($host, 'bing') => 'ORGANIC_SEARCH',
                str_contains($host, 'yahoo') => 'ORGANIC_SEARCH',
                str_contains($host, 'facebook') => 'SOCIAL_MEDIA',
                str_contains($host, 'linkedin') => 'SOCIAL_MEDIA',
                str_contains($host, 'twitter') => 'SOCIAL_MEDIA',
                str_contains($host, 'youtube') => 'SOCIAL_MEDIA',
                str_contains($host, 'instagram') => 'SOCIAL_MEDIA',
                empty($host) => 'DIRECT_TRAFFIC',
                default => 'REFERRALS'
            }
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

    /**
     * Get the deal properties for creating a new deal in Hubspot.
     *
     * @param string $companyID The ID of the company associated with the deal.
     * @param string $dealName The name of the deal.
     *
     * @return SimplePublicObjectInputForCreateDeal The deal properties.
     */
    protected function getDealProperties(string $companyID, string $dealName): SimplePublicObjectInputForCreateDeal
    {
        $associationSpec = (new AssociationSpec())
            ->setAssociationTypeId(5)
            ->setAssociationCategory('HUBSPOT_DEFINED');
        $to = new PublicObjectId([
            'id' => $companyID
        ]);

        $publicAssociationsForObject = (new PublicAssociationsForObject())
            ->setTypes([$associationSpec])
            ->setTo($to);

        $properties = [
            'dealname' => $dealName,
            'amount' => '0',
            'dealstage' => 'decisionmakerboughtin',
        ];

        return (new SimplePublicObjectInputForCreateDeal())
            ->setProperties($properties)
            ->setAssociations([$publicAssociationsForObject]);
    }

}
