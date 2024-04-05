<?php

namespace App\Services;

use App\Http\Controllers\HubspotController;
use App\Traits\Singleton;
use Carbon\Carbon;

class RequestFormService
{
    use Singleton;


    static public function onSubmit(array $validated): void
    {
        if (HubspotController::getInstance()->store($validated)) {
            $validated['exported_at'] = Carbon::now()->format('Y-m-d H:i:s');
        }
        static::getInstance()->storeOnDB($validated);
    }

    public function storeOnDB(array &$validated): bool
    {
        global $wpdb;
        $query = $wpdb->prepare('SELECT COUNT(*) FROM %i WHERE email = "%s"', $wpdb->prefix . 'leads', $validated['email']);

        if ($wpdb->get_var($query) === '0') {
            $validated['created_at'] = Carbon::now()->format('Y-m-d H:i:s');

            return $wpdb->insert("{$wpdb->prefix}leads", $validated) !== false;
        }
        $validated['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');

        return $wpdb->update("{$wpdb->prefix}leads", $validated, ['email' => $validated['email']]) !== false;
    }

}
