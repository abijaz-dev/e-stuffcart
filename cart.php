<?php include_once 'includes/_header.inc.php'; ?> 
<h1>Cart Items</h1> 
<hr>


<!-- row grid table for cart details -->
<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Remove</th>
        </tr>
    </thead>
    <tbody class="cart_body">

        <?php
                require_once 'includes/init.inc.php';

                if( isset($_SESSION['cart'] ) AND !empty($_SESSION['cart'])){
                    
                    $total = 0;  // initialization of total price
                    foreach($_SESSION['cart'] as $key => $val){
                        $product_arr  = get_data_for_cart( $key ); 

                        // fetch products details on the base of session 
                            $name       =    $product_arr['title'];
                            $category   =    $product_arr['category_name'];
                            $cat_id     =    $product_arr['category_id'];
                            $price      =    $product_arr['price'];
                            $id         =    $product_arr['id'];
                            $qty        =    $val['qty'];
                            $total      =    $total + ($qty * $price) ;   // upadation of total price
                    
            ?>

        <tr>
            <td class="cart_image"><a href="product_view.php?product_id=<?= $id  ?>">
                    <img src="http://localhost/e-stuffcart/includes/img/product<?= $id  ?>.jpg" height="80px"
                        width="120px" alt="Product Image"> <?= $name ?></a>
            </td>
            <td class="category"><a href="product.php?cat_id=<?= $cat_id  ?>"> <?= $category ?> </a></td>
            <td class="cart_price">$<?= $price ?></td>
            <td class="cart_qty">
                <input type="number" min="1" max="10" class="col-md-3" id="<?= $key ?>qty" value="<?= $qty ?>" />
                <a class="col-md-3 btn btn-success" href="javascript:void(0)"
                    onclick="submitCart(<?= $key ?>, 'update')">Update</a>
            </td>
            <td class="total_price">$<?= number_format( $qty * $price, 2) ?></td>
            <td class="cart_delete">
                <a href="javascript:void(0)" onclick="submitCart(<?= $key ?>, 'remove')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="23" fill="currentColor"
                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg></a>
            </td>
        </tr>

        <?php
               }
        ?>
    </tbody>
    <tr>
        <th class="total">Total Price =</th>
        <td class="total_amount"><?= '$'.number_format( $total, 2) ; ?></td>
        <td>
            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#paymentModal">Proceed To checkout</a>
        </td>
    </tr>
    <?php       
        }
        else {
            echo '<div class="alert alert-danger" role="alert">Shopping Cart is empty !</div>';
        }
        ?>
</table>
<!-- end here  -->

<!-- proceed to checkout modal  -->
<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Pay The Amount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- payment form ( stripe ) -->
                <form class="row g-3 needs-validation" id="payment-form" action="submit.php" method="post">
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" class="form-control StripeElement StripeElement--empty" id="f_name"
                            name="f_name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" class="form-control StripeElement StripeElement--empty" id="l_name"
                            name="l_name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control StripeElement StripeElement--empty" id="email"
                            name="email" required>
                    </div>

                    <div class="col-md-6">
                        <label for="city_name" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="zip_code" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>

                    <div id="card-element">
                        <!-- Elements will create input elements here -->
                    </div>
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>

                    <div class="col-lg-3 my-2">
                        <label for="zip_code" class="form-label">Estimate Cost</label>
                        <div class="col-lg-8">
                            <!-- total items amount for UI  -->
                            <input type="text" class="form-control" id="display_amount" name="display_amount"
                                value="$ <?= $total; ?> " disabled>
                            <!-- total items amount for server post -->
                            <input type="hidden" class="form-control" id="amount" name="amount" value="<?= $total ?>">
                            <!-- total items count number for server post -->
                            <input type="hidden" class="form-control" id="items_no" name="items_no"
                                value="<?= $cart->totalItems() ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label mt-1" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-danger" id="payment-request-button" type="submit">Pay
                            Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal end here  -->

<?php include_once 'includes/_footer.inc.php'; ?>