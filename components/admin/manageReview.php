<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
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
    <link rel="stylesheet" href="../../assets/css/datatable.css">
    <style>
        a {
            text-decoration: none;

        }

        .rating {
            display: flex;
            margin-top: -10px;
            flex-direction: row-reverse;
            margin-left: -4px;
            float: left;
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 19px;
            font-size: 25px;
            color: #ffce3d;
            cursor: pointer;

        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }

        input[type="file"] {
            display: none;
        }

        .desc {
            display: block;
            position: relative;
            background-color: #025bee;
            color: #ffffff;
            font-size: 14px;
            text-align: center;
            width: 200px;
            margin-left: 10px;
            padding: 10px 0;
            border-radius: 5px;
            cursor: pointer;
        }

        .upload p {
            text-align: center;
            margin-top: 12px;
            margin-left: 20px;
        }

        #images,
        #imagesUpdate {
            width: 90%;
            position: relative;
            margin: auto;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        img {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        figcaption {
            text-align: center;
            font-size: 1.4vmin;
            margin-top: 0.5vmin;
        }

        select {
            /* for Chrome */
            -webkit-appearance: none;
        }

        /* Responsive Css  */

        @media (max-width: 980px) {
            ul {
                flex-direction: column;
            }

            ul li {
                flex-direction: row;
            }

            ul li .linebar {
                margin: 0 30px;
            }

            .linebar::after {
                width: 5px;
                height: 55px;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                z-index: -1;
            }

            .one::after {
                height: 0;
            }

            ul li .icon {
                margin: 15px 0;
            }
        }

        @media (max-width:600px) {
            .head .head_1 {
                font-size: 24px;
            }

            .head .head_2 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php include '../../partials/navbarAdmin.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include '../../partials/sideBar.php' ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h2 class="page-title h2"> Quản Lý Đơn Hàng</h2>
                    </div>
                    <div class="row">
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table dataTable table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tên Nhãn Hàng</th>
                                                <th scope="col">Tên Sản Phẩm</th>
                                                <th scope="col">Màu Sản Phẩm</th>
                                                <th scope="col">Khách Hàng</th>
                                                <th scope="col">Đánh Giá</th>
                                                <th scope="col">Ngày Đánh Giá</th>
                                                <th scope="col">Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bodyTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Đánh Giá Đơn Hàng</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="main">
                                    <input type="number" class="form-control productId" id="productColorId" name="productColorId" hidden="">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-3">
                                            <img class="img-fluid image" id="myImage" src="" style="width: 150px;height: 150px; object-fit: cover;" />
                                        </div>

                                        <div class="col-sm-6 col-6 text-left">
                                            <div class="col-12"><span>Tên Sản Phẩm: </span><span class="productName"></span></div>
                                            <div class="col-12 mt-3"><span>Màu: </span><span class="color"></span></div>
                                            <div class="col-12 mt-3"><span>Giá: </span><span class="price"></span></div>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6 text-left mb-5">
                                        <label for="star" style="font-weight: bold; display: block">Sao</label>
                                        <div class="rating">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 text-left">
                                        <label for="description" style="font-weight: bold">Miêu Tả</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" disabled></textarea>
                                    </div>
                                    <div class="upload col-md-12">
                                        <div id="images"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <!-- <button type="button" class="btn btn-primary updateBtn">Lưu</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        

        const handleViewComment = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'GET',
                data: {
                    id: id,
                    action: "viewComment",
                },
                success: (response) => {
                    console.log(response);
                    $('.rating').empty();
                    $('.productName').empty();
                    $('.color').empty();
                    $('.price').empty();
                    $('#images').empty();
                    let data = JSON.parse(response);
                    console.log(data);
                    let color = `<span style="display: inline-block; vertical-align: middle; margin-top: -2px;margin-left: 5px;">${data.data[0].color}</span>`;

                    let htmlStar = "";
                    for (var i = 0; i < 5 - data.data[0].star; i++) {
                        htmlStar += `<i class="mdi mdi-star" style="color: #434a54"></i>`;
                    }   
                    for (var i = 0; i < data.data[0].star; i++) {
                        htmlStar += `<i class="mdi mdi-star" style="color: #FA8232"></i>`;
                    }
                    $('.productName').append(data.data[0].product_name)
                    $('.color').append(color);
                    $('.price').html(data.data[0].price + " đ")
                    $('#myImage').attr('src', '../../database/uploads/' + data.data[0].image);
                    $('.rating').append(htmlStar);
                    $('#description').append(data.data[0].content);
                    let image = "";
                    for (var i = 0; i < data.image.length; i++) {
                        image += `<img src="../../database/uploads/${data.image[i].image}" />`
                    }
                    $('#images').append(image);
                }
            })
        }


        const getAllReview = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/reviewController.php',
                type: 'GET',
                data: {
                    action: "getAllReview",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    if (data == "No data found") {
                        data = "<h2 style=\"font-style: italic;\">Không có dữ liệu</h2>";
                        $('.dataTable').html(data);
                    } else {
                        $('.bodyTable').empty();
                        data.forEach(function(item) {
                            let htmlStar = "";
                            for (var i = 0; i < item.rate; i++) {
                                htmlStar += `<i class="mdi mdi-star" style="color: #FA8232"></i>`;
                            }

                            // Loop to add empty stars for the remaining
                            for (var i = 0; i < 5 - item.rate; i++) {
                                htmlStar += `<i class="mdi mdi-star" style="color: #434a54"></i>`;
                            }
                            let html = `<tr>
                                                <td>
                                                    <span>${item.category_name}</span>
                                                </td>
                                                <td>
                                                    <span>${item.product_name}</span>
                                                </td>
                                                <td>                 
                                                    <span style="display: inline-block; vertical-align: middle; margin-top: -2px;margin-left: 5px;">${item.product_color}</span>
                                                </td>
                                                <td>
                                                    <span>${item.user_name}</span>
                                                </td>
                                                <td>
                                                    <span>${item.review_date}</span>
                                                </td>
                                                <td>
                                                    <span>${htmlStar}</span>
                                                </td>
                                                <td>
                                                    <div class="userEmail">
                                                        <a onclick="handleViewComment(${item.review_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-eye fs-5 text-success"></i></a>
                                                    </div>
                                                </td>
                                            </tr>`
                            $('.bodyTable').append(html);
                        })
                        $('.dataTable').DataTable();
                    }
                }
            })
        }
        getAllReview();
    </script>
</body>

</html>