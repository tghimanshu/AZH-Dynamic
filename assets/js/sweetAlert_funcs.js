function advisor_reg_success() {
        Swal.fire({
            title: '<strong>Register SuccessFul</strong>',
            icon: 'success',
            html:
              'You are now succussfully registered as an Advisor!',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: true,
            confirmButtonText:
              'Go To Your Account!',
            confirmButtonAriaLabel: 'Go To Your Account!',
            cancelButtonText:
              'Close',
            cancelButtonAriaLabel: 'Close',
            preConfirm:function(){
                window.location = 'advisor/';
            }
        });
};

function client_reg_success() {
  Swal.fire({
      title: '<strong>Register SuccessFul</strong>',
      icon: 'success',
      html:
        'You are now succussfully registered as an Client!<br>You can now see the Advisors',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: true,
      confirmButtonText:
        'See Advisors',
      confirmButtonAriaLabel: 'See Advisors!',
      cancelButtonText:
        'Close',
      cancelButtonAriaLabel: 'Close',
      preConfirm:function(){
          window.location = 'advisors.php';
      }
  });
};

function client_booking_success() {
  Swal.fire({
      title: '<strong>Booking SuccessFul</strong>',
      icon: 'success',
      html:
        'You have successfully made a Booking!',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: true,
      confirmButtonText:
        'See Bookings',
      confirmButtonAriaLabel: 'See Bookings!',
      cancelButtonText:
        'Close',
      cancelButtonAriaLabel: 'Close',
      preConfirm:function(){
          window.location = 'account.php';
      }
  });
};

function login_error() {
  Swal.fire({
      title: '<strong>Login Unsuccessful!</strong>',
      icon: 'error',
      html:
        'You have successfully made a Booking!',
      showCloseButton: true,
      showCancelButton: false,
      focusConfirm: true,
      confirmButtonText:
        'Close',
      confirmButtonAriaLabel: 'Close',
      preConfirm:function(){
        window.location = 'index.php';
    }
  });
};