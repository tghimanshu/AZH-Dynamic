
    <!--------------------------------------
                    Footer
      --------------------------------------->
    <!-- #region footer -->
    <footer class="mt-5 p-0 container">
      <hr class="ml-0 mb-4 footer-left-hr" />

      <div class="row mr-3 mt-3 ml-3 justify-content-between">
        <div class="row col-12 col-lg-6">
          <div
            class="col-12 col-lg-4 d-flex justify-content-center align-items-center"
          >
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.6448636911296!2d72.86922481421352!3d19.123229555457122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c994dccc4403%3A0x19f7e394d6f202cc!2sAdvisor%20Zaroori%20Hai!5e0!3m2!1sen!2sin!4v1608107585988!5m2!1sen!2sin"
              frameborder="0"
              style="width: 100%"
            ></iframe>
          </div>
          <div class="col-12 col-lg-8 reach-us">
            <h4 class="font-weight-bold text-uppercase mb-4">
              <i class="ri-contacts-book-line"></i> Reach Out to us
            </h4>
            <ul class="list-unstyled details">
              <li>
                <i class="ri-mail-line mb-1"></i>info@advisorzaroorihai.com
              </li>
              <li><i class="ri-phone-line mb-1"></i>+91 99200 56391/+91 79777 46214</li>
              <li>
                <i class="ri-map-pin-line mb-1"></i> 203, 2nd Floor, Ackruti Star, MIDC Central Rd, Andheri East, Mumbai, Maharashtra 400093</li>
            </ul>
            <ul class="list-inline socials">
              <li class="list-inline-item">
                <a href="https://twitter.com/azh_team" target="_blank">
                  <i class="ri-twitter-fill"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/advisorzaroorihai/" target="_blank">
                  <i class="ri-instagram-line"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/AdvisorZarooriHai" target="_blank">
                  <i class="ri-facebook-box-fill"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.youtube.com/channel/UCzAmNWFV5ejxs04J5kw4tAA?view_as=subscriber" target="_blank">
                  <i class="ri-youtube-fill"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- left 2 footer sections -->

        <div class="row col-12 col-lg-6">
          <div class="col-12 col-lg-6 about-us">
            <h4 class="font-weight-bold text-uppercase mb-4">ABOUT US</h4>
            <ul class="list-unstyled details">
              <li class="mt-2"><a href="page.php?name=about-us">Solutions</a></li>
              <li class="mt-2"><a href="page.php?name=about-us">Events</a></li>
              <li class="mt-2"><a href="page.php?name=about-us">Company</a></li>
            </ul>
          </div>
          <div class="col-12 col-lg-6 quick-links">
            <h4 class="font-weight-bold text-uppercase mb-4">QUICK LINKS</h4  >
            <ul class="list-unstyled details">
              <li class="mt-2"><a href="advisor-registration.php">Register - Advisor</a></li>
              <li class="mt-2"><a href="client-registration.php">Register - Client</a></li>
              <li class="mt-2"><a href="page.php?name=terms-conditions">Terms & Conditions</a></li>
              <li class="mt-2"><a href="page.php?name=privacy-policy">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <!-- right 2 footer section -->
      </div>
      <!-- row -->
      <div class="text-right container">
        2020 ©advisorzaroorihai.com-all rights reserved- Terms of Service
      </div>
      <hr class="mr-0 footer-right-hr" />
    </footer>
    <!-- #endregion footer -->

    <!-- Scripts -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel//owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.0.0-rc.1/cropper.min.js"></script>


    <!-- Template main js -->
    <script src="assets/js/main.js"></script>
    <!---------------------------------------- 
                Start of Login Modal 
    ----------------------------------------->

