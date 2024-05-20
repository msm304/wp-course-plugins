jQuery(document).ready(function ($) {
  $(".wcp-delete-student").on("click", function (e) {
    e.preventDefault();
    let el = $(this);
    let row_id = el.data("rowid");
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "deleteStudent",
        row_id: row_id,
        _nonce: wcp_ajax_dashboard._nonce,
      },
      dataType: "JSON",
      beforSend: function () {
        el.find("i").removeClass("ti-trash").addClass("ti-reload loading-icon");
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
        el.parents("tr").remove();
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
        el.find("i").removeClass("ti-reload loading-icon").addClass("ti-trash");
      },
    });
  });

  // $(".wcp-student-status").on("change", function (e) {
  //   let row_id = $("#row-id").val();
  //   let status = $(".wcp-student-status").select().val();
  //   // alert(status);
  //   $.ajax({
  //     type: "POST",
  //     url: wcp_ajax_dashboard.ajax_url,
  //     data: {
  //       action: "statusStudent",
  //       row_id: row_id,
  //       status: status,
  //       _nonce: wcp_ajax_dashboard._nonce,
  //     },
  //     dataType: "JSON",
  //     beforSend: function () {
  //       el.find("i").removeClass("ti-trash").addClass("ti-reload loading-icon");
  //     },
  //     success: function (response) {
  //       jQuery.toast({
  //         text: response.message,
  //         icon: "success",
  //         loader: true, // Change it to false to disable loader
  //         position: "top-left",
  //         bgColor: "#2ecc71",
  //         textColor: "white",
  //         textAlign: "right",
  //         loaderBg: "#202124", // To change the background
  //         allowToastClose: false,
  //       });
  //       el.parents("tr").remove();
  //     },
  //     error: function (error) {
  //       if (error) {
  //         jQuery.toast({
  //           text: error.responseJSON.message,
  //           icon: "error",
  //           loader: true, // Change it to false to disable loader
  //           position: "top-left",
  //           bgColor: "#da0b4e",
  //           textColor: "white",
  //           textAlign: "right",
  //           loaderBg: "#202124", // To change the background
  //           allowToastClose: false,
  //         });
  //       }
  //     },
  //     complete: function () {
  //       el.find("i").removeClass("ti-reload loading-icon").addClass("ti-trash");
  //     },
  //   });
  // });

  $(".wcp-status-student").on("click", function (e) {
    e.preventDefault();
    let el = $(this);
    let row_id = el.data("rowid");
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "statusStudent",
        row_id: row_id,
        _nonce: wcp_ajax_dashboard._nonce,
      },
      dataType: "JSON",
      beforSend: function () {
        el.find("i")
          .removeClass("ti-pencil-alt")
          .addClass("ti-reload loading-icon");
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
        el.parents("tr").remove();
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
        el.find("i")
          .removeClass("ti-reload loading-icon")
          .addClass("ti-pencil-alt");
      },
    });
  });

  // update student ajax
  $("form.student-edit").submit(function (e) {
    e.preventDefault();
    let el = $("#idRow");
    let row_id = el.val();
    let full_name = $("#inputFullName").val();
    let email = $("#inputEmail").val();
    let title = $("#inputTitle").val();
    let phone = $("#inputPhone").val();
    let date = $("#inputDate").data("date");
    let price = $("#inputPrice").val().replace(",", "");
    let status = $("#inputStatus").val();
    // console.log(row_id,full_name,email,title,phone,price,date,status);
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "updateStudent",
        row_id: row_id,
        full_name: full_name,
        email: email,
        title: title,
        phone: phone,
        price: price,
        date: date,
        status: status,
        _nonce: wcp_ajax_dashboard._nonce,
      },
      dataType: "JSON",
      beforSend: function () {
        $(".save-icon").show();
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
        $(".save-icon").hide();
      },
    });
  });
});
