<?php
include '../config.php';

if (isset($_POST['action']) && $_POST['action'] == 'addTocart') {
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $inventory = $_POST['inventory'];

    $checkcart = "SELECT * FROM cart WHERE product_id  = '$productId' and user_id = '$user_id'; ";
    $data = Query($checkcart, $connection);
    if (count($data) == 0) {
        $sqlAddcart = "INSERT INTO `cart` ( `user_id`, `product_id`, `quantity`) VALUES ('$user_id','$productId','$quantity')";
        $dataAddcart = Query($sqlAddcart, $connection);
        echo "success2";
        return;
    } else {
        $newQuantity = $data[0]['quantity'] + $quantity;
        if ($inventory < $newQuantity) {
            $newQuantity = $inventory;
        }
        $sqlUpdatecart = "UPDATE `cart` SET `quantity` = '$newQuantity' WHERE `user_id` = '$user_id' AND `product_id` = '$productId'";
        $dataUpdatecart = Query($sqlUpdatecart, $connection);
        echo "success1";
        return;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'viewcart') {
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $sql = "SELECT * FROM cart WHERE user_id = '$user_id'; ";
    $data = Query($sql, $connection);
    $resultArray = [];
    foreach ($data as $row) {
        $productId = $row['product_id'];
        $sqlProduct = "SELECT 
    p.product_id,
    p.product_name,
    p.description,
    p.rate,
    p.created_at,
    p.updated_at,
    p.is_active,
    p.quantity,
    p.price,
    p.sold_quantity,
    p.category_id,
    p.fruit_type_id,
    pi.image
FROM 
    product p
LEFT JOIN 
    (SELECT 
         product_id, 
         MIN(image) AS image
     FROM 
         product_image
     GROUP BY 
         product_id) pi
ON 
    p.product_id = pi.product_id where p.product_id = '$productId' and p.is_active = 1 ; ";
        $dataProduct = Query($sqlProduct, $connection);
        $combinedData = [
            "dataProduct" => $dataProduct,
            "quantity" => $row['quantity'],
        ];
        $resultArray[] = $combinedData;
    }
    echo json_encode($resultArray);
}

if (isset($_POST['action']) && $_POST['action'] == 'updatecartQuantity') {
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $sqlUpdatecart = "UPDATE `cart` SET `quantity` = '$quantity' WHERE `user_id` = '$user_id' AND `product_id` = '$productID'";
    $dataUpdatecart = Query($sqlUpdatecart, $connection);
}

if (isset($_POST['action']) && $_POST['action'] == 'removecartItem') {
    $productID = $_POST['productID'];
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $sqlDeleteFromcart = "DELETE FROM `cart` WHERE `user_id` = '$user_id' AND `product_id` = '$productID'";
    $dataDeletecart = Query($sqlDeleteFromcart, $connection);
}

if (isset($_GET['action']) && $_GET['action'] == 'getTotalCart') {
    session_start();
    $jsonData = $_SESSION['account'];
    $data = json_decode($jsonData, true);
    $user_id = $data[0]['user_id'];
    $sql = "SELECT COUNT(*) AS totalQuantity FROM cart WHERE user_id = '$user_id'";
    $data = Query($sql, $connection);
    echo json_encode($data);
}