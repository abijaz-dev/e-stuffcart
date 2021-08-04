<?php include_once 'includes/partials/header.inc.php'; // Top Header. ?>

<!-- Top Heading -->
<h1 class="text-center p-5"><?= setPageTitle('Featured Categories'); ?></h1><hr>

<!-- Categories Section -->
<section class="bg-light p-5 text-center">
    <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4">
        <?php foreach( $categories as $category ) { ?>

        <div class="col p-5 py-0 px-md-2">
            <a href="product/<?= $category->id ?>" class="text-decoration-none">
                <div class="card p-2 h-100">
                    <div>
                        <img src="http://localhost/estuffcart/public/img/categories/cat<?= $category->id ?>.jpg"
                            class="card-img-top p-2 px-4" height="250px" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $category->category_name ?></h5>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>

    </div>
</section><!-- ./Categories Section -->

<?php include_once 'includes/partials/footer.inc.php'; ?>