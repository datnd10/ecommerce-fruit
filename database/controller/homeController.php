<?php
include '../config.php';

if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $search = isset($_GET['search']) ? $_GET['search'] : null;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $pricefrom = isset($_GET['pricefrom']) ? $_GET['pricefrom'] : null;
    $priceto = isset($_GET['priceto']) ? $_GET['priceto'] : null;
    $rate = isset($_GET['rate']) ? $_GET['rate'] : null;


    $sqlCategory = "SELECT * FROM category where `is_active` = 1";
    $dataCategory = Query($sqlCategory, $connection);
    $response = array();
    $response['dataCategory'] = $dataCategory;

    $sqlProduct = "SELECT
        p.product_id,
        p.product_name,
        p.rate AS product_rate,
        pc.price AS product_price,
        pi.image AS product_image,
        total_sold.total_sold_quantity
    FROM
        product p
    INNER JOIN (
        SELECT
            pc1.product_id,
            pc1.product_color_id,
            pc1.price,
            pc1.sold_quantity
        FROM
            product_color pc1
        WHERE
            pc1.is_active = true
        GROUP BY
            pc1.product_id
    ) pc ON p.product_id = pc.product_id
    INNER JOIN (
        SELECT
            pi1.product_color_id,
            MIN(pi1.product_image_id) AS min_image_id
        FROM
            product_image pi1
        GROUP BY
            pi1.product_color_id
    ) min_image ON pc.product_color_id = min_image.product_color_id
    INNER JOIN product_image pi ON min_image.min_image_id = pi.product_image_id
    INNER JOIN (
        SELECT
            p1.product_id,
            SUM(pc2.sold_quantity) AS total_sold_quantity
        FROM
            product p1
        INNER JOIN product_color pc2 ON p1.product_id = pc2.product_id
        WHERE
            p1.is_active = true
        GROUP BY
            p1.product_id
    ) total_sold ON p.product_id = total_sold.product_id
    WHERE
        p.is_active = true ";
    if ($search != null) {
        $sqlProduct .= " AND p.product_name LIKE '%$search%'";
    }
    if ($category != null) {
        $sqlProduct .= " AND p.category_id = $category";
    }
    if ($pricefrom != null) {
        $sqlProduct .= " AND pc.price >= $pricefrom";
    }
    if ($priceto != null) {
        $sqlProduct .= " AND pc.price <= $priceto";
    }
    if ($rate != null) {
        $sqlProduct .= " AND p.rate = $rate";
    }
    if ($sort != null) {
        $sqlProduct .= " ORDER BY $sort";
    }
    $dataProduct = Query($sqlProduct, $connection);
    $response['dataProduct'] = $dataProduct;


    if (empty($response)) {
        echo json_encode("No data found");
    } else {
        echo json_encode($response);
    }
}
