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
                        <h2 class="page-title h2"> Danh Sách Người Dùng</h2>
                    </div>
                    <div class="row">
                        <div class="col grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end mb-3">
                                        <button type="button" class="btn btn-primary addUser" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="mdi mdi-account-plus"></i>
                                        </button>
                                    </div>
                                    <table class="table dataTable table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Số Đơn</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Người Dùng</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="removeInformations()"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3">
                                    <input type="text" class="form-control" id="inputUserid" hidden>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">
                                            <span>Email: </span>
                                            <span id="wrongEmail" class="text-danger d-none">Email không đúng form</span>
                                            <span id="existEmail" class="text-danger d-none">Email này đã tồn tại</span>
                                        </label>
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">
                                            <span>Tên Người Dùng: </span>
                                            <span id="existUsername" class="text-danger d-none">Tên Người Dùng này đã tồn tại</span>
                                        </label>
                                        <input type="text" class="form-control" id="username" placeholder="Tên Người Dùng">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fullname" class="form-label">
                                            <span>Tên đầy đủ:</span>
                                        </label>
                                        <input type="text" class="form-control" id="fullname" placeholder="Tên đầy đủ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Địa Chỉ:</label>
                                        <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone" class="form-label">
                                            <span>Điện Thoại:</span>
                                            <span id="wrongPhone" class="text-danger d-none">Điện Thoại phải có 10 chữ số</span>
                                            <span id="existPhone" class="text-danger d-none">Điện Thoại đã tồn tại</span>
                                        </label>
                                        <input type="text" class="form-control" id="phone" placeholder="Số Điện Thoại">
                                    </div>

                                    <div class="col-md-2">
                                        <label for="role" class="form-label">Quyền:</label>
                                        <select id="role" class="form-select form-select-lg">
                                            <option value="0">Quản trị</option>
                                            <option value="1">Khách</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="avatar" class="col-md-12">Ảnh Đại Diện</label>
                                        <input type="file" class="form-control-file mt-3 col-md-12" accept="image/*" onchange="loadFile(event)" id="avatar" name="avatar">
                                        <img id="avatarDisplay" style="width: 200px;height: 200px;object-fit: cover; border-radius: 50%;margin-top: 10px; border: 1px solid #ccc;" />
                                        <input type="text" class="form-control" id="image" name="image" hidden="">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary closeBtn" data-bs-dismiss="modal" onclick="removeInformations()">Đóng</button>
                                <button type="button" class="btn btn-primary btnSave">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
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
        const loadFile = function(event) {
            $('#avatarDisplay')[0].src = URL.createObjectURL(event.target.files[0]);
            $('#avatarDisplay')[0].onload = function() {
                URL.revokeObjectURL($('#avatarDisplay')[0].src);
            };
            $('#image').val(event.target.files[0].name);
        };

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

        const showAllUsers = () => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/userController.php',
                type: 'GET',
                data: {
                    action: "view",
                },
                success: (response) => {
                    let data = JSON.parse(response);
                    if (data == "No data found") {
                        data = "<h2 style=\"font-style: italic;\">Không có dữ liệu</h2>";
                        $('.dataTable').html(data);
                    } else {
                        $('.bodyTable').empty();
                        data.forEach(function(item) {
                            let money = item.total_amount ? item.total_amount : 0;
                            let html = `<tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="userAvatar">
                                                            <img src="../../database/uploads/${item.avatar}" style="border: 3px solid #fff; border-radius: 100%; max-width: 46px; box-shadow: 0px 0px 15px #0000002b;">
                                                        </div>
                                                        <h4 style="margin-left: 8px; margin-top: 5px;"><a href="#" style="color: #1A1A1A; transition: all 0.3s ease; text-decoration: none;">${item.username}</a></h4>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>${item.email}</span>
                                                </td>
                                                <td>
                                                    <span>${item.total_orders}</span>
                                                </td>
                                                <td>
                                                    <span>${formatVietnameseCurrency(money)}</span>
                                                </td>
                                                <td>
                                                    <span class = "${item.is_active == 1 ? "text-success" : "text-danger"}">${item.is_active == 1 ?"Hoạt Động":"Đã Khóa"}</span>
                                                </td>
                                                <td>
                                                    <span>${item.created_at}</span>
                                                </td>
                                                <td>
                                                    <div class="userEmail">
                                                        <a onclick="handleUpdate(${item.user_id})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-grease-pencil fs-5 text-success"></i></a>`
                            if (item.is_active == 1) {
                                html += `<a onclick="handleAction(${item.user_id}, 'delete')"><i class="mdi mdi-lock px-3 fs-5 text-danger"></i></a>`
                            } else {
                                html += `<a onclick="handleAction(${item.user_id}, 'undelete')"><i class="mdi mdi-lock-open px-3 fs-5 text-danger"></i></a>`
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

        showAllUsers();

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
                title: `Bạn chắc chắn muốn ${actionTitle} tài khoản này ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Đóng!',
                confirmButtonText: confirm
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://localhost:3000/database/controller/userController.php',
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

        let imgDefault = '';
        const handleUpdate = (id) => {
            $.ajax({
                url: 'http://localhost:3000/database/controller/userController.php',
                type: 'GET',
                data: {
                    action: "getUserById",
                    id: id
                },
                success: (response) => {
                    console.log(response);
                    $('.modal-title').html('Cập Nhật Người Dùng');
                    $('.btnSave').addClass('updateBtn');
                    let data = JSON.parse(response);
                    $("#inputUserid").val(data[0].user_id);
                    $("#email").val(data[0].email);
                    $("#username").val(data[0].username);
                    $("#fullname").val(data[0].fullname);
                    $("#phone").val(data[0].phone);
                    $("#address").val(data[0].address);
                    var roleSelect = document.getElementById('role');
                    for (var i = 0; i < roleSelect.options.length; i++) {
                        if (roleSelect.options[i].value == data[0].role) {
                            roleSelect.options[i].selected = true;
                            break;
                        }
                    }
                    $("#avatarDisplay")[0].src = `../../database/uploads/${data[0].avatar}`;
                    imgDefault = data[0].avatar;
                }
            })
        }

        const removeInformations = function() {
            const fields = ['email', 'username', 'fullname', 'phone', 'address', 'role', 'avatar'];
            fields.forEach(field => {
                $(`#${field}`).val('');
                $(`#${field}`).removeClass('is-invalid');
            });
            $('#avatarDisplay')[0].src = '';
            if ($('.btnSave').hasClass('updateBtn')) {
                $('.btnSave').removeClass('updateBtn');
            }
            if ($('.btnSave').hasClass('addBtn')) {
                $('.btnSave').removeClass('addBtn');
            }
            $('#existEmail').addClass('d-none');
            $('#existUsername').addClass('d-none');
            $('#existPhone').addClass('d-none');
            $('#wrongEmail').addClass('d-none');
            $('#existPhone').addClass('d-none');
        }

        $('.addUser').on('click', function() {
            $('.modal-title').html('Thêm Người Dùng Mới');
            $('.btnSave').addClass('addBtn');
        })

        function handleUserAction(action, arrayCheck) {
            const wrongEmail = $('#wrongEmail');
            const existEmail = $('#existEmail');
            const wrongPhone = $('#wrongPhone');
            const existPhone = $('#existPhone');
            const existUsername = $('#existUsername');

            function isEmpty(value) {
                return value.trim() === '';
            }

            const fields = arrayCheck;

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
                    const data = new FormData();
                    data.append('id', $('#inputUserid').val());
                    data.append('email', $('#email').val());
                    data.append('phone', $('#phone').val());
                    data.append('username', $('#username').val());
                    data.append('fullname', $('#fullname').val());
                    data.append('address', $('#address').val());
                    data.append('role', $("#role").val());

                    var imageInput = $('.form-control-file');
                    if (imageInput.get(0).files.length > 0) {
                        data.append('avatar', imageInput.prop('files')[0]);
                    }
                    data.append('oldImage', imgDefault);
                    data.append('action', action);

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
                                    existEmail.addClass('d-none');
                                    existPhone.addClass('d-none');
                                    existUsername.addClass('d-none');
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
                                    if (response.includes("existemail")) {
                                        existEmail.removeClass('d-none');
                                    } else {
                                        existEmail.addClass('d-none');
                                    }
                                    if (response.includes("existusername")) {
                                        existUsername.removeClass('d-none');
                                    } else {
                                        existUsername.addClass('d-none');
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
        }

        $(document).on('click', '.updateBtn', function() {
            handleUserAction("updateUser", ['email', 'username', 'fullname', 'phone', 'address', 'role']);
        });

        $(document).on('click', '.addBtn', function() {
            handleUserAction("addUser", ['email', 'username', 'fullname', 'phone', 'address', 'role']);
        });
    </script>
</body>

</html>