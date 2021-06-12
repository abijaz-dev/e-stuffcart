<?php 
require_once 'init.inc.php';  


// prevent from xss attack
function safe_value( $str ) {
    if( $str!='' ){
        $str  = trim($str);
        // $str .= mysqli_real_escape_string($str);
        $str = htmlspecialchars( strip_tags($str) ) ;
        return $str;
    }
}



// get total row count data from Products class 
function total_row( $cat_id ){
    $obj     = new Functions();
    $product = $obj->get_product( '', '', '', $cat_id, '', '' );
    $num = $product->rowCount();
    return $num;
}



// get products data on the base of limit from Products class
function get_display_data( $cat_id, $offset, $rows ){

    $obj     = new Functions();
    $product = $obj->get_product( '', '', '', $cat_id, $offset, $rows );
    if( $product->rowCount() ){
        while ( $row = $product->fetch(PDO::FETCH_ASSOC) ){
            extract($row);
            echo '<div class="col-md-6 col-lg-3">
            <a href="http://localhost/e-stuffcart/product_view.php?cat_id='.$cat_id.'&product_id='.$id.'" class="link">
            <div class="card" style="width: 18rem;">
            <img src="http://localhost/e-stuffcart/includes/img/product'.$id.'.jpg" class="card-img-top" height="150px" alt="...">
            <div class="card-body">
            <h5 class="card-title">'. $title .'</h5>
            </div>
            <a class="btn btn-success btn-sm disabled" tabindex="-1" role="button" aria-disabled="true">$ '. $price .'</a>
            </div></a>
            </div>';  
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">No product was found !</div>';
    }
}



// pagination for home products
function pagination( $cat_id ){

    $button_numbers   =  3;
    $page_number      =  ( isset( $_GET['page']  ) AND !empty( $_GET['page']  ) ) ?   $_GET['page']   : 1;
    $per_page_record  =  8;
    $rows             =  total_row( $cat_id );
    $last_page        =  ceil( $rows / $per_page_record ) ;  // round up the value
    $offset           =  ($page_number - 1) * $per_page_record;
    
    if ( $rows > $per_page_record ){
        echo '<p class="mt-3">Result Page: '.$page_number.'/'.$last_page.'</p>';
    }

    // display products on the base of categories id
    $product = get_display_data ( $cat_id, $offset, $per_page_record );
    
    // bootstrap pagination buttons 
    $pagination   = '<nav aria-label="Page navigation example">';
    $pagination  .= '<ul class="pagination mt-5 pt-5 d-flex justify-content-center">';

    // check if user type wrong value of page number in url
    if ( $page_number < 1 ){
        $page_number = 1;
    } elseif ( $page_number > $last_page ){
        $page_number = $last_page;
    }
    
    // half the button value
    $half = floor( $button_numbers/2 );
    
    // pagination logic starts here 
    if ( $page_number < $button_numbers AND ( $last_page == $button_numbers OR $last_page > 
    $button_numbers ) ) {
        
        for ( $i=1; $i<=$button_numbers; $i++ ){
            if ( $i == $page_number ) {
                
                $pagination .= '<li class="page-item active"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.$i.'" aria-label="Previous">'.$i.'<span aria-hidden="true"></span></a></li>';
            }
            else {
                $pagination .= '<li class="page-item"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.$i.'">'.$i.'</a></li>';
            }
        }
        if ( $last_page > $button_numbers ){
            $pagination .= '<li class="page-item"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.($button_numbers+1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        } 
    }
    else if ( $page_number >= $button_numbers AND $last_page > $button_numbers ) {
    
        if ( $page_number+$half >= $last_page ) {
            
            $pagination .= '<li class="page-item"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.($last_page - $button_numbers).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    
            for ( $i=( $last_page-$button_numbers)+1; $i<=$last_page; $i++ ){
    
                if ( $i == $page_number ) {
                    $pagination .= '<li class="page-item active"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.$i.'" aria-label="Previous">'.$i.'<span aria-hidden="true"></span></a></li>';
                }
                else {
                    $pagination .= '<li class="page-item"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.$i.'">'.$i.'</a></li>';
                }
            }
        }
            else if ( ( $page_number+$half ) < $last_page ){
    
                $pagination .= '<li class="page-item"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.(($page_number - $half) -1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    
                for ( $i=($page_number-$half); $i<=($page_number+$half); $i++ ){
                    
                    if ( $i == $page_number ) {
                        $pagination .= '<li class="page-item active"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.$i.'" aria-label="Previous">'.$i.'<span aria-hidden="true"></span></a></li>';
                    }
                    else {
                        $pagination .= '<li class="page-item"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.$i.'">'.$i.'</a></li>';
                    }
                }
                $pagination .= '<li class="page-item"><a class="page-link" href="http://localhost/e-stuffcart/product.php?cat_id='.$cat_id.'&page='.($page_number + $half + 1).'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
            }
        }        
    $pagination .= '</ul></nav>';
    echo $pagination;
}



// fetch data from Product class and dislay them to cart items
function get_data_for_cart( $p_id ){
    $obj  = new Functions();
    $data = $obj->get_product( $p_id, '', '', '', '', '' );
    if ( $data->rowCount() ){
        while ( $row = $data->fetch(PDO::FETCH_ASSOC)){
            return $row;
        }
    }
}