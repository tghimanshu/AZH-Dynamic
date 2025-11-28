<?php
/**
 * Feedback Management (Admin).
 *
 * This page allows the administrator to view all feedback forms, add new forms (with or without certificates),
 * and view submitted feedbacks. It uses a switch-case structure to handle different views based on the 'type' GET parameter.
 */

if(isset($_GET['type'])){
    if($_GET['type'] == 'add'){
        $type = 'add';
        $title = 'Add Form';
    } else if ($_GET['type'] == 'all') {
        $type = 'all';
        $title = 'FeedBack Forms';
    }else if ($_GET['type'] == 'feedbacks') {
        $type = 'feedbacks';
        $title = 'FeedBacks';
    }else if ($_GET['type'] == 'feedbacks-image') {
        $type = 'feedbacks-image';
        $title = 'FeedBacks Image';
    }
}else {
    $title = 'FeedBack Forms';
    $type = 'all';
}
?>
<?php //$title = 'FeedBack'; ?>
<?php include('header.php'); ?>
<?php 

// Handle form submission for adding a feedback form with a certificate image
if(isset($_POST['submit_image'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $call_to_action = $_POST['call_to_action'];
    if(isset($_FILES['cert'])){
        $upload_url = 'C:\\xampp\\htdocs\\assets\\img\\certificates\\'.implode("-", explode(' ', $_POST['title'])).".png";
        $file_name = implode("-", explode(' ', $_POST['title'])).".png";
        move_uploaded_file($_FILES['cert']['tmp_name'], $upload_url); 
        mysqli_query($conn, "INSERT INTO `feedback_forms` VALUES (null, '$title', '$desc', '$call_to_action','$file_name');") or die(mysqli_error($conn));   
    }
    // if(mysqli_query($conn, "INSERT INTO `feedback_forms` VALUES (null, '$title', '$desc', '$call_to_action');")){
    //     echo "<script>window.location = 'feedback.php';</script>";
    // }else {
    //     die(mysqli_error($conn));
    // }
}
?>
<?php 

// Handle form submission for adding a standard feedback form
if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $call_to_action = $_POST['call_to_action'];
    if(mysqli_query($conn, "INSERT INTO `feedback_forms` VALUES (null, '$title', '$desc', '$call_to_action');")){
        echo "<script>window.location = 'feedback.php';</script>";
    }else {
        die(mysqli_error($conn));
    }
}
?>

<?php
/**
 * Displays all feedback forms.
 *
 * @param mysqli $conn The database connection object.
 * @return void
 */
function all_forms($conn) { ?>
    <div class="container">
        <table class="table">
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
            </tr>
            <?php $query = mysqli_query($conn, "SELECT * FROM `feedback_forms`;"); ?>
            <?php while($form = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?php echo $form['id'] ?></td>
                    <td><?php echo $form['title'] ?></td>
                    <td><?php echo $form['description'] ?></td>
                    <td>
                        <a class="btn btn-success" href="../feedback.php?id=<?php echo $form['id'] ?>">View</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
<?php } ?>
<?php
/**
 * Displays the form to add a new feedback form.
 *
 * @param mysqli $conn The database connection object.
 * @return void
 */
function add_form($conn) { ?>
    <form class="container" action="feedback.php" method="POST">
        <div>
            <label for="title">Title: </label>
            <input required type="text" name="title" class="form-control" id="title">
        </div>
        <div>
            <label for="desc">Description: </label>
            <textarea required type="text" name="desc" class="form-control" id="content"></textarea>
        </div>
        <div>
            <label for="desc">Call To Action: </label>
            <textarea required type="text" name="call_to_action" class="form-control content" id="content_2"></textarea>
            <script>
                CKEDITOR.replace('call_to_action');
                CKEDITOR.add
            </script>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Add Form</button>
    </form>
<?php } ?>
<?php
/**
 * Displays the form to add a new feedback form with a certificate image.
 *
 * @param mysqli $conn The database connection object.
 * @return void
 */
function add_form_image($conn) { ?>
    <form class="container" action="feedback.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="title">Title: </label>
            <input required type="text" name="title" class="form-control" id="title">
        </div>
        <div>
            <label for="desc">Description: </label>
            <textarea required type="text" name="desc" class="form-control" id="content"></textarea>
        </div>
        <div>
            <label for="desc">Call To Action: </label>
            <textarea required type="text" name="call_to_action" class="form-control content" id="content_2"></textarea>
            <script>
                CKEDITOR.replace('call_to_action');
                CKEDITOR.add
            </script>
        </div>
        <div>
            <label for="add_cert">Add Certificate; </label>
            <input type="file" name='cert' id="cert" class="form-control">
        </div>
        <button type="submit" name="submit_image" class="btn btn-success">Add Form</button>
    </form>
<?php } ?>
<?php
/**
 * Displays all submitted feedbacks.
 *
 * @param mysqli $conn The database connection object.
 * @return void
 */
function all_feedbacks($conn){ ?>
    <a class="btn btn-success" href="../config/export.php?table=feedbacks">Export As Excel</button>
    <table class="table table-bordered container">
    <tr>
        <th>Sr. No</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Form Id</th>
        <th>Ratings</th>
        <th>Review</th>
        <th>Action</th>
        
    </tr>
        <?php 
            $feedbacks = mysqli_query($conn, "SELECT * FROM feedbacks");
            $srno = 1;
            while($feedback = mysqli_fetch_assoc($feedbacks)):
        ?>
        <!-- <tr class="<?php// echo ($type == 'advisors' && $solution['approved'] == '0')?'bg-danger':''; ?>"> -->
        <tr>
            <td><?php echo $srno;$srno++; ?></td>
            <td><?php echo $feedback['name'] ?></td>
            <td><?php echo $feedback['email'] ?></td>
            <td><?php echo $feedback['feedback_form_id'] ?></td>
            <td><?php echo $feedback['session_ratings'] ?></td>
            <td><?php echo $feedback['session_review'] ?></td>
            <td>

                <script>
                function feedback_data_<?php echo $feedback['id']; ?>(){

                    Swal.fire({
                            title: '<strong><?php echo $feedback['name']; ?></strong>',
                            html:
                                `<div style='text-align:left'>
                                    <b>Form Id:</b> <?php echo $feedback['feedback_form_id']; ?><br>
                                    <b>Name:</b> <?php echo $feedback['name']; ?><br>
                                    <b>E-Mail:</b> <?php echo $feedback['email']; ?><br>
                                    <b>Contact:</b> <?php echo $feedback['contact']; ?><br>
                                    <b>Session Review:</b> <?php echo $feedback['session_review']; ?><br>
                                    <b>Session Ratings:</b> <?php echo $feedback['session_ratings']; ?><br>
                                    <b>Experience:</b> <?php echo $feedback['experience']; ?><br>
                                    <b>Future Updates:</b> <?php echo ($feedback['future_updates'] == '1')?'Yes':'No'; ?><br>
                                    <b>Free Benefit:</b> <?php echo ($feedback['free_benefit'] == '1')?'Yes':'No'; ?><br>
                                    <b>Free Membership:</b> <?php echo ($feedback['free_membership'] == '1')?'Yes':'No'; ?><br>
                                    <b>Portfolio Review:</b> <?php echo ($feedback['portfolio_review'] == '1')?'Yes':'No'; ?><br>
                                </div>`,
                            showCloseButton: true,
                            focusConfirm: false,
                            confirmButtonText:
                                'Close',
                            confirmButtonAriaLabel: 'Close',
                        });
                }
                </script>
                <button class="btn btn-success" onclick="feedback_data_<?php echo $feedback['id']; ?>()" id="feedback_<?php $feedback['id'] ?>">View</button>
                
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

<?php } ?>

<?php 

switch($type){
    case 'add':
        add_form($conn);
        break;
    case 'all':
        all_forms($conn);
        break;
    case 'feedbacks':
        all_feedbacks($conn);
        break;
    case 'feedbacks-image':
        add_form_image($conn);
        break;
}

?>

<?php include('footer.php'); ?>