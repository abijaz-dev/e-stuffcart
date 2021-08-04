<?php include_once 'includes/partials/header.inc.php'; // Top Header. ?>

<!-- Top Heading -->
<h1 class="text-center p-5"><?= setPageTitle('Product Details'); ?></h1><hr>
<?php if( isset($product) ) { ?>

<!-- Review Section -->
<section class="bg-light p-lg-5 p-sm-4 pt-sm-5">
    <div class="row p-5">
        <div class="card p-2 h-100">
            <div class="d-md-flex align-items-center justify-content-between">
                <!-- Image & Price -->
                <div class="col-md">
                    <img src="http://localhost/estuffcart/public/img/product<?= $product->id ?>.jpg" class="img-fluid w-100"
                    alt="Product Image">
                    <div class="card-title btn btn-secondary my-2 w-100 text-light disabled" id="price"><b>$<?= $product->price  ?></b></div>
                </div>
                <!-- Details -->
                <div class="col-md-7 p-2">
                    <div class="card-body">
                        <h3 class="card-title"><?= $product->title  ?> </h3>
                        <p class="card-text"><?= $product->description  ?></p>
                        <p class="card-text"><b>Category : </b><?= $product->category->category_name  ?></p>
                        <p class="card-text"><b>Last updated : </b><?= $product->updated_at  ?></p>
                        <!-- Quantity -->
                        <div class="col-lg-3">
                            <label for="quantity" class="form-label"><b>Quantity :</b></label>
                            <select id="qty" class="form-select">
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <!-- Cart Button -->
                        <div class="cart_button">
                            <a class="btn btn-warning my-3" href="#"
                                onclick="submitCart(<?= $product->id ?>,'add')">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- ./Review Section -->
<?php } ?>

<?php include_once 'includes/partials/footer.inc.php'; ?>