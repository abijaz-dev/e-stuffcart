<?php

    class Functions extends Database {

        // Joint Sql query for products credentials
        public function get_product( $p_id, $cat_name, $img_name,  $cat_id, $offset, $limit ){
            $sql = "SELECT 
                        p.*,
                        cat.category_name,
                        p_img.name
                    FROM `products` p
                        JOIN `categories` cat
                            ON p.category_id = cat.id
                        JOIN `product_images` p_img
                            ON p.image_id = p_img.id";
            if ( $p_id != ''){
                $sql .= " WHERE p.id = $p_id ";
            }
            if ( $cat_name != '' ){
                $sql .= " AND cat.category_name = $cat_name ";
            }
            if ( $img_name != '' ){
                $sql .= " AND p_img.name = $img_name ";
            }
            if ( $cat_id != '' ){
                $sql .= " AND p.category_id = $cat_id ";
            }
            if ( $offset != '' ){
                $sql .= " LIMIT $offset, ";
            }
            if ( $limit != '' ){
                $sql .= " $limit ";
            }

            // execution of query
            $stmt = $this->connect()->query( $sql );
            if ( is_object($stmt) ){
                $stmt->execute();
                return $stmt;
            }
            return 0;
        } 


        // fetch categories from database
        public function get_category( $id ){
            $sql  = "SELECT * FROM `categories`";
            if ( $id != '' ){
                $sql .= " WHERE `id` = $id ";
            }
            $stmt = $this->connect()->query($sql);

            if ( is_object( $stmt ) ){
                $stmt->execute();
                return $stmt;
            }
            return 0;
        }
    }

$obj = new Functions();




/*
 SELECT p.*,categories.category_name FROM products,categories JOIN products p ON categories.id = p.category_id 

SELECT p.* FROM categories cat JOIN products p ON cat.id = p.category_id JOIN product_images img ON p.image_id = img.id WHERE p.title = '$title' AND p.description = '$desc' AND p.price = '$price' AND p.created_at = '$time'

SELECT p.* FROM categories cat JOIN products p ON cat.id = p.category_id JOIN product_images img ON p.image_id = img.id WHERE p.title = '' AND cat.id = 1

SELECT 
products.*, 
categories.category_name
FROM products
JOIN categories
ON products.category_id = categories.id
JOIN product_images
ON products.image_id    = product_images.id;


SELECT 
products.title, 
products.description, 
categories.category_name
FROM products
JOIN categories
ON products.category_id = categories.id;


SELECT 
                        p.*,
                        cat.category_name
                    FROM `products` p
                        INNER JOIN `categories` cat
                            ON p.category_id = cat.id;


SELECT 
    p.*,
    cat.category_name                   
    FROM `products` p, `categories` cat ;


    SELECT 
                        p.*,
                        cat.category_name,
                        p_img.name
                    FROM `products` p
                        JOIN `categories` cat
                            ON p.category_id = cat.id
                        JOIN `product_images` p_img
                            ON p.image_id = p_img.id 
*/