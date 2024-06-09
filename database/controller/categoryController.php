<?php
include '../config.php';
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $sql = "SELECT c.category_id, c.category_name, c.is_active, c.created_at, SUM(p.sold_quantity) AS total_sold_quantity,
    COUNT(p.product_id) AS total_product,
    SUM(p.sold_quantity * p.price) AS total_revenue
    FROM category AS c
    LEFT JOIN product AS p ON c.category_id = p.category_id
    GROUP BY c.category_id, c.category_name";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getAll') {
    $sql = "SELECT * FROM category";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'addCategory') {
    $categoryName = $_POST['categoryName'];
    $sql = "SELECT * FROM category WHERE category_name = '$categoryName'";
    $existcategoryName = Query($sql, $connection);
    $output = "";
    if (count($existcategoryName) > 0) {
        $output .= "existCategoryName";
        echo $output;
        return;
    }
    $sql = "INSERT INTO `category` ( `category_name`) VALUES ('$categoryName')";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $category_id = $_GET['id'];
    echo $category_id;
    // $sqlProduct = "UPDATE product SET is_active = 0 WHERE product_id IN (SELECT product_id FROM product WHERE category_id = $category_id)";
    // $dataProduct = Query($sqlProduct, $connection);
    // $sqlProduct = "UPDATE product SET is_active = 0 WHERE category_id = $category_id";
    // $dataProduct = Query($sqlProduct, $connection);
    $sqlCategory = "UPDATE category SET is_active = !is_active WHERE category_id = $category_id";
    $dataCategory = Query($sqlCategory, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'getCategoryById') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM category WHERE category_id = '$id'; ";
    $data = Query($sql, $connection);
    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateCategory') {
    $id = $_POST['id'];
    $categoryName = $_POST['categoryName'];
    $sql1 = "SELECT * FROM category WHERE category_name = '$categoryName' and category_id != '$id'; ";
    $existcategoryName = Query($sql1, $connection);
    $output = "";
    if (count($existcategoryName) > 0) {
        $output .= "existCategoryName";
        echo $output;
        return;
    }
    $updated_at = date('Y-m-d H:i:s');
    $sql = "UPDATE `category` SET `category_name` = '$categoryName', `updated_at` = '$updated_at' where category_id = '$id'";
    $data = Query($sql, $connection);
    echo "success";
}
