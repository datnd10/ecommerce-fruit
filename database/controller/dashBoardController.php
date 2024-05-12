<?php
    include '../config.php';
    

    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

    $sql = "SELECT SUM(total_money) AS revenue
    FROM `order`
    WHERE status = 'received'";
    $weekTotal = Query($sql, $connection);

    $sql = "SELECT COUNT(*) AS total_orders
    FROM `order`";
    $totalOrder = Query($sql, $connection);

    $sql = "SELECT COUNT(*) AS total_users
    FROM `user`
    WHERE status = '1'";
    $totalUser = Query($sql, $connection);


    $sql = "SELECT status,COUNT(*) AS report
    FROM `order`
    GROUP BY status";
    $totalReport = Query($sql, $connection);


    $sql = "WITH RECURSIVE YearRange AS (
        SELECT '2023-01-01' AS start_date, '2023-01-01' + INTERVAL 1 YEAR AS end_date
        UNION
        SELECT end_date, end_date + INTERVAL 1 YEAR
        FROM YearRange
        WHERE end_date < '2030-01-01'
    )
    
    SELECT
        DATE_FORMAT(YearRange.start_date, '%Y') AS order_year,
        IFNULL(SUM(`order`.total_money), 0) AS total_revenue
    FROM
        YearRange
    LEFT JOIN
        `order` ON YEAR(`order`.created_at) = YEAR(YearRange.start_date) AND `order`.status = 'received'
    GROUP BY
        order_year
    ORDER BY
        order_year;
    ";
    $totalOfYear = Query($sql, $connection);

    $sql = "WITH RECURSIVE MonthRange AS (
        SELECT '2024-01-01' AS start_date, '2024-01-01' + INTERVAL 1 MONTH AS end_date
        UNION
        SELECT end_date, end_date + INTERVAL 1 MONTH
        FROM MonthRange
        WHERE end_date < '2024-12-01'
    )
    
    SELECT
        DATE_FORMAT(MonthRange.start_date, '%Y-%m') AS order_month,
        IFNULL(SUM(`order`.total_money), 0) AS total_revenue
    FROM
        MonthRange
    LEFT JOIN
        `order` ON DATE_FORMAT(`order`.created_at, '%Y-%m') = DATE_FORMAT(MonthRange.start_date, '%Y-%m') AND `order`.status = 'received'
    GROUP BY
        order_month
    ORDER BY
        order_month;";
    $totalOfMonth = Query($sql, $connection);

    $sql = "WITH RECURSIVE DateRange AS (
        SELECT '$startDate' AS start_date, '$startDate' + INTERVAL 1 DAY AS end_date
        UNION
        SELECT end_date, end_date + INTERVAL 1 DAY
        FROM DateRange
        WHERE end_date <= '$endDate'
    )
    
    SELECT
        DATE_FORMAT(DateRange.start_date, '%Y-%m-%d') AS order_date,
        IFNULL(SUM(`order`.total_money), 0) AS total_revenue
    FROM
        DateRange
    LEFT JOIN
        `order` ON DATE(`order`.created_at) = DATE(DateRange.start_date) AND `order`.status = 'received'
    GROUP BY
        order_date
    ORDER BY
        order_date;";
    $totalOfDay = Query($sql, $connection);

    
    $result = [
        'revenue' => $weekTotal[0]['revenue'],
        'total_order' => $totalOrder[0]['total_orders'],
        'total_user' => $totalUser[0]['total_users'],
        'total_report' => $totalReport,
        'totalOfYear'=> $totalOfYear,
        'totalOfMonth' => $totalOfMonth,
        'totalOfDay' => $totalOfDay
    ];
    echo json_encode($result);


?>