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

        a {
            text-decoration: none;
        }

        .main {

            background-color: #eee;
        }
        .forgetPass{
            font-weight: bolder;
        }
        .forgetPass:hover {
            cursor: pointer;
        }
    </style>
</head>

<body class="main">
    <section style="margin-top: 100px;">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <h2 class="text-center">Chào mừng bạn đến với HOHA Phone</h2>
                    <a href="home.php" class="text-center">
                        <h3>Quay Lại Trang Chủ</h3>
                    </a>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>
                        <!-- Email input -->
                        <div class="form-group mb-4">
                            <label for="email" class="d-flex gap-2">
                                <span>Email</span>
                                <span class="text-danger d-none signInFail">Email hoặc mật khẩu không đúng</span>
                            </label>

                            <input type="email" id="email" class="form-control form-control-lg" placeholder="Email">
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-3">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" id="password" class="form-control form-control-lg" placeholder="Mật Khẩu">
                        </div>

                        <div class="form-group mb-3">
                            <a class="text-body forgetPass" id="forgotPassword" data-bs-toggle="modal" data-bs-target="#exampleModal">Quên Mật Khẩu?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="button" class="btn btn-primary btn-lg signInBtn" style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng Nhập</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Chưa Có Tài Khoản? <a href="signUp.php" class="link-danger">Đăng Kí</a></p>
                        </div>
                    </form>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Quên Mật Khẩu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="emailGetPass">
                                                <span>Nhập Email:</span>
                                                <span id="wrongEmail" class="text-danger d-none ml-3">Email Không Đúng</span>
                                            </label>
                                            <input type="text" id="emailGetPass" class="form-control" placeholder="Nhập Email của bạn" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary sendRequest">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>
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
            $(".signInBtn").click(function() {
                var checkbox = $("#remember-me")[0];
                var data = new FormData();
                data.append('email', $('#email').val());
                data.append('password', $('#password').val());
                data.append('action', "signIn");
                $.ajax({
                    url: 'http://localhost:3000/database/controller/userController.php',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        switch (response) {
                            case "success":
                                window.location.href = 'home.php';
                                break;
                            default:
                                $('#password').val('');
                                $(".signInFail").removeClass('d-none').addClass('d-block');
                                break;
                        }
                    }
                });
            });
            $('.sendRequest').click(function() {
                var data = new FormData();
                data.append('email', $('#emailGetPass').val());
                data.append('action', "forgotPassword");
                $.ajax({
                    url: 'http://localhost:3000/components/sendMail.php',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        switch(response){
                            case "success":
                                $('#wrongEmail').addClass('d-none');
                                Swal.fire({
                                    icon: 'success',
                                    title: "Mật khẩu đã được gửi đến gmail. Kiểm Tra Gmail Của bạn",
                                    confirmButtonText: 'Ok',
                                })
                                break;
                            default:
                                $('#wrongEmail').removeClass('d-none');
                                break;
                        }
                    }
                });
            })
        });
    </script>
</body>

</html>