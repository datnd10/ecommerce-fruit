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
            <h1 class="mb-4">Thông tin cá nhân</h1>
            <form action="#">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="form-item col-md-6 col-lg-4 col-xl-4">
                                <label class="form-label my-3">Email: <sup class="text-center text-danger">*</sup>
                                    <span id="wrongEmail" class="text-danger d-none">Email không đúng form</span>
                                    <span id="existEmail" class="text-danger d-none">Email này đã tồn tại</span></label>
                                <input required type="text" class="form-control" placeholder="Email" name="email" id="email">
                            </div>

                            <div class="form-item col-md-6 col-lg-4 col-xl-4">
                                <label class="form-label my-3">Tên người dùng: <sup class="text-center text-danger">*</sup></label>
                                <input required type="text" class="form-control" placeholder="Tên người dùng" disabled name="userName" id="userName">
                            </div>

                            <div class="form-item col-md-6 col-lg-4 col-xl-4">
                                <label class="form-label my-3">Họ và tên: <sup class="text-center text-danger">*</sup></label>
                                <input required type="text" class="form-control" placeholder="Họ tên người nhận" name="fullName" id="fullName">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-item col-md-6 col-lg-4 col-xl-4">
                                <label class="form-label my-3"><span>Số điện thoại<sup class="text-danger">*</sup></span>
                                    <span id="wrongPhone" class="text-danger d-none">Điện Thoại phải có 10 chữ số</span>
                                    <span id="existPhone" class="text-danger d-none">Điện Thoại đã tồn tại</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Số Điện Thoại" required id="phone">
                            </div>
                            <div class="form-item col-md-6 col-lg-8 col-xl-8">
                                <label class="form-label my-3 d-flex justify-content-between">
                                    <span>Địa Chi Nhận Hàng <sup class="text-danger">*</sup></span>
                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-info" style="cursor: pointer">
                                        Chỉnh sửa
                                    </span>
                                </label>
                                <input type="text" class="form-control" placeholder="Địa Chỉ Nhận Hàng" name="address" required id="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-item col-md-3 col-lg-3 col-xl-3">
                                <label for="avatar" class="form-label my-3">Ảnh Đại Diện</label>
                                <input type="file" class="form-control-file" accept="image/*" onchange="loadFile(event)" id="avatar" name="avatar">
                                <img id="avatarDisplay" class="img-fluid rounded-circle border shadow mt-3" style="width: 200px; height: 200px; object-fit: cover;" />
                                <input type="text" class="form-control" id="image" name="image" hidden="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 mb-4 my-4 submitBtn">Lưu Thay đổi</button>

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
        const loadFile = function(event) {
            $('#avatarDisplay')[0].src = URL.createObjectURL(event.target.files[0]);
            $('#avatarDisplay')[0].onload = function() {
                URL.revokeObjectURL($('#avatarDisplay')[0].src);
            };
            $('#image').val(event.target.files[0].name);
        };

        function init() {
            console.log(decodedSessionValue);
            $('#email').val(decodedSessionValue.email);
            $('#userName').val(decodedSessionValue.username);
            $('#fullName').val(decodedSessionValue.fullname);
            $('#phone').val(decodedSessionValue.phone);
            $('#address').val(decodedSessionValue.address);
            $("#avatarDisplay").attr("src", `../../database/uploads/${decodedSessionValue.avatar}`);
            imgDefault = decodedSessionValue.avatar;
        }
        $(document).ready(function() {
            init();
        })

        $('.submitBtn').on('click', function(e) {
            e.preventDefault();
            const wrongEmail = $('#wrongEmail');
            const existEmail = $('#existEmail');
            const wrongPhone = $('#wrongPhone');
            const existPhone = $('#existPhone');

            function isEmpty(value) {
                return value.trim() === '';
            }

            const fields = ['email', 'userName', 'fullName', 'phone', 'address'];

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
                function checkEmail(email) {
                    const EMAIL_REGEX = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    return EMAIL_REGEX.test(email);
                }

                function checkPhone(phone) {
                    const PHONE_REGEX = /^\d{10}$/;
                    return PHONE_REGEX.test(phone);
                }

                const checkEmailValid = checkEmail($('#email').val());
                const checkPhoneValid = checkPhone($('#phone').val());

                wrongEmail.toggleClass('d-none', checkEmail($('#email').val()));
                wrongPhone.toggleClass('d-none', checkPhone($('#phone').val()));

                if (checkEmailValid && checkPhoneValid) {
                    console.log(decodedSessionValue);
                    const data = new FormData();
                    data.append('id', decodedSessionValue.user_id);
                    data.append('email', $('#email').val());
                    data.append('phone', $('#phone').val());
                    data.append('userName', $('#userName').val());
                    data.append('fullName', $('#fullName').val());
                    data.append('address', $('#address').val());

                    let imageInput = $('.form-control-file');
                    if (imageInput.get(0).files.length > 0) {
                        data.append('avatar', imageInput.prop('files')[0]);
                    }
                    data.append('oldImage', imgDefault);
                    data.append('action', 'changeInformation');

                    $.ajax({
                        url: 'http://localhost:3000/database/controller/userController.php',
                        type: 'POST',
                        data: data,
                        contentType: false,
                        processData: false,
                        success: (response) => {
                            console.log(response);
                            switch (response) {
                                case "success":
                                    Swal.fire({
                                        icon: 'success',
                                        title: "Cập nhật thành công",
                                        confirmButtonText: 'Ok',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload();
                                        }
                                    })
                                    existEmail.addClass('d-none');
                                    existPhone.addClass('d-none');
                                    break;
                                default:
                                    if (response.includes("existemail")) {
                                        existEmail.removeClass('d-none');
                                    } else {
                                        existEmail.addClass('d-none');
                                    }
                                    if (response.includes("existphone")) {
                                        existPhone.removeClass('d-none');
                                    } else {
                                        existPhone.addClass('d-none');
                                    }
                                    Swal.fire({
                                        title: 'Có gì đó sai sót',
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                    })
                                    break;
                            }
                        }
                    });
                }
            }
        });
    </script>
</body>

</html>