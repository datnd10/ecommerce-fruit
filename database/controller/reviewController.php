<?php
include '../config.php';
if (isset($_GET['action']) && $_GET['action'] == 'getProductById') {
    $id = $_GET['id'];
    $sql = "SELECT 
    p.product_name,
    p.product_id,
    p.price,
    pi.image
    FROM 
    product p
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
        ) AS pi ON p.product_id = pi.product_id where p.product_id = '$id'; ";
    $data = Query($sql, $connection);
    echo json_encode($data);
}

if (isset($_POST['action']) && $_POST['action'] == 'addReview') {
    session_start();
    $id = $_POST['id'];
    $description = $_POST['description'];
    $rate = $_POST['rate'];
    $userData = json_decode($_SESSION['account'], true);
    $user_id = $userData[0]['user_id'];

    $sql2 = "INSERT INTO `review` ( `content`, `star`, `user_id`,  `product_id`) VALUES ('$description','$rate', '$user_id','$id')";
    $data = Query($sql2, $connection);
    $sql3 = "UPDATE product p
    SET p.rate = CEIL((
        SELECT AVG(r.star)
        FROM review r
        WHERE r.product_id = $id
    ))
    WHERE p.product_id = $id;";
    $data = Query($sql3, $connection);
    $sql3 = "SELECT review_id FROM `review` ORDER BY review_id DESC LIMIT 1;";
    $rs = Query($sql3, $connection);
    $id = $rs[0]['review_id'];
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

            $sql = "INSERT INTO review_image (image, review_id)
                VALUES ('$new_image_name', '$id')";

            $result = Query($sql, $connection);
        }
    }
    echo "success";
}


if (isset($_GET['action']) && $_GET['action'] == 'getReview') {
    $id = $_GET['id'];
    $sql = "SELECT
    u.user_id,
    u.username,
    u.avatar,
    r.content,
    r.review_id,
    r.star, r.created_at, r.review_id
FROM
    review r
JOIN
    user u ON r.user_id = u.user_id
JOIN
    product p ON r.product_id = p.product_id
WHERE
    p.product_id = $id;";

    $data = Query($sql, $connection);
    $images = [];
    $reviews = [];

    foreach ($data as $row) {
        if (isset($row['review_id'])) {
            $reviewId = $row['review_id'];
            $sqlImages = "SELECT * FROM review_image WHERE review_id = $reviewId";
            $imagesData = Query($sqlImages, $connection);
            $images = $imagesData; // You can adjust this based on the actual structure of your $imagesData
        }

        $review = [
            'user_id' => $row['user_id'],
            'review_id' => $row['review_id'],
            'username' => $row['username'],
            'content' => $row['content'],
            'avatar' => $row['avatar'],
            'star' => $row['star'],
            'created_at' => $row['created_at'],
            'images' => $images, // Assuming $imagesData is an array with image data
        ];
        $reviews[] = $review;
    }
    echo json_encode($reviews);
}

if (isset($_GET['action']) && $_GET['action'] == 'getAllReview') {
    $sql = "SELECT
    r.review_id AS review_id,
    c.category_name AS category_name,
    p.product_name AS product_name,
    pc.color AS product_color,
    u.username AS user_name,
    r.created_at AS review_date,
    r.star as rate
FROM
    category c
    JOIN product p ON c.category_id = p.category_id
    JOIN product_color pc ON p.product_id = pc.product_id
    JOIN review r ON pc.product_color_id = r.product_color_id
    JOIN user u ON r.user_id = u.user_id;";
    $data = Query($sql, $connection);
    if (empty($data)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($data);
    }
}


if (isset($_GET['action']) && $_GET['action'] == 'viewComment') {
    $id = $_GET['id'];
    $sql = "SELECT
    r.star,
    r.content,
    p.product_name,
    pc.color,
    pc.price,
    pi.image
FROM
    product p
    JOIN product_color pc ON p.product_id = pc.product_id
    JOIN review r ON pc.product_color_id = r.product_color_id
    JOIN product_image pi ON pc.product_color_id = pi.product_color_id
    where r.review_id = $id
GROUP BY
    p.product_id";
    $data = Query($sql, $connection);

    $sqlImage = "SELECT ri.image
    FROM review r
    JOIN review_image ri ON r.review_id = ri.review_id
    WHERE r.review_id = $id;";
    $dataImage = Query($sqlImage, $connection);
    $combinedData = array(
        'data' => $data,
        'image' => $dataImage
    );
    if (empty($combinedData)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($combinedData);
    }
}
