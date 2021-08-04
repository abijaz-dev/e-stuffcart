<?php
use App\Models\Category;

class CategoryController {
    
    // Fetch All Rows.
    public static function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return $categories;
    }

    // Fetch Single Row.
    public static function show($id)
    {
        $category = Category::find($id);
        return $category;
    }
}

// Objects.
$categories = CategoryController::index();

// Get Category ID & show.
$getCatId = isset( $_GET['cat_id'] ) ? safe_value( $_GET['cat_id'] ) : null ;
$category = CategoryController::show($getCatId);