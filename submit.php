<?php
require_once('./includes/init.inc.php');
require_once('./config/stripeConfig.php');

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

// Sanitize The Post Array.
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$token         =   $POST['stripeToken'];
$firstName     =   $POST['first_name'];
$emailAddress  =   $POST['email'];
$countryName   =   $POST['country'];
$cityName      =   $POST['city'];

// Retrieve Amount & Convert Into Integer.
$totalAmount = number_format(( $_SESSION['total'] * 100 ) , 0, '', '');

// Create customer in stripe.
$customer = \Stripe\Customer::create([
  'email'       => $emailAddress,
  'source'      => $token,
  'description' => 'A new customer purchase '.$cart->total().' items from shopping cart',
]);

// Charge the amount from customer.
$charge = \Stripe\Charge::create([
  'amount'      => $totalAmount,
  'currency'    => 'usd',
  'description' => 'Charged from E-StuffCart',
  'customer'    => $customer->id
]);

// Redirect To Success Page.
header('location: http://localhost/estuffcart/success/'.$charge->id.'', TRUE, 302);

} 
else {
// Redirect To Home Page.
header('location: index');
exit;
}