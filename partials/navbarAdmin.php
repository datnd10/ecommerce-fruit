<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
session_start();
if (!isset($_SESSION['account'])) {
  header("Location: /components/user/signIn.php");
} else {
  $jsonData = $_SESSION['account'];
  $data = json_decode($jsonData, true);
  $fullname = $data[0]['fullname'];
  $image = $data[0]['avatar'];
  $role = $data[0]['role'];
  if ($role != 0) {
    header("Location: /partials/notPermission.php");
  }
}
?>
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="/components/user/home.php"><img src="../../assets/images/hoha-logo.png" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="/components/user/home.php"><img src="../../assets/images/hoha-logo.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="../../database/uploads/<?php echo $image ?>" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black"><?php echo $fullname ?></p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item logout">
            <i class="mdi mdi-logout me-2 text-primary "></i> Đăng Xuất</a>
        </div>
      </li>
    </ul>
  </div>
</nav>