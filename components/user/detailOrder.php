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

    <style>
        .card-stepper {
            z-index: 0
        }

        #progressbar-2 {
            color: #455A64;
        }

        #progressbar-2 li {
            list-style-type: none;
            font-size: 13px;
            width: 33.33%;
            float: left;
            position: relative;
        }

        #progressbar-2 #step1:before {
            content: '\f058';
            font-family: "Font Awesome 5 Free";
            color: #fff;
            width: 37px;
            margin-left: 0px;
            padding-left: 0px;
        }

        #progressbar-2 #step2:before {
            content: '\f058';
            font-family: "Font Awesome 5 Free";
            color: #fff;
            width: 37px;
        }

        #progressbar-2 #step3:before {
            content: '\f058';
            font-family: "Font Awesome 5 Free";
            color: #fff;
            width: 37px;
            margin-right: 0;
            text-align: center;
        }

        #progressbar-2 #step4:before {
            content: '\f111';
            font-family: "Font Awesome 5 Free";
            color: #fff;
            width: 37px;
            margin-right: 0;
            text-align: center;
        }

        #progressbar-2 li:before {
            line-height: 37px;
            display: block;
            font-size: 12px;
            background: #c5cae9;
            border-radius: 50%;
        }

        #progressbar-2 li:after {
            content: '';
            width: 100%;
            height: 10px;
            background: #c5cae9;
            position: absolute;
            left: 0%;
            right: 0%;
            top: 15px;
            z-index: -1;
        }

        #progressbar-2 li:nth-child(1):after {
            left: 1%;
            width: 100%
        }

        #progressbar-2 li:nth-child(2):after {
            left: 1%;
            width: 100%;
        }

        #progressbar-2 li:nth-child(3):after {
            left: 1%;
            width: 100%;
            /* background: #c5cae9 !important; */
        }

        #progressbar-2 li:nth-child(4) {
            left: 0;
            width: 37px;
        }

        #progressbar-2 li:nth-child(4):after {
            left: 0;
            width: 0;
        }

        #progressbar-2 li.active:before,
        #progressbar-2 li.active:after {
            background: #6520ff;
        }

        .orange {
            color: #ffb524;
        }

        input[type="file"] {
            display: none;
        }
    </style>

