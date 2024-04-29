jQuery(document).ready(function ($) {
  $(".three_slide").slick({
    slidesToShow: 3,
    arrows: true,
    autoplay: true,
    dots: false,
    responsive: [
      {
        breakpoint: 800,
        settings: {
          arrows: false,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".three_slide-dots").slick({
    slidesToShow: 3,
    arrows: true,
    autoplay: true,
    dots: true,
    responsive: [
      {
        breakpoint: 800,
        settings: {
          arrows: false,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".video-title").on("click", function () {
    let el = $(this);
    let video_link = el.data("link");
    $(".video-source").attr("src", video_link);
    $(".course-video-player")[0].load();
    $("html,body").animate({
      scrollTop: $(".video-section").position().top,
    });
  });
  // star rating
  $(function () {
    $(document).on(
      {
        mouseover: function (event) {
          $(this).find(".far").addClass("star-over");
          $(this).prevAll().find(".far").addClass("star-over");
        },
        mouseleave: function (event) {
          $(this).find(".far").removeClass("star-over");
          $(this).prevAll().find(".far").removeClass("star-over");
        },
      },
      ".rate"
    );

    $(document).on("click", ".rate", function () {
      if (!$(this).find(".star").hasClass("rate-active")) {
        $(this)
          .siblings()
          .find(".star")
          .addClass("far")
          .removeClass("fas rate-active");
        $(this)
          .find(".star")
          .addClass("rate-active fas")
          .removeClass("far star-over");
        $(this)
          .prevAll()
          .find(".star")
          .addClass("fas")
          .removeClass("far star-over");
      } else {
        console.log("has");
      }
    });
  });
});
