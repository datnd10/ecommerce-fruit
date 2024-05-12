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
        #togglePassword {
            float: right;
            margin-left: -20px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
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
                        <h2 class="page-title h2"> Quản Lý Nhãn Hàng </h2>
                    </div>
                    <div class="row">
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end mb-3">
                                        <button type="button" class="btn btn-primary addFruitType" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="mdi mdi-plus-circle"></i>
                                        </button>
                                    </div>
                                    <table class="table dataTable table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Tổng Bán</th>
                                                <th>Tổng sản phẩm</th>
                                                <th>Tổng Doanh Thu</th>
                                                <th>Trạng Thái</th>
                                                <th>Ngày tạo</th>
                                                <th>Hành Động</th>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Nhãn Hàng</h5>
                                <button type="button" class="btn-close closeBtn" data-bs-dismiss="modal" aria-label="Close" onclick="removeInformations()"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3">
                                    <input type="text" class="form-control" id="fruitTypeId" hidden>
                                    <div class="col-md-6">
                                        <label for="fruitTypeName" class="form-label">
                                            <span>Tên Nhãn Hàng: </span>
                                            <span id="existFruitTypeName" class="text-danger d-none">Tên Nhãn Hàng đã tồn tại</span>
                                        </label>
                                        <input type="text" class="form-control" id="fruitTypeName" placeholder="Tên Nhãn Hàng">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="removeInformations()">Đóng</button>
                                <button type="button" class="btn btn-primary btnSave">Lưu</button>
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
        function formatVietnameseCurrency(amount) {
            try {
                // Đảm bảo amount là một số
                amount = parseFloat(amount);

                // Sử dụng hàm toLocaleString để định dạng số và thêm dấu phẩy
                formattedAmount = amount.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });

                return formattedAmount;
            } catch (error) {
                return "Số tiền không hợp lệ";
            }
        }
        const showAllFruitTypes = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/fruitTypeController.php',
                type: 'GET',
                data: {
                    action: "view",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    console.log(data);
                    if (data == "No data found") {
                        data = "<h2 style=\"font-style: italic;\">Không có dữ liệu</h2>";
                        $('.dataTable').html(data);
                    } else {
                        $('.bodyTable').empty();
                        data.forEach(function(item) {
                            let money = item.total_revenue ? item.total_revenue : 0;
                            let html = `<tr>
                                                <td>
                                                    <span>${item.fruit_type_name}<span>
                                                </td>
                                                <td>
                                                    <span>${item.total_sold_quantity ? item.total_sold_quantity : 0}</span>
                                                </td>
                                                <td>
                                                    <span>${item.total_product_colors}</span>
                                                </td>
                                                <td>
                                                    <span>${formatVietnameseCurrency(money)}</span>
                                                </td>
                                                <td>
                                                    <span class = "${item.is_active == 1 ? "text-success" : "text-danger"}">${item.is_active == 1 ? "Hoạt Động" : "Đã Khóa"}</span>
                                                </td>
                                                <td>
                                                    <span>${item.created_at}</span>
                                                </td>
                                                <td>
                                                    <div class="userEmail">
                                                        <a onclick="handleUpdate(${item.fruit_type_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-grease-pencil fs-5 text-success"></i></a>`
                            if (item.is_active == 1) {
                                html += `<a onclick="handleAction(${item.fruit_type_id}, 'delete')"><i class="mdi mdi-lock px-3 fs-5 text-danger"></i></a>`
                            } else {
                                html += `<a onclick="handleAction(${item.fruit_type_id}, 'undelete')"><i class="mdi mdi-lock-open px-3 fs-5 text-danger"></i></a>`
                            }
                            html += `
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
        showAllFruitTypes();

        const handleAction = (id, actionType) => {
            let actionTitle, successTitle, confirm;
            if (actionType === 'delete') {
                actionTitle = 'khóa';
                successTitle = 'Khóa thành công';
                confirm = 'Xóa!';
            } else if (actionType === 'undelete') {
                actionTitle = 'mở khóa';
                successTitle = 'Mở khóa thành công';
                confirm = 'Mở!';
            }

            Swal.fire({
                title: `Bạn chắc chắn muốn ${actionTitle} mặt hàng này ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Đóng!',
                confirmButtonText: confirm
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://localhost:3000/database/controller/fruitTypeController.php',
                        type: 'GET',
                        data: {
                            action: "delete",
                            id: id
                        },
                        success: (response) => {
                            Swal.fire({
                                title: successTitle,
                                icon: 'success'
                            }).then((result) => {
                                location.reload();
                            })
                            
                        }
                    })
                }
            })
        }

        const handleUpdate = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/fruitTypeController.php',
                type: 'GET',
                data: {
                    action: "getFruitTypeById",
                    id: id
                },
                success: (response) => {
                    $('.modal-title').html('Cập Nhật Nhãn Hàng');
                    $('.btnSave').addClass('updateBtn');
                    let data = JSON.parse(response);
                    console.log(data);
                    $("#fruitTypeId").val(data[0].fruit_type_id);
                    $("#fruitTypeName").val(data[0].fruit_type_name);
                }
            })
        }

        const removeInformations = function() {
            $(`#fruitTypeName`).val('');
            $(`#fruitTypeName`).removeClass('is-invalid');
            if ($('.btnSave').hasClass('updateBtn')) {
                $('.btnSave').removeClass('updateBtn');
            }
            if ($('.btnSave').hasClass('addBtn')) {
                $('.btnSave').removeClass('addBtn');
            }
            $('#existFruitTypeName').addClass('d-none');
        }

        $('.addFruitType').on('click', function() {
            $('.modal-title').html('Thêm Nhãn Hàng Mới');
            $('.btnSave').addClass('addBtn');
        })

        function handleUserAction(action) {
            function isEmpty(value) {
                return value.trim() === '';
            }


            const element = $(`#fruitTypeName`);
            if (isEmpty(element.val())) {
                element.addClass('is-invalid');
            } else {
                element.removeClass('is-invalid');
            }


            if (isEmpty($(`#fruitTypeName`).val())) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Điền đầy đủ thông tin',
                });
            } else {
                const existFruitTypeName = $('#existFruitTypeName');
                const data = new FormData();
                data.append('id', $('#fruitTypeId').val());
                data.append('fruitTypeName', $('#fruitTypeName').val());
                data.append('action', action);
                $.ajax({
                    url: 'http://localhost:3000/database/controller/fruitTypeController.php',
                    type: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        console.log(response);
                        switch (response) {
                            case "success":
                                existFruitTypeName.addClass('d-none');
                                Swal.fire({
                                    icon: 'success',
                                    title: "Cập nhật thành công",
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $('.closeBtn').click();
                                        location.reload();
                                    }
                                })

                                break;
                            default:
                                if (response.includes("existFruitTypeName")) {
                                    existFruitTypeName.removeClass('d-none');
                                } else {
                                    existFruitTypeName.addClass('d-none');
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

        $(document).on('click', '.updateBtn', function() {
            handleUserAction("updateFruitType");
        });

        $(document).on('click', '.addBtn', function() {
            handleUserAction("addFruitType");
        });
    </script>
</body>

</html>