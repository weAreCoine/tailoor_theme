<?php

namespace App\Traits;

trait Singleton {
    private static ?self $instance = null;

    public static function getInstance(): static {
        $class = __CLASS__;
        if ( static::$instance === null ) {
            static::$instance = new $class;
        }

        return static::$instance;
    }
}
