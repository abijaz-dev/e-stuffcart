<?php include_once 'includes/_header.inc.php'; ?>
    <h1>E-StuffCart - Featured Categories</h1> 
    <hr>

    <div class="products">
        <div class="row">

            <?php
                require_once 'includes/init.inc.php';
                $cat = $obj->get_category('');

                // fetch categories name & display them 
                while ( $row = $cat->fetch(PDO::FETCH_ASSOC) ){
                    extract($row);    // extract the array into variables
            ?>

            <div class="col-lg-3" id="product">
                <a href="product.php?cat_id=<?= $id ?>" class="link">
                    <div class="card" style="width: 18rem; height: 19rem;">
                        <img src="http://localhost/e-stuffcart/includes/img/categories/cat<?= $id ?>.jpg"
                            class="card-img-top" height="200px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $category_name ?></h5>
                        </div>
                    </div>
                </a>
            </div>

            <?php  }  ?>

        </div>
    </div>
</div>
<?php include_once 'includes/_footer.inc.php'; ?>