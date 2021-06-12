<?php

require_once __DIR__.'/../includes/init.inc.php';

$pid   = safe_value($_POST['pid']) ;
$qty   = safe_value($_POST['qty']) ;
$type  = safe_value($_POST['type']) ;

if ( $type == 'add'){
    $shopping_cart = $cart->add( $pid, $qty );
    if ( $shopping_cart == 'success' ){
        echo json_encode([ 
            'success' => 'success',
            'message' => '<p class="alert alert-success">Added successfully</p>'
            ]);
        }
    exit;
}

if ( $type == 'update'){
    $shopping_cart = $cart->update( $pid, $qty );
}

if ( $type == 'remove'){
    $shopping_cart = $cart->remove( $pid, $qty );
}

echo $cart->totalItems();    