<?php
/**
 * Client Registration and Login Page.
 *
 * This page handles user (client) registration and login.
 * It displays the registration or login form based on the 'type' GET parameter.
 */
$page_title = 'Home';
?>
<?php include('header.php') ?>

<?php 

$_SESSION['errorMessage'] = '';

// Handle registration form submission
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $pass = md5(mysqli_real_escape_string($conn, $_POST['pass']));
    $cpass = md5(mysqli_real_escape_string($conn, $_POST['cpass']));
    
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username';");
    if(mysqli_num_rows($query) != 0){
        $_SESSION['errorMessage'] = "Username Already Taken!";
    }else if($pass != $cpass) {
        $_SESSION['errorMessage'] = "Passwords Doesn't Match!";
    } else { 
        mysqli_query($conn, "INSERT INTO `users` (username, name, email, contact, pass) VALUES ('$username', '$name', '$email', '$contact', '$pass');") or die(mysqli_error($conn));
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'users';
        $_SESSION['popup'] = 'client_reg_success';
        reg_mail_user($email, $name);
        header('Location: index.php?p=2');
    }
}

?>


<?php
/**
 * Displays the user login form.
 *
 * @return void
 */
function login_me(){ ?>

<section id="solutions-hero" class="d-flex align-items-center">
  <div class="container d-flex justify-content-center">
    <h1>Welcome Back, User!</h1>
  </div>
</section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <form id="user-login-form" class="col-12 col-lg-6" action="index.php" method="POST">
            <input type="hidden" value="users_login" name="form_func">
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Enter Username or Email" id="">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="pwd" placeholder="Enter Password" id="">
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-block btn-success" name="submit">Login</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>

<?php
/**
 * Displays the user registration form.
 *
 * @return void
 */
function register_me(){ ?>
<section id="solutions-hero" class="d-flex align-items-center">
  <div class="container">
    <h1>Welcome To AZH, Users!</h1>
  </div>
</section>



<form action="client-registration.php" method="POST" class="container" enctype="multipart/form-data">
    <?php echo ($_SESSION['errorMessage'] == '')? '' : "<div class='alert alert-danger'>".$_SESSION['errorMessage']."</div>"; ?>
    <div>
        <label for="name">User Name: </label>
        <input required class="form-control" type="text" name="username" id="username" placeholder="Enter User Name Here!!">
    </div>
    <div>
        <label for="name">Name: </label>
        <input required class="form-control" type="text" name="name" id="name" placeholder="Enter Name Here!!">
    </div>
    <div>
        <label for="email">E-Mail: </label>
        <input required class="form-control" type="text" name="email" placeholder="Enter Email Here!!">
    </div>
    <div>
        <label for="contact">Contact: </label>
        <input required class="form-control" type="number" name="contact" placeholder="Enter Contact Here!!">
    </div>
    <div>
        <label for="pass">Password: </label>
        <input required class="form-control" type="password" name="pass" placeholder="Enter Password!!">
    </div>
    <div>
        <label for="cpass">Confirm Password: </label>
        <input required class="form-control" type="password" name="cpass" placeholder="Confirm Password!!">
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-block mt-5">Submit</button>
</form>
<?php } ?>


<?php 

if(isset($_GET['type'])){
    switch($_GET['type']){
        case 'login':
            login_me();
            break;
        default:
            register_me();
    }
}else {
    register_me();
}

?>


<?php include('footer.php') ?>