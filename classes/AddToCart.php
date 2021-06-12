<?php  

    class AddToCart {
        
        // Add product to cart
        public function add( $pid, $qty ) {
            $_SESSION['cart'][$pid]['qty'] = $qty;
            return 'success';
        }

        // Update product in cart
        public function update( $pid, $qty ) {
            if( isset($_SESSION['cart'][$pid]) ){
                $_SESSION['cart'][$pid]['qty'] = $qty;
                return 'updated';
            }
        }

        // Remove product in cart
        public function remove( $pid, $qty ) {
            if( isset($_SESSION['cart'][$pid]) ){
                unset($_SESSION['cart'][$pid]);
                return 'removed';
            }
        }

        // Empty product in cart
        public function empty( $pid ) {
                unset($_SESSION['cart']);
        }

        // Total cart items
        public function totalItems(){
            if( isset($_SESSION['cart'] ) ){
                return count($_SESSION['cart']);
            } else {
                return false;
            }
        }
    }

$cart = new AddToCart();