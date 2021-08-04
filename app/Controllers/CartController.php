<?php  
class CartController {

    // Add Items To Cart.
    public function add( $pid, $qty ) {
        $_SESSION['cart'][$pid]['qty'] = $qty;
        return 'success';
    }

    // Update Product Quantity.
    public function update( $pid, $qty ) {
        if( isset($_SESSION['cart'][$pid]) ){
            $_SESSION['cart'][$pid]['qty'] = $qty;
            return 'updated';
        }
    }

    // Remove Product from cart.
    public function delete( $pid, $qty ) {
        if( isset($_SESSION['cart'][$pid]) ){
            unset($_SESSION['cart'][$pid]);
            return 'removed';
        }
    }

    // Total cart items.
    public function total(){
        if( !isset($_SESSION['cart'] ) ){
            return false;  
        } 
        return count($_SESSION['cart']);
    }
}

// Object.
$cart = new CartController();