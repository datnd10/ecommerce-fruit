<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="../../assets/lib/lightbox/css/lightbox.min.css">
    <link rel="stylesheet" href="../../assets/lib/owlcarousel/assets/owl.carousel.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../assets/css/homeStyle.css" rel="stylesheet">

</head>
<?php
// Start the session
session_start();
if (!isset($_SESSION['account'])) {
    header("Location: signIn.php");
    exit;
} else {
    $account = $_SESSION['account'];
    $data = json_decode($account, true);
    $role = $data[0]['role'];
    if ($role != 1) {
        header("Location: signIn.php");
        exit;
    }
}
?>

<body>
    <?php include '../../partials/header.php' ?>

    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Lịch sử mua hàng</h1>
            <table id="example" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Tên người nhận</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="bodyTable">

                </tbody>
            </table>
        </div>
    </div>
    <!-- Checkout Page End -->


    <?php include '../../partials/footer.php' ?>



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/lib/easing/easing.min.js"></script>
    <script src="../../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../../assets/lib/lightbox/js/lightbox.min.js"></script>
    <script src="../../assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.3/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.3/js/select.bootstrap5.js"></script>
    <!-- Template Javascript -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

    <script>
        function formatVietnameseCurrency(amount) {
            try {
                // Đảm bảo amount là một số
                amount = parseFloat(amount);

                // Sử dụng hàm toLocaleString để định dạng số và thêm dấu phẩy
                formattedAmount = amount.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                return formattedAmount;
            } catch (error) {
                return "Số tiền không hợp lệ";
            }
        }



        const showAllOrders = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'GET',
                data: {
                    action: "getUserOrder",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    console.log(data);
                    $('.bodyTable').empty();
                    data.forEach(function(item) {
                        let status = "";
                        switch (item.status) {
                            case 'pending':
                                status = 'Đang duyệt';
                                break;
                            case 'approved':
                                status = 'Chấp thuận';
                                break;
                            case 'shipping':
                                status = 'Đang ship';
                                break;
                            case 'received':
                                status = 'Đã nhận';
                                break;
                            case 'reviewed':
                                status = 'Đánh giá';
                                break;
                            case 'canceled':
                                status = 'Đã Hủy';
                                break;
                            default:
                                status = 'Trạng thái không xác định';
                        }
                        let html = `<tr>
                                                <td>
                                                    <a href="detailOrder.php?id=${item.order_id}">#${item.order_id}</a>
                                                </td>
                                                <td>
                                                    <span>${item.name}</span>
                                                </td>
                                                <td>
                                                <span>${item.created_at}</span>
                                                </td>
                                                <td>
                                                    <span>${formatVietnameseCurrency(item.total_money)}</span>
                                                </td>
                                                <td>
                                                    ${item.payment_status === 'paid' ? `<span class="badge bg-success">Đã thanh toán</span>` : `<span class="badge bg-dark">Chưa thanh toán</span>`}
                                                </td>
                                                <td>`
                        if (item.status == 'pending') {
                            html += `<span class="badge bg-warning">${status}</span>`
                        }
                        if (item.status == 'approved') {
                            html += `<span class="badge bg-info">${status}</span>`
                        }
                        if (item.status == 'shipping') {
                            html += `<span class="badge bg-primary">${status}</span>`
                        }
                        if (item.status == 'received' || item.status == 'reviewed') {
                            html += `<span class="badge bg-success">${status}</span>`
                        }
                        if (item.status == 'canceled') {
                            html += `<span class="badge bg-danger">${status}</span>`
                        }
                        html += `</td>`
                        console.log(item.status);
                        if (item.status != 'canceled') {
                            html += `<td class="text-center">
                                                    <a onclick="handleDelete(${item.order_id})"><i class="fas fa-trash fs-5 text-danger"></i></a>
                                                    </td>  `
                        } else {
                            html += `<td></td>`;
                        }

                        html += `</tr>`
                        $('.bodyTable').append(html);
                    })
                    new DataTable('#example', {
                        responsive: true
                    });
                }
            })
        }
        showAllOrders();

        const handleDelete = (id) => {
            Swal.fire({
                title: `Bạn chắc chắn hủy đơn hàng #${id}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Đóng!',
                confirmButtonText: 'Xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://localhost:3000/components/sendMail.php',
                        type: 'GET',
                        data: {
                            action: "delete",
                            id: id
                        },
                        success: (response) => {
                            switch (response) {
                                case 'success':
                                    Swal.fire({
                                        title: 'Hủy thành công',
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    })
                                    break;
                                case 'failed':
                                    Swal.fire({
                                        title: 'Không thể hủy đơn khi đã nhận',
                                        icon: 'error'
                                    })
                                    break;
                                default:
                                    Swal.fire({
                                        title: 'Có gì đó sai sót',
                                        icon: 'error'
                                    })
                                    break;
                            }
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>