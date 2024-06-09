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
                    <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                    <h1 class="mb-5 display-3 text-primary">Organic Veggies & Fruits Foods</h1>
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
                            <h5>Free Shipping</h5>
                            <p class="mb-0">Free on order over $300</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-user-shield fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Security Payment</h5>
                            <p class="mb-0">100% security payment</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-exchange-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>30 Day Return</h5>
                            <p class="mb-0">30 day money guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>24/7 Support</h5>
                            <p class="mb-0">Support every time fast</p>
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
                                <input type="search" id="search" class="form-control p-3" placeholder="tìm kiếm" aria-describedby="search-icon-1">
                                <span id="search-icon-1" onclick="getAllProducts()" style="cursor:pointer" class="input-group-text p-3 hover"><i class="fa fa-search"></i></span>
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
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
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
                                    <button class="btn btn-primary w-100" type="button" id="reset">Reset</button>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="../../assets/images/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                        <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
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
    <script>
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
                                                    <input class="form-check-input" name="fruit-type" type="radio" value="${item.fruit_type_id}" id="fruit_type${item.fruit_type_id}">
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
                $.ajax({
                    url: 'http://localhost:3000/database/controller/homeController.php',
                    type: 'GET',
                    data: data,
                    success: (response) => {
                        console.log(response);
                        let data = JSON.parse(response);
                        console.log(data);
                        $('.list-fruits').empty();
                        const optionsHtml = data
                            .filter(item => item.is_active == 1)
                            .map(item => `         
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <a href=detailProduct.php?id=${item.product_id}>
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="../../database/uploads/${item.product_image}" class="img-fluid w-100 rounded-top" alt="" style="min-height: 200px">
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4>${item.product_name}</h4>
                                            <div class="d-flex align-items-center justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">$${item.price} / kg</p>
                                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
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