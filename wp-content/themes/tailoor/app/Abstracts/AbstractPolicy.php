<?php

namespace App\Abstracts;

use Illuminate\Support\Facades\Log;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

abstract class AbstractPolicy {

    /**
     * Validates a given email address.
     *
     * @param string $value The email address to be validated.
     *
     * @return bool|string Returns true if the given email address is valid.
     *                    Returns false otherwise.
     */
    protected function validateEmail( string $value ): bool|string {
        return is_email( sanitize_email( $value ) );
    }

    /**
     * Validates a given URL.
     *
     * @param string $value The URL to be validated.
     *
     * @return bool|string Returns true if the given URL is valid.
     *                    Returns false otherwise.
     */
    protected function validateUrl( string $value ): bool|string {
        return wp_http_validate_url( esc_url_raw( $value ) );
    }

    /**
     * Validates a given value against a list of options.
     *
     * @param string|int|null $value The value to be validated.
     * @param array $options The list of options to validate against.
     *
     * @return bool|string Returns the validated value if it exists in the options.
     *                    Returns false otherwise.
     */
    protected function validateSelect( string|int|null $value, array $options ): bool|string {
        $value = sanitize_text_field( $value );

        return in_array( $value, $options ) ? $value : false;
    }

    /**
     * Validates a given phone number.
     *
     * @param ?string $phoneNumber The phone number to be validated.
     *
     * @return bool|string Returns a formatted international phone number if the given phone number is valid.
     *                    Returns false otherwise.
     */
    protected function validatePhoneNumber( ?string $phoneNumber ): bool|string {
        $phoneUtils = PhoneNumberUtil::getInstance();
        try {
            $parsedNumber = $phoneUtils->parse( $phoneNumber );
            if ( $phoneUtils->isValidNumber( $parsedNumber ) ) {
                return $phoneUtils->formatOutOfCountryCallingNumber( $parsedNumber, 'IT' );
            }
        } catch ( NumberParseException $e ) {
            Log::error( $e->getMessage(), $e->getTrace() );
        }

        return false;
    }
}
