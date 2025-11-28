<?php
/**
 * Feedback Form Page.
 *
 * This page displays a feedback form based on the 'id' GET parameter.
 * It handles form submission, stores feedback in the database, and sends a certificate to the user via email.
 */
$page_title = 'FeedBack';
?>
<?php require('config/certificate.php'); ?>
<?php 

if(!isset($_GET['id'])){
    header('Location: index.php');
}
?>
<?php require('header.php') ?>
<?php 
// Display success or error messages based on 'type' GET parameter
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'thanks'){
        echo 'thanks';
    }
    if ($_GET['type'] == 'error'){
        echo 'error';
    }
}
?>
<?php 
// Handle feedback form submission
if(isset($_POST['submit'])){
    $form_id = $_POST['form_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $session_review = $_POST['session_review'];
    $session_ratings = $_POST['session_ratings'];
    $experience = $_POST['experience'];
    // $future_updates = $_POST['future_updates'];
    $free_benefit = $_POST['free_benefit'];
    // $investor_forum = $_POST['investor_forum'];
    $portfolio_review = $_POST['portfolio_review'];
    // if(mysqli_query($conn, "INSERT INTO `feedbacks` VALUES (null, '$form_id', '$name', '$email','$contact', '$session_review', $session_ratings, '$experience', '$future_updates', '$free_benefit', '$investor_forum');") or die(mysqli_error($conn))){
    if(mysqli_query($conn, "INSERT INTO `feedbacks` VALUES (null, '$form_id', '$name', '$email','$contact', '$session_review', $session_ratings, '$experience', '', '$free_benefit', '', '$portfolio_review');") or die(mysqli_error($conn))){
        mail_certificate($name, $email, $form_id);
        // echo "mailed";
        echo "<script>window.location= 'index.php?p=5'</script>";
    }else {
        $error = "Something went wrong, Please Try Again";
        // echo "<script>window.location= 'feedback.php?type=error'</script>";
    }
}
?>
<style>
/* form> div {
    background: #efefef;
    padding: 20px 20px;
    margin-bottom: 15px; 
    border-radius: 10px;
}
input {
    background:red;
} */
</style>

<div class="p-title">
  <section class="p-title-inner py-5">
    <div class="container d-flex justify-content-center">
      <h1>FeedBack Form</h1>
    </div>
  </section>
</div>
<div class="">
    <?php 
    if(isset($_GET['id'])){
        $query = mysqli_query($conn, "SELECT * FROM `feedback_forms` WHERE id = ".$_GET['id']);
        if(mysqli_num_rows($query) == 1) {
            $form = mysqli_fetch_assoc($query);
        }else {
            header('Locaton: index.php');
        }
    }else {
        header('Locaton: index.php');
    }
    ?>
    <div class="container mt-5">
        <div class="feedback_form_title">
            <h4 style="font-family:'Roboto';"><?php echo $form['title'] ?></h4>
            <small>
                <?php echo $form['description'] ?>
            </small>
        </div>
    
        <hr class="mt-2">
        <form class="feedback_form mb-3" action="feedback.php?id=<?php echo $_GET['id'] ?>" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="form_id" value="<?php echo $_GET['id'] ?>">
            <?php //echo ($_SESSION['errorMessage'] == '')? '' : "<div class='alert alert-danger'>".$_SESSION['errorMessage']."</div>"; ?>
            <?php echo isset($error)? "<div class='alert alert-danger'>".$error."</div>" :''; ?>
            <div class="mt-2">
                <label for="name">Name: </label>
                <input required class="form-control" type="text" name="name" id="name" placeholder="Enter Name Here!!">
            </div>
            <div class="mt-2">
                <label for="email">E-Mail: </label>
                <input required class="form-control" type="text" name="email" placeholder="Enter Email Here!!">
            </div>
            <div class="mt-2">
                <label for="contact">Contact: </label>
                <input required class="form-control" type="number" name="contact" placeholder="Enter Contact Here!!">
            </div>
            
            <div class="mt-2">
                <div>How was the Session on Financial Literacy & Investor Education? </div>
                <div class="session-review">
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_good" name="session_review" class="custom-control-input" value="good" checked>
                        <label class="custom-control-label" for="s_r_good">Good</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_better" name="session_review" class="custom-control-input" value="better">
                        <label class="custom-control-label" for="s_r_better">Better</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_excellent" name="session_review" class="custom-control-input" value="excellent">
                        <label class="custom-control-label" for="s_r_excellent">Excellent</label>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <div>Can you rate the knowledge of the Speaker?</div>
                <div class="session-review">
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_1" name="session_ratings" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="s_r_1">1</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_2" name="session_ratings" class="custom-control-input" value="2">
                        <label class="custom-control-label" for="s_r_2">2</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_3" name="session_ratings" class="custom-control-input" value="3">
                        <label class="custom-control-label" for="s_r_3">3</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_4" name="session_ratings" class="custom-control-input" value="4">
                        <label class="custom-control-label" for="s_r_4">4</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="s_r_5" name="session_ratings" class="custom-control-input" value="5">
                        <label class="custom-control-label" for="s_r_5">5</label>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <label for="experience">Can you share your Learning Experience?  </label>
                <input required class="form-control" type="text" name="experience" id="experience" placeholder="Your Learning Experience">
            </div>
            <!-- <div class="mt-2">
                <label>Would you like to inform you about such sessions in Future?</label>
                <div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="f_u_yes" name="future_updates" value="1" class="custom-control-input" checked>
                        <label class="custom-control-label" for="f_u_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="f_u_no" name="future_updates" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="f_u_no">No</label>
                    </div>
                </div>
            </div> -->
            <div class="mt-2">
                <label>Do you want to avail Benefit of Free Goal Base Financial Planning on One to One Basis with our Experts?</label>
                <div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="f_b_yes" name="free_benefit" value="1" class="custom-control-input" checked>
                        <label class="custom-control-label" for="f_b_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="f_b_no" name="free_benefit" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="f_b_no">No</label>
                    </div>
                </div>
            </div>
            <!-- <div class="mt-2">
                <label>Do you want to avail Free Membership of Global Investor Forum by Advisor Zaroori Hai?</label>
                <div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="g_i_yes" name="investor_forum" value="1" class="custom-control-input" checked>
                        <label class="custom-control-label" for="g_i_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="g_i_no" name="investor_forum" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="g_i_no">No</label>
                    </div>
                </div>
            </div> -->
            <div class="mt-2">
                <label>Do you wish to do your portfolio review ?</label>
                <div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="g_i_yes" name="portfolio_review" value="1" class="custom-control-input" checked>
                        <label class="custom-control-label" for="g_i_yes">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control">
                        <input required type="radio" id="g_i_no" name="portfolio_review" value="0" class="custom-control-input">
                        <label class="custom-control-label" for="g_i_no">No</label>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-block mt-5">Submit</button>
        </form>
        <small><?php echo $form['call_to_action'] ?></small>
    </div>
</div>

<?php require('footer.php') ?>