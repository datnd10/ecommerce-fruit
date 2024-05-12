<?php
include '../config.php';

if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $sql = "SELECT p.*, f.fruit_type_name, c.category_name
    FROM product p 
    INNER JOIN fruit_type f ON f.fruit_type_id = p.fruit_type_id
    INNER JOIN category c ON p.category_id = c.category_id;
    ";
    $data = Query($sql, $connection);
    $output = '';
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "UPDATE product SET is_active = !is_active WHERE product_id = $id";
    $data = Query($sql, $connection);
    echo "success";
}


if (isset($_POST['action']) && $_POST['action'] == 'addProduct') {
    $categoryName = $_POST['categoryId'];
    $fruitType = $_POST['fruitType'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $output = "";
    $sql1 = "SELECT * FROM product WHERE product_name = '$name'";
    $existName = Query($sql1, $connection);
    if (count($existName) > 0) {
        $output .= "existName";
        echo $output;
        return;
    }
    $sql2 = "INSERT INTO `product` ( `product_name`,`description`, `quantity`, `price`,`fruit_type_id`, `category_id`) VALUES ('$name','$description', '$quantity', '$price', '$fruitType', '$categoryName')";
    $data = Query($sql2, $connection);
    $sql3 = "SELECT product_id FROM product ORDER BY product_id DESC LIMIT 1;";
    $rs = Query($sql3, $connection);
    $id = $rs[0]['product_id'];
    if (isset($_FILES['images'])) {
        $images = $_FILES['images'];
        foreach ($images['tmp_name'] as $key => $tmp_name) {
            $file = $images['name'][$key];

            $new_image_name = generateImageName($file);

            // Thư mục lưu trữ file ảnh
            $upload_directory = '../uploads/';

            // Đường dẫn đầy đủ của file ảnh
            $upload_path = $upload_directory . $new_image_name;

            // Di chuyển file ảnh vào thư mục lưu trữ
            move_uploaded_file($tmp_name, $upload_path);

            $sql = "INSERT INTO product_image (image, product_id)
                VALUES ('$new_image_name', '$id')";

            $result = Query($sql, $connection);
        }
    }
    // $imagesString = $_POST['images'];
    // $images = explode(',', $imagesString);
    // foreach ($images as $image) {
    //     $sql3 = "INSERT INTO `product_image` ( `image`, `product_color_id`) VALUES ('$image','$id')";
    //     $data3 = Query($sql3, $connection);
    // }
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'getProductById') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE product_id = '$id'; ";
    $data = Query($sql, $connection);
    $sql1 = "SELECT * FROM product_image WHERE product_id = '$id'; ";
    $data1 = Query($sql1, $connection);
    $join = array_merge($data, $data1);
    echo json_encode($join);
}

if (isset($_POST['action']) && $_POST['action'] == 'updateProduct') {
    $id = $_POST['id'];
    $categoryName = $_POST['categoryId'];
    $fruitType = $_POST['fruitType'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    // $images = $_POST['images'];

    $sql1 = "SELECT * FROM product WHERE product_name = '$name' and product_id != '$id'";
    $existName = Query($sql1, $connection);
    $output = "";
    if (count($existName) > 0) {
        $output .= "existName";
        echo $output;
        return;
    }
    $sql = "UPDATE `product` SET `product_name` = '$name', `description` = '$description', `fruit_type_id` = '$fruitType', `category_id` = '$categoryName' ,`quantity` = '$quantity', `price` = '$price' where `product_id` = '$id'";
    $data = Query($sql, $connection);
    if (isset($_FILES['images'])) {
        $images = $_FILES['images'];
        $oldImage = json_decode($_POST['oldImage']);
        foreach ($oldImage as $image) {
            if (file_exists("../uploads/" . $image)) {
                unlink("../uploads/" . $image);
            }
        }

        $sql2 = "DELETE FROM product_image WHERE product_id = '$id';";
        $data2 = Query($sql2, $connection);

        foreach ($images['tmp_name'] as $key => $tmp_name) {
            $file = $images['name'][$key];

            $new_image_name = generateImageName($file);

            // Thư mục lưu trữ file ảnh
            $upload_directory = '../uploads/';

            // Đường dẫn đầy đủ của file ảnh
            $upload_path = $upload_directory . $new_image_name;

            // Di chuyển file ảnh vào thư mục lưu trữ
            move_uploaded_file($tmp_name, $upload_path);

            $sql = "INSERT INTO product_image (image, product_id)
                VALUES ('$new_image_name', '$id')";

            $result = Query($sql, $connection);
        }
    }

    // $imagesString = $_POST['images'];
    // $images = explode(',', $imagesString);
    // $sql2 = "DELETE FROM product_image WHERE product_color_id = '$id';";
    // $data2 = Query($sql2, $connection);
    // foreach ($images as $image) {
    //     $sql3 = "INSERT INTO `product_image` ( `image`, `product_color_id`) VALUES ('$image','$id')";
    //     $data3 = Query($sql3, $connection);
    // }
    echo "success";
}
