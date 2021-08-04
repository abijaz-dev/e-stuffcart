<?php
use App\Models\Product;

class ProductsController {
    
    // Fetch Rows By Category ID.
    public static function index($catId)
    {
        $products = Product::where('category_id', $catId)->get();
        return $products;
    }

    // Fetch Single Row.
    public static function show($id)
    {   
        $product = Product::find($id);
        return $product;
    }
}

// Get Safe Category ID.
$catId    = isset( $_GET['cat_id'] ) ? safe_value( $_GET['cat_id'] ) : null;
$products = ProductsController::index($catId);   

// Get Safe Product ID & show.
$productId = isset( $_GET['product_id'] ) ? safe_value( $_GET['product_id'] ) : null;
$product   = ProductsController::show($productId);