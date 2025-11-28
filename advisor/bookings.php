<?php
/**
 * Advisor Bookings Management.
 *
 * This page lists the bookings made by users for the logged-in advisor.
 * It allows the advisor to approve bookings.
 */
$title = 'Bookings | AZH'
?>

<?php include('header.php') ?>
<?php 

// Handle booking approval
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $bk = mysqli_query($conn, "UPDATE `bookings` SET approved = '1' WHERE id = ".$_GET['id']);
    $details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM bookings WHERE id = ". $_GET['id']));
    booking_mail_advisor_approved($conn, $details['user_id'], $details['advisor_id']);
    booking_mail_user_approved($conn, $details['user_id'], $details['advisor_id']);
    echo("<script>location.href = 'bookings.php';</script>");
}

?>
<?php 
$username = $_SESSION['username'];

  $query = mysqli_query($conn, "SELECT id FROM `advisors` WHERE `username` = '$username';");
  $advisor_id = mysqli_fetch_assoc($query)['id'];
$results = mysqli_query($conn, "SELECT * FROM `bookings` WHERE `advisor_id` = $advisor_id;");
// $solutions = mysqli_fetch_assoc($results);

?>


<table class="table table-bordered container">
    <tr>
        <th>Sr. No</th>
        <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Bookings</th>
    </tr>
        <?php 
            while($bookings = mysqli_fetch_assoc($results)):
        ?>
        <tr>
            <td><?php echo $bookings['id'] ?></td>
            <?php 
            $user_id = $bookings['user_id'];
              $query2 = mysqli_query($conn, "SELECT name FROM `users` WHERE `id` = $user_id;");
              $user_name = mysqli_fetch_assoc($query2)['name'];
             ?>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $bookings['b_date'] ?></td>
            <td><?php echo $bookings['b_time'] ?></td>
            <td><?php if($bookings['approved'] == '0'){
                echo "<a class='btn btn-success' href='bookings.php?id=".$bookings['id']."'>Approve</a>";
            }else if ($bookings['approved'] == '1') {
                echo "<span class='alert alert-success'>Approved</span>";
            } ?></td>
            <!-- <td>
                <a href="../solutions.php?id=<?php echo $solution['id'] ?>" class="btn btn-success">View</a>
            </td> -->
        </tr>
        <?php endwhile; ?>
    </table>


<?php include('footer.php') ?>