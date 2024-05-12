<?php
include '../config.php';
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    // $sql = "SELECT c.category_id, c.category_name, c.is_active, c.created_at, SUM(pc.sold_quantity) AS total_sold_quantity,
    // COUNT(pc.product_color_id) AS total_product_colors,
    // SUM(pc.sold_quantity * pc.price) AS total_revenue
    // FROM category AS c
    // LEFT JOIN product AS p ON c.category_id = p.category_id
    // LEFT JOIN product_color AS pc ON p.product_id = pc.product_id
    // GROUP BY c.category_id, c.category_name";
    $sql = "SELECT * FROM fruit_type";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getAll') {
    $sql = "SELECT * FROM fruit_type";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'addFruitType') {
    $fruitTypeName = $_POST['fruitTypeName'];
    $sql = "SELECT * FROM fruit_type WHERE fruit_type_name = '$fruitTypeName'";
    $existFruitTypeName = Query($sql, $connection);
    $output = "";
    if (count($existFruitTypeName) > 0) {
        $output .= "existFruitTypeName";
        echo $output;
        return;
    }
    $sql = "INSERT INTO `fruit_type` ( `fruit_type_name`) VALUES ('$fruitTypeName')";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $fruit_type_id = $_GET['id'];
    // $sqlProduct = "UPDATE product SET is_active = 0 WHERE product_id IN (SELECT product_id FROM product WHERE category_id = $category_id)";
    // $dataProduct = Query($sqlProduct, $connection);
    // $sqlProduct = "UPDATE product SET is_active = 0 WHERE category_id = $category_id";
    // $dataProduct = Query($sqlProduct, $connection);
    $sqlFruit = "UPDATE fruit_type SET is_active = !is_active WHERE fruit_type_id = $fruit_type_id";
    $dataFruit = Query($sqlFruit, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'getFruitTypeById') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM fruit_type WHERE fruit_type_id = '$id'; ";
    $data = Query($sql, $connection);
    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateFruitType') {
    $id = $_POST['id'];
    $fruitTypeName = $_POST['fruitTypeName'];
    $sql1 = "SELECT * FROM fruit_type WHERE fruit_type_name = '$fruitTypeName' and fruit_type_id != '$id'; ";
    $existFruitTypeName = Query($sql1, $connection);
    $output = "";
    if (count($existFruitTypeName) > 0) {
        $output .= "existFruitTypeName";
        echo $output;
        return;
    }
    $updated_at = date('Y-m-d H:i:s');
    $sql = "UPDATE `fruit_type` SET `fruit_type_name` = '$fruitTypeName', `updated_at` = '$updated_at' where fruit_type_id = '$id'";
    $data = Query($sql, $connection);
    echo "success";
}
