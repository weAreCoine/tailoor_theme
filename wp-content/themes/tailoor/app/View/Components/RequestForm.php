<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RequestForm extends Component
{
    public array $countries;
    public array $platforms;
    public array $businessType;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->countries = static::countries();
        $this->platforms = static::platforms();
        $this->businessType = static::businessType();
    }

    public static function countries(): array
    {
        return [
            'Afghanistan' => 'Afghanistan',
            'Albania' => 'Albania',
            'Algeria' => 'Algeria',
            'Andorra' => 'Andorra',
            'Angola' => 'Angola',
            'Antigua and Barbuda' => 'Antigua and Barbuda',
            'Argentina' => 'Argentina',
            'Armenia' => 'Armenia',
            'Austria' => 'Austria',
            'Azerbaijan' => 'Azerbaijan',
            'Bahrain' => 'Bahrain',
            'Bangladesh' => 'Bangladesh',
            'Barbados' => 'Barbados',
            'Belarus' => 'Belarus',
            'Belgium' => 'Belgium',
            'Belize' => 'Belize',
            'Benin' => 'Benin',
            'Bhutan' => 'Bhutan',
            'Bolivia' => 'Bolivia',
            'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
            'Botswana' => 'Botswana',
            'Brazil' => 'Brazil',
            'Brunei' => 'Brunei',
            'Bulgaria' => 'Bulgaria',
            'Burkina Faso' => 'Burkina Faso',
            'Burundi' => 'Burundi',
            'Cabo Verde' => 'Cabo Verde',
            'Cambodia' => 'Cambodia',
            'Cameroon' => 'Cameroon',
            'Canada' => 'Canada',
            'Central African Republic' => 'Central African Republic',
            'Chad' => 'Chad',
            'Channel Islands' => 'Channel Islands',
            'Chile' => 'Chile',
            'China' => 'China',
            'Colombia' => 'Colombia',
            'Comoros' => 'Comoros',
            'Congo' => 'Congo',
            'Costa Rica' => 'Costa Rica',
            'Croatia' => 'Croatia',
            'Cuba' => 'Cuba',
            'Cyprus' => 'Cyprus',
            'Czech Republic' => 'Czech Republic',
            'Côte d\'Ivoire' => 'Côte d\'Ivoire',
            'Denmark' => 'Denmark',
            'Djibouti' => 'Djibouti',
            'Dominica' => 'Dominica',
            'Dominican Republic' => 'Dominican Republic',
            'DR Congo' => 'DR Congo',
            'Ecuador' => 'Ecuador',
            'Egypt' => 'Egypt',
            'El Salvador' => 'El Salvador',
            'Equatorial Guinea' => 'Equatorial Guinea',
            'Eritrea' => 'Eritrea',
            'Estonia' => 'Estonia',
            'Eswatini' => 'Eswatini',
            'Ethiopia' => 'Ethiopia',
            'Faeroe Islands' => 'Faeroe Islands',
            'Finland' => 'Finland',
            'France' => 'France',
            'French Guiana' => 'French Guiana',
            'Gabon' => 'Gabon',
            'Gambia' => 'Gambia',
            'Georgia' => 'Georgia',
            'Germany' => 'Germany',
            'Ghana' => 'Ghana',
            'Gibraltar' => 'Gibraltar',
            'Greece' => 'Greece',
            'Grenada' => 'Grenada',
            'Guatemala' => 'Guatemala',
            'Guinea' => 'Guinea',
            'Guinea-Bissau' => 'Guinea-Bissau',
            'Guyana' => 'Guyana',
            'Haiti' => 'Haiti',
            'Holy See' => 'Holy See',
            'Honduras' => 'Honduras',
            'Hong Kong' => 'Hong Kong',
            'Hungary' => 'Hungary',
            'Iceland' => 'Iceland',
            'India' => 'India',
            'Indonesia' => 'Indonesia',
            'Iran' => 'Iran',
            'Iraq' => 'Iraq',
            'Ireland' => 'Ireland',
            'Isle of Man' => 'Isle of Man',
            'Israel' => 'Israel',
            'Italy' => 'Italy',
            'Jamaica' => 'Jamaica',
            'Japan' => 'Japan',
            'Jordan' => 'Jordan',
            'Kazakhstan' => 'Kazakhstan',
            'Kenya' => 'Kenya',
            'Kuwait' => 'Kuwait',
            'Kyrgyzstan' => 'Kyrgyzstan',
            'Laos' => 'Laos',
            'Latvia' => 'Latvia',
            'Lebanon' => 'Lebanon',
            'Lesotho' => 'Lesotho',
            'Liberia' => 'Liberia',
            'Libya' => 'Libya',
            'Liechtenstein' => 'Liechtenstein',
            'Lithuania' => 'Lithuania',
            'Luxembourg' => 'Luxembourg',
            'Macao' => 'Macao',
            'Madagascar' => 'Madagascar',
            'Malawi' => 'Malawi',
            'Malaysia' => 'Malaysia',
            'Maldives' => 'Maldives',
            'Mali' => 'Mali',
            'Malta' => 'Malta',
            'Mauritania' => 'Mauritania',
            'Mauritius' => 'Mauritius',
            'Mayotte' => 'Mayotte',
            'Mexico' => 'Mexico',
            'Moldova' => 'Moldova',
            'Monaco' => 'Monaco',
            'Mongolia' => 'Mongolia',
            'Montenegro' => 'Montenegro',
            'Morocco' => 'Morocco',
            'Mozambique' => 'Mozambique',
            'Myanmar' => 'Myanmar',
            'Namibia' => 'Namibia',
            'Nepal' => 'Nepal',
            'Netherlands' => 'Netherlands',
            'Nicaragua' => 'Nicaragua',
            'Niger' => 'Niger',
            'Nigeria' => 'Nigeria',
            'North Korea' => 'North Korea',
            'North Macedonia' => 'North Macedonia',
            'Norway' => 'Norway',
            'Oman' => 'Oman',
            'Pakistan' => 'Pakistan',
            'Panama' => 'Panama',
            'Paraguay' => 'Paraguay',
            'Peru' => 'Peru',
            'Philippines' => 'Philippines',
            'Poland' => 'Poland',
            'Portugal' => 'Portugal',
            'Qatar' => 'Qatar',
            'Romania' => 'Romania',
            'Russia' => 'Russia',
            'Rwanda' => 'Rwanda',
            'Réunion' => 'Réunion',
            'Saint Helena' => 'Saint Helena',
            'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
            'Saint Lucia' => 'Saint Lucia',
            'Saint Vincent and the Grenadines' => 'Saint Vincent and the Grenadines',
            'San Marino' => 'San Marino',
            'Sao Tome & Principe' => 'Sao Tome & Principe',
            'Saudi Arabia' => 'Saudi Arabia',
            'Senegal' => 'Senegal',
            'Serbia' => 'Serbia',
            'Seychelles' => 'Seychelles',
            'Sierra Leone' => 'Sierra Leone',
            'Singapore' => 'Singapore',
            'Slovakia' => 'Slovakia',
            'Slovenia' => 'Slovenia',
            'Somalia' => 'Somalia',
            'South Africa' => 'South Africa',
            'South Korea' => 'South Korea',
            'South Sudan' => 'South Sudan',
            'Spain' => 'Spain',
            'Sri Lanka' => 'Sri Lanka',
            'State of Palestine' => 'State of Palestine',
            'Sudan' => 'Sudan',
            'Suriname' => 'Suriname',
            'Sweden' => 'Sweden',
            'Switzerland' => 'Switzerland',
            'Syria' => 'Syria',
            'Taiwan' => 'Taiwan',
            'Tajikistan' => 'Tajikistan',
            'Tanzania' => 'Tanzania',
            'Thailand' => 'Thailand',
            'The Bahamas' => 'The Bahamas',
            'Timor-Leste' => 'Timor-Leste',
            'Togo' => 'Togo',
            'Trinidad and Tobago' => 'Trinidad and Tobago',
            'Tunisia' => 'Tunisia',
            'Turkey' => 'Turkey',
            'Turkmenistan' => 'Turkmenistan',
            'Uganda' => 'Uganda',
            'Ukraine' => 'Ukraine',
            'United Arab Emirates' => 'United Arab Emirates',
            'United Kingdom' => 'United Kingdom',
            'United States' => 'United States',
            'Uruguay' => 'Uruguay',
            'Uzbekistan' => 'Uzbekistan',
            'Venezuela' => 'Venezuela',
            'Vietnam' => 'Vietnam',
            'Western Sahara' => 'Western Sahara',
            'Yemen' => 'Yemen',
            'Zambia' => 'Zambia',
            'Zimbabwe' => 'Zimbabwe'
        ];

    }

    public static function platforms(): array
    {
        return [
            'shopify' => 'Shopify',
            'magento' => 'Magento',
            'woocommerce' => 'Woocommerce',
            'prestashop' => 'Prestashop',
            'salesforce' => 'SalesForce',
            'others' => 'Others',
        ];
    }

    public static function businessType(): array
    {
        return [
            'sartoria' => __('Tailor', 'sage'),
            'camiceria' => __('Shirt maker', 'sage'),
            'negozi_su_misura' => __('Tailor shop', 'sage'),
            'altro' => __('Other', 'sage'),
            'brand' => __('Brand', 'sage'),
            'brand_accessori' => __('Accessory Brand', 'sage'),
            'brand_scarpe' => __('Shoes Brand', 'sage'),
            'brand_abbigliamento' => __('Clothing Brand', 'sage'),
            'produttore_tessuti' => __('Fabric Manufacturer', 'sage'),
            'produttore_abbigliamento' => __('Clothing Manufacturer', 'sage'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $errors = $_SESSION['requestFormErrors'] ?? [];
        if (!empty($errors)) {
            unset($_SESSION['requestFormErrors']);
        }
        
//        return view('components.request-form')->with([
//            'formFields' => json_encode([
//                'firstName' => old('first_name', fake()->firstName()),
//                'lastName' => old('last_name', fake()->lastName()),
//                'phone' => old('phone', fake()->phoneNumber()),
//                'email' => old('email', fake()->companyEmail()),
//                'company' => old('company', fake()->company()),
//                'website' => old('website', fake()->url()),
//                'platform' => old('platform', fake()->randomElement(array_keys(RequestForm::platforms()))),
//                'business' => old('business', fake()->randomElement(array_keys(RequestForm::businessType()))),
//                'city' => old('city', fake()->city()),
//                'country' => old('country', fake()->randomElement(array_keys(RequestForm::countries()))),
//                'note' => old('note', fake()->boolean(30) ? fake()->paragraph(1) : null),
//                'privacy' => true,
//                'newsletter' => fake()->boolean(15),
//            ]),
//            'errors' => $errors
//        ]);

        return view('components.request-form')->with([
            'formFields' => json_encode([
                'firstName' => old('first_name', ''),
                'lastName' => old('last_name', ''),
                'phone' => old('phone', ''),
                'email' => old('email', ''),
                'company' => old('company', ''),
                'website' => old('website', ''),
                'platform' => old('platform', ''),
                'business' => old('business', ''),
                'city' => old('city', ''),
                'country' => old('country', ''),
                'note' => old('note', ''),
                'privacy' => false,
                'newsletter' => false,

            ]),
            'errors' => $errors
        ]);
    }


}
