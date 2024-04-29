jQuery(document).ready(function ($) {
  $("#student-comment-form").on("submit", function (e) {
    e.preventDefault();
    let comment_body = $(".student-comment").val();
    let rate = $(".star-rate:checked").val();
    let c_id = $(".c_id").val();
    let c_slug = $(".c_slug").val();
    $.ajax({
      url: wcp_ajax.ajax_url,
      type: "POST",
      dataType: "JSON",
      data: {
        action: "add_student_comment",
        comment_body: comment_body,
        rate: rate,
        c_id: c_id,
        c_slug: c_slug,
        _nonce: wcp_ajax._nonce,
      },
      beforeSend: function () {
        $(".loading-icon").show();
      },
      success: function (response) {
        if (response.success) {
          jQuery.toast({
            text: response.message,
            icon: "success",
            loader: true, // Change it to false to disable loader
            position: "top-left",
            bgColor: "#2ecc71",
            textColor: "white",
            textAlign: "right",
            loaderBg: "#202124", // To change the background
            allowToastClose: false,
          });
        }
      },
      error: function (error) {
        if (error) {
          jQuery.toast({
            text: error.responseJSON.message,
            icon: "error",
            loader: true, // Change it to false to disable loader
            position: "top-left",
            bgColor: "#da0b4e",
            textColor: "white",
            textAlign: "right",
            loaderBg: "#202124", // To change the background
            allowToastClose: false,
          });
        }
      },
      complete: function () {
        $(".loading-icon").hide();
      },
    });
  });
});
