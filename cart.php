<?php include_once 'includes/partials/header.inc.php'; // Top Header. ?>

<!-- Top Heading -->
<h1 class="text-center p-5"><?= setPageTitle('Cart Details'); ?></h1>
<hr>
<?php
// Check If Session set or not.
if( isset($_SESSION['cart']) AND !empty($_SESSION['cart'])){
?>

<!-- Cart Products -->
<section class="bg-light p-3">
    <table class="table">
        <!-- Table Headings -->
        <thead>
            <tr>
                <th colspan="2" class="text-center">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0; 
            foreach($_SESSION['cart'] as $key => $val){
            $product = ProductsController::show($key); 
            $qty     =    $val['qty'];
            $total   =    $total + ($qty * $product->price);       
            $_SESSION['total'] = $total;  // Store Total Price In Session.
        ?>

            <tr>
                <!-- Product Image -->
                <td class="p-lg-0 pt-md-3 px-0"><a
                        href="http://localhost/estuffcart/view/<?= $product->category->id ?>/<?=  $product->id ?>"
                        class="d-none d-md-block"><img
                            src="http://localhost/estuffcart/public/img/product<?= $product->id ?>.jpg" height="80px"
                            width="120px"></a></td>
                <!-- Product Name -->
                <td class="p-4 px-2"><a
                        href="http://localhost/estuffcart/view/<?= $product->category->id ?>/<?=  $product->id ?>"
                        class="text-decoration-none text-dark"><?= $product->title ?></a></td>
                <!-- Category Name -->
                <td class="pt-4 px-2"><a href="http://localhost/estuffcart/product/<?= $product->category_id  ?>"
                        class="text-decoration-none text-dark"><?= $product->category->category_name ?></a>
                </td>
                <!-- Price -->
                <td class="pt-4">$<?= number_format( $qty * $product->price , 2) ?></td>
                <!-- Update Quantity -->
                <td>
                    <input type="number" min="1" max="10" class="p-0 mb-1 d-block" id="<?= $key ?>qty"
                        value="<?= $qty ?>" />
                    <a class="btn btn-success p-2 py-1 mb-2" href="javascript:void(0)"
                        onclick="submitCart(<?= $key ?>, 'update')">Update</a>
                </td>
                <!-- Remove Item -->
                <td class="cart_delete p-4">
                    <a href="javascript:void(0)" onclick="submitCart(<?= $key ?>, 'remove')"><i
                            class="bi bi-trash-fill text-secondary h3"></i></a>
                </td>
            </tr>
            <?php } ?>

        </tbody>
        <tfoot>
            <!-- Total Price & Checkout -->
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td><strong>Total : <?= '$'.number_format( $total, 2) ; ?></strong></td>
                <td><a class="btn btn-warning btn-block" href="http://localhost/estuffcart/checkout">Click to
                        checkout</a>
                </td>
            </tr>
        </tfoot>
    </table><!-- ./Cart Products./ -->
</section>
<?php       
} else {
    // Display Error.
    echo '<div class="alert alert-danger" role="alert">Shopping Cart is empty !</div>';
}
?>
<?php include_once 'includes/partials/footer.inc.php'; // Footer. ?>