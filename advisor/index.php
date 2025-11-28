<?php
/**
 * Advisor Dashboard.
 *
 * This page displays the advisor's dashboard, showing their profile details and approval status.
 * It provides a link to edit profile details.
 */
$title = 'Dashboard | AZH'
?>

<?php include('header.php') ?>

<?php 
$username = $_SESSION['username'];
$results = mysqli_query($conn, "SELECT * FROM advisors WHERE username = '$username';");
// $solutions = mysqli_fetch_assoc($results);

?>
    <?php $advisor = mysqli_fetch_assoc($results); ?>
<?php if($advisor['approved'] == '0'){
    echo "<div class='alert alert-warning'>Your Account is not yet approved!</div>";
} ?>
<section class="container row">
    <div class="col-12 col-lg-4">
        <img style="width:100%;height:auto" src="images/<?php echo $advisor['username']; ?>/<?php echo $advisor['profile_pic'] ?>" alt="Profile_Pic">
    </div>
    <div class="personal-details col-12 col-lg-8">
        <div>
            <p class="font-weight-bold mr-4 mb-3">Name: </p> 
            <p><?php echo $advisor['name']; ?></p>
        </div>
        <div>
            <p class="font-weight-bold mr-4 mb-3">Experience: </p> 
            <p><?php echo $advisor['experience']; ?> years</p>
        </div>
        <div>
            <p class="font-weight-bold mr-4 mb-3">My Expertise: </p> 
            <p><?php echo $advisor['position']; ?></p>
        </div>
        <div>
            <p class="font-weight-bold mr-4 mb-3">SEBI Registration Number: </p> 
            <p><?php echo $advisor['reg_no']; ?></p>
        </div>
        <div>
            <p class="font-weight-bold mr-4 mb-3">Location: </p> 
            <p><?php echo $advisor['location']; ?></p>
        </div>
        <div>
            <p class="font-weight-bold mr-4 mb-3">Summary: </p> 
            <p><?php echo $advisor['name']; ?></p>
        </div>
        <div>
            <p class="font-weight-bold mr-4 mb-3">Approved: </p> 
            <p><?php echo ($advisor['approved'] == '1')?'Yes': 'No'; ?></p>
        </div>
        <a href="editAdvisors.php" class="btn btn-primary">Edit Details</a>
    </div>
</section>


<?php include('footer.php') ?>