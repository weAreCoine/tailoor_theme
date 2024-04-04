<?php

namespace App\Services;


class AjaxRoutesService {
    protected array $actions;

    public function __construct() {

        $this->actions = apply_filters( 'ajax_routes', [
            // 'action' => [$class, 'method']
        ] );

        $this->add_actions();
    }

    protected function add_actions() {
        foreach ( $this->actions as $hook => $callable ) {
            if ( isset( $callable[0] ) && ! is_object( $callable[0] ) ) {
                $callable[0] = new $callable[0];
            }
            foreach ( [ 'wp_ajax_', 'wp_ajax_nopriv_' ] as $prefix ) {
                add_action( $prefix . $hook, $callable );
            }
        }
    }
}
