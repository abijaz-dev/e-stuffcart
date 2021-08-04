<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/estuffcart/public/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="http://localhost/estuffcart/public/css/style.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>E-StuffCart - Shopping Mart</title>
</head>

<body>
    <?php require_once __DIR__.'/../init.inc.php'; ?>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
        <div class="container">
            <a class="navbar-brand fs-4 fs-normal p-0 pt-1 pb-2" href="http://localhost/estuffcart/index">E-StuffCart </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Items -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                    <!-- Cart -->
                    <li class="nav-item">
                        <a class="nav-link" id="qua" href="http://localhost/estuffcart/cart">
                            <i class="h6 bi bi-bag text-light"></i> Cart ( <span class="text-light"><?=
                                // Display Total Cart Items.
                                isset( $_SESSION['cart'] ) ? $cart->total() :"empty";
                            ?></span> )
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- /.Top Navbar -->
    <div class="message"></div><!-- ./Custom Message -->

<div class="container">
