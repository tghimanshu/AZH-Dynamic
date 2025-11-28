<?php
/**
 * Advisors Listing and Booking Page.
 *
 * This page lists available advisors and allows users to book appointments.
 * It handles the booking form submission and displays individual advisor details.
 */
$page_title = 'Advisors';
?>
<?php include('header.php') ?>

<?php 

// Handle booking form submission
if(isset($_POST['b_submit'])){
  $advisor_id = mysqli_real_escape_string($conn, $_POST['advisor_id']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $b_date = mysqli_real_escape_string($conn, $_POST['b_date']);
  $b_time = mysqli_real_escape_string($conn, $_POST['b_time']);
  // die($b_time);
  $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username';");
  $user = mysqli_fetch_assoc($query);
  $user_id = $user['id'];
  $user_name = $user['name'];
  $user_email = $user['email'];
  $advisor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `advisors` WHERE `id` = $advisor_id"));
  // die($user_id);
  $advisor_name = $advisor['name'];
  $advisor_email = $advisor['email'];
  $result = mysqli_query($conn, "INSERT INTO `bookings` VALUES (NULL, $user_id, $advisor_id, '$b_date', '$b_time', '0');") or die(mysqli_error($conn)."<h1>error</h1>");
  booking_mail_advisor($conn,$user_name, $advisor_name, $b_date, $b_time, $advisor_email);
  booking_mail_user($conn,$user_name, $advisor_name, $b_date, $b_time, $user_email);
  echo "<script>window.location='index.php?p=3';</script>";
}

?>

<?php
/**
 * Displays the list of approved advisors.
 *
 * @param mysqli $conn The database connection object.
 * @return void
 */
function advisors($conn){ ?>
  <?php $result = mysqli_query($conn, "SELECT * FROM advisors WHERE `approved` = '1';"); ?>
  <section id="solutions-hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Advisors</h1>
    </div>
  </section>

  <div class="container mt-0 pt-5">
    <div class="row justify-content-around">
    <?php echo (mysqli_num_rows($result) == 0) ? "<h3>Watchout this space for the finest advisors in India</h3>":""; ?>
    <?php while($advisor = mysqli_fetch_assoc($result)): ?>
        <div class="card advisor col-12 col-lg-5 p-0 mb-3" style="overflow:hidden">
              <img src="advisor/images/<?php echo $advisor['username']; ?>/<?php echo $advisor['profile_pic']; ?>" class="img-fluid" alt="" style="width:220px;height:220px">
              <!-- <div class="advisor_image" style="background-image:url(advisor/images/<?php echo $advisor['username']; ?>/<?php echo $advisor['profile_pic']; ?>)"></div> -->
              <!-- <img src="assets/img/advisors/profile-pic.png" class="img-fluid" style="width: 100%:"> -->
            <div class="card-body pb-0 px-2 py-3 d-flex flex-column justify-content-center">
              <h4 class="font-weight-bold text-uppercase"><a class="text-dark" href="advisors.php?id=<?php echo $advisor['id'] ?>"><?php echo $advisor['name'] ?></a></h4>
              <ul class="list-unstyled">
                <li ><i class="ri-briefcase-4-fill mr-5"></i><span><?php echo $advisor['experience'] ?> years of experience</span></li>
                <li><i class="ri-medal-fill mr-5"></i><span><?php echo $advisor['position'] ?></span></li>
                <li><i class="ri-map-pin-2-fill mr-5"></i><span><?php echo $advisor['location'] ?></span></li>
              </ul> 
              <?php if($_SESSION['role'] == 'users'){ ?>
                <button data-toggle="modal" data-target="#book-<?php echo $advisor['id'];?>" class="btn btn-primary d-inline-block m-auto">Book Appointment</button>
                <?php } else if($_SESSION['role'] == 'advisors') { ?>
                  <button data-toggle="modal" data-target="#book-<?php echo $advisor['id'];?>" class="btn btn-primary d-inline-block m-auto" disabled title="Advisors cannot book Appointments">Book Appointment</button>
                  <?php } else { ?>
                    <button data-toggle="modal" data-target="#loginPopup" class="btn btn-primary d-inline-block m-auto">Book Appointment</button>
                <?php } ?>
            </div><!-- card-body -->
            
        </div><!-- card -->
        <!-- Book Modal -->
        <div class="modal fade" id="book-<?php echo $advisor['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="advisors.php" method="POST" class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content book-apt-popup">
              <div class="inner-apt">
                <input type="hidden" name="advisor_id" value="<?php echo $advisor['id']; ?>">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                <div>
                  <h5>Date:</h5>
                  <input type="date" name="b_date">
                </div>
                <div>
                  <h5>Time:</h5>
                  <input type="time" name="b_time">
                </div>
              </div>
              <button class="btn" type="submit" name="b_submit">Book My AppointMent</button>
            </div>
          </form>
        </div>
        <!-- Book Modal -->
      <?php endwhile; ?>
    </div><!-- row -->
  </div><!-- contaienr -->

<?php } ?>

<!---------------------------------------
                SINGLE ADVISOR
 ---------------------------------------->

<?php
/**
 * Displays details for a single advisor.
 *
 * Fetches advisor details based on the 'id' GET parameter.
 *
 * @param mysqli $conn The database connection object.
 * @return void
 */
function single_advisor($conn){ ?>
  <?php $result = mysqli_query($conn, "SELECT * FROM advisors WHERE id = ".$_GET['id'].";"); ?>
  <?php $advisor = mysqli_fetch_assoc($result); ?>
  <div class="p-title"></div>
  <div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col-12 col-lg-3">
          <img src="advisor/images/<?php echo $advisor['username']; ?>/<?php echo $advisor['profile_pic']; ?>" alt="" style="width:100%; height:auto;">
        </div>
        <div class="col-12 col-lg-9">
          <h1><?php echo $advisor['name'] ?></h1>
           <ul class="list-unstyled">
              <li ><i class="ri-briefcase-4-fill mr-5"></i><span><?php echo $advisor['experience'] ?> years of experience</span></li>
              <li><i class="ri-medal-fill mr-5"></i><span><?php echo $advisor['position'] ?></span></li>
              <li><i class="ri-map-pin-2-fill mr-5"></i><span><?php echo $advisor['location'] ?></span></li>
            </ul> 
            <p><?php echo $advisor['summary']; ?></p>
        </div>
        <!-- Book Modal -->
        <div class="modal fade" id="book-<?php echo $advisor['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="advisors.php" method="POST" class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content book-apt-popup">
              <div class="inner-apt">
                <input type="hidden" name="advisor_id" value="<?php echo $advisor['id']; ?>">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                <div>
                  <h5>Date:</h5>
                  <input type="date" name="b_date">
                </div>
                <div>
                  <h5>Time:</h5>
                  <input type="time" name="b_time">
                </div>
              </div>
              <button class="btn" type="submit" name="b_submit">Book My AppointMent</button>
            </div>
          </form>
        </div>
        <!-- Book Modal -->
    </div><!-- row -->
  </div><!-- contaienr -->

<?php } ?>

<?php
/**
 * Displays a message prompting the user to login or register.
 *
 * @return void
 */
function login_or_register(){ ?>

  <section id="solutions-hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Advisors</h1>
    </div>
  </section>

<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-12 col-lg-5">
      <h3 class="text-center">You must be Logged In to see the Advisors!</h3>
    </div>
  </div>
</div>

<?php } ?>

<?php 
if($_SESSION['role'] == 'guest'){
  login_or_register();
}else {

  if(isset($_GET['id'])){
    single_advisor($conn);
  } else {
    advisors($conn);
  }
}

?>

<?php include('footer.php') ?>
