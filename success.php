<?php include_once 'includes/partials/header.inc.php'; ?>

<!-- Top Heading -->
<h1 class="text-center p-5"><?= setPageTitle('Transaction Details'); ?></h1><hr>

<!-- Transaction -->
<section class="bg-light p-5">
    <div class="container">
        <?php
            // Check if transaction id.
            $transactionId = safe_value( $_GET['transaction_id'] );
            if ( !isset( $transactionId ) || empty( $transactionId ) || empty($_SESSION['cart']) ){
                header('location: index', TRUE, 302);
                exit;
            } else { 
        ?>

        <div class="h-100 p-5 bg-secondary text-white border rounded-3">
            <h2>Hey Thanks For Purchasing.</h2>
            <p><b>Your transaction Id : </b><?= $transactionId ?></p>
            <p>Check your email for more info and know about your order details</p>
            <a class="btn btn-outline-warning" href="http://localhost/estuffcart/index" type="button">Go back</a>
        </div>
        <?php } 
        // Empty the cart.
        session_unset();
        ?>

    </div>
</section><!-- ./Transaction -->

<?php include_once 'includes/partials/footer.inc.php'; ?>