<?php

require_once('./vendor/autoload.php');
require_once('./config/stripeConfig.php');

// Token is created using Stripe Checkout or Elements!
// Get the payment token ID submitted by the form:

    // Sanitize post array that submitted from client side
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    
    $token         =   $POST['stripeToken'];
    $fname         =   $POST['f_name'];
    $lname         =   $POST['l_name'];
    $email         =   $POST['email'];
    $total_items   =   $POST['items_no'];
    $amount        =   $POST['amount'];
    // Convert the total amount into integer ( stripe requirment )
    $amount = number_format( ($amount * 100) , 0, '', '');


    // Create customer in stripe
    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source' => $token,
        'description' => 'A new customer purchase ' .$total_items . ' items from cart',
    ]);


    // Charge the amount from customer
    $charge = \Stripe\Charge::create([
      'amount' => $amount,
      'currency' => 'usd',
      'description' => 'Example charge',
      'customer'  => $customer->id
    ]);

    // redirect user after submitting the payment
    header('location: success.php?transaction_id='.$charge->id.'');
    exit;