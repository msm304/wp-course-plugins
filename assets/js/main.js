jQuery(document).ready(function ($) {

  jQuery(".three_slide").slick({
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
});
