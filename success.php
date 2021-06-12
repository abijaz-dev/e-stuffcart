<?php include_once 'includes/_header.inc.php'; ?>
<h1>E-StuffCart - Featured Categories</h1>
<hr>

<div class="row">

    <?php
                require_once 'includes/init.inc.php';

                // Check if transaction id get or not
                $transaction_id = safe_value( $_GET['transaction_id'] );
                if ( !isset( $transaction_id ) || empty( $transaction_id ) AND empty($_SESSION['cart']) ){
                    header('location: index.php?erroroccured');
                    exit;
                } else { 
            ?>

    <div class="h-100 p-5 bg-secondary text-white border rounded-3">
        <h2>Hey Thanks For Purchasing</h2>
        <p><b>Your transaction Id : </b><?= $transaction_id ?></p>
        <p>Check your email for more info and know about your order details</p>
        <a class="btn btn-outline-warning" href="./index.php" type="button">Go back</a>
    </div>

    <?php
    }
        session_unset();
    ?>

</div>
</div>
<?php include_once 'includes/_footer.inc.php'; ?>