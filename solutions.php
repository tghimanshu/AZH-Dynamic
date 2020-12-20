<?php include('header.php') ?>
<?php 

if (isset($_GET['id'])){
  $sol_id = $_GET['id'];
  if($sol_id == ''){
    header('Location: index.php');
  }
}else {
  header('Location: index.php');
}

$result = mysqli_query($conn, "SELECT * FROM solutions WHERE id = $sol_id") or die('error');
$solution = mysqli_fetch_assoc($result);

?>
<!-------------------------------------
                  Hero Section
    -------------------------------------->
<!-- #region Hero Section -->
<section id="hero" class="d-flex align-items-center">
  <div class="container mt-0">
    <div class="row justify-content-between">
      <div
        class="col-lg-5 pt-0 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
      >
        <h2 class="font-weight-bolder text-center text-lg-left hero-text pb-4">
          <?php echo $solution['name']; ?>
        </h2>
        <p class="pb-2">
          <?php echo $solution['description']; ?>
        </p>

        <button class="btn btn-lg btn-block sols-button">
          <div class="ab-fs-1">I'd like to select and pick an advisor to know more </div>
          <i class="ri-arrow-right-s-line"></i>
        </button>
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

<div class="container demo">
  <h1 class="ont-weight-bolder mb-2">FAQS</h1>
  <div
    class="panel-group row"
    id="accordion"
    role="tablist"
    aria-multiselectable="true"
  >
    <?php 

$questions = explode('|',$solution['faq_questions']);
$answers = explode('|',$solution['faq_answers']);
$currIndex = 0;
// array combine function combines 2 arrays in to one assoc array with 1st parameter as key and second as it's value       
foreach(array_combine($questions, $answers) as $question =>
    $answer): ?>
    <div class="col-12 col-lg-6">
      <div class="panel panel-default mb-2">
        <div
          class="panel-heading"
          role="tab"
          id="heading-<?php echo $currIndex; ?>"
        >
          <h4 class="panel-title">
            <a
              role="button"
              data-toggle="collapse"
              data-parent="#accordion"
              href="#collapse-<?php echo $currIndex; ?>"
              aria-expanded="true"
              aria-controls="collapse-<?php echo $currIndex; ?>"
            >
              <div class="d-grid">
                <div class="mr-2 text-center">
                  <?php echo $question; ?>
                </div>
                <i class="more-less ri-add-line"></i>
              </div>
            </a>
          </h4>
        </div>
        <div
          id="collapse-<?php echo $currIndex; ?>"
          class="panel-collapse collapse"
          role="tabpanel"
          aria-labelledby="heading-<?php echo $currIndex; ?>"
        >
          <div class="panel-body">
            <?php echo $answer; ?>
          </div>
        </div>
      </div>
      <!-- panel -->
    </div>
    <?php $currIndex++; ?>
    <?php endforeach; ?>
  </div>
  <!-- panel-group -->
</div>
<!-- container -->

<script>
  function toggleIcon(e) {
    $(e.target)
      .prev(".panel-heading")
      .find(".more-less")
      .toggleClass("ri-add-line ri-subtract-line");
    $(".more-less").toggleClass("ri-add-line ri-subtract-line");
  }
  $(".more-less").on("click", toggleIcon);
  $(".panel-group").on("hidden.bs.collapse", toggleIcon);
  $(".panel-group").on("shown.bs.collapse", toggleIcon);
</script>

<?php include('footer.php') ?>
