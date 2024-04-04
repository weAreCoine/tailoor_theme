<?php

namespace App\Services;

use App\Http\Controllers\RequestFormController;
use Illuminate\Support\Facades\Route;

class RouterService {
    public static function register() {
        Route::post( '/request-form-submission', [
            RequestFormController::class,
            'submit'
        ] )->name( 'requestForm.submit' );
    }
}
