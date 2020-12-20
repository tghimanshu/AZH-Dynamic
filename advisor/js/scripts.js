/*!
 * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
(function ($) {
  "use strict";

  // Add active state to sidbar nav links
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
    if (this.href === path) {
      $(this).addClass("active");
    }
  });

  // Toggle the side navigation
  $("#sidebarToggle").on("click", function (e) {
    e.preventDefault();
    $("body").toggleClass("sb-sidenav-toggled");
  });

  // my codes

  $("#addNewQuestion").click(addNewQuestion);
  $("#addNewQuestion").click();
  function addNewQuestion(e) {
    e.preventDefault();

    let totalQuestions = $(".faq").length;
    $(".faqs").append(`
        <div class="faq">
            <h4 class="clearfix">
                <div role="button"  data-toggle="collapse" data-target="#faq-${
                  totalQuestions + 1
                }" aria-expanded> Question</div>
                <button class="btn btn-danger float-right deleteQuestion" type="button"><i class="ri-delete-bin-5-fill"></i></button>
            </h4>
            <div class=" p-2 collapse" id="faq-${totalQuestions + 1}"> 
                <input class="form-control mb-2" type="text" name="question[]" placeholder="Enter Question Here!!" required>
                <textarea class="form-control" type="text" name="answer[]" required>
                </textarea>    
            </div><!-- .collapse -->
        </div><!-- faq -->
        `);
    $(".deleteQuestion").on("click", function (e) {
      e.preventDefault();
      console.log($(this).parent().parent());
      $(this).parent().parent().remove();
    });
  }
  $(document).ready(function () {
    let cropper;
    let cropperModalId = "#cropperModal";
    let jsPhotoUploadInput = $(".js-photo-upload");

    jsPhotoUploadInput.on("change", function () {
      var files = this.files;
      if (files.length > 0) {
        var photo = files[0];

        var reader = new FileReader();
        reader.onload = function (event) {
          var image = $(".js-avatar-preview")[0];
          image.src = event.target.result;

          cropper = new Cropper(image, {
            viewMode: 1,
            aspectRatio: 1,
            minContainerWidth: 400,
            minContainerHeight: 400,
            minCropBoxWidth: 271,
            minCropBoxHeight: 271,
            movable: true,
            ready: function () {
              console.log("ready");
              console.log(cropper.ready);
            },
          });

          $(cropperModalId).modal();
        };
        reader.readAsDataURL(photo);
      }
    });

    $(".js-save-cropped-avatar").on("click", function (event) {
      event.preventDefault();

      console.log(cropper.ready);

      var $button = $(this);
      $button.text("uploading...");
      $button.prop("disabled", true);

      const canvas = cropper.getCroppedCanvas();
      const base64encodedImage = canvas.toDataURL();
      $("#avatar-crop-img").attr("src", base64encodedImage);
      $("#avatar-crop-img").css("display", "block");
      $("#avatar-crop-input").attr("value", base64encodedImage);
      $(cropperModalId).modal("hide");
    });
  });
})(jQuery);
