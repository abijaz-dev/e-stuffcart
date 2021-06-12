<?php include_once 'includes/_header.inc.php'; ?>
<h1>E-StuffCart - <?php
                        // Get safe category_id 
                        $cat_id = safe_value( $_GET['cat_id'] ); 
                         
                        // fetch category name for top heading    
                        $cat = $obj->get_category($cat_id);    
                        while ( $row = $cat->fetch(PDO::FETCH_ASSOC) ){
                            echo $row['category_name'];
                        }  
                    ?>
</h1>
<hr>

<div class="products">
    <div class="row">
        <?php
            require_once 'includes/init.inc.php';     
            pagination( $cat_id );     // pagination for plenty of data
        ?>
    </div>
</div>
</div>
<?php include_once 'includes/_footer.inc.php'; ?>