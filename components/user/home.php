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
        input[type="file"] {
            display: none;
        }
    </style>
</head>
<?php
// Start the session
session_start();
if (isset($_SESSION['account'])) {
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

    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">100% Hoa Quả Sạch</h4>
                    <h1 class="mb-5 display-3 text-primary">Rau Củ Quả & Thực phẩm Hữu Cơ</h1>
                    <button type="button" class="btn btn-success py-md-3 px-md-5 me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Nhận Diện Các Loại Quả</button>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="../../assets/images/hero-img-1.png" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="../../assets/images/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nhận Diện Loại Quả</h5>
                    <button type="button" class="btn-close" id="closePredict" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-item d-flex flex-column align-items-center">
                        <div>
                            <label for="avatar" class="form-label my-3 border border-2 p-2 text-center">Chọn ảnh để nhận dạng</label>
                            <input type="file" class="form-control-file" accept="image/*" onchange="loadFile(event)" id="avatar" name="avatar">
                        </div>
                        <div>
                            <img id="avatarDisplay" class="img-fluid" style="width: 350px; height: 300px; object-fit: cover;" />
                        </div>

                        <div class="text-center my-3 d-none text-primary" id="spinnerContainer">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <h3 class="text-center my-3 d-none predicted text-success text-primary">
                            Đây là quả táo
                        </h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Featurs Section Start -->
    <div class="container-fluid featurs">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-car-side fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Miễn phí vận chuyển</h5>
                            <p class="mb-0">Đơn hàng trên 500.000đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-user-shield fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Bảo mật thanh toán</h5>
                            <p class="mb-0">100% bảo mật thanh toán</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-exchange-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Trả lại hàng</h5>
                            <p class="mb-0">Đổi hàng nếu không đúng ý</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>24/7 Hỗ trợ</h5>
                            <p class="mb-0">Hỗ trợ mọi lúc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" id="search" class="form-control p-3" placeholder="Tìm kiếm" aria-describedby="search-icon-1">
                                <span id="search-icon-1" style="cursor:pointer" class="input-group-text p-3 hover btnSearch"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Sắp xếp:</label>
                                <select id="sort" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                    <option selected value="p.sold_quantity desc">Bán chạy nhất</option>
                                    <option value="p.created_at desc">Sản phẩm mới nhất</option>
                                    <option value="p.price asc">Giá tăng dần</option>
                                    <option value="p.price desc">Giá giảm dần</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Loại Hoa Quả</h4>
                                        <ul class="list-unstyled fruite-type">

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Giá</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="50000" value="0" oninput="updateOutput()">
                                        <output id="amount" name="amount" min-velue="0" max-value="50000" for="rangeInput">0</output>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Mặt Hàng</h4>
                                        <ul class="list-unstyled fruite-categories">

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Đánh giá</h4>
                                    <ul class="list-unstyled rate">

                                    </ul>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary w-100" type="button" id="reset">Làm Mới</button>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="../../assets/images/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                        <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Hoa <br> Quả <br> Tươi</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center list-fruits">
                                <!-- <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <?php include '../../partials/footer.php' ?>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/lib/easing/easing.min.js"></script>
    <script src="../../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../../assets/lib/lightbox/js/lightbox.min.js"></script>
    <script src="../../assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


        document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('avatar').value = '';
            document.getElementById('avatarDisplay').src = '';
            document.getElementById('spinnerContainer').classList.add('d-none');
            document.querySelector('.predicted').classList.add('d-none');
        });

        function updateOutput() {
            const rangeInput = document.getElementById('rangeInput');
            const amountOutput = document.getElementById('amount');
            amountOutput.value = formatVietnameseCurrency(rangeInput.value);
        }

        // Initialize the output with the default value
        document.addEventListener('DOMContentLoaded', (event) => {
            updateOutput();
        });

        const loadFile = function(event) {

            $('.predicted').addClass('d-none');
            $('#avatarDisplay')[0].src = URL.createObjectURL(event.target.files[0]);
            $('#avatarDisplay')[0].onload = function() {
                URL.revokeObjectURL($('#avatarDisplay')[0].src);
            };
            $('#spinnerContainer').removeClass('d-none');
            uploadFile();
        };

        function uploadFile() {
            const fileInput = document.getElementById('avatar');
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onloadend = function() {
                    const base64String = reader.result.replace("data:", "").replace(/^.+,/, "");

                    axios({
                            method: "POST",
                            url: "https://detect.roboflow.com/fruit-detection-deqvb/1",
                            params: {
                                api_key: "H4KJwUEkPh8xVFdwOLjG"
                            },
                            data: base64String,
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            }
                        })
                        .then(function(response) {
                            $('#spinnerContainer').addClass('d-none');
                            const result = response.data.predictions[0].class;
                            let fruitTypeValue;
                            switch (result) {
                                case 'WATERMELON':
                                    fruitTypeValue = 'dưa hấu';
                                    break;
                                case 'APPLE':
                                    fruitTypeValue = 'táo';
                                    break;
                                case 'ONIONS':
                                    fruitTypeValue = 'hành';
                                    break;
                                case 'PINEAPLE':
                                    fruitTypeValue = 'dứa';
                                    break;
                                case 'TOMATO':
                                    fruitTypeValue = 'cà chua';
                                    break;
                                default:
                                    Swal.fire({
                                        title: 'Có gì đó sai sót',
                                        icon: 'error',
                                    })
                                    break;
                            }
                            $(`#${fruitTypeValue}`).prop('checked', true);
                            $('#closePredict').click();

                            getAllProducts();
                        })
                        .catch(function(error) {
                            console.log(1);
                        });
                };
                reader.readAsDataURL(file);
            } else {
                Swal.fire({
                    title: 'Chưa có ảnh',
                    icon: 'warning'
                })
            }
        }

        const getAllProducts = () => {
            var data = {
                'search': $('#search').val(),
                'sort': $('#sort').val(),
                'price': $('#rangeInput').val(),
                'category': $('input[name="category"]:checked').val(),
                'fruit-type': $('input[name="fruit-type"]:checked').val(),
                'rate': $('input[name="rate"]:checked').val(),
                'action': 'getAllProduct'
            }
            console.log(data);
            $.ajax({
                url: 'http://localhost:3000/database/controller/homeController.php',
                type: 'GET',
                data: data,
                success: (response) => {
                    let data = JSON.parse(response);
                    $('.list-fruits').empty();
                    const optionsHtml = data
                        .filter(item => item.is_active == 1)
                        .map(item => `         
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <a href=detailProduct.php?id=${item.product_id}>
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="../../database/uploads/${item.product_image}" class="img-fluid w-100 rounded-top" alt="" style="width: 260px; height: 260px; object-fit: cover">
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>${item.product_name}</h4>
                                            <div class="d-flex align-items-center justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">${formatVietnameseCurrency(item.price)} / kg</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>`)
                        .join('');
                    $('.list-fruits').append(optionsHtml);
                }
            })
        }

        $(document).ready(function() {
            const getAllCategories = () => {
                $.ajax({
                    url: 'http://localhost:3000/database/controller/categoryController.php',
                    type: 'GET',
                    data: {
                        action: "getAll",
                    },
                    success: (response) => {
                        const data = JSON.parse(response);
                        const optionsHtml = data
                            .filter(item => item.is_active == 1)
                            .map(item => `<li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="category" type="radio" value="${item.category_id}" id="category${item.category_id}">
                                                        <label class="form-check-label" for="category${item.category_id}">
                                                            ${item.category_name}
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>`)
                            .join('');
                        $('.fruite-categories').append(optionsHtml);
                    }
                });
            };

            const getAllFruitTypes = () => {
                $.ajax({
                    url: 'http://localhost:3000/database/controller/fruitTypeController.php',
                    type: 'GET',
                    data: {
                        action: "getAll",
                    },
                    success: (response) => {
                        let data = JSON.parse(response);
                        const optionsHtml = data
                            .filter(item => item.is_active == 1)
                            .map(item => `<li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="fruit-type" type="radio" value="${item.fruit_type_id}" id="${item.fruit_type_name}">
                                                     <label class="form-check-label" for="fruit_type${item.fruit_type_id}">
                                                        ${item.fruit_type_name}
                                                    </label>
                                                </div>
                                            </div>
                                    </li>`)
                            .join('');

                        $('.fruite-type').append(optionsHtml);
                    }
                })
            }

            const getAllRate = () => {
                let html = '';
                for (let i = 5; i >= 1; i--) {
                    let starsHtml = '';
                    for (let j = 1; j <= 5; j++) {
                        if (j <= i) {
                            starsHtml += '<i class="fa fa-star text-secondary"></i>';
                        } else {
                            starsHtml += '<i class="fa fa-star"></i>';
                        }
                    }
                    html += `<li>
                    <div class="form-check d-flex align-items-center justify-content-start">
                        <input class="form-check-input" name="rate" type="radio" value="${i}" id="rate${i}">
                        <label class="form-check-label d-flex align-items-center ms-2" for="rate${i}">
                            ${starsHtml}
                        </label>
                    </div>
                </li>`;
                }
                $('.rate').append(html);
            }



            getAllProducts();
            getAllFruitTypes();
            getAllCategories();
            getAllRate();

            $('#searchBtn').on('click', function() {
                getAllProducts();
            });

            $('#rangeInput').on('change', function() {
                getAllProducts();
            });

            $('#sort').on('change', function() {
                getAllProducts();
            });

            $('#search').on('keyup', function() {
                if (event.keyCode === 13) {
                    getAllProducts();
                }
            });

            $('.btnSearch').on('click', function() {
                getAllProducts();
            });

            $(document).on('change', 'input[name="category"]', function() {
                getAllProducts();
            });

            $(document).on('change', 'input[name="fruit-type"]', function() {
                getAllProducts();
            });

            $(document).on('change', 'input[name="rate"]', function() {
                getAllProducts();
            });

            $('#reset').on('click', function() {
                $('#search').val('');
                $('#rangeInput').val(0);
                $('#amount').val(0);
                $('input[name="category"]').prop('checked', false);
                $('input[name="fruit-type"]').prop('checked', false);
                $('input[name="rate"]').prop('checked', false);
                getAllProducts();
            });
        });
    </script>
</body>

</html>