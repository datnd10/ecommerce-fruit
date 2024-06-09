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
} ?>

<body>
    <?php include '../../partials/header.php' ?>

    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="d-flex justify-content-between">
                <h1 class="mb-4 titleOrder"></h1>
                <h1 class="mb-4 time"></h1>
            </div>
            <form action="#">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Họ tên người nhận: <sup class="text-center text-danger">*</sup></label>
                                    <input required type="text" class="form-control" placeholder="Họ tên người nhận" disabled name="fullName" id="fullName">
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3"><span>Số điện thoại<sup class="text-danger">*</sup></span>
                            </label>
                            <input type="text" class="form-control" name="phone" placeholder="Số Điện Thoại" required id="phone" disabled>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3 d-flex justify-content-between">
                                <span>Địa Chi Nhận Hàng <sup class="text-danger">*</sup></span>
                            </label>
                            <input type="text" class="form-control" placeholder="Địa Chỉ Nhận Hàng" disabled name="address" required id="address">
                        </div>
                        <div class="form-item">
                            <label for="shipping" class="form-label my-3 fw-bolder">Vận Chuyện <sup class="text-danger">*</sup></label>
                            <select id="shipping" class="form-select" name="shipping" disabled>
                                <option value="1" class="20000">Chuyển phát thường (Nhận Hàng Sau 1 Tuần)</option>
                                <option value="2" class="25000">Chuyển phát nhanh (Nhận Hàng Trong Khoảng 4 đến 6 ngày)</option>
                                <option value="3" class="30000">Chuyển phát hỏa tốc (Nhận Hàng Trong Khoảng 1 đến 3 ngày)</option>
                            </select>
                        </div>

                        <div class="form-item">
                            <label for="payment" class="form-label my-3 fw-bolder">Phương Thức Thanh Toán: <sup class="text-danger">*</sup></label>
                            <select id="payment" class="form-select" name="payment" disabled>
                                <option value="cod">Thanh Toán Nhận Hàng</option>
                                <option value="banking">Thanh Qua Ngân Hàng</option>
                            </select>
                        </div>

                        <div class="form-item">
                            <label for="text" class="form-label my-3 fw-bolder">Lời nhắn</label>
                            <textarea name="text" id="message" disabled class="form-control" spellcheck="false" cols="30" rows="5" placeholder="Oreder Notes (Optional)"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody class="listItem">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
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

    <!-- Template Javascript -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('id');
        $('.titleOrder').html(`Chi tiết đơn hàng #${orderId}`)

        const sessionValue = <?php echo json_encode($_SESSION['account']); ?>;
        const decodedSessionValue = JSON.parse(sessionValue)[0];

        const steps = $('.step');

        function activateStep(stepIndex) {
            steps.each(function(index) {
                const currentStep = $(`.step-${index + 1}`);
                if (currentStep.length) {
                    const isCurrent = index <= stepIndex;
                    currentStep.find('.icon').css('color', isCurrent ? 'rgb(45, 194, 88)' : '');
                    currentStep.find('.text').css('color', isCurrent ? 'rgb(45, 194, 88)' : '');
                }

            });
            switch (stepIndex) {
                case 0:
                    $('#status').val('pending');
                    break;
                case 1:
                    $('#status').val('approved');
                    break;
                case 2:
                    $('#status').val('shipping');
                    break;
                case 3:
                    $('#status').val('received');
                    break;
                default:
                    $('#status').val('Trạng thái không xác định');
            }
            const linebars = $('.linebar');
            linebars.each(function(index) {
                $(this).toggleClass('active', index <= stepIndex);
            });
        }

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
        const showOrderDetail = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/orderController.php',
                type: 'GET',
                data: {
                    action: "userGetOrderDetail",
                    orderId: orderId,
                },
                success: (response) => {
                    console.log(response);
                    let data = JSON.parse(response);
                    $('.time').html(data.information[0].created_at);
                    $('#fullName').val(data.information[0].name);
                    $('#phone').val(data.information[0].phone);
                    $('#address').val(data.information[0].address);
                    $('#email').val(data.information[0].email);
                    $('#message').val(data.information[0].message);
                    $('#shipping').val(data.information[0].shipping);
                    $('#payment').val(data.information[0].payment_method);


                    activateStep(data.information[0].status);

                    let totalPrice = 0;
                    // if (data.information[0].status == 'received') {
                    //     const tableHeaderRow = document.querySelector('thead tr');
                    //     const newTh = document.createElement('th');
                    //     newTh.className = 'sherah-table__column-6 sherah-table__h5';
                    //     newTh.textContent = 'Đánh Giá';
                    //     tableHeaderRow.appendChild(newTh);
                    // }

                    let html = '';

                    data.detail.forEach(function(item) {
                        console.log(item);
                        let total = item.quantity * item.price;
                        html += `<tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="../../database/uploads/${item.image}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">${item.product_name}</td>
                                <td class="py-5">${item.price}</td>
                                <td class="py-5">${item.quantity}</td>
                                <td class="py-5">${formatVietnameseCurrency(total)}</td>
                            </tr>`;
                    })
                    let subTotal = data.information[0].total_money - data.information[0].shipping;
                    let shipping = +data.information[0].shipping;
                    let total = +data.information[0].total_money;
                    html += `<tr>
                            <th scope="row"></th>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <p class="mb-0 text-dark py-3">Tiền Hàng</p>
                            </td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark">${subTotal}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <p class="mb-0 text-dark py-3">Tiền Ship</p>
                            </td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark">${shipping}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td class="py-5">
                                <p class="mb-0 text-dark text-uppercase py-3">TỔNG TIỀN</p>
                            </td>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark" ><span id="totalOrder">${total}</span></p>
                                </div>
                            </td>
                        </tr>`;

                    $('.listItem').html(html);
                    switch (data.information[0].status) {
                        case 'pending':
                            $(".head").removeClass("d-none");
                            $(".head-2").addClass("d-none")
                            activateStep(0);
                            break;
                        case 'approved':
                            $(".head").removeClass("d-none");
                            $(".head-2").addClass("d-none")
                            activateStep(1);
                            break;
                        case 'shipping':
                            $(".head").removeClass("d-none");
                            $(".head-2").addClass("d-none")
                            activateStep(2);
                            break;
                        case 'received':
                            $(".head").removeClass("d-none");
                            $(".head-2").addClass("d-none")
                            activateStep(3);
                            break;
                        case 'canceled':
                            $(".head").addClass("d-none")
                            $(".head-2").removeClass("d-none")
                            break;
                        default:
                            status = 'Trạng thái không xác định';
                            break;
                    }
                }
            })
        }
        showOrderDetail();
    </script>
</body>

</html>