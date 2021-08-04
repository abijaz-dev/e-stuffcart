<?php include_once './includes/partials/header.inc.php'; // Top Header. ?>

<!-- Top Heading -->
<h1 class="text-center p-5"><?= isset( $category->category_name ) ? setPageTitle($category->category_name) : null; ?></h1><hr>

<?php if( count($products) ) { ?>

<!-- Products Section -->
<section class="bg-light p-5 text-center">
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-5">
        <?php foreach( $products as $product ) { ?>

        <div class="col p-5 py-0 px-md-2">
            <a href="../view/<?= $product->category->id ?>/<?= $product->id ?>"
                class="text-decoration-none">
                <div class="card p-2 h-100">
                    <img src="http://localhost/estuffcart/public/img/product<?= $product->id ?>.jpg" class="card-img-top p-2 px-1"
                        height="250px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->title ?></h5>
                    </div>
                    <a class="btn btn-success btn-sm disabled" tabindex="-1" role="button" aria-disabled="true">$
                        <?= $product->price ?></a>
                </div>
            </a>
        </div>
        <?php } ?>

    </div><!-- ./Products Lists -->
</section><!-- ./Prodcuts Section -->

<?php } else { ?>
<!-- Display Error -->
<div class="alert alert-danger">Nothing Found!</div>
<?php } ?>

<?php include_once 'includes/partials/footer.inc.php'; ?>