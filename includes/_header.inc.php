<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-StuffCart - Shopping Mart</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/global.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- bootstrap navbar  -->
        <nav class="navbar navbar-expand-lg navbar-default bg-default" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">E-StuffCart </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" id="qua" href="cart.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" fill="currentColor"
                                    class="bi bi-bag mb-1" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg> Cart (
                                <?php
                                require_once 'init.inc.php';
                                if( isset($_SESSION['cart']) AND !empty($_SESSION['cart']) ){
                                    echo $cart->totalItems();
                                } else {
                                    echo "empty";
                                }
                            ?>
                                )
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="message">
        </div>