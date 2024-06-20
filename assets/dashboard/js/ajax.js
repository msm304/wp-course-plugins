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
    let row_id = el.data("idrow");
    alert(row_id);
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

  // Add Student Ajax
  $("form.student-add").submit(function (e) {
    e.preventDefault();
    let full_name = $("#newFullName").val();
    let email = $("#newEmail").val();
    let title = $("#inputTitle").val();
    let slug = $("#newSlug").val();
    let IdCourse = $("#inputIdCourse").val();
    let IdStudent = $("#inputIdStudent").val();
    let phone = $("#newPhone").val();
    let price = $("#newPrice").val().replace(",", "");
    let status = $("#newStatus").val();
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "addStudent",
        full_name: full_name,
        email: email,
        title: title,
        slug: slug,
        IdCourse: IdCourse,
        IdStudent: IdStudent,
        phone: phone,
        price: price,
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

  // Delete Transaction Ajax
  $(".wcp-delete-transaction").on("click", function (e) {
    e.preventDefault();
    let el = $(this);
    // console.log(el);
    let transactionId = el.data("transactionid");
    // alert(transactionId);
    // console.log(transactionId);
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "deleteTransaction",
        transactionId: transactionId,
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

  // Edit Transaction Ajax

  // Update References Ajax
  $(".wcp-update-reference").on("click", function (e) {
    e.preventDefault();
    let el = $(this);
    let id = el.data("id");
    let r_number = el.parents("li").find(".r-number").text();
    let title = el.parents("li").find(".r-title").text();
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "updateReferenceAction",
        id: id,
        r_number: r_number,
        title: title,
        _nonce: wcp_ajax_dashboard._nonce,
      },
      dataType: "JSON",
      beforeSend: function () {
        el.find("i")
          .removeClass("ti-pencil-alt")
          .addClass("ti-reload loading-icon");
      },
      success: function (response) {
        if (response.success) {
          jQuery.toast({
            text: response.message,
            icon: "success",
            loader: true, // Change it to false to disable loader
            position: "top-left",
            bgColor: "#2ed573",
            textColor: "white",
            textAlign: "right",
            loaderBg: "#7bed9f", // To change the background
            allowToastClose: false,
          });
        }
      },
      error: function (error) {
        jQuery.toast({
          /*    heading: 'خطا',*/
          text: error.responseJSON.message,
          icon: "error",
          loader: true, // Change it to false to disable loader
          position: "top-left",
          bgColor: "#ff4757",
          textColor: "white",
          textAlign: "right",
          loaderBg: "#ff6b81", // To change the background
          allowToastClose: false,
        });
      },
      complete: function () {
        el.find("i")
          .removeClass("ti-reload loading-icon")
          .addClass("ti-pencil-alt");
      },
    });
  });

  // Add Reference Ajax
  $("#wcp-add-new-reference").on("submit", function (e) {
    e.preventDefault();
    let course_id_slug = $(".course-id-slug").val();
    let r_number = $(".reference-number").val();
    let title = $(".reference-new-title").val();
    $.ajax({
      type: "POST",
      url: wcp_ajax_dashboard.ajax_url,
      data: {
        action: "insertReferenceAction",
        course_id_slug: course_id_slug,
        r_number: r_number,
        title: title,
        _nonce: wcp_ajax_dashboard._nonce,
      },
      dataType: "JSON",
      beforSend: function () {
        $(".btn-submit-insert-reference")
          .find("i")
          .removeClass("'ti-plus")
          .addClass("ti-reload loading-icon");
      },
      success: function (response) {
        if (response.success) {
          jQuery.toast({
            text: response.message,
            icon: "success",
            loader: true, // Change it to false to disable loader
            position: "top-left",
            bgColor: "#2ed573",
            textColor: "white",
            textAlign: "right",
            loaderBg: "#7bed9f", // To change the background
            allowToastClose: false,
          });
        }
        $(".reference-new-title").val("");
        $(".reference-number").val(function (i, val) {
          return val * 1 + 1;
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
        $(".btn-submit-insert-reference")
          .find("i")
          .removeClass("ti-reload loading-icon")
          .addClass("ti-plus");
      },
    });
  });

  $(".wcp-get-course-references").on("change", function () {
    let el = $(this);
    let cid = el.val();
    $(".refrences-list option").remove();
    $.ajax({
      url: wcp_ajax_dashboard.ajax_url,
      type: "POST",
      dataType: "JSON",
      data: {
        action: "getCoursesTitleAction",
        cid: cid,
        _nonce: wcp_ajax_dashboard._nonce,
      },
      beforeSend: function () {},
      success: function (response) {
        // console.log(response[1].title);
        for (
          var i = 0, keys = Object.keys(response), l = keys.length;
          i < l;
          i++
        ) {
          $(".refrences-list").append(
            '<option value="' +
              response[i].c_id +
              "|" +
              response[i].r_number +
              "|" +
              response[i].c_slug +
              '">' +
              response[i].title +
              "</option>"
          );
        }
      },
      error: function (error) {
        jQuery.toast({
          /*    heading: 'خطا',*/
          text: error.responseJSON.message,
          icon: "error",
          loader: true, // Change it to false to disable loader
          position: "top-left",
          bgColor: "#ff4757",
          textColor: "white",
          textAlign: "right",
          loaderBg: "#ff6b81", // To change the background
          allowToastClose: false,
        });
      },
      complete: function () {},
    });
  });
});
