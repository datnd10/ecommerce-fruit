<?php
include '../config.php';
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $sql = "SELECT u.*, COUNT(o.order_id) AS total_orders, SUM(CASE WHEN o.status = 'reviewed' OR o.status = 'received' THEN o.total_money ELSE 0 END) AS total_amount
    FROM user AS u
    LEFT JOIN `order` AS o ON u.user_id = o.user_id
    WHERE u.status = 1
    GROUP BY u.user_id";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'addUser') {
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $password = '123456a@';
    $avatar = "guest.png";
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

    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar'];
        // Tạo tên mới cho file ảnh
        $new_image_name = generateImageName($avatar);
        // Thư mục lưu trữ file ảnh
        $upload_directory = '../uploads/';

        // Đường dẫn đầy đủ của file ảnh
        $upload_path = $upload_directory . $new_image_name;
        //Di chuyển file ảnh vào thư mục lưu trữ
        move_uploaded_file($avatar['tmp_name'], $upload_path);

        $avatar = $new_image_name;
    }
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `user` ( `email`, `password`, `username`, `fullname`, `phone`, `address`, `avatar`, `role`, `status`) VALUES ('$email','$hashPass','$username','$fullname','$phone','$address','$avatar',$role,1)";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    echo $id;
    $sql = "UPDATE user SET is_active = !is_active WHERE user_id = '$id'";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'getUserById') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE user_id = '$id';";
    $data = Query($sql, $connection);

    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateUser') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $avatar = $_POST['oldImage'] ?? "guest.png";
    $sql = "SELECT * FROM user WHERE email = '$email' and user_id != '$id'";
    $existPhone = Query($sql, $connection);
    $output = "";
    if (count($existPhone) > 0) {
        $output .= "existemail";
    }

    $sql1 = "SELECT * FROM user WHERE username = '$username' and user_id != '$id'";
    $existUsername = Query($sql1, $connection);
    if (count($existUsername) > 0) {
        $output .= "existusername";
    }

    $sql2 = "SELECT * FROM `user` WHERE phone = '$phone' and user_id != '$id'";
    $existPhone = Query($sql2, $connection);
    if (count($existPhone) > 0) {
        $output .= "existphone";
    }
    if (strlen($output) > 0) {
        echo $output;
        return;
    }

    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar'];
        // Tạo tên mới cho file ảnh
        $new_image_name = generateImageName($avatar);
        // Thư mục lưu trữ file ảnh
        $upload_directory = '../uploads/';

        // Đường dẫn đầy đủ của file ảnh
        $upload_path = $upload_directory . $new_image_name;
        //Di chuyển file ảnh vào thư mục lưu trữ
        move_uploaded_file($avatar['tmp_name'], $upload_path);

        $avatar = $new_image_name;
    }
    $updated_at = date('Y-m-d H:i:s');
    $sql = "UPDATE user SET email = '$email', username = '$username', fullname = '$fullname', phone = '$phone', address = '$address', avatar = '$avatar', role = $role, updated_at = '$updated_at' Where user_id = '$id'";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_POST['action']) && $_POST['action'] == 'signIn') {
    $email = $_POST['email'];
    $password  = $_POST['password'];
    if (empty($email) || empty($password)) {
        echo "error";
        return;
    }

    // Truy vấn để lấy hash mật khẩu từ cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE email = '$email' and is_active = 1 and status = 1";
    $data = Query($sql, $connection);

    if (count($data) <= 0) {
        echo "error";
        return;
    }
    // Giả sử mật khẩu hash được lưu trữ trong trường 'password' của $data
    $hashedPassword = $data[0]['password'];

    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION['account'] =  json_encode($data);

        // if ($remember) {
        //     setcookie('email', $email, time() + 7 * 24 * 3600);
        //     setcookie('password', $password, time() + 7 * 24 * 3600);
        //     setcookie('remember', '1', time() + 7 * 24 * 3600);
        // } else {
        //     setcookie('email', '', time() - 3600);
        //     setcookie('remember', '', time() - 3600);
        // }
        echo "success";
    } else {
        echo "error";
    }
}



if (isset($_GET['action']) && $_GET['action'] == 'logOut') {
    session_start();

    // Assuming you want to remove a session variable named 'username'
    unset($_SESSION['account']);
    echo "success";
}


if (isset($_POST['action']) && $_POST['action'] == 'changeInformation') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $username = $_POST['userName'];
    $fullname = $_POST['fullName'];
    $address = $_POST['address'];
    $avatar = $_POST['oldImage'];

    $sql = "SELECT * FROM user WHERE email = '$email' and user_id != '$id'";
    $existPhone = Query($sql, $connection);
    $output = "";
    if (count($existPhone) > 0) {
        $output .= "existemail";
    }

    $sql2 = "SELECT * FROM `user` WHERE phone = '$phone' and user_id != '$id'";
    $existPhone = Query($sql2, $connection);
    if (count($existPhone) > 0) {
        $output .= "existphone";
    }
    if (strlen($output) > 0) {
        echo $output;
        return;
    }

    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar'];
        // Tạo tên mới cho file ảnh
        $new_image_name = generateImageName($avatar);
        // Thư mục lưu trữ file ảnh
        $upload_directory = '../uploads/';

        // Đường dẫn đầy đủ của file ảnh
        $upload_path = $upload_directory . $new_image_name;
        //Di chuyển file ảnh vào thư mục lưu trữ
        move_uploaded_file($avatar['tmp_name'], $upload_path);

        $avatar = $new_image_name;
    }

    $sql = "UPDATE user SET email = '$email', username = '$username', fullname = '$fullname', phone = '$phone', address = '$address', avatar = '$avatar' Where user_id = '$id'";
    $data = Query($sql, $connection);
    session_start();

    // Assuming you want to remove a session variable named 'username'
    unset($_SESSION['account']);

    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $data = Query($sql, $connection);
    if (count($data) <= 0) {
        echo "error";
        return;
    }
    if (count($data) > 0) {
        $_SESSION['account'] =  json_encode($data);
    }
    echo "success";
}


if (isset($_POST['action']) && $_POST['action'] == 'changePassword') {
    session_start();
    $account = $_SESSION['account'];
    $accountDecode = json_decode($account, true);
    $id = $accountDecode[0]['user_id'];
    $oldPassword = $_POST['oldPassword'];
    $newpassword = $_POST['newpassword'];
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $data = Query($sql, $connection);
    if (count($data) <= 0) {
        echo "error";
        return;
    }

    $hashedDefaultPassword = $data[0]['password'];

    if (password_verify($oldPassword, $hashedDefaultPassword)) {
        $hashPass = password_hash($newpassword, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password = '$hashPass'  Where user_id = '$id'";
        $data = Query($sql, $connection);

        // Assuming you want to remove a session variable named 'username'
        unset($_SESSION['account']);

        $sql = "SELECT * FROM user WHERE user_id = '$id'";
        $data = Query($sql, $connection);
        if (count($data) <= 0) {
            echo "error";
            return;
        }
        if (count($data) > 0) {
            $_SESSION['account'] =  json_encode($data);
        }
        echo "success";
    } else {
        echo "error";
    }
}
