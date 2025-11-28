<?php 
/**
 * Mail Utility Functions.
 *
 * This file contains functions to send various email notifications to users and advisors
 * using the PHP mail() function.
 */

/**
 * Sends a registration email to an advisor.
 *
 * @param string $recipient The email address of the advisor.
 * @param string $name The name of the advisor.
 * @return void
 */
function reg_mail_advisor($recipient, $name) {
    $subject = "Thank you for registering to Advisor Zaroori Hai";
    $body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <title>Registeration Success!</title>
        <style type='text/css'>
            body {
                padding: 15px;
            }
            img	{
                width: 140px;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            h1 {
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <img src='https://advisorzaroorihai.com/assets/img/site-logo.png' alt='Site Logo'>
        <h1>Welcome, $name</h1>
        <p>Congratulations, You have successfully registered as an <b>Advisor</b> at Advisor Zaroori Hai. We are looking forward to utilize your expertise in Investments to provide best advices to the users.</p>
        <h3>What Next?</h3>
        <p>We are happy to have you as a part of our family.Your account is currently under review process. It will be reviewed and approved as soon as possible. On approval, your profile will be available to all the users.</p>
        <br>
        <video controls='true' src='https://advisorzaroorihai.com/assets/img/azh.mp4' style='width:100%'></video>
        <br>
        <p>For any business queries, </p>
        <p>Please visit: https://advisorzaroorihai.com</p>
        <p>Team AdvisorZarooriHai.</p>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: support@advisorzaroorihai.com";
    if(mail($recipient, $subject, $body, $headers)){
    }else{
        die("Email Error");
    }
}

/**
 * Sends a registration email to a user.
 *
 * @param string $recipient The email address of the user.
 * @param string $name The name of the user.
 * @return void
 */
function reg_mail_user($recipient, $name) {
    $subject = "Thank you for registering to Advisor Zaroori Hai";
    $body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <title>Registeration Success!</title>
        <style type='text/css'>
            body {
                padding: 15px;
            }
            img	{
                width: 140px;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            h1 {
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <img src='https://advisorzaroorihai.com/assets/img/site-logo.png' alt='Site Logo'>
        <h1>Welcome, $name</h1>
        <p>Congratulations, You have successfully registered as an <b>User</b> at Advisor Zaroori Hai. We are looking forward to provide you expert advice in Investments.</p>
        <h3>What Next?</h3>
        <p>We are happy to have you as a part of our family. We hope that you get all your investment queries dealt with.</p>
        <br>
        <video controls='true' src='https://advisorzaroorihai.com/assets/img/azh.mp4' style='width:100%'></video>
        <br>
        <p>For any business queries, </p>
        <p>Please visit: https://advisorzaroorihai.com</p>
        <p>Team AdvisorZarooriHai.</p>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: support@advisorzaroorihai.com";
    if(mail($recipient, $subject, $body, $headers)){
    }else{
        die("Email Error");
    }
}

/**
 * Sends a booking alert email to an advisor.
 *
 * @param mysqli $conn The database connection object (unused in this function but passed for consistency).
 * @param string $user_name The name of the user who made the booking.
 * @param string $advisor_name The name of the advisor.
 * @param string $b_date The date of the booking.
 * @param string $b_time The time of the booking.
 * @param string $advisor_email The email address of the advisor.
 * @return void
 */
function booking_mail_advisor($conn,$user_name, $advisor_name, $b_date, $b_time, $advisor_email) {
    $subject = "New Booking Alert dated $b_date at $b_time";
    $body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <title>Registeration Success!</title>
        <style type='text/css'>
            body {
                padding: 15px;
            }
            img	{
                width: 140px;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            h1 {
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <img src='https://advisorzaroorihai.com/assets/img/site-logo.png' alt='Site Logo'>
        <h1>Hi $advisor_name</h1>
        <p>A booking has been made for you by $user_name dated $b_date at $b_time.</p>
        <p>Please approve the same accordingly from your Advisor DashBoard! You will get all other contact details of the abouve users on approving the bookings.</p>
        <a href='http://advisorzaroorihai.com/advisor/'>Go To DashBoard</a>
        <br>
        <br>
        <br>
        <br>
        <p>For any business queries, </p>
        <p>Please visit: https://advisorzaroorihai.com</p>
        <p>Team AdvisorZarooriHai.</p>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: support@advisorzaroorihai.com";
    if(mail($advisor_email, $subject, $body, $headers)){
    }else{
    }
}

/**
 * Sends a booking confirmation email to a user.
 *
 * @param mysqli $conn The database connection object (unused in this function but passed for consistency).
 * @param string $user_name The name of the user.
 * @param string $advisor_name The name of the advisor.
 * @param string $b_date The date of the booking.
 * @param string $b_time The time of the booking.
 * @param string $user_email The email address of the user.
 * @return void
 */
function booking_mail_user($conn,$user_name, $advisor_name, $b_date, $b_time, $user_email) {
    $subject = "Booking Created dated $b_date at $b_time";
    $body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <title>Registeration Success!</title>
        <style type='text/css'>
            body {
                padding: 15px;
            }
            img	{
                width: 140px;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            h1 {
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <img src='https://advisorzaroorihai.com/assets/img/site-logo.png' alt='Site Logo'>
        <h1>Hi $user_name</h1>
        <p>A booking has been created for $advisor_name dated $b_date at $b_time.</p>
        <a href='http://advisorzaroorihai.com/account.php'>See Bookings</a>
        <br>
        <br>
        <br>
        <br>
        <p>For any business queries, </p>
        <p>Please visit: https://advisorzaroorihai.com</p>
        <p>Team AdvisorZarooriHai.</p>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: support@advisorzaroorihai.com";
    if(mail($user_email, $subject, $body, $headers)){
    }else{
    }
}

/**
 * Sends a booking approval email to an advisor.
 *
 * Fetches user and advisor details from the database.
 *
 * @param mysqli $conn The database connection object.
 * @param int $user_id The ID of the user.
 * @param int $advisor_id The ID of the advisor.
 * @return void
 */
function booking_mail_advisor_approved($conn,$user_id, $advisor_id) {
    $advisor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM advisors WHERE id = $advisor_id;"));
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id;"));
    $name = $user['name'];
    $email = $user['email'];
    $contact = $user['contact'];
    $subject = "Booking Approved of ".$name;
    $body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <title>Registeration Success!</title>
        <style type='text/css'>
            body {
                padding: 15px;
            }
            img	{
                width: 140px;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            h1 {
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <img src='https://advisorzaroorihai.com/assets/img/site-logo.png' alt='Site Logo'>
        <h1>Hi $name</h1>
        <p>Booking of $name is approved.</p>
        <p>The following is the user contact datails.</p>
        <p><b>Name: </b>$name</p>
        <p><b>E-Mail: </b>$email</p>
        <p><b>Contact: </b>$contact</p>
        <br>
        <br>
        <br>
        <br>
        <p>For any business queries, </p>
        <p>Please visit: https://advisorzaroorihai.com</p>
        <p>Team AdvisorZarooriHai.</p>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: support@advisorzaroorihai.com";
    if(mail($advisor['email'], $subject, $body, $headers)){
    }else{
        die("Email Error!");
    }
}

/**
 * Sends a booking approval email to a user.
 *
 * Fetches user and advisor details from the database.
 *
 * @param mysqli $conn The database connection object.
 * @param int $user_id The ID of the user.
 * @param int $advisor_id The ID of the advisor.
 * @return void
 */
function booking_mail_user_approved($conn,$user_id, $advisor_id) {
    $advisor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM advisors WHERE id = $advisor_id;"));
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id;"));
    $advisor_name = $advisor['name'];
    $user_name = $user['name'];
    $subject = "Booking Approved for ".$advisor['name'];
    $body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <title>Registeration Success!</title>
        <style type='text/css'>
            body {
                padding: 15px;
            }
            img	{
                width: 140px;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            h1 {
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <img src='https://advisorzaroorihai.com/assets/img/site-logo.png' alt='Site Logo'>
        <h1>Hi $user_name</h1>
        <p>Booking of $advisor_name has been approved.</p>
        <p>He will reach out to you on the designated time.</p>
        <br>
        <br>
        <br>
        <br>
        <p>For any business queries, </p>
        <p>Please visit: https://advisorzaroorihai.com</p>
        <p>Team AdvisorZarooriHai.</p>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: support@advisorzaroorihai.com";
    if(mail($user['email'], $subject, $body, $headers)){
    }else{
        die('Email Error');
    }
}


?>
<!-- <video controls="true" src="https://advisorzaroorihai.com/assets/img/azh.mp4" style="width:100%"></video> -->
<?php 

/**
 * Sends an account approval email to an advisor.
 *
 * Fetches advisor details from the database.
 *
 * @param mysqli $conn The database connection object.
 * @param int $advisor_id The ID of the advisor.
 * @return void
 */
function advisor_account_approved($conn,$advisor_id) {
    $advisor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM advisors WHERE id = $advisor_id;"));
    $name= $advisor['name'];
    $subject = "Advisor Account Approved!";
    $body = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <title>Registeration Success!</title>
        <style type='text/css'>
            body {
                padding: 15px;
            }
            img	{
                width: 140px;
                height: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            h1 {
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <img src='https://advisorzaroorihai.com/assets/img/site-logo.png' alt='Site Logo'>
        <h1>Hi $name</h1>
        <p>Your Advisor Account has been Reviewed and Approved by the Admins. Now your profile will be visible to other users!</p>
        <a href='https://advisorzaroorihai.com/advisor/'>Go To Advisor DashBoard</a>
        <br>
        <br>
        <br>
        <br>
        <p>For any business queries, </p>
        <p>Please visit: https://advisorzaroorihai.com</p>
        <p>Team AdvisorZarooriHai.</p>
    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: support@advisorzaroorihai.com";
    if(mail($advisor['email'], $subject, $body, $headers)){
    }else{
        die("Email Error!");
    }
}

?>
