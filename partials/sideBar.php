<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">

        <div class="nav-profile-image">
          <img src="../../database/uploads/<?php echo $image ?>" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?php echo $fullname ?></span>
          <span class="text-secondary text-small">Quản Trị</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashBoard.php">
        <span class="menu-title">Quản Lý Doanh Thu</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manageUser.php">
        <span class="menu-title">Quản Lý Khách Hàng</span>
        <i class="mdi mdi-account-multiple menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Quản Lý Sản Phẩm</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-cube menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="manageCategory.php">Quản Lý Loại Quả</a></li>
          <li class="nav-item"> <a class="nav-link" href="manageFruitType.php">Quản Lý Loại Mặt Hàng</a></li>
          <li class="nav-item"> <a class="nav-link" href="manageProduct.php">Quản Lý Mặt Hàng</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manageOrder.php">
        <span class="menu-title">Quản Lý Đơn Đặt Hàng</span>
        <i class="mdi mdi-file-document menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="manageReview.php">
        <span class="menu-title">Quản Lý Đánh Giá</span>
        <i class="mdi mdi-comment-processing menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>

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
          window.location.href = 'http://localhost:3000/components/user/signIn.php';
        }
      })
    }
  }
</script>