<?php

namespace App\Policies;

use App\Abstracts\AbstractPolicy;
use App\Traits\Singleton;
use App\View\Components\RequestForm;
use Illuminate\Http\Request;

class RequestFormPolicy extends AbstractPolicy {
    use Singleton;

    /**
     * Validates the given request data.
     *
     * @param Request $request The request object containing the data to validate.
     *
     * @return array An array containing the validated data and any validation errors.
     */
    public static function validate( Request $request ): array {
        return self::getInstance()->doValidation( $request );
    }

    /**
     * Validates the given request data.
     *
     * @param Request $request The request object containing the data to validate.
     *
     * @return array An array containing the validated data and any validation errors.
     */
    protected function doValidation( Request $request ): array {
        $errors    = [];
        $validated = [];
        foreach ( $request->except( 'requestForm_nonce', '_wp_http_referer' ) as $key => $value ) {
            switch ( $key ) {
                case 'first_name':
                case 'last_name':
                case 'company':
                    $value = sanitize_text_field( $value );
                    if ( empty( $value ) ) {
                        $errors[] = sprintf( __( 'The %s field is mandatory, please fill it in.', 'sage' ), match ( $key ) {
                            'first_name' => __( 'first name', 'sage' ),
                            'last_name' => __( 'last name', 'sage' ),
                            'company' => __( 'company', 'sage' ),
                        } );
                        $value    = null;
                    }
                    break;
                case 'email':
                    $value = $this->validateEmail( $value );
                    if ( $value === false ) {
                        $errors[] = __( 'Please enter a valid email address.', 'sage' );
                        $value    = null;
                    }
                    break;
                case 'url':
                    $value = $this->validateUrl( $value );
                    if ( $value === false ) {
                        $errors[] = __( 'Please enter a valid url.', 'sage' );
                        $value    = null;
                    }
                    break;
                case 'country':
                    $value = $this->validateSelect( $value, array_keys( RequestForm::countries() ) );
                    if ( $value === false ) {
                        $errors[] = __( 'The selected country is invalid. Choose one from the list.', 'sage' );
                        $value    = null;
                    }
                    break;
                case 'platform':
                    $value = $this->validateSelect( $value, array_keys( RequestForm::platforms() ) );
                    if ( $value === false ) {
                        $errors[] = __( 'The selected e-commerce platform is invalid. Choose one from the list.', 'sage' );
                        $value    = null;
                    }
                    break;
                case 'business':
                    $value = $this->validateSelect( $value, array_keys( RequestForm::businessType() ) );
                    if ( $value === false ) {
                        $errors[] = __( 'The selected business type is not valid. Choose one from the list.', 'sage' );
                        $value    = null;
                    }
                    break;
                case 'privacy':
                    $value = $value === 'on';
                    if ( $value !== true ) {
                        $errors[] = __( 'You must agree to the terms of the privacy policy to continue.', 'sage' );
                        $value    = null;
                    }
                    break;
                case'newsletter':
                    $value = $value === 'on';
                    break;
                case 'phone':
                    $value = $this->validatePhoneNumber( $value );
                    if ( $value === false ) {
                        $errors[] = __( 'Enter a valid phone number (including area code).', 'sage' );
                        $value    = null;
                    }
                    break;
                default:
                    $value = sanitize_text_field( $value );
            }

            if ( ! empty( $value ) ) {
                $validated[ $key ] = $value;
            }
        }

        /**
         * Potrei aver bisogno dei dati validati per andare in update, quindi anche i campi nullabili devono potersi
         * aggiornare.
         */
        $validated['newsletter'] = $validated['newsletter'] ?? false;
        $validated['company']    = $validated['company'] ?? null;
        $validated['city']       = $validated['city'] ?? null;
        $validated['note']       = $validated['note'] ?? null;

        return [ $validated, $errors ];
    }
}