<!--Modal: loginModel-->
<div class="modal fade" id="loginPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <!--Content-->
    <div class="modal-content">

      <!--Body-->
      <div class="modal-body login-popup row mb-0 p-0">
        <div class="col-12 col-lg-5">
          <div>
            <h4>OUR ADVICE</h4>
            <h4>YOUR GROWTH</h4>
          </div>
        </div>
        <div id="user-advisor" class="col-12 col-lg-7">
          <button class="btn btn-primary" id="user-popup-btn">Are you looking for an Advisor?</button>
          <!-- <button class="btn btn-primary" id="user-popup-btn"><a href="client-registration.php">Are you looking for an Advisor?</a></button> -->
          <div class="seperator-text">OR</div>
          <button class="btn btn-primary" id="advisor-popup-btn">Are you an Advisor?</button>
          <!-- <button class="btn btn-primary" id="advisor-popup-btn"><a href="advisor-registration.php">Are you an Advisor?</a></button> -->
        </div>
        <div id="advisor-form" class="col-12 col-lg-7 p-0 py-5">
          <h3 class="text-center font-weight-bold">Welcome Advisors</h3>
          <ul class="nav nav-pills my-3 d-flex justify-content-center " id="pills-tab" role="tablist">
              <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-advisor-login-tab" data-toggle="pill" href="#pills-advisor-login" role="tab" aria-controls="pills-advisor-login" aria-selected="true">Login</a> </li>
              <!-- <li class="nav-item text-center"> <a class="nav-link btr" id="pills-advisor-register-tab" data-toggle="pill" href="#pills-advisor-register" role="tab" aria-controls="pills-advisor-register" aria-selected="false">Signup</a> </li> -->
              <li class="nav-item text-center"> <a class="nav-link btr" href="advisor-registration.php">Signup</a> </li>
          </ul>
          <div class="tab-content" id="pills-tabContent-1">
              <div class="tab-pane fade show active" id="pills-advisor-login" role="tabpanel" aria-labelledby="pills-advisor-login-tab">
                  <form id="advisor-login-form" class="mx-4" action="index.php" method="POST">
                    <input type="hidden" value="advisors_login" name="form_func">
                    <div class="form-group">
                      <input class="form-control" type="text" name="email" placeholder="Enter Username or Email" id="">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" name="pwd" placeholder="Enter Password" id="">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                      <button type="submit" class="btn" name="submit">Login</button>
                      <button type="button" class="btn back-to-select">Back</button>
                    </div>
                  </form>
                  
              </div><!-- pills home tab -->
              <div class="tab-pane fade" id="pills-advisor-register" role="tabpanel" aria-labelledby="pills-advisor-register-tab">
                  <form id="advisor-register-form" class="mx-4" action="index.php" method="POST">
                    <input type="hidden" value="advisors_register" name="form_func">
                    <div class="form-group form-row">
                      <div class="col-lg-6">
                        <input class="form-control" type="text" name="username" placeholder="Enter username" id="">
                      </div>
                      <div class="col-lg-6">
                        <input class="form-control" type="text" name="name" placeholder="Enter Name" id="">
                      </div>
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="email" name="email" placeholder="Enter Email" id="">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" name="pwd" placeholder="Enter Password" id="">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" name="cpwd" placeholder="Confirm Password" id="">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                      <button type="submit" class="btn" name="submit">Register</button>
                      <button type="button" class="btn back-to-select">Back</button>
                    </div>
                  </form>
              </div><!-- pills profile tab -->
          </div>
        </div>
        <div id="user-form" class="col-12 col-lg-7 p-0 py-5">
          <h3 class="text-center font-weight-bold">Welcome Users</h3>
          <ul class="nav nav-pills my-3 d-flex justify-content-center " id="pills-tab-2" role="tablist">
              <li class="nav-item text-center"> 
                <a class="nav-link active btl" id="pills-user-login-tab" data-toggle="pill" href="#pills-user-login" role="tab" aria-controls="pills-user-login" aria-selected="true">Login</a> 
              </li>
              <li class="nav-item text-center">
                 <!-- <a class="nav-link btr" id="pills-user-register-tab" data-toggle="pill" href="#pills-user-register" role="tab" aria-controls="pills-user-register" aria-selected="false">Signup</a> -->
                 <a class="nav-link btr" href="client-registration.php">Signup</a>
              </li>
          </ul>
          <div class="tab-content" id="pills-tabContent-2">
              <div class="tab-pane fade show active" id="pills-user-login" role="tabpanel" aria-labelledby="pills-user-login-tab">
                  <form id="user-login-form" class="mx-4" action="index.php" method="POST">
                    <input type="hidden" value="users_login" name="form_func">
                    <div class="form-group">
                      <input class="form-control" type="text" name="email" placeholder="Enter Username or Email" id="">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" name="pwd" placeholder="Enter Password" id="">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                      <button type="submit" class="btn" name="submit">Login</button>
                      <button type="button" class="btn back-to-select">Back</button>
                    </div>
                  </form>
                  
              </div><!-- pills home tab -->
              <div class="tab-pane fade" id="pills-user-register" role="tabpanel" aria-labelledby="pills-user-register-tab">
                  <form id="user-register-form" class="mx-4" action="index.php" method="POST">
                    <input type="hidden" value="users_register" name="form_func">
                    <div class="form-group form-row">
                      <div class="col-lg-6">
                        <input class="form-control" type="text" name="username" placeholder="Enter username" id="">
                      </div>
                      <div class="col-lg-6">
                        <input class="form-control" type="text" name="name" placeholder="Enter Name" id="">
                      </div>
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="email" name="email" placeholder="Enter Email" id="">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" name="pwd" placeholder="Enter Password" id="">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="password" name="cpwd" placeholder="Confirm Password" id="">
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn" name="submit">Register</button>
                        <button type="button" class="btn back-to-select">Back</button>
                      </div>
                    </div>
                  </form>
              </div><!-- pills profile tab -->
          </div>
          
        </div>
      </div>

      <!-- <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
        data-dismiss="modal">Close</button> -->

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: modalVM-->

    <!---------------------------------------- 
                  End of Login Modal 
    ----------------------------------------->
  </body>
</html>
