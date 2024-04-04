<?php

namespace App\Http\Controllers;

use App\Policies\RequestFormPolicy;
use App\Services\RequestFormService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RequestFormController extends Controller {
    public function submit( Request $request ) {
        if ( ! $request->has( 'requestForm_nonce' ) || wp_verify_nonce( $request->get( 'requestForm_nonce' ), 'requestForm_submit' ) !== 1 ) {
            $errors                        = $_SESSION['requestFormErrors'] ?? [];
            $errors[]                      = __( 'Something goes wrong. Please, try again in a few minutes.', 'sage' );
            $_SESSION['requestFormErrors'] = $errors;

            return redirect()->back();
        }
        [ $validated, $errors ] = RequestFormPolicy::validate( $request );

        if ( ! empty( $errors ) ) {
            $_SESSION['requestFormErrors'] = $errors;

            return redirect()->back();
        }

        RequestFormService::onSubmit( $validated );

        return redirect()->to( 'schedule-your-free-demo' );
    }
}
