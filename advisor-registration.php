<?php
/**
 * Advisor Registration and Login Page.
 *
 * This page handles advisor registration and login.
 * It displays the registration or login form based on the 'type' GET parameter.
 * It also handles file uploads for profile pictures and validates SEBI registration numbers.
 */
$page_title = 'Home';
?>
<?php include('header.php') ?>

<?php 

$_SESSION['errorMessage'] = '';

// Handle advisor registration form submission
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $pass = md5(mysqli_real_escape_string($conn, $_POST['pass']));
    $cpass = md5(mysqli_real_escape_string($conn, $_POST['cpass']));
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    
    $query = mysqli_query($conn, "SELECT * FROM `advisors` WHERE username = '$username';");
    $query2 = mysqli_query($conn, "SELECT * FROM `advisors` WHERE email = '$email';");
    if(mysqli_num_rows($query) != 0){
        $_SESSION['errorMessage'] = "Username Already Taken!";
    }else if(mysqli_num_rows($query2) != 0){
        $_SESSION['errorMessage'] = "E-ail Already Register, Please Login Instead!";
    }else if(strlen($contact) < 10 || strlen($contact) > 12){
        $_SESSION['errorMessage'] = "Enter Valid Contact Number!";
    }else if(preg_match("/^[A-Za-z]{3}[0-9]{9}$/i", $reg_no) != 1){
        $_SESSION['errorMessage'] = "Invalid format for SEBI Registration Number!";
    }else if($pass != $cpass) {
        $_SESSION['errorMessage'] = "Passwords Doesn't Match!";
    }else if(!isset($_FILES['profile_pic'])) {
        $_SESSION['errorMessage'] = "No Profile Pic Inserted!";
    } else {
        if (!is_dir('advisor\\images\\'.$username)){
            mkdir('advisor\\images\\'.$username);
        }
        $upload_url = 'advisor\\images\\'.$username.'\\'.$_FILES['profile_pic']['name'];
        $file_name = $_FILES['profile_pic']['name'];
        list(, $data) = explode(';', $_POST['cropped-image']);
	    list(, $data) = explode(',', $data);
	    file_put_contents($upload_url, base64_decode($data));
        // move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_url);
        mysqli_query($conn, "INSERT INTO `advisors` (username, name, email, contact, pass, location, position, experience, profile_pic, reg_no) VALUES ('$username', '$name', '$email', '$contact', '$pass', '$location', '$position', '$experience', '$file_name', '$reg_no');") or die(mysqli_error($conn));
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'advisors';
        reg_mail_advisor($email, $name);    
        header('Location: index.php?p=1');
    }
}else {
    $username='';
 $name = '';
 $email = '';
 $contact = 0;
 $location='';
 $position ='';
 $reg_no ='';
 $experience = '';
}

?>

<?php
/**
 * Displays the advisor login form.
 *
 * @return void
 */
function login_me(){ ?>

<section id="solutions-hero" class="d-flex align-items-center">
  <div class="container d-flex justify-content-center">
    <h1>Welcome Back, Advisor!</h1>
  </div>
</section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <form id="advisor-login-form" class="col-12 col-lg-6" action="index.php" method="POST">
            <input type="hidden" value="advisors_login" name="form_func">
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
 * Displays the advisor registration form.
 *
 * @return void
 */
function register_me(){ ?>
<?php    
 global $username;
 global $name;
 global $email;
 global $contact;
 global $location;
 global $position ;
 global $reg_no;
 global $experience;
?>
<section id="solutions-hero" class="d-flex align-items-center">
  <div class="container">
    <h1>Welcome To AZH, Advisors!</h1>
  </div>
</section>



<form action="advisor-registration.php" method="POST" class="container" enctype="multipart/form-data">
    <?php echo ($_SESSION['errorMessage'] == '')? '' : "<div class='alert alert-danger'>".$_SESSION['errorMessage']."</div>"; ?>
    <div>
        <label for="username">User Name: </label>
        <input value="<?php echo $username ?>" required class="form-control" type="text" name="username" id="username" placeholder="Enter User Name Here!!">
    </div>
    <div>
        <label for="name">Name: </label>
        <input value="<?php echo $name ?>" required class="form-control" type="text" name="name" id="name" placeholder="Enter Name Here!!">
    </div>
    <div>
        <label for="email">E-Mail: </label>
        <input value="<?php echo $email ?>" required class="form-control" type="text" name="email" id="email" placeholder="Enter Email Here!!">
    </div>
    <div>
        <label for="contact">Contact: </label>
        <input value="<?php echo $contact ?>" required class="form-control" type="number" name="contact" id="contact" placeholder="Enter Contact Here!!">
    </div>
    <div>
        <label for="experience">Experience (In Years): </label>
        <input value="<?php echo $experience ?>" required class="form-control" type="number" name="experience" id="experience" placeholder="Enter Experience!!">
    </div>
    <div>
        <label for="reg_no">SEBI Registration Number: </label>
        <input value="<?php echo $reg_no ?>" required class="form-control" type="text" name="reg_no" id="reg_no" placeholder="Enter SEBI Registration Number!!">
    </div>
    <div>
        <label for="position">Your Expertise: </label>
        <input value="<?php echo $position ?>" required class="form-control" type="text" name="position" id="position" placeholder="Enter Your Expertise!!">
    </div>
    <div>
        <label for="location">Location: </label>
        <input value="<?php echo $location ?>" required class="form-control" type="text" name="location" id="location" placeholder="Enter Location!!">
    </div>
    <div>
        <label for="pass">Password: </label>
        <input required class="form-control" type="password" name="pass" placeholder="Enter Password!!">
    </div>
    <div>
        <label for="cpass">Confirm Password: </label>
        <input required class="form-control" type="password" name="cpass" placeholder="Confirm Password!!">
    </div>
    <!-- <div>
        <label for="description">Summary: </label>
        <textarea class="form-control" name="summary" id="summary" cols="10" rows="10" ></textarea>
    </div>    -->
    <div class='row'>
        <label for="profile_pic">Profile_pic: </label>
        <input required type="file" accept="image/*" class="form-control js-photo-upload" id="profile_pic" name="profile_pic" >
        <small></small>
    </div> 
    
	<img id="avatar-crop-img" src="" style="width:224px; height:224px; display: none">
	<input id="avatar-crop-input" type="hidden" name="cropped-image">

    <div class="for-check mt-3 mb-1">
        <input type="checkbox" name="terms" id="terms" class="form-check-unput" style="width:1.25rem;height:1.25rem" required>
        <label for="terms" class="form-check-label" style="font-size:1.24rem;">I Agree to the <a href="page.php?name=terms-conditions">Terms & Conditions.</a></label>               
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
</form>


<!-- image cropper -->

<div class="modal fade remove-modal" tabindex="-1" role="dialog" id="cropperModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-positioner">
                <h5>Crop Photo</h5>
                <hr>
                <img style="width: 271px; height: 271px;" class="js-avatar-preview" src="">
                <button class=" m-4 btn btn-primary js-save-cropped-avatar">Save</button>
            </div>
        </div>
    </div>
</div>

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