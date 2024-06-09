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

    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-12 col-xl-12">
                    <div class="row g-4">
                        <div class="col-lg-6 imagesProduct">

                        </div>

                        <div class="col-lg-6 inforProduct">

                        </div>
                        <div class="col-lg-6 listImagesProduct">
                            <div class="listImagesProduct">

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Description</button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active description" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">

                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">

                                </div>
                                <!-- <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="fw-bold mb-0">Sản phẩm liên quan</h1>
            <div class="vesitable">

            </div>
        </div>
    </div>
    <!-- Single Product End -->

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

    <script>
        $(document).ready(function() {
            function getStarIcons(rate) {
                let stars = '';
                for (let i = 0; i < rate; i++) {
                    stars += '<i class="fa fa-star text-secondary"></i>';
                }
                for (let i = rate; i < 5; i++) {
                    stars += '<i class="fa fa-star "></i>';
                }
                return stars;
            }

            const id = (new URLSearchParams(window.location.search)).get('id');
            const getDetailProduct = () => {
                $.ajax({
                    url: 'http://localhost:3000/database/controller/productController.php',
                    type: 'GET',
                    data: {
                        action: "getProductDetail",
                        id: id,
                    },
                    success: (response) => {
                        let data = JSON.parse(response);
                        let imgActive = `${data.product_images[0].image}`;
                        let imgHtml = `<div class="border rounded">
                                    <img src="../../database/uploads/${data.product_images[0].image}" class="img-fluid rounded w-100%" id="mainImg" alt="Image">                     
                            </div>`
                        $('.imagesProduct').html(imgHtml);

                        let inforHtml = `
                            <div class="d-flex gap-3 align-items-center">
                                <h4 class="fw-bold mb-3">${data.product_details[0].product_name}</h4>
                                <div class="mb-3">|</div>
                                <div class="d-flex mb-3">
                                    ${getStarIcons(data.product_details[0].rate)}
                                </div>
                                <div class="mb-3">|</div>
                                <p class="mb-3">Da ban: <span class="fw-bold">${data.product_details[0].sold_quantity}</span></p>
                            </div>
                            <p class="mb-3">Loại: ${data.product_details[0].category_name}</p>
                            <p class="mb-3">Loại: ${data.product_details[0].fruit_type_name}</p>
                            <p class="mb-3">So luong: ${data.product_details[0].quantity}</p>
                            <h5 class="fw-bold mb-3">$${data.product_details[0].price} / kg</h5>
                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" id="quantity" class="form-control form-control-sm text-center border-0" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            ${data.product_details[0].quantity > 0 ?
                                `<button id="submitBtn" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>` :
                                `<button type="button" class="btn btn-secondary rounded-pill px-4 py-2 mb-4" disabled>
                                        <i class="fa fa-times-circle me-2"></i> Hết Hàng
                                </button>`
                            }`
                        $('.inforProduct').html(inforHtml);

                        let description = `<p>${data.product_details[0].description}</p>`
                        $('.description').html(
                            description
                        );

                        $('.btn-minus').on('click', function() {
                            let quantityInput = $(this).closest('.quantity').find('input');
                            let currentValue = parseInt(quantityInput.val());
                            if (!isNaN(currentValue) && currentValue > 1) {
                                quantityInput.val(currentValue - 1);
                            }
                        });

                        $('.btn-plus').on('click', function() {
                            let quantityInput = $(this).closest('.quantity').find('input');
                            let currentValue = parseInt(quantityInput.val());

                            let maxQuantity = data.product_details[0].quantity;
                            if (!isNaN(currentValue)) {
                                if (currentValue >= maxQuantity) {
                                    quantityInput.val(maxQuantity);
                                } else {
                                    quantityInput.val(currentValue + 1);
                                }
                            }
                        });

                        $('.quantity input').on('change', function() {
                            let quantityInput = $(this);
                            let currentValue = parseInt(quantityInput.val());
                            if (isNaN(currentValue) || currentValue < 1) {
                                quantityInput.val(1);
                            }
                        });

                        const quantityInput = document.querySelector("#quantity");
                        quantityInput.addEventListener('input', function(event) {
                            // Loại bỏ mọi ký tự không phải số từ giá trị nhập vào
                            this.value = this.value.replace(/\D/g, '');
                            if (+this.value > +data.product_details[0].quantity) {
                                this.value = data.product_details[0].quantity;
                            }
                        });

                        let html = '<div class="owl-carousel vegetable-carousel justify-content-center" id="relatedProducts">';
                        data.related_products.forEach(element => {
                            html += `
                            <div class="border border-primary rounded position-relative vesitable-item">
                            <a href=detailProduct.php?id=${element.product_id}>
                                <div class="vesitable-img">
                                    <img src="../../database/uploads/${element.product_image}" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="p-4 pb-0 rounded-bottom">
                                    <h4>${element.product_name}</h4>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold">$${element.price} / kg</p>
                                    </div>
                                </div>
                                </a>
                            </div>`
                        });

                        html += '</div>';
                        $('.vesitable').html(html);
                        $('.listImagesProduct').off('click', '.vesitable-item');

                        // Gắn sự kiện click mới cho phần tử ảnh trong carousel
                        $('.listImagesProduct').on('click', '.vesitable-item', function() {
                            // Xóa lớp 'border-5' từ tất cả các phần tử
                            $('.vesitable-item').removeClass('border-5');
                            // Thêm lớp 'border-5' cho phần tử ảnh được nhấp vào
                            $(this).addClass('border-5');
                            // Lấy đường dẫn của ảnh được nhấp vào và gán cho imgActive
                            imgActive = $(this).find('img').attr('src').replace('../../database/uploads/', '');
                            $('#mainImg').attr('src', '../../database/uploads/' + imgActive);
                        });
                        let htmlListImage = '<div class="owl-carousel vegetable-carousel justify-content-center" id="relatedProducts">';
                        data.product_images.forEach(element => {
                            htmlListImage += `
                            <div class="border ${element.image == imgActive ? 'border-5' : ''} border-primary rounded position-relative vesitable-item" style="cursor:pointer">
                                <div class="vesitable-img">
                                    <img src="../../database/uploads/${element.image}" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                            </div>`
                        });
                        htmlListImage += '</div>';
                        $('.listImagesProduct').html(htmlListImage);
                        $('.owl-carousel').owlCarousel({
                            margin: 10,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 3
                                },
                                1000: {
                                    items: 5
                                }
                            }
                        });

                        const account = <?php echo json_encode($data); ?>;
                        const submitBtn = document.querySelector("#submitBtn");
                        submitBtn.onclick = function() {
                            if (account == 'null') {
                                window.location.href = 'http://localhost:3000/components/user/signIn.php';
                            } else {
                                const dataForm = new FormData();
                                dataForm.append('productId', id);
                                dataForm.append('quantity', $('#quantity').val());
                                dataForm.append('inventory', data.product_details[0].quantity);
                                dataForm.append('action', 'addTocart');
                                $.ajax({
                                    url: 'http://localhost:3000/database/controller/cartController.php',
                                    type: 'POST',
                                    data: dataForm,
                                    contentType: false,
                                    processData: false,
                                    success: (response) => {
                                        console.log(response);
                                        switch (response) {
                                            case "success1":
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: "Thêm vào giỏ hàng thành công",
                                                    confirmButtonText: 'OK',
                                                })
                                                break;
                                            case "success2":
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: "Thêm vào giỏ hàng thành công",
                                                    confirmButtonText: 'OK',
                                                }).then(() => {
                                                    let currentNum = parseInt($('#cartNumber').html());
                                                    $('#cartNumber').text(currentNum + 1);
                                                })
                                                break;
                                        }
                                    }
                                });
                            }
                        }
                    }
                })
            }
            getDetailProduct();


        });

        const getReview = () => {
            const id = (new URLSearchParams(window.location.search)).get('id');
            const data = {
                id: id,
                action: 'getReview'
            }
            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'get',
                data: data,
                success: (response) => {
                    let html = '';
                    const data = JSON.parse(response);
                    console.log(data);
                    data.forEach(element => {
                        html += `<div class="d-flex mt-4">
                <img src="../../database/uploads/${element.avatar}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                <div class="col-11">
                    <p style="font-size: 14px;">${element.created_at}</p>
                    <div class="d-flex justify-content-between">
                        <h5>${element.username}</h5>
                        <div class="d-flex mb-3">`;

                        for (let i = 0; i < element.star; i++) {
                            html += `<i class="fa fa-star text-secondary"></i>`;
                        }

                        for (let i = element.star; i < 5; i++) {
                            html += `<i class="fa fa-star"></i>`;
                        }

                        html += `       </div>
                </div>
                <p>${element.content}</p>
                <div class="d-flex flex-wrap gap-3">`;

                        if (Array.isArray(element.images)) {
                            for (let i = 0; i < element.images.length; i++) {
                                html += `<img src="../../database/uploads/${element.images[i].image}" style="width: 75px; height: 75px; object-fit: cover" class="img-fluid" alt="">`;
                            }
                        }

                        html += `       </div>
            </div>
        </div>`;
                    });
                    $('#nav-mission').html(html);
                }
            })
        }
        getReview();
    </script>

</body>

</html>