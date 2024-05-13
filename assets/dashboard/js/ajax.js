jQuery(document).ready(function ($) {
  $(".wcp-delete-student").on("click", function (e) {
    e.preventDefault();
    let el = $(this);
    let user_id = el.data("id");
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "deleteStudent",
        id: user_id,
        _nonce: wcp_ajax_dashboard._nonce,
      },
      dataType: "JSON",
      beforSend: function () {
        $(".loading-icon").show();
      },
      success: function (response) {
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
