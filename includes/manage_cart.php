<?php
require_once 'init.inc.php';

$pid   = safe_value( $_POST['pid'] );
$qty   = safe_value( $_POST['qty'] );
$type  = safe_value( $_POST['type'] );

if ( $type == 'add'){
    $shoppingCart = $cart->add( $pid, $qty );
    if ( $shoppingCart == 'success' ){
        echo json_encode([ 
            'success' => 'success',
            'message' => '<p class="alert alert-success">Your Item Added successfully</p>'
            ]);
        }
    exit;
}

if ( $type == 'update'){
    $shoppingCart = $cart->update( $pid, $qty );
}

if ( $type == 'remove'){
    $shoppingCart = $cart->delete( $pid, $qty );
}