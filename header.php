<?php //require('config/db.php') ?>

<?php 
require('config/db.php');
require('config/mail.php');
session_start();
if(!isset($_SESSION['role'])){
  $_SESSION['role'] = 'guest';
}

if(isset($_POST['form_func'])) {
  function login_form($table_name, $conn){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = md5(mysqli_real_escape_string($conn, $_POST['pwd']));
    $result = mysqli_query($conn, "SELECT * FROM `$table_name` WHERE (email = '$email' OR username = '$email') AND pass = '$pwd';") or die(mysqli_errno($conn));
    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $table_name;
        if($table_name == 'advisors'){
          header('Location: advisor/');
        } else {
          header('Location: account.php');
        }
    }else {
      echo "<script>window.location = 'index.php?p=4';</script>";
      // die('error'.mysqli_error($conn));
    }
  }
  function register_form($table_name, $conn){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = md5(mysqli_real_escape_string($conn, $_POST['pwd']));
    $cpwd = md5(mysqli_real_escape_string($conn, $_POST['cpwd']));
    if($pwd != $cpwd) {
      die("Password Dont match");
    }
    $result = mysqli_query($conn, "INSERT INTO `$table_name` (`name`, `username`, `email`, `pass`) VALUES ('$name','$username','$email','$pwd');") or die(mysqli_errno($conn));
    if($result){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $table_name;
        if($table_name == 'advisors') {
          reg_mail_advisor($email, $name);
          header('Location: advisor/editAdvisor.php?complete=true');
        }else {
          reg_mail_user($email, $name);
          header('Location: index.php');
        }
    }else {
      // die('error'.mysqli_error($conn));
    }
  }
  switch($_POST['form_func']){
    case 'advisors_login':
      login_form('advisors', $conn);
    break;
    case 'users_login':
      login_form('users', $conn);
      break;
    case 'advisors_register':
      register_form('advisors', $conn);
      break;
    case 'users_register':
      register_form('users', $conn);
      break;

  }
  // login_form('advisors', $conn);

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="description" content="Re-emphasizing the importance of ADVISORS" />
    <meta property="og:title" content="Your Growth Our Advice" />
    <meta property="og:url" content="http://advisorzaroorihai.com" />
    <meta property="og:description" content="Re-emphasizing the importance of ADVISORS">
    <meta property="og:image" content="http://advisorzaroorihai.com/assets/img/site-logo-white.png">




    <meta name="keywords" content="advisor, zaroori, advisory, acbm" />
    <?php if(isset($page_title) && $page_title == 'Home'){ ?>
      <title>Your Growth Our Advice</title>
    <?php }else { ?>
      <title><?php echo isset($page_title) ? $page_title : 'AZH'; ?> | Advisor Zaroori Hai</title>
    <?php } ?>
    <!-- Favicons -->
    <link rel="icon" href="assets/img/site-logo.ico" />
    <link rel="apple-touch-icon" href="assets/img/site-logo.png" />
    <!-- bootstrap -->
    <link
      rel="stylesheet"
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
    />
    <!-- icefont -->
    <link rel="stylesheet" href="assets/vendor/icofont/icofont.min.css" />
    <!-- remixicon -->
    <link rel="stylesheet" href="assets/vendor/remixicon/remixicon.css" />
    <!-- boxicons -->
    <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css" />
    <!-- owl carousel -->
    <link
      rel="stylesheet"
      href="assets/vendor/owl.carousel/assets/owl.carousel.min.css"
    />
    <!-- venobox -->
    <link rel="stylesheet" href="assets/vendor/venobox/venobox.css" />
    <!-- aos -> Animate on Scroll -->
    <link rel="stylesheet" href="assets/vendor/aos/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/custom.css" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167471153-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-167471153-1');
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/sweetAlert_funcs.js"></script>
  </head>
  <body>
    <!----------------------
              HEADER
     ----------------------->

    <!-- #region Header -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">
        <div class="logo mr-auto">
          <!-- <h1 class="text-light">
            <a href="index.html"><span>A. Z. H. </span></a>
          </h1> -->
          <!-- below code to be uncommented if an img file to be used -->
          <a href="index.php"
            ><img class="site-logo" src="assets/img/site-logo.png" alt=""
          /></a>
        </div>
        <!-- .logo .mr-auto -->
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="<?php echo ($page_title == 'Advisors')?'active':''; ?>"><a href="advisors.php">Advisors</a></li>
            <li class="<?php echo ($page_title == 'About Us')?'active':''; ?>"><a href="page.php?name=about-us">About Us</a></li>
            <li class="<?php echo ($page_title == 'E-Learning')?'active':''; ?>"><a href="e-learning.php">E-Learning</a></li>
            <li class="<?php echo ($page_title == 'Knowledge Base')?'active':''; ?>"><a href="page.php?name=knowledge-base">Knowledge Base</a></li>
            <!-- different look -->
            <li class="get-started">
              <?php if($_SESSION['role']=='users'){ ?>
                <a href="account.php">My Bookings</a>
              <?php }else if($_SESSION['role']=='advisors') { ?>
                <a href="advisor/">My Account</a>
              <?php } else { ?>
                <a data-toggle="modal" data-target="#loginPopup">Login/Register</a>
                <?php }  ?>
            </li>
          </ul>
        </nav>
        <!-- .nav-menu -->
      </div>
      <!-- container -->
    </header>
    <!-- #endregion Header -->
    