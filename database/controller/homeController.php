<?php
include '../config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['action']) && $_GET['action'] == 'getAllProduct') {
    $search = isset($_GET['search']) ? $_GET['search'] : null;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
    $fruit_type = isset($_GET['fruit-type']) ? $_GET['fruit-type'] : null;
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $price = isset($_GET['price']) ? $_GET['price'] : null;
    $rate = isset($_GET['rate']) ? $_GET['rate'] : null;


    $sqlProduct = "SELECT p.product_id, p.product_name, p.description, p.rate, p.created_at, p.updated_at, p.is_active, p.quantity, p.price, p.sold_quantity, p.category_id, p.fruit_type_id, MIN(pi.image) 
    AS product_image FROM product p LEFT JOIN product_image pi 
    ON p.product_id = pi.product_id WHERE p.is_active = 1 ";

    if ($search != null) {
        $sqlProduct .= " AND p.product_name LIKE '%$search%'";
    }
    if ($category != null) {
        $sqlProduct .= " AND p.category_id = $category";
    }
    if ($rate != null) {
        $sqlProduct .= " AND p.rate = $rate";
    }
    if ($price != null) {
        $sqlProduct .= " AND p.price >= $price";
    }
    if ($fruit_type != null) {
        $sqlProduct .= " AND p.fruit_type_id = $fruit_type";
    }

    $sqlProduct .= " GROUP BY p.product_id ";

    if ($sort != null) {
        $sqlProduct .= " ORDER BY $sort;";
    }

    $dataProduct = Query($sqlProduct, $connection);

    if (empty($dataProduct)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($dataProduct);
    }
}
