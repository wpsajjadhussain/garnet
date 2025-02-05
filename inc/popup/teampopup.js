/**
 *  Popup AJAX
 */

jQuery(function ($) {
  $("body").on("click", ".view-post", function () {
    var loader = $(this).find("#loader");
    var data = {
      action: "load_post_by_ajax",
      id: $(this).data("id"),
      security: blog.security,
    };

    $.ajax({
      // you can also use $.post here
      url: blog.ajaxurl, // AJAX handler
      data: data,
      type: "POST",
      beforeSend: function (xhr) {
        loader.show();
      },
      success: function (response) {
        response = JSON.parse(response);
        console.log(response);
        $("#teamModal #teamImage").attr("src", response.image);
        $("#teamModal #memberName").text(response.title);
        $("#teamModal #designation").text(response.designation);
        $("#teamModal #popupcontent").html(response.content);
        $("#teamModal #linkdin-btn").attr("href", response.linkedin_link);

        var teamModal = new bootstrap.Modal(
          document.getElementById("teamModal")
        );
        teamModal.show();

        loader.hide();
      },
    });
  });
});
