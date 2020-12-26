<?php include('../config/db.php') ?>
<?php include('../config/mail.php') ?>

<?php 
session_start();
if(isset($_SESSION['username'])){
  if($_SESSION['role'] == 'admin') {
    $username = $_SESSION['username'];
  }else {
    header('Location: login.php'); 
  }
} else {
  header('Location: login.php'); 
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
    <link rel="stylesheet" href="../assets/vendor/remixicon/remixicon.css" />
    <link
      rel="stylesheet"
      href="../assets/vendor/bootstrap/css/bootstrap.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>

  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">AZH ADMIN PANEL</a>
      <button
        class="btn btn-link btn-sm order-1 order-lg-0"
        id="sidebarToggle"
        href="#"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar Search-->
      <form
        class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
      >
        <div class="input-group">
          <input
            class="form-control"
            type="text"
            placeholder="Search for..."
            aria-label="Search"
            aria-describedby="basic-addon2"
          />
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="userDropdown"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            ><i class="fas fa-user fa-fw"></i
          ></a>
          <div
            class="dropdown-menu dropdown-menu-right"
            aria-labelledby="userDropdown"
          >
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php?logout=true">Logout</a>
          </div>
        </li>
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
                Solutions
              </a>
              <a class="nav-link" href="addSolutions.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Add Solution
              </a>
              <a class="nav-link" href="feedback.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                FeedBack Forms
              </a>
              <a class="nav-link" href="feedback.php?type=add">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Add FeedBack Form
              </a>
              <a class="nav-link" href="feedback.php?type=feedbacks">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                All FeedBacks
              </a>
              <a class="nav-link" href="users.php?type=advisors">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Advisors
              </a>
              <a class="nav-link" href="users.php?type=users">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Users
              </a>
              <a class="nav-link" href="addAdvisors.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Add Advisors
              </a>
              <a class="nav-link" href="pages.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Pages
              </a>
              <a class="nav-link" href="addPage.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Add Page
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