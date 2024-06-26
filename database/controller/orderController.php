<?php
include '../config.php';


if (isset($_GET['action']) && $_GET['action'] == 'getUserOrder') {
    session_start();
    $data = $_SESSION['account'];
    $userData = json_decode($data, true);
    $user_id = $userData[0]['user_id'];
    $sql = "SELECT * FROM `order` WHERE user_id = '$user_id' ORDER BY created_at DESC";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getAllOrder') {
    session_start();
    $data = $_SESSION['account'];
    $userData = json_decode($data, true);
    $user_id = $userData[0]['user_id'];
    $sql = "SELECT * FROM `order`";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'userGetOrderDetail') {
    session_start();
    if (isset($_SESSION['account'])) {
        $userData = json_decode($_SESSION['account'], true);
        $user_id = $userData[0]['user_id'];

        if (isset($_GET['orderId'])) {
            $orderId = $_GET['orderId'];
            $sql = "SELECT * FROM `order` WHERE user_id = '$user_id' AND order_id = '$orderId'";
            $data = Query($sql, $connection);

        if (empty($data)) {
                echo "notPermission";
                return;
            }
            $sqlDetail = "SELECT 
            od.quantity,
            p.product_name,
            od.price,
            p.product_id,
            pi.image
        FROM 
            order_detail od
        JOIN 
            product p ON od.product_id = p.product_id
        LEFT JOIN (
            SELECT 
                p.product_id,
                MIN(pi.image) AS image
            FROM 
                product p
            JOIN 
                product_image pi ON p.product_id = pi.product_id
            GROUP BY 
                p.product_id
        ) AS pi ON p.product_id = pi.product_id
        WHERE
            od.order_id = $orderId;";
            $dataDetail = Query($sqlDetail, $connection);
            $result = [
                'information' => $data,
                'detail' => $dataDetail
            ];
            echo json_encode($result);
        } else {
            echo "orderId is not set";
        }
    } else {
        echo "Session data not set";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getOrderDetail') {
    session_start();
    if (isset($_SESSION['account'])) {
        $userData = json_decode($_SESSION['account'], true);
        $user_id = $userData[0]['user_id'];
        if (isset($_GET['orderId'])) {
            $orderId = $_GET['orderId'];
            $sql = "SELECT 
            o.*,
            u.avatar,
            u.email
        FROM 
            `order` o
        JOIN 
            `user` u ON o.user_id = u.user_id
        WHERE order_id = '$orderId'";
            $data = Query($sql, $connection);
            $sqlDetail = "SELECT 
            od.quantity,
            p.product_name,
            od.price,
            pi.image
        FROM 
            order_detail od
        JOIN 
            product p ON od.product_id = p.product_id
        LEFT JOIN (
            SELECT 
                p.product_id,
                MIN(pi.image) AS image
            FROM 
                product p
            JOIN 
                product_image pi ON p.product_id = pi.product_id
            GROUP BY 
                p.product_id
        ) AS pi ON p.product_id = pi.product_id
        WHERE
            od.order_id = $orderId;";
            $dataDetail = Query($sqlDetail, $connection);
            $result = [
                'information' => $data,
                'detail' => $dataDetail
            ];
            echo json_encode($result);
        } else {
            echo "orderId is not set";
        }
    } else {
        echo "Session data not set";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'getStatus') {
    $order_id = $_GET['id'];
    $sql = " SELECT `status` FROM `order` where order_id = $order_id";
    $data = Query($sql, $connection);
    echo json_encode($data);
}




