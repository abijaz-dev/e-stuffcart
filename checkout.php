<?php require_once "includes/_header.inc.php"; ?>
<?php
    if ( !isset($_SESSION['cart']) AND empty($_SESSION['cart']) ){
        header("location : index.php");
    }
?>


<h1>Payment Method</h1>
<p class="text-center">pay out your payment & receive your order within working days</p>

<div class="row justify-content-md-center py-5">
    <div class="col-lg-6">

    <?php
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
            }
    ?>
    
        <!-- display the total items count price  -->
        <h5 class="text-right mb-4"><b>Total amount :</b> $<?= $total;  ?></h5>
        
        <!-- payment form ( stripe ) -->
        <form class="row g-3 needs-validation" id="payment-form" action="submit.php" method="post">
            <div class="col-md-4">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control StripeElement StripeElement--empty" id="f_name" name="f_name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control StripeElement StripeElement--empty" id="l_name" name="l_name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control StripeElement StripeElement--empty" id="email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="city_name" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="city_state" class="form-label">State</label>
                <select class="form-select" id="state" name="state" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
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
                <button class="btn btn-danger" id="payment-request-button" type="submit">Pay Now</button>
            </div>
        </form>

    </div>
</div>


<?php require_once "includes/_footer.inc.php"; ?>