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
  // tinymce.init({
  //   selector: "textarea",
  //   plugins:
  //     "a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker",
  //   toolbar:
  //     "a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table",
  //   toolbar_mode: "floating",
  //   tinycomments_mode: "embedded",
  //   tinycomments_author: "Author name",
  // });
  CKEDITOR.replace("content");
  CKEDITOR.editorConfig = function (config) {
    config.language = "es";
    config.uiColor = "#F7B42C";
    config.height = 300;
    config.toolbarCanCollapse = true;
  };
})(jQuery);
