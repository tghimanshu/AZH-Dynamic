<?php
/**
 * Home Page.
 *
 * This is the landing page of the Advisor Zaroori Hai application.
 * It displays key information, handles user queries, and displays success/error messages based on GET parameters.
 */
$page_title = 'Home';
?>
<?php include('header.php'); ?>
<?php 
// Handle various success/error message triggers via GET parameters
if(isset($_GET['p'])){
  switch($_GET['p']){
    case '1':
      echo "<script>advisor_reg_success();</script>";
      break;
    case '2':
      echo "<script>client_reg_success();</script>";
      break;
    case '3':
      echo "<script>client_booking_success();</script>"; 
      break;
    case '4':
      echo "<script>login_error();</script>";
      break;
    case '5':
      echo "<script>feedback_success();</script>";
      break;
      
  }
}
?>
<?php 
// Handle form submission for posting a user query
if(isset($_POST['submit']) && isset($_POST['post_your_query'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $timing = $_POST['timing'];
  $query = $_POST['query'];
  mysqli_query($conn, "INSERT INTO `queries` VALUES (null, '$name', '$phone', '$timing', '$query');") or die('error');
}
?>

    <!-------------------------------------
                  Hero Section
    -------------------------------------->
    <!-- #region Hero Section -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container mt-5">
        <div class="row">
          <div
            class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
          >
            <h2 class="font-weight-bolder text-center text-lg-left hero-text">
            Your Advisor is just<br />clicks
              away
            </h2>
            <a href="advisors.php" class="btn btn-block btn-success mt-3" id="hero-get-started">
                Get Started
            </a>
            <!-- <form
              class="row mt-2 justify-content-center justify-content-lg-start"
            >
              <div
                class="col-10 enterLocation justify-content-center input-group m-0"
              >
                <select
                  name="select"
                  id="location"
                  class="form-control form-control-lg"
                >
                  <option value="data">Enter Your Location</option>
                  <option value="data2">data2</option>
                </select>
                <div class="input-group-btn">
                  <button class="btn btn-lg btn-default" type="submit">
                    GO
                  </button>
                </div>
              </div>
            </form> -->
          </div>
          <!-- col-lg-5 -->
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="assets/img/hero-img.png" alt="img-fluid animated" />
          </div>
          <!-- col-lg-7 -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </section>
    <!-- #endregion hero section -->
    <!--------------------------------------
                    How it works
    --------------------------------------->
    <!-- #region how it works -->
    <section id="how-it-works" class="container text-black">
      <h1>
        How Does It Works?

        <hr class="m-0" />
      </h1>
      <p class="mt-0 mb-5 text-bold">
        6 steps and that's it.Simple, Holistic, Seamless
      </p>
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-4 mb-4 mb-lg-5">
            <img
              src="assets/img/how-it-works/step-1.png"
              alt=""
              class="img-fluid"
            />
          </div>
          <div class="col-12 col-lg-4 mb-4 mb-lg-5">
            <img
              src="assets/img/how-it-works/step-2.png"
              alt=""
              class="img-fluid"
            />
          </div>
          <div class="col-12 col-lg-4 mb-4 mb-lg-5">
            <img
              src="assets/img/how-it-works/step-3.png"
              alt=""
              class="img-fluid"
            />
          </div>
          <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <img
              src="assets/img/how-it-works/step-4.png"
              alt=""
              class="img-fluid"
            />
          </div>
          <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <img
              src="assets/img/how-it-works/step-5.png"
              alt=""
              class="img-fluid"
            />
          </div>
          <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <img
              src="assets/img/how-it-works/step-6.png"
              alt=""
              class="img-fluid"
            />
          </div>
        </div>
        <!-- row  -->
      </div>
      <!-- container -->
    </section>
    <!-- how it works -->
    <!-- #endregion how it works -->

    <!--------------------------------------
                    Advisory solution
    --------------------------------------->
    <!-- #region Advisory Solution -->
    <section
      id="advisory-solutions"
      class="container pt-4 text-black mt-0 mb-0"
    >
      <h1 class="pt-0">
        Advisory Solutions

        <hr class="m-0" />
      </h1>
      <div class="row mt-0 justify-content-between">
        <div class="row col-12 col-lg-5 order-2 order-lg-1">
          <div class="col-12 col-lg-12 mt-0">
            <h4 class="mt-5 pt-2 mb-0 queryForm-title font-weight-bolder">
              CAN'T FIND WHAT YOU LOOKING FOR?
            </h4>
            <p class="mb-4 pb-4 mt-0 queryForm-subtitle">
              POST YOUR QUERY HERE
            </p>
            <form class="postQuery" action="index.php" method="POST">
            <input type="hidden" name="post_your_query" value="your_query">
              <input
                required
                type="text"
                class="form-control pl-3 mb-2"
                name="name"
                id="name"
                placeholder="Name"
              />
              <input
                required
                type="text"
                class="form-control pl-3 mb-2"
                name="phone"
                placeholder="Phone No."
              />
              <input
                required
                type="text"
                class="form-control pl-3 mb-2"
                name="query"
                placeholder="Your Query"
              />

              <div class="form-inline flex">
                <input
                  type="radio"
                  name="timing"
                  id="morning"
                  value="morning"
                  class="timing d-none form-check-input"
                />
                <label for="morning" class="form-control m-2 timing-label"
                  >Morning
                </label>
                <input
                  type="radio"
                  name="timing"
                  id="afternoon"
                  value="afternoon"
                  class="timing d-none form-check-input"
                />
                <label for="afternoon" class="form-control m-2 timing-label"
                  >Afternoon
                </label>
                <input
                  type="radio"
                  name="timing"
                  id="night"
                  value="night"
                  class="timing d-none form-check-input"
                />
                <label for="night" class="form-control m-2 timing-label"
                  >Night
                </label>
              </div>
              <!-- flex -->
              <div class="text-center mb-4 prefer-call-div">
                what time would your prefer the call?
              </div>
              <button
                class="btn btn-block btn-success"
                type="submit"
                name="submit"
                id="querySubmit"
              >
                POST
              </button>
            </form>
          </div>
          <!-- col-lg-12 -->
        </div>
        <!-- left side -->
        <div
          class="row alternateButtons col-12 col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0"
        >
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a href="page.php?name=mutual-fund" class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-1">Mutual Funds</div>
              <i class="ri-arrow-right-s-line"></i>
            </a>  
          </div>
          <!-- left -->
          <!-- placeholder start -->
          <div class="col-12 col-lg-6"></div>
          <div class="col-12 col-lg-6"></div>
          <!-- placeholder end -->
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a href="page.php?name=pms" class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-3">
                PORTFOLIO<br />MANAGEMENT<br />SERVICES(PMS)
              </div>
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </div>
          <!-- right -->
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a href="page.php?name=insurance" class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-1">INSURANCE</div>
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </div>
          <!-- left -->
          <!-- placeholder start -->
          <div class="col-12 col-lg-6"></div>
          <div class="col-12 col-lg-6"></div>
          <!-- placeholder end -->
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a href="page.php?name=aif" class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-3">
                ALTERNATIVE<br />INVESTMENT<br />FUNDS (AIF)
              </div>
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </div>
          <!-- right -->
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a href="page.php?name=loans" class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-1">LOANS</div>
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </div>
          <!-- left -->
          <!-- placeholder start -->
          <div class="col-12 col-lg-6"></div>
          <div class="col-12 col-lg-6"></div>
          <!-- placeholder end -->
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-2">
                INESTMENT IN <br />
                START UPS & SME
              </div>
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </div>
          <!-- right -->
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-2">FINANCIAL<br />PLANNING</div>
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </div>
          <!-- left -->
          <div class="col-12 col-lg-6"></div>
          <div class="col-12 col-lg-6"></div>
          <div class="col-12 mb-4 mb-lg-0 col-lg-6">
            <a href="page.php?name=real-estate" class="btn btn-lg btn-primary btn-block">
              <div class="ab-fs-2">ESTATE<br />PLANNING</div>
              <i class="ri-arrow-right-s-line"></i>
            </a>
          </div>
          <!-- right -->
        </div>
        <!-- col-lg-6 row (right side with alternating buttons) -->
      </div>
      <!-- row  -->
    </section>
    <!-- #advisory-solutions -->
    <!-- #endregion Advisory Solution -->

    <!--------------------------------------
      Initiatives
      --------------------------------------->
    <!-- #region Invitiatives -->
    <section id="initiatives" class="container mb-0 mt-0 pt-0 pb-0 text-black">
      <h1 class="">
        INITIATIVES

        <hr class="m-0" />
      </h1>
      <p class="mt-0 mb-5 text-bold">A Quick Glimpse of what we have done.</p>
      <div class="row container mb-5 initiatives">
        <div class="col-12 pl-0 pr-3 col-lg-6 mb-4 mb-lg-0">
          <img
            src="assets/img/initiatives/swatantra-final.png"
            class="img-fluid"
            alt=""
          />
        </div>
        <div class="col-12 pl-3 pr-0 col-lg-6">
          <img
            src="assets/img/initiatives/master_blaster.png"
            class="img-fluid"
            alt=""
          />
        </div>
        <div class="seperator d-none d-lg-block"></div>
      </div>
      <!-- row -->
    </section>
    <!-- Initiatives -->
    <!-- #endregion Initiatives -->
    <!--------------------------------------
                    Figuress
      --------------------------------------->
    <!-- #region figures -->
    <section id="figures" class="text-white p-4 mt-5 font-weight-bolder">
      <div class="container px-5">
        <div class="row justify-content-lg-between">
          <div class="col-12 col-lg-3 text-center">
            <h1 class="text-white figure-amt"><span data-counter="25000" class="figure-amt-inner">0</span>+</h1>
            <div class="figure-text">
              <p>financially literate</p>
            </div>
          </div>
          <div class="col-12 col-lg-3 text-center">
            <h1 class="text-white figure-amt"><span data-counter="100" class="figure-amt-inner">0</span>+</h1>
            <div class="figure-text">
              <p>Sessions</p>
            </div>
          </div>
          <div class="col-12 col-lg-3 text-center">
            <h1 class="text-white figure-amt"><span data-counter="50" class="figure-amt-inner">0</span>+</h1>
            <div class="figure-text">
              <p>topics on various avenues covered</p>
            </div>
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </section>
    <!-- figures -->
    <!-- #endregion figures -->
    <!--------------------------------------
                    End to End Solutions
      --------------------------------------->
    <!-- #region End to End Solution -->
    <section id="end-to-end-solutions" class="container mb-5 pt-0 text-black">
      <h1 class="mt-5">
        END TO END SOLUTIONS

        <hr class="m-0" />
      </h1>
      <div class="row justify-content-lg-between">
        <div class="ete-sol-text ml-0 col-12 col-lg-6 p-4 mt-5">
          <p>
            Our transaction’s journey is mapped by the finest in the industry by
            providing end to end solutions with no hidden fees.So, you can focus
            on attaining your goals.
          </p>
        </div>
        <div class="col-12 col-lg-4">
        <a href="http://www.mercuryfinancial.co.in/" target="_blank">
          <img
            src="assets/img/end-to-end/mercury.png"
            alt=""
            class="img-fluid"
          />
        </a>
        </div>
      </div>
      <!-- row -->
    </section>
    <!-- #end-to-end-solutions -->
    <!-- #endregion Advisory Solution -->
    <!--------------------------------------
                    NewsLetter
      --------------------------------------->
    <!-- #region newsletter -->
    <div
      id="newsletter"
      class="container text-white pb-5 pb-lg-0 mb-lg-5"
      style="margin-top: 40px"
    >
      <div class="newsletter-form-border d-lg-block d-none"></div>
      <div class="row ml-3">
        <div class="col-12 col-lg-6">
          <h3 class="font-weight-bolder mt-4">
            READY TO GET STARTED?

            <hr
              class="m-0 mb-1"
              style="width: 60%; height: 4px; background: orange"
            />
          </h3>
          <p class="text-bolder">
            Sign up for weekly Blogs of market analysis , emerging companies and
            much more right at your inbox.
          </p>
        </div>
        <!-- left -->
        <div
          class="col-12 col-lg-6 d-flex align-items-center justify-content-center"
        >
          <form class="newsletter-form">
            <img src="assets/img/newsletter-form-overlay.png" alt="" />
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="xyz@gmail.com"
              />
              <button type="submit" class="btn btn-success input-group-btn">
                Subscribe
              </button>
            </div>
          </form>
        </div>
        <!-- right -->
      </div>
    </div>
    <!-- #endregion newsletter -->

<?php include('footer.php'); ?>
