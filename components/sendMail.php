<?php
include '../database/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mail/src/Exception.php';
require '../mail/src/PHPMailer.php';
require '../mail/src/SMTP.php';



function sendEmail($toEmail, $toName, $subject, $body)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'datndhe172134@fpt.edu.vn';                     //SMTP username
        $mail->Password   = 'fute nsvl mlca hjyu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('datndhe172134@fpt.edu.vn', 'HOHA PHONE');
        $mail->addAddress($toEmail, $toName);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'signUp') {
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $username = $_POST['username'];
    $role = 1;
    $password = $_POST['password'];
    $avatar = 'guest.png';

    function generateRandomNumber()
    {
        $length = 6;
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return str_pad(mt_rand($min, $max), $length, '0', STR_PAD_LEFT);
    }

    // Sử dụng hàm để tạo chuỗi
    $token = generateRandomNumber();


    $sql = "SELECT * FROM user WHERE email = '$email'";
    $existPhone = Query($sql, $connection);
    $output = "";
    if (count($existPhone) > 0) {
        $output .= "existemail";
    }

    $sql1 = "SELECT * FROM user WHERE username = '$username'";
    $existUsername = Query($sql1, $connection);
    if (count($existUsername) > 0) {
        $output .= "existusername";
    }

    $sql2 = "SELECT * FROM `user` WHERE phone = '$phone'";
    $existPhone = Query($sql2, $connection);
    if (count($existPhone) > 0) {
        $output .= "existphone";
    }
    if (strlen($output) > 0) {
        echo $output;
        return;
    }
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `user` ( `email`, `password`, `username`,  `phone`, `avatar`, `role`,`token`) VALUES ('$email','$hashPass','$username','$phone','$avatar','$role','$token')";
    $data = Query($sql, $connection);
    $toEmail = $email;
    $toName = $username;
    $subject = 'Xac Thuc Tai Khoan';

    $body = '<h1>Chào mừng ' . $username . ' đến với HOHAPHONE</h1>
    <h1>Đây là mã xác thực của bạn vui lòng không kia sẻ cho ai: <br>
    <span style="font-style: italic;">' . $token . '</span>
    </h1>';

    if (sendEmail($toEmail, $toName, $subject, $body)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'refreshToken') {
    function generateRandomNumber()
    {
        $length = 6;
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return str_pad(mt_rand($min, $max), $length, '0', STR_PAD_LEFT);
    }
    $token = generateRandomNumber();
    $email = $_POST['email'];
    $username = $_POST['username'];

    $sql = "UPDATE `user` SET `token` = '$token' WHERE `email` = '$email' AND `username` = '$username'";
    $data = Query($sql, $connection);
    $toEmail = $email;
    $toName = $username;
    $subject = 'Xac Thuc Tai Khoan';

    $body = '<h1>Chào mừng ' . $username . ' đến với HOHAPHONE</h1>
    <h1>Đây là mã xác thực của bạn vui lòng không kia sẻ cho ai: <br>
    <span style="font-style: italic;">' . $token . '</span>
    </h1>';
    if (sendEmail($toEmail, $toName, $subject, $body)) {
        echo 'success';
    } else {
        echo 1;
        echo 'failed';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'verifyToken') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $sql = "SELECT`token` from user WHERE `email` = '$email' AND `username` = '$username'";
    $data = Query($sql, $connection);
    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateStatusAccount') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $sql = "UPDATE `user` SET `is_active` = 1, `status` = 1 WHERE `email` = '$email' AND `username` = '$username';";
    $data = Query($sql, $connection);
    echo "success";
}

if (isset($_POST['action']) && $_POST['action'] == 'forgotPassword') {
    function generateRandomPassword($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $email = $_POST['email'];

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $existPhone = Query($sql, $connection);
    $output = "";
    if (count($existPhone) == 0) {
        echo "wrongemail";
        return;
    }


    $password = generateRandomPassword();
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET password = '$hashPass' WHERE `email` = '$email';";
    $data = Query($sql, $connection);

    $toEmail = $email;
    $toName = ' ';
    $subject = 'Lay Lai Mat Khau';

    $body = '
    <h1>Đây là mật khẩu của bạn vui lòng không kia sẻ cho ai: <br>
    <span style="font-style: italic;">' . $password . '</span>
    </h1>';
    if (sendEmail($toEmail, $toName, $subject, $body)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'checkout') {
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address  = $_POST['address'];
    $shipping = $_POST['shipping'];
    $message = $_POST['message'];
    $totalOrder  = $_POST['totalOrder'];
    $payment  = $_POST['payment'];
    $status = $_POST['payment_status'];

    $sqlCart1 = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $dataCart1 = Query($sqlCart1, $connection);

    foreach ($dataCart1 as $row) {
        $product_color_id = $row['product_color_id'];
        $quantity = $row['quantity'];
        $sqlProductColor = "SELECT * FROM product_color WHERE product_color_id = '$product_color_id'";
        $dataProduct = Query($sqlProductColor, $connection);
        $row1 = $dataProduct[0];
        $inventory = $row1['quantity'];
        if ($quantity > $inventory) {
            echo "failed";
            return;
        }
    }


    $sqlOrder = "INSERT INTO `order` ( `total_money`, `name`, `address`, `phone`, `message`, `shipping`, `user_id`,`payment_method`,`payment_status`) VALUES ('$totalOrder','$name','$address','$phone','$message','$shipping','$user_id','$payment','$status')";
    $dataOrder = Query($sqlOrder, $connection);
    $sqlOrderId = "SELECT order_id,created_at FROM `order`  WHERE user_id = '$user_id' ORDER BY order_id DESC LIMIT 1;";
    $dataOrderId = Query($sqlOrderId, $connection);

    $orderId;
    $create_at;
    foreach ($dataOrderId as $row) {
        $orderId =  $row['order_id'];
        $create_at = $row['created_at'];
    }
    $sqlCart = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $dataCart = Query($sqlCart, $connection);
    

    foreach ($dataCart as $row) {
        $product_color_id = $row['product_color_id'];
        $quantity = $row['quantity'];
        $sqlProductColor = "SELECT * FROM product_color WHERE product_color_id = '$product_color_id'";
        $dataProduct = Query($sqlProductColor, $connection);
        $price = 0;
        foreach ($dataProduct as $row) {
            $price = $row['price'];
            $quantityChange =  $row['quantity'] - $quantity;
            $quantitySold=  $row['sold_quantity'] + $quantity;
            $update = " UPDATE product_color SET quantity = '$quantityChange', sold_quantity = '$quantitySold' WHERE product_color_id = '$product_color_id'";
            $dataUpdate = Query($update, $connection);
        }

        $updateOrderDetail = "INSERT INTO `order_detail` ( `order_id`, `product_color_id`, `quantity`,`price`) VALUES ('$orderId','$product_color_id','$quantity','$price')";
        $dataOrderDetail = Query($updateOrderDetail, $connection);

        $deleteCart = "DELETE FROM cart WHERE user_id = '$user_id'";
        $delete = Query($deleteCart, $connection);
    }
    $sqlUser = "SELECT * FROM user WHERE user_id = '$user_id'";
    $dataUser = Query($sqlUser, $connection);
    $email;
    foreach ($dataUser as $row) {
        $email =  $row['email'];
        $username =  $row['username'];
    }
    $toEmail = $email;
    $toName = $username;
    $subject = 'Don hang #' . $orderId . ' da duoc dat thanh cong vao luc ' . $create_at;

    $body = '
    <h3>Thông tin nười hàng: </h3> 
    <p> Tên người đặt: ' . $name . '</p> 
    <p> Số điện thoại: ' . $phone . '</p> 
    <p> Địa chỉ: ' . $address . '</p>
    <p> Lời Nhắn: ' . $message . '</p>
    <p> Phương Thức Thanh Toán: ' . $payment . '</p> 
    <p> Tiền Ship: $ ' . $shipping . '</p>
    <p> Tổng tiền: $ ' . $totalOrder . '</p>
    ';
    if (sendEmail($toEmail, $toName, $subject, $body)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $order_id = $_GET['id'];
    $sqlStatus = " SELECT `status` FROM `order` where order_id = $order_id";
    $dataStatus = Query($sqlStatus, $connection);
    foreach ($dataStatus as $row) {
        if (isset($row['status'])) {
            $status = $row['status'];
        }
    }
    if ($status == "received" || $status == "reviewed") {
        echo "failed";
        return;
    }

    $sqlDetail = "SELECT * FROM `order_detail` WHERE `order_id` = $order_id;";
    $dataDetail = Query($sqlDetail, $connection);
    foreach ($dataDetail as $row) {
        $quantityOrder = $row['quantity'];
        $color_id = $row['product_color_id'];
        $sqlProduct = "SELECT * FROM `product_color` WHERE `product_color_id` = $color_id;";
        $dataProduct = Query($sqlProduct, $connection);
        foreach ($dataProduct as $row1) {
            $quantity = $row1['quantity'];
            $soldQuantity = $row1['sold_quantity'];
        }
        $newQuantity = $quantity + $quantityOrder;
        $newSoldQuantity = $soldQuantity - $quantityOrder;
        $sqlUpdate = "UPDATE `product_color` SET `quantity` = $newQuantity, `sold_quantity` = '$newSoldQuantity' WHERE `product_color_id` = $color_id";
        $dataUpdate = Query($sqlUpdate, $connection);
    }
    $sql = "UPDATE `order` SET `status` = 'canceled' WHERE `order_id` = $order_id;";
    $data = Query($sql, $connection);

    $sqlUser = "SELECT user.email,user.username, `order`.* FROM `user` JOIN `order` ON `user`.user_id = `order`.user_id WHERE `order`.order_id = $order_id;";
    $dataUser = Query($sqlUser, $connection);
    $row = $dataUser[0]; // Assuming there's only one row
    $email = $row['email'];
    $username = $row['username'];
    $name = $row['name'];
    $phone = $row['phone'];
    $address = $row['address'];
    $message = $row['message'];
    $payment = $row['payment_method'];
    $shipping = $row['shipping'];
    $total_money = $row['total_money'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDateTime = date('Y-m-d H:i:s');
    $subject = 'Don hang #' . $order_id . ' da duoc huy vao luc ' . $currentDateTime;
    $body = '
        <h3>Thông tin người hàng: </h3> 
        <p> Tên người đặt: ' . $name . '</p> 
        <p> Số điện thoại: ' . $phone . '</p> 
        <p> Địa chỉ: ' . $address . '</p>
        <p> Lời Nhắn: ' . $message . '</p>
        <p> Phương Thức Thanh Toán: ' . $payment . '</p> 
        <p> Tiền Ship: $ ' . $shipping . '</p>
        <p> Tổng tiền: $ ' . $total_money . '</p>
        ';
    if (sendEmail($email, $username, $subject, $body)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'updateStatus') {
    $order_id = $_POST['id'];
    $status = $_POST['status'];
    $sql = "";
    if($status == "received"){
        $sql = "UPDATE `order` SET `status` = '$status', `payment_status` = 'paid' WHERE `order_id` = $order_id;";
    }
    else {
        $sql = "UPDATE `order` SET `status` = '$status',`payment_status` = 'not paid' WHERE `order_id` = $order_id;";
    }
    $data = Query($sql, $connection);
    if ($status == 'received') {
        $sqlUser = "SELECT user.email,user.username, `order`.* FROM `user` JOIN `order` ON `user`.user_id = `order`.user_id WHERE `order`.order_id = $order_id;";
        $dataUser = Query($sqlUser, $connection);
        $row = $dataUser[0]; // Assuming there's only one row
        $email = $row['email'];
        $username = $row['username'];
        $name = $row['name'];
        $phone = $row['phone'];
        $address = $row['address'];
        $message = $row['message'];
        $payment = $row['payment_method'];
        $shipping = $row['shipping'];
        $total_money = $row['total_money'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('Y-m-d H:i:s');
        $subject = 'Don hang #' . $order_id . ' da nhan vao luc ' . $currentDateTime;
        $body = '
        <h3>Thông tin người hàng: </h3> 
        <p> Tên người đặt: ' . $name . '</p> 
        <p> Số điện thoại: ' . $phone . '</p> 
        <p> Địa chỉ: ' . $address . '</p>
        <p> Lời Nhắn: ' . $message . '</p>
        <p> Phương Thức Thanh Toán: ' . $payment . '</p> 
        <p> Tiền Ship: $ ' . $shipping . '</p>
        <p> Tổng tiền: $ ' . $total_money . '</p>
        ';
        if (sendEmail($email, $username, $subject, $body)) {
            echo 'success';
        } else {
            echo 'failed';
        }
        return;
    }
    echo "success";
}
