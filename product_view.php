<?php include_once 'includes/_header.inc.php'; ?>
<h1>Product Details</h1>
<hr> 

<?php
            require_once 'includes/init.inc.php';

            // display single product on click
            $obj      = new Functions();
            $p_id     = safe_value( $_GET['product_id'] );
            $product  = $obj->get_product( $p_id, '', '', '', '', '' ); 
            while ( $row = $product->fetch(PDO::FETCH_ASSOC)){
                extract($row);
            }
    ?>


<div class="card mb-3" style="max-width: 1400px; height: 500px;">
    <div class="row g-0">
        <div class="col-md-4">
            <h6 class="card-title" id="price"><b>$<?= $price  ?></b> </h6>
            <img src="http://localhost/e-stuffcart/includes/img/product<?= $id ?>.jpg" height="400px" width="450px"
                alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body mx-5">
                <h3 class="card-title"><?= $title  ?> </h3>
                <p class="card-text"><?= $description  ?></p>
                <p class="card-text"><b>Category : </b><?= $category_name  ?></p>
                <p class="card-text"><b>Last updated : </b><?= $updated_at  ?>
                </p>


                <div class="col-lg-2">
                    <label for="quantity" class="form-label"><b>Quantity :</b></label>
                    <select id="qty" class="form-select">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="cart_button">
                    <a type="submit" class="btn btn-warning my-3" href="javascript:void(0)"
                        onclick="submitCart(<?= $id ?>, 'add')">Add to cart</a>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php include_once 'includes/_footer.inc.php'; ?>