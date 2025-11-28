<?php
/**
 * User Account/Bookings Page.
 *
 * This page displays the bookings for the currently logged-in user (client).
 * It redirects guests to the login page and advisors to the advisor dashboard.
 */
include('header.php');
?>
<?php 
if($_SESSION['role'] == 'guest'){
  echo "<script>window.location='/client-registration.php?type=login';</script>";
} else if($_SESSION['role'] == 'advisors') {
  echo "<script>window.location='advisor/';</script>";
}
?>

<section id="solutions-hero" class="d-flex align-items-center">
  <div class="container">
    <h1>My Bookings</h1>
  </div>
</section>




<?php 
$username = $_SESSION['username'];

  $query = mysqli_query($conn, "SELECT id FROM `users` WHERE `username` = '$username';");
  $user_id = mysqli_fetch_assoc($query)['id'];
$results = mysqli_query($conn, "SELECT * FROM `bookings` WHERE `user_id` = $user_id;");
// $solutions = mysqli_fetch_assoc($results);

?>


<table class="table table-bordered container">
    <tr>
        <th>Sr. No</th>
        <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Approved</th>
    </tr>
        <?php 
            while($bookings = mysqli_fetch_assoc($results)):
        ?>
        <tr>
            <td><?php echo $bookings['id'] ?></td>
            <?php 
            $advisor_id = $bookings['advisor_id'];
              $query2 = mysqli_query($conn, "SELECT name FROM `advisors` WHERE `id` = $advisor_id;");
              $user_name = mysqli_fetch_assoc($query2)['name'];
             ?>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $bookings['b_date'] ?></td>
            <td><?php echo $bookings['b_time'] ?></td>
            <td><?php echo ($bookings['approved'] == '1')? "<span class='alert alert-success'>Approved</span>":"<span class='alert alert-danger'>Not Approved</span>"; ?></td>
            <!-- <td>
                <a href="../solutions.php?id=<?php echo $solution['id'] ?>" class="btn btn-success">View</a>
            </td> -->
        </tr>
        <?php endwhile; ?>
    </table>


<div class="container">

  <a href="admin/login.php?logout=true" class="btn btn-danger">Log Out</a>
</div>

<?php include('footer.php'); ?>