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
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
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
} ?>

<body>
    <?php include '../../partials/header.php' ?>

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody class="cartTable">

                    </tbody>
                </table>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h2 class="display-12 mb-4">Cart <span class="fw-normal">Total:</span> <span class="totalCart">$99.00</span> </h2>
                        </div>
                        <button id="checkoutBtn" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->

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

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const doDelete = (id) => {
            Swal.fire({
                title: 'Bạn chắc chắn chứ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Đóng',
                confirmButtonText: 'Xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "http://localhost:3000/database/controller/cartController.php",
                        data: {
                            productID: id,
                            action: 'removecartItem',
                        },
                        cache: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Xóa thành công',
                                icon: 'success'
                            }).then((result) => {
                                let currentNum = parseInt($('#cartNumber').html());
                                $('#cartNumber').text(currentNum - 1);
                                location.reload();
                            })
                        }
                    });
                }
            });
        };

        const viewcart = function() {
            $.ajax({
                url: 'http://localhost:3000/database/controller/cartController.php',
                type: 'GET',
                data: {
                    action: 'viewcart',
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    listcart = data;
                    let html = "";
                    let totalcart = 0;
                    data.forEach(function(item, currentIndex) {
                        let total = item.dataProduct[0].price * item.quantity;
                        totalcart += total;
                        html += `<tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="../../database/uploads/${item.dataProduct[0].image}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">${item.dataProduct[0].product_name}</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">${item.dataProduct[0].price} $</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="number" class="form-control form-control-sm text-center border-0" value="${item.quantity}"  data-item="${item.dataProduct[0].product_id}" max="${item.dataProduct[0].quantity}" min="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4 total-price">${total} $</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4" onclick="doDelete(${item.dataProduct[0].product_id})">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>`;
                    })

                    $('.cartTable').append(html);
                    $('.totalCart').text(totalcart + ' $');

                    function updateCartTotal() {
                        let totalcart = 0;

                        $('.cartTable tr').each(function() {
                            let quantity = parseInt($(this).find('input').val(), 10);
                            let price = parseFloat($(this).find('td:nth-child(3) p').text().replace(' $', ''));
                            let total = quantity * price;
                            totalcart += total;
                            $(this).find('.total-price').text(total + ' $');
                        });

                        $('.totalCart').text(totalcart + ' $');
                    }

                    $('.btn-minus').on('click', function() {
                        let quantityInput = $(this).closest('.quantity').find('input');
                        let currentValue = parseInt(quantityInput.val(), 10);
                        let minValue = parseInt(quantityInput.attr('min'), 10);

                        if (!isNaN(currentValue) && currentValue > minValue) {
                            quantityInput.val(currentValue - 1);
                            updateCartTotal(); //
                        }


                    });

                    $('.btn-plus').on('click', function() {
                        let quantityInput = $(this).closest('.quantity').find('input');
                        let currentValue = parseInt(quantityInput.val(), 10);
                        let maxValue = parseInt(quantityInput.attr('max'), 10);

                        if (!isNaN(currentValue)) {
                            if (currentValue < maxValue) {
                                quantityInput.val(currentValue + 1);
                            } else {
                                quantityInput.val(maxValue);
                            }
                            updateCartTotal(); //
                        }
                    });

                    $('.cartTable').on('input', '.quantity input', function() {
                        let quantityInput = $(this);
                        let currentValue = parseInt(quantityInput.val(), 10);
                        let minValue = parseInt(quantityInput.attr('min'), 10);
                        let maxValue = parseInt(quantityInput.attr('max'), 10);
                        console.log(2);
                        if (isNaN(currentValue) || currentValue < minValue) {
                            quantityInput.val(minValue);
                        } else if (currentValue > maxValue) {
                            quantityInput.val(maxValue);
                        }
                        updateCartTotal();
                    });

                    function logQuantityChange() {
                        let quantityInput = $(this);
                        let currentValue = parseInt(quantityInput.val(), 10);
                        let productName = quantityInput.closest('tr').find('td:first').text().trim();
                        let productId = quantityInput.data('item');
                        $.ajax({
                            type: "post",
                            url: "http://localhost:3000/database/controller/cartController.php",
                            data: {
                                productID: productId,
                                quantity: currentValue,
                                action: 'updatecartQuantity',
                            },
                            cache: false,
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }

                    $('#checkoutBtn').click(function() {
                        if (data.length < 1) {
                            Swal.fire({
                                text: "Giỏ Hàng trống. Thêm Sản Phẩm trước khi thanh toán",
                                icon: 'error',
                            }).then((result) => {
                                window.location.href = "shop.php";
                            })
                        } else {
                            window.location.href = "checkout.php";
                        }
                    })

                    $('.cartTable').on('input', '.quantity input', logQuantityChange);

                    $('.btn-minus, .btn-plus').on('click', function() {
                        let quantityInput = $(this).closest('.quantity').find('input');
                        logQuantityChange.call(quantityInput);
                    });
                }
            })
        }
        viewcart();
    </script>
</body>

</html>