</head>
<?php
// Start the session
session_start();
if (!isset($_SESSION['account'])) {
    header("Location: signIn.php");
    exit;
}
else {
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
            <div class="d-flex justify-content-between">
                <h1 class="mb-4 titleOrder"></h1>
                <h1 class="mb-4 time"></h1>
            </div>
            <form action="#">
                <div class="py-3 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12">
                            <div class="card card-stepper" style="border-radius: 16px;">
                                <div class="card-body p-5 tracking">
                                    <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                                        <li class="step0 text-center" id="step1"></li>
                                        <li class="step0 text-center" id="step2"></li>
                                        <li class="step0 text-center" id="step3"></li>
                                        <li class="step0 text-muted text-end" id="step4"></li>
                                    </ul>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Đang</p>
                                                <p class="fw-bold mb-0">Xử Lý</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Đang</p>
                                                <p class="fw-bold mb-0">Chuẩn Bị Hàng</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Đang</p>
                                                <p class="fw-bold mb-0">Ship</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                                <p class="fw-bold mb-1">Đã</p>
                                                <p class="fw-bold mb-0">Nhận Hàng</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

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
                                <option value="30000" class="20000">Chuyển phát thường (Nhận Hàng Sau 1 Tuần)</option>
                                <option value="40000" class="25000">Chuyển phát nhanh (Nhận Hàng Trong Khoảng 4 đến 6 ngày)</option>
                                <option value="50000" class="30000">Chuyển phát hỏa tốc (Nhận Hàng Trong Khoảng 1 đến 3 ngày)</option>
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
                            <textarea name="text" id="message" disabled class="form-control" spellcheck="false" cols="30" rows="5"></textarea>
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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đánh Giá Đơn Hàng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetModal()"></button>
                        </div>
                        <div class="modal-body">
                            <input type="number" class="form-control productId" id="productId" name="productId" hidden="">
                            <div class="form-group row">
                                <div class="col-md-2 col-2">
                                    <img class="img-fluid image" src="" style="width: 150px;height: 150px; object-fit: cover;" />
                                </div>
                                <div class="col-sm-6 col-6 text-left">
                                    <div class="col-12"><span>Tên Sản Phẩm: </span><span class="productName"></span></div>
                                    <div class="col-12"><span>Giá: </span><span class="price"></span></div>
                                </div>
                            </div>
                            <form action="#">
                                <div class="row g-2">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between pt-3">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Số sao:</p>
                                                <div class="d-flex align-items-center" style="font-size: 12px;">
                                                    <i class="fa fa-star" style="font-size: 15px;"></i>
                                                    <i class="fa fa-star" style="font-size: 15px;"></i>
                                                    <i class="fa fa-star" style="font-size: 15px;"></i>
                                                    <i class="fa fa-star" style="font-size: 15px;"></i>
                                                    <i class="fa fa-star" style="font-size: 15px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label my-3">Nội dung đánh giá: <sup class="text-center text-danger">*</sup></label>
                                        <textarea name="" id="description" class="form-control" cols="30" rows="4" placeholder="" spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center mb-4">
                                            <input type="file" id="file-input" accept="image/png, image/jpeg" onchange="preview()" multiple>
                                            <label for="file-input" class="desc d-flex gap-3 align-items-center">
                                                <span class="p-1 border"><i class="mdi mdi-upload"></i> &nbsp; Chọn Ảnh</span>
                                                <span id="num-of-files">No Files Chosen</span>
                                            </label>
                                        </div>
                                        <div id="images" class="d-flex flex-wrap gap-3"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetModal()">Đóng</button>
                            <button type="button" class="btn btn-primary updateBtn">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
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

        $(document).ready(function() {
            $('.fa-star').on('click', function() {
                var index = $(this).index();
                $('.fa-star').removeClass('orange');
                $('.fa-star').slice(0, index + 1).addClass('orange');
            });
        });

        function updateProgressBar(status) {
            // Remove 'active' class from all steps
            $('#progressbar-2 li').removeClass('active');

            switch (status) {
                case 'pending':
                    $('#step1').addClass('active');
                    break;
                case 'approved':
                    $('#step1').addClass('active');
                    $('#step2').addClass('active');
                    break;
                case 'shipping':
                    $('#step1').addClass('active');
                    $('#step2').addClass('active');
                    $('#step3').addClass('active');
                    break;
                case 'received' || 'reviewed':
                    $('#step1').addClass('active');
                    $('#step2').addClass('active');
                    $('#step3').addClass('active');
                    $('#step4').addClass('active');
                    break;
                case 'canceled':
                    $('.tracking').html('<h3 class="text-center text-danger">Đơn hàng đã bị huỷ</h3>');
                    break;
                default:
                    console.log('Unknown status:', status);
            }
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


                    updateProgressBar(data.information[0].status);

                    let totalPrice = 0;
                    if (data.information[0].status == 'received') {
                        const tableHeaderRow = document.querySelector('thead tr');
                        const newTh = document.createElement('th');
                        newTh.textContent = 'Đánh Giá';
                        tableHeaderRow.appendChild(newTh);
                    }

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
                                <td class="py-5">${formatVietnameseCurrency(item.price)}</td>
                                <td class="py-5">${item.quantity}</td>
                                <td class="py-5">${formatVietnameseCurrency(total)}</td>`;

                        if (data.information[0].status == 'received') {
                            html += `<td class="py-5" onclick="handleReview(${item.product_id})" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;"><i class="fas fa-pen fs-5 text-success"></i></td>`;
                        }
                        html += `</tr>`;
                    })
                    let subTotal = data.information[0].total_money - data.information[0].shipping;
                    let shipping = +data.information[0].shipping;
                    let total = +data.information[0].total_money;
                    html += `<tr>
                            <th scope="row"></th>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <p class="mb-0 text-dark py-3 fw-bolder">Tiền Hàng</p>
                            </td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark fw-bolder">${formatVietnameseCurrency(subTotal)}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <p class="mb-0 text-dark py-3 fw-bolder">Tiền Ship</p>
                            </td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark fw-bolder">${formatVietnameseCurrency(shipping)}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td class="py-5">
                                <p class="mb-0 text-dark text-uppercase py-3 fw-bolder">TỔNG TIỀN</p>
                            </td>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark fw-bolder" ><span id="totalOrder">${formatVietnameseCurrency(total)}</span></p>
                                </div>
                            </td>
                        </tr>`;

                    $('.listItem').html(html);

                }
            })
        }
        showOrderDetail();
        const handleReview = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'GET',
                data: {
                    action: "getProductById",
                    id: id
                },
                success: (response) => {
                    console.log(response);
                    let data = JSON.parse(response)[0];
                    $('#productId').val(data.product_id);
                    $('.productName').html(data.product_name);
                    $('.price').html(formatVietnameseCurrency(data.price));
                    $(".image").attr("src", `../../database/uploads/${data.image}`);
                }
            })
        }

        function resetModal() {
            $('#description').val(''); // Reset description
            $('.fa-star').removeClass('orange'); // Remove orange class from stars
            $('#file-input').val(''); // Reset file input
            $('#num-of-files').text('No Files Chosen'); // Reset file input text
            $('#images').empty(); // Remove all images
        }

        function preview(fileInput, imageContainer, numOfFiles) {
            imageContainer.empty();
            numOfFiles.text(`${fileInput[0].files.length} Files Selected`);

            for (let file of fileInput[0].files) {
                let reader = new FileReader();
                let figure = $("<figure></figure>");
                let figCap = $("<figcaption></figcaption>");

                figCap.text(file.name);
                figure.append(figCap);

                reader.onload = () => {
                    let img = $("<img>");
                    img.attr("src", reader.result);
                    figure.prepend(img);
                }

                imageContainer.append(figure);
                reader.readAsDataURL(file);
            }
        }

        let fileInput = $("#file-input");
        let imageContainer = $("#images");
        let numOfFiles = $("#num-of-files");

        fileInput.on('change', () => {
            preview(fileInput, imageContainer, numOfFiles);
        });

        $('.updateBtn').on('click', () => {
            let listImages = $('#file-input')[0].files;
            const data = new FormData();
            data.append('id', $('#productId').val());
            data.append('description', $('#description').val());
            data.append('rate', $('.fa-star.orange').length);
            for (let i = 0; i < listImages.length; i++) {
                data.append('images[]', listImages[i]);
            }
            data.append('action', 'addReview'); 

            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response);
                    switch (response) {
                        case 'success':
                            Swal.fire({
                                icon: 'success',
                                title: 'Cập Nhật Thành Công',
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                            break;
                        default:
                            Swal.fire({
                                title: 'Có Gì Đó Sai Sót',
                                icon: 'error',
                                confirmButtonText: 'OK',
                            });
                            break;
                    }
                }
            });
        });
    </script>
</body>

</html>