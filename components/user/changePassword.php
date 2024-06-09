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
            <h1 class="mb-4">Đổi mật khẩu</h1>
            <form action="#">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="form-item">
                            <label class="form-label my-3">Mật khẩu cũ: <sup class="text-center text-danger">*</sup>
                                <span id="wrongPassword" class="text-danger d-none">Mật khẩu không đúng</span> </label>
                            <input required type="password" class="form-control" placeholder="Mật khẩu cũ" name="password" id="password">
                        </div>
                        <div class="form-item ">
                            <label class="form-label my-3"><span>Mật khẩu mới: <sup class="text-danger">*</sup></span>
                                <span id="wrongNewPassword" class="text-danger d-none">Mật khẩu ít nhất 6 kí tự bao gồm chữ và số</span>
                            </label>
                            <input type="password" class="form-control" name="newPassword" placeholder="Mật khẩu mới" required id="newPassword">
                        </div>
                        <div class="form-item ">
                            <label class="form-label my-3">
                                <span>Xác nhận mật khẩu: <sup class="text-danger">*</sup></span>
                                <span id="wrongConfirmPassword" class="text-danger d-none">Mật khẩu ít nhất 6 kí tự bao gồm chữ và số</span>
                                <span id="ConfirmPassword" class="text-danger d-none">Xác nhận mật khẩu không đúng</span>
                            </label>
                            <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="confirmPassword" required id="confirmPassword">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 mb-4 my-4 submitBtn">Lưu Thay đổi</button>
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
        $('.submitBtn').on('click', function(e) {
            e.preventDefault();

            function isEmpty(value) {
                return value.trim() === '';
            }

            const fields = ['password', 'newPassword', 'confirmPassword'];

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
                function checkPassword(password) {
                    const PASSWORD_REGEX = /^(?=.*[0-9])(?=.*[a-zA-Z]).{6,20}$/;
                    return PASSWORD_REGEX.test(password);
                }
                if (!checkPassword($('#newPassword').val()) || !checkPassword($('#confirmPassword').val())) {
                    $('#wrongNewPassword').toggleClass('d-none', checkPassword($('#newPassword').val()));
                    $('#wrongConfirmPassword').toggleClass('d-none', checkPassword($('#confirmPassword').val()));
                } else {
                    $('#wrongNewPassword').addClass('d-none');
                    $('#wrongConfirmPassword').addClass('d-none');
                    if ($('#newPassword').val() != $('#confirmPassword').val()) {
                        $('#ConfirmPassword').removeClass('d-none');
                    } else {
                        $('#ConfirmPassword').addClass('d-none');
                        $.ajax({
                            type: "post",
                            url: "http://localhost:3000/database/controller/userController.php",
                            data: {
                                oldPassword: $('#password').val(),
                                newpassword: $('#newPassword').val(),
                                action: 'changePassword',
                            },
                            cache: false,
                            success: function(response) {
                                console.log(response);
                                switch (response) {
                                    case 'success': {
                                        Swal.fire({
                                            title: 'Cập Nhật thành công',
                                            icon: 'success'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        })

                                    }

                                }
                            }
                        });
                    }
                }
            }
        });
    </script>
</body>

</html>