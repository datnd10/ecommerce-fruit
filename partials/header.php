<?php header("Cache-Control: no-cache, no-store, must-revalidate"); ?>
<!-- <style>
    .dropdown-menu a:hover {
        color: inherit !important;
        /* Use !important to override Bootstrap styles */
        text-decoration: none !important;
        /* Optional: Remove underline on hover */
    }

    .dropdown-toggle::after { 
            content: none; 
        } 
</style>

<div style="background-color: #1B6392;">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <div class="logo col-md-2">
            <a href="home.php"><img src="../../assets/images/hoha-logo.png" alt="Logo" style="height: 80px; width: 190px; object-fit: cover;"></a>
        </div>
        <div class="search col-md-6">
            <input type="text" id="search" placeholder="Tìm kiếm sản phẩm..." style="padding: 10px 15px; width: 100%;">
        </div>

        <?php
        // Start the session
        session_start();

        if (!isset($_SESSION['account'])) {
            echo "<div class='user col-md-2 d-flex gap-2'>
                    <a href='signIn.php'><button class='btn btn-success'>Đăng Nhập</button></a>
                    <a href='signup.php'><button class='btn btn-info'>Đăng Kí</button></a>
                </div>";
            $data = 'null';
        } else {
            $jsonData = $_SESSION['account'];
            $data = json_decode($jsonData, true);
            $username = $data[0]['username'];
            $image = $data[0]['avatar'];
            $role = $data[0]['role'];

            echo "<div class='col-md-2 d-flex align-items-center justify-content-between'>
                    <a href='cart.php' id='cartLink' style='text-decoration: none; color: inherit;'>
                        <i class='mdi mdi-cart' style='font-size: 35px'></i>
                    </a>
                    <div class='dropdown'>
                        <button class='btn dropdown-toggle d-flex gap-3 align-items-center justify-content-center border border-secondary p-2' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <div class='username'>$username</div>
                            <img src='../../database/uploads/$image' style='width: 20px; height: 20px; border-radius: 50%' />
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a href='information.php' class='dropdown-item'>Thông tin cá nhân</a>";

            if ($role == 0) {
                echo "<a href='/components/admin/dashBoard.php' class='dropdown-item'>Quản lý cửa hàng</a>";
            }

            echo "<a href='historyPurchase.php' class='dropdown-item'>Lịch sử mua hàng</a>
                    <a href='changePassword.php' class='dropdown-item'>Đổi mật khẩu</a>
                    <a class='dropdown-item logout' href='#'>Đăng xuất</a>
                </div>
            </div>
        </div>";
        }
        ?>
    </div>
</div>

<script>
    const logout = document.querySelector('.logout');
    if (logout) {
        logout.onclick = function() {
            const data = new FormData();
            data.append('action', 'view');
            $.ajax({
                url: 'http://localhost:3000/database/controller/userController.php',
                type: 'GET',
                data: {
                    action: 'logOut',
                },
                success: (response) => {
                    location.reload();
                }
            })
        }
    }

    const btnSearch = document.querySelector('#search');
    btnSearch.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            viewAll();
        }
    });

</script> -->


<!-- Spinner Start -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="home.php" class="navbar-brand">
                <h1 class="text-primary display-6">Fruitables</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="home.php" class="nav-item nav-link">Home</a>
                    <a href="shop.php" class="nav-item nav-link active">Shop</a>
                    <a href="detailProduct.php" class="nav-item nav-link">Shop Detail</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="cart.php" class="dropdown-item">Cart</a>
                            <a href="checkout.php" class="dropdown-item">Chackout</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            <a href="404.php" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button> -->
                    <a href="cart.php" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                    </a>
                    <a href="#" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Modal Search Start -->
<!-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal Search End -->


<!-- Single Page Header start -->
<div class="py-5">
    <!-- <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol> -->
</div>
<!-- Single Page Header End -->