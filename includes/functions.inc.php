<?php 

// Dynamic Page Title.
function setPageTitle( $arg ) {
    return 'E-StuffCart - <span class="text-secondary">'. $arg .'</span>';
}

// Prevention From XSS.
function safe_value( $str ) {
    if( $str!='' ){
        $str = trim($str);
        $str = htmlspecialchars( strip_tags($str) ) ;
        return $str;
    }
}