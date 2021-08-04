<?php
require_once __DIR__.'/../vendor/autoload.php';

    $stripe = [
        // Key for client side 
        "publishable_key" => "",

        // Key for server side tesing
        "secret_key"      => "",
    ];
    
// Set the api key
\Stripe\Stripe::setApiKey( $stripe['secret_key'] );