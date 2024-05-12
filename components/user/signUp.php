<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <style>
        #login .container #login-row #login-column #login-box {
            margin-top: 70px;
            border-radius: 4px;
            border: 1px solid var(--gray-100, #E4E7E9);
            background: var(--gray-00, #FFF);
            box-shadow: 0px 8px 40px 0px rgba(0, 0, 0, 0.12);
        }


        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
    </style>

</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Kí Để Trải Nghiệm Tại HOHA Phone</p>
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <form class="mx-1 mx-md-4">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="username">
                                                    Tên Người Dùng
                                                    <span id="existUsername" class="text-danger d-none">Tên người dùng đã tồn tại</span>
                                                </label>
                                                <input type="text" id="username" class="form-control" placeholder="Tên Người Dùng" />
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="phone">
                                                    Số Điện Thoại
                                                    <span id="wrongPhone" class="text-danger d-none">Điện Thoại phải có 10 chữ số</span>
                                                    <span id="existPhone" class="text-danger d-none">Điện Thoại đã tồn tại</span>
                                                </label>
                                                <input type="text" id="phone" class="form-control" placeholder="Số Điện Thoại" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="email">
                                                    Email
                                                    <span id="wrongEmail" class="text-danger d-none">Email không đúng form</span>
                                                    <span id="existEmail" class="text-danger d-none">Email đã tồn tại</span>
                                                </label>
                                                <input type="email" id="email" class="form-control" placeholder="Email" />

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="password">
                                                    Mật Khẩu
                                                    <span id="wrongPassword" class="text-danger d-none">Mật khẩu ít nhất 6 kí tự bao gồm chữ và số</span>
                                                </label>
                                                <input type="password" id="password" class="form-control" placeholder="Mật Khẩu" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="confirmPassword">
                                                    Xác Nhận Mật Khẩu
                                                    <span id="wrongConfirmPassword" class="text-danger d-none">Mật Khẩu Không Khớp</span>
                                                </label>
                                                <input type="password" id="confirmPassword" class="form-control" placeholder="Xác Nhận Mật Khẩu" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" class="btn btn-primary btn-lg signUpBtn">Đăng Kí</button>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <p class="small fw-bold mt-2 pt-1 mb-0">Đã Có Tài Khoản? <a href="signIn.php" class="link-danger"> Đăng Nhập</a></p>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary d-none" id="verify" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác Thực Tài Khoản</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="code">
                                                    <span>Nhập Mã Xác Thực:</span>
                                                    <span id="wrongCode" class="text-danger d-none ml-3">Mã Xác Thực Không Đúng</span>
                                                </label>
                                                <input type="text" id="code" class="form-control" placeholder="Nhập Mã Xác Thực" />
                                            </div>
                                            <button class="btn btn-info mt-4 text-center" id="refreshToken">Gửi Lại Mã Xác Nhận</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary verifyBtn">Xác Thực</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.signUpBtn').click(function() {
                const isEmpty = (value) => value.trim() === '';
                const fields = ['email', 'password', 'username', 'phone', 'confirmPassword'];
                fields.forEach((field) => {
                    const element = $(`#${field}`);
                    element.toggleClass('is-invalid', isEmpty(element.val()));
                });

                if (fields.some((field) => isEmpty($(`#${field}`).val()))) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Điền đầy đủ thông tin',
                    });
                } else {
                    const EMAIL_REGEX = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    const PASSWORD_REGEX = /^(?=.*[0-9])(?=.*[a-zA-Z]).{6,20}$/;
                    const PHONE_REGEX = /^\d{10}$/;

                    const checkEmail = (email) => EMAIL_REGEX.test(email);
                    const checkPassword = (password) => PASSWORD_REGEX.test(password);
                    const checkPhone = (phone) => PHONE_REGEX.test(phone);

                    const wrongEmail = $('#wrongEmail');
                    const existEmail = $('#existEmail');
                    const wrongPassword = $('#wrongPassword');
                    const wrongConfirmPassword = $('#wrongConfirmPassword');
                    const wrongPhone = $('#wrongPhone');
                    const existPhone = $('#existPhone');
                    const existUsername = $('#existUsername');

                    const checkEmailValid = checkEmail($('#email').val());
                    const checkPasswordValid = checkPassword($('#password').val());
                    const checkPhoneValid = checkPhone($('#phone').val());
                    const checkConfirmPasswordValid = $('#password').val() == $('#confirmPassword').val();

                    wrongEmail.toggleClass('d-none', checkEmailValid);
                    wrongPassword.toggleClass('d-none', checkPasswordValid);
                    wrongPhone.toggleClass('d-none', checkPhoneValid);
                    wrongConfirmPassword.toggleClass('d-none', checkConfirmPasswordValid);

                    if (checkEmailValid && checkPhoneValid && checkPasswordValid && checkConfirmPasswordValid) {
                        const data = new FormData();
                        data.append('email', $('#email').val());
                        data.append('phone', $('#phone').val());
                        data.append('username', $('#username').val());
                        data.append('password', $('#password').val());
                        data.append('action', 'signUp');
                        $.ajax({
                            url: 'http://localhost:3000/components/sendMail.php',
                            type: 'POST',
                            data: data,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                console.log(response);
                                switch (response) {
                                    case 'success':
                                        $('#verify').click();
                                        break;
                                    default:
                                        existEmail.toggleClass('d-none', !response.includes('existemail'));
                                        existUsername.toggleClass('d-none', !response.includes('existusername'));
                                        existPhone.toggleClass('d-none', !response.includes('existphone'));
                                        Swal.fire({
                                            title: 'Có gì đó sai sót',
                                            icon: 'error',
                                            confirmButtonText: 'OK',
                                        });
                                        break;
                                }
                            },
                        });
                    }
                }
            });

            $('#refreshToken').click(function() {
                const data = new FormData();
                data.append('email', $('#email').val());
                data.append('username', $('#username').val());
                data.append('action', 'refreshToken');
                $.ajax({
                    url: 'http://localhost:3000/components/sendMail.php',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        switch (response) {
                            case 'success':
                                Swal.fire({
                                    icon: 'success',
                                    title: "Gửi Lại Thành Công. Kiểm Tra Gmail Của bạn",
                                    confirmButtonText: 'Ok',
                                })
                                break;
                            default:
                                Swal.fire({
                                    title: 'Có gì đó sai sót',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                });
                                break;
                        }
                    },
                });
            })

            $('.verifyBtn').click(function() {
                const data = new FormData();
                data.append('email', $('#email').val());
                data.append('username', $('#username').val());
                data.append('action', 'verifyToken');
                $.ajax({
                    url: 'http://localhost:3000/components/sendMail.php',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        let result = JSON.parse(response);
                        if (+result[0].token == +$('#code').val()) {
                            $('#wrongCode').addClass('d-none');
                            const dataSend = {
                                email: $('#email').val(),
                                username: $('#username').val(),
                                action: 'updateStatusAccount',
                            }
                            $.ajax({
                                url: 'http://localhost:3000/components/sendMail.php',
                                type: 'POST',
                                data: dataSend,
                                success: function(response) {
                                    console.log(response);
                                    switch (response) {
                                        case 'success':
                                            Swal.fire({
                                                icon: 'success',
                                                title: "Xác Thực Thành Công",
                                                confirmButtonText: 'Ok',
                                            })
                                            setTimeout(function() {
                                                window.location.href = 'signIn.php';
                                            }, 2000);
                                            break;
                                    }
                                }
                            })
                        } else {
                            $('#wrongCode').removeClass('d-none');
                        }
                    },
                });
            })
        });
    </script>
</body>

</html>