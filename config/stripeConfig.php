<?php
require_once __DIR__.'/../vendor/autoload.php';

    $stripe = [
        // Key for client side 
        "publishable_key" => "Your Publishable Key",

        // Key for server side tesing
        "secret_key"      => "Your Secret Key",
    ];
    
// Set the api key
\Stripe\Stripe::setApiKey( $stripe['secret_key'] );