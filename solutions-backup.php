<?php include('header.php') ?>

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
        <h2 class="font-weight-bolder text-center text-lg-left hero-text">
          MUTUAL FUNDS
        </h2>
        <p>
          Mutual funds have emerged as an attractive investment option for
          investors, as indicated by the recent sharp growth in industry assets.
          Professional fund management, diversification, liquidity, and
          reasonable cost build a strong casefor mutual funds.One’s goal,
          investment horizon,and risk profile determines the choice of your
          schemes.
        </p>

        <button class="btn btn-lg btn-block sols-button">
          <div class="ab-fs-1">Mutual Funds</div>
          <i class="ri-arrow-right-s-line"></i>
        </button>
        <form class="row mt-2 justify-content-center justify-content-lg-start">
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
              <button class="btn btn-lg btn-default" type="submit">GO</button>
            </div>
            <!-- input group btn -->
          </div>
          <!-- input group -->
        </form>
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
  <div
    class="panel-group row"
    id="accordion"
    role="tablist"
    aria-multiselectable="true"
  >
    <div class="panel panel-default mb-2">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a
            role="button"
            data-toggle="collapse"
            data-parent="#accordion"
            href="#collapseOne"
            aria-expanded="true"
            aria-controls="collapseOne"
          >
            <div class="d-grid">
              <div>
                Collapsible Group Item #3 is the reason which is great and
                returning best practices
              </div>
              <i class="more-less ri-add-line"></i>
            </div>
          </a>
        </h4>
      </div>
      <div
        id="collapseOne"
        class="panel-collapse collapse"
        role="tabpanel"
        aria-labelledby="headingOne"
      >
        <div class="panel-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
          terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
          skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
          Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
          single-origin coffee nulla assumenda shoreditch et. Nihil anim
          keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
          sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
          occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
          you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>

    <div class="panel panel-default mb-2">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a
            class="collapsed"
            role="button"
            data-toggle="collapse"
            data-parent="#accordion"
            href="#collapseTwo"
            aria-expanded="false"
            aria-controls="collapseTwo"
          >
            <div class="d-grid">
              <div>Collapsible Group Item #3</div>
              <i class="more-less ri-add-line"></i>
            </div>
          </a>
        </h4>
      </div>
      <div
        id="collapseTwo"
        class="panel-collapse collapse"
        role="tabpanel"
        aria-labelledby="headingTwo"
      >
        <div class="panel-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
          terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
          skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
          Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
          single-origin coffee nulla assumenda shoreditch et. Nihil anim
          keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
          sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
          occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
          you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>

    <div class="panel panel-default mb-2">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a
            class="collapsed"
            role="button"
            data-toggle="collapse"
            data-parent="#accordion"
            href="#collapseThree"
            aria-expanded="false"
            aria-controls="collapseThree"
          >
            <div class="d-grid">
              <div>Collapsible Group Item #3</div>
              <i class="more-less ri-add-line"></i>
            </div>
          </a>
        </h4>
      </div>
      <div
        id="collapseThree"
        class="panel-collapse collapse"
        role="tabpanel"
        aria-labelledby="headingThree"
      >
        <div class="panel-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
          terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
          skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
          Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
          single-origin coffee nulla assumenda shoreditch et. Nihil anim
          keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
          sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
          occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
          you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
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
