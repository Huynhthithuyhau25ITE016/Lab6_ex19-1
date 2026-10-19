<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 1;

// Get the products
$products = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';

// Get the product by name
$product = get_product_by_name($product_name);

// Delete the product and display an appropriate message
if ($product) {
    $product_id = $product['productID'];
    $row_count = delete_product($product_id);

    if ($row_count) {
        $delete_message = "Product was deleted successfully.";
    } else {
        $delete_message = "No rows were deleted.";
    }
} else {
    $delete_message = "No rows were deleted.";
}

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'tele';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';
$discount_percent = 0;

// Insert the data
$product_id = add_product(
    $category_id,
    $code,
    $name,
    $description,
    $price,
    $discount_percent
);

// Display an appropriate message
if ($product_id != false) {
    $insert_message = "Product was inserted successfully.";
} else {
    $insert_message = "No rows were inserted.";
}

include 'home.php';
?>
