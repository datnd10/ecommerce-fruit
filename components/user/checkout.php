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
            <h1 class="mb-4">Billing details</h1>
            <form action="#">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Họ tên người nhận: <sup class="text-center text-danger">*</sup></label>
                                    <input required type="text" class="form-control" placeholder="Họ tên người nhận" name="fullName" id="fullName">
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3"><span>Số điện thoại<sup class="text-danger">*</sup></span>
                                <span id="wrongPhone" class="text-danger d-none">Điện Thoại phải có 10 chữ số</span></label>
                            <input type="text" class="form-control" name="phone" placeholder="Số Điện Thoại" required id="phone">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3 d-flex justify-content-between">
                                <span>Địa Chi Nhận Hàng <sup class="text-danger">*</sup></span>
                                <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-info" style="cursor: pointer">
                                    Chỉnh sửa
                                </span>
                            </label>
                            <input type="text" class="form-control" placeholder="Địa Chỉ Nhận Hàng" name="address" required id="address">
                        </div>
                        <div class="form-item">
                            <label for="shipping" class="form-label my-3 fw-bolder">Vận Chuyện <sup class="text-danger">*</sup></label>
                            <select id="shipping" class="form-select" name="shipping">
                                <option value="1" class="20000">Chuyển phát thường (Nhận Hàng Sau 1 Tuần)</option>
                                <option value="2" class="25000">Chuyển phát nhanh (Nhận Hàng Trong Khoảng 4 đến 6 ngày)</option>
                                <option value="3" class="30000">Chuyển phát hỏa tốc (Nhận Hàng Trong Khoảng 1 đến 3 ngày)</option>
                            </select>
                        </div>

                        <div class="form-item">
                            <label for="payment" class="form-label my-3 fw-bolder">Phương Thức Thanh Toán: <sup class="text-danger">*</sup></label>
                            <select id="payment" class="form-select" name="payment">
                                <option value="cod">Thanh Toán Nhận Hàng</option>
                                <option value="banking">Thanh Qua Ngân Hàng</option>
                            </select>
                        </div>

                        <div class="form-item">
                            <label for="text" class="form-label my-3 fw-bolder">Lời nhắn</label>
                            <textarea name="text" id="message" class="form-control" spellcheck="false" cols="30" rows="5" placeholder="Oreder Notes (Optional)"></textarea>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Địa Chỉ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="city" class="form-label" style="font-weight: bold">Thành Phố:</label>
                                        <select class="form-select" id="city" aria-label=".form-select-sm" required name="city">
                                            <option value="" selected>Chọn Thành Phố</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="district" class="form-label" style="font-weight: bold">Huyện:</label>
                                        <select class="form-select" id="district" aria-label=".form-select-sm" required name="district">
                                            <option value="" selected>Chọn Quận Huyện</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ward" class="form-label" style="font-weight: bold">Phường:</label>
                                        <select class="form-select" id="ward" aria-label=".form-select-sm" required name="ward">
                                            <option value="" selected>Chọn Phường</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ward" class="form-label" style="font-weight: bold">Địa chỉ cụ thể:</label>
                                        <input type="text" required class="form-control" id="AddressChange" placeholder="VD: Số nhà 20, ngách 20" name="address">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary btnChangeAddress">Lưu Thay Đổi</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="listItem">

                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="button" class="submitBtn btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
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
        const sessionValue = <?php echo json_encode($_SESSION['account']); ?>;
        const decodedSessionValue = JSON.parse(sessionValue)[0];

        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                var opt = document.createElement('option');
                opt.value = x.Name;
                opt.text = x.Name;
                opt.setAttribute('data-id', x.Id);
                citis.options.add(opt);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                    for (const k of result[0].Districts) {
                        var opt = document.createElement('option');
                        opt.value = k.Name;
                        opt.text = k.Name;
                        opt.setAttribute('data-id', k.Id);
                        district.options.add(opt);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

                    for (const w of dataWards) {
                        var opt = document.createElement('option');
                        opt.value = w.Name;
                        opt.text = w.Name;
                        opt.setAttribute('data-id', w.Id);
                        wards.options.add(opt);
                    }
                }
            };
        }

        function updateShippingDetails() {
            const selectedOption = shipping.find('option:selected');
            const selectedOptionClassName = selectedOption.prop('class');
            $('.shipvalue').html(selectedOptionClassName);
            totalPriceAndShip.empty().append(totalCart + (+selectedOptionClassName));
            totalInput.val(totalCart + (+selectedOptionClassName));
            totalOrder.val(totalCart + (+selectedOptionClassName));
        };

        function normalizeText(text) {
            text = text.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            return text.replace(/Đ/g, "D").replace(/đ/g, "d");
        }

        $('.btnChangeAddress').on('click', function() {
            const selectedCity = citis.options[citis.selectedIndex].value;
            const selectedDistrict = districts.options[districts.selectedIndex].value;
            const selectedWard = wards.options[wards.selectedIndex].value;
            const addressChange = $('#AddressChange').val();
            const newAddress = `${normalizeText(addressChange)}, ${normalizeText(selectedWard)}, ${normalizeText(selectedDistrict)}, ${normalizeText(selectedCity)}`;
            Swal.fire({
                text: "Cập Nhật Địa Chỉ Thành Công",
                icon: 'success',
            }).then((result) => {
                $('.btn-close').click();
            })
            $('#address').val(newAddress);
        });
        $('#shipping').on('change', function() {
            updateCart();
        });

        function updateCart() {
            init().then(() => {
                let subTotal = 0;

                $('.cartTable tr').each(function() {
                    let totalItem = parseFloat($(this).find('td:nth-child(5)').text().replace('$', '').trim());
                    subTotal += totalItem;
                });

                let shippingCost = parseInt($('#shipping').val());
                let total = subTotal + shippingCost;

                $('.listItem .subtotal').text('$ ' + subTotal.toFixed(2));
                $('.listItem .shipping').text('$ ' + shippingCost.toFixed(2));
                $('.listItem .total').text('$ ' + total.toFixed(2));
            });
        }

        function init() {
            return new Promise((resolve, reject) => {
                $('#fullName').val(decodedSessionValue.fullname);
                $('#phone').val(decodedSessionValue.phone);
                $('#address').val(decodedSessionValue.address);
                $.ajax({
                    url: 'http://localhost:3000/database/controller/cartController.php',
                    type: 'GET',
                    data: {
                        action: 'viewcart',
                    },
                    success: (response) => {
                        let total = 0;
                        let data = JSON.parse(response);
                        let html = '';
                        let subTotal = 0;

                        data.forEach(function(item) {
                            let totalItem = item.dataProduct[0].price * item.quantity;
                            html += `<tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="../../database/uploads/${item.dataProduct[0].image}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">${item.dataProduct[0].product_name}</td>
                                <td class="py-5">$ ${item.dataProduct[0].price}</td>
                                <td class="py-5">${item.quantity}</td>
                                <td class="py-5">$ ${totalItem}</td>
                            </tr>`;
                            subTotal += totalItem;
                        });

                        let shippingCost = parseInt($('#shipping').val());
                        total = subTotal + shippingCost;

                        html += `<tr>
                            <th scope="row"></th>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <p class="mb-0 text-dark py-3">Subtotal</p>
                            </td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark">$ ${subTotal.toFixed(2)}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <p class="mb-0 text-dark py-3">Shipping</p>
                            </td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark">$ ${shippingCost.toFixed(2)}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td class="py-5">
                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                            </td>
                            <td class="py-5"></td>
                            <td class="py-5"></td>
                            <td class="py-5">
                                <div class="py-3 border-bottom border-top">
                                    <p class="mb-0 text-dark" >$ <span id="totalOrder">${total.toFixed(2)}</span></p>
                                </div>
                            </td>
                        </tr>`;

                        $('.listItem').html(html);
                        resolve();
                    }
                })
            });
        }
        $(document).ready(function() {
            init();
        })
        let messageBanking = '';
        $(document).ready(function() {
            let checkBanking = true;
            $('.submitBtn').on('click', function() {
                function isEmpty(value) {
                    return value.trim() === '';
                }

                const fields = ['fullName', 'phone', 'address'];

                fields.forEach(field => {
                    const element = $(`#${field}`);
                    if (isEmpty(element.val())) {
                        element.addClass('is-invalid');
                    } else {
                        element.removeClass('is-invalid');
                    }
                });
                if (fields.some(field => isEmpty($(`#${field}`).val()))) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Điền đầy đủ thông tin',
                    });
                } else {
                    function checkPhone(phone) {
                        const PHONE_REGEX = /^\d{10}$/;
                        return PHONE_REGEX.test(phone);
                    }
                    $('#wrongPhone').toggleClass('d-none', checkPhone($('#phone').val()));

                    if (checkPhone($('#phone').val())) {
                        messageBanking = $('#message').val();
                        var data = {
                            id: decodedSessionValue.user_id,
                            name: $('#fullName').val(),
                            phone: $('#phone').val(),
                            address: $('#address').val(),
                            shipping: $('#shipping').val(),
                            message: $('#message').val(),
                            totalOrder: $('#totalOrder').text(),
                            payment: $('#payment').find(':selected').val(),
                            action: 'checkout'
                        }
                        if ($('#payment').find(':selected').val() == 'banking') {
                            $.ajax({
                                url: 'http://localhost:3000/database/controller/vnpay.php',
                                type: 'POST',
                                data: data,
                                success: (response) => {
                                    console.log(response);
                                    switch (response) {
                                        case "failed":
                                            Swal.fire({
                                                icon: 'error',
                                                title: "Một trong số sản phẩm của bạn không đủ số lượng",
                                            })
                                            break;
                                        default:
                                            let result = JSON.parse(response);
                                            url = result.data;
                                            Swal.fire({
                                                icon: 'success',
                                                title: "Mời Bạn Thanh Toán",
                                            }).then((result) => {
                                                window.location.href = url;
                                            })
                                            break;
                                    }
                                }
                            })
                        } else {
                            data.payment_status = 'not paid';
                            $.ajax({
                                url: 'http://localhost:3000/components/sendMail.php',
                                type: 'POST',
                                data: data,
                                success: (response) => {
                                    console.log(response);
                                    switch (response) {
                                        case "success":
                                            Swal.fire({
                                                icon: 'success',
                                                title: "Đặt Hàng Thành Công",
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = 'home.php';
                                                }
                                            })
                                            break;
                                        default:
                                            Swal.fire({
                                                title: 'Một trong số sản phẩm của bạn không đủ số lượng',
                                                icon: 'error',
                                                confirmButtonText: 'OK',
                                            })
                                            break;
                                    }
                                }
                            })
                        }
                    }
                }
            })
        })
        init().then(() => {
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('vnp_TransactionStatus');
            if (id == '00' && id != null) {

                var total = urlParams.get('vnp_Amount');
                var data = {
                    id: decodedSessionValue.user_id,
                    name: $('#fullName').val(),
                    phone: $('#phone').val(),
                    address: $('#address').val(),
                    shipping: $('#shipping').val(),
                    message: $('#message').val(),
                    totalOrder: $('#totalOrder').text(),
                    payment: "banking",
                    payment_status: 'paid',
                    action: 'checkout'
                }
                console.log(data);
                $.ajax({
                    url: 'http://localhost:3000/components/sendMail.php',
                    type: 'POST',
                    data: data,
                    success: (response) => {
                        console.log(response);
                        switch (response) {
                            case "success":
                                Swal.fire({
                                    icon: 'success',
                                    title: "Đặt Hàng Thành Công",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'home.php';
                                    }
                                })
                                break;
                            default:
                                Swal.fire({
                                    title: 'Có gì đó sai sót',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                })
                                break;
                        }
                    }
                })
            }
            if (id != '00' && id != null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Thanh Toán Thất Bại',
                })
            }
        });
    </script>
</body>

</html>