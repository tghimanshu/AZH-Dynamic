<?php include('../config/db.php') ?>
<?php include('../config/mail.php') ?>

<?php 
session_start();
if(isset($_SESSION['username'])){
  if($_SESSION['role'] == 'advisors'){
    $username = $_SESSION['username'];
  }else {
    header('Location: ../advisor-registration.php?type=login'); 
  }
} else {
  header('Location: ../advisor-registration.php?type=login'); 
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $title; ?></title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/vendor/remixicon/remixicon.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.css">
    <link
      rel="stylesheet"
      href="../assets/vendor/bootstrap/css/bootstrap.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="/">AZH ADVISOR PANEL</a>
      <button
        class="btn btn-link btn-sm order-1 order-lg-0"
        id="sidebarToggle"
        href="#"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar-->
      <ul class="navbar-nav ml-auto mr-0">
      <li class="nav-item">
            <a class="btn btn-danger" href="login.php?logout=true">Logout</a></li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Core</div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Dashboard
              </a>
              <a class="nav-link" href="editAdvisors.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Edit Profile
              </a>
              <a class="nav-link" href="bookings.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Bookings
              </a>
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $username; ?>
          </div>
        </nav>
      </div>

      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h1 class="mt-4"><?php echo explode('|',$title)[0]; ?></h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">
                Home &gt;
                <?php echo explode('|',$title)[0]; ?>
              </li>
            </ol>
          </div>