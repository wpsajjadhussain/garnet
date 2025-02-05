/**
 * Website: garnet
 * Template Name: Custom jQuery Functions
 * @package troon
 * @subpackage troon
 * @troontechnologies
 */
// Main Start
jQuery(function ($) {
  /*Sticky Header*/
  jQuery(window).scroll(function ($) {
    var sticky = jQuery("#site-header"),
      scroll = jQuery(window).scrollTop();

    if (scroll >= 200) sticky.addClass("fixed");
    else sticky.removeClass("fixed");
  });

  /*Sticky Header*/
  jQuery(window).scroll(function ($) {
    var sticky = jQuery("#header-wrapper"),
      scroll = jQuery(window).scrollTop();

    if (scroll >= 200) sticky.addClass("fixed");
    else sticky.removeClass("fixed");
  });

  $("#toast-close").click(function () {
    $("#toast-wrap").slideUp("slow");
  });

  $(".menu-toggle").on("click", function () {
    $(".destop-icon").toggle(); // Toggle visibility of desktop-icon
    $(".mobile-icon").toggle(); // Toggle visibility of mobile-icon
  });

  if (window.innerWidth <= 991) {
    jQuery(".sub-menu").hide();
  }

  jQuery(".modal-backdrop").remove();

  // Slick Slider
  $("#client-carousel").slick({
    dots: false,
    infinite: true,
    arrows: false,
    autoplay: true,

    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 8000,
    pauseOnHover: false,
    cssEase: "linear",

    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // post slider
  $("#post-carousel").slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    adaptiveHeight: false,
    cssEase: "linear",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
    prevArrow:
      '<button type="button" class="d-none slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="49" viewBox="0 0 48 49" fill="none"><path d="M24 32.3804L16 24.3804M16 24.3804L24 16.3804M16 24.3804H32M4 24.3804C4 35.4261 12.9543 44.3804 24 44.3804C35.0457 44.3804 44 35.4261 44 24.3804C44 13.3347 35.0457 4.38037 24 4.38037C12.9543 4.38037 4 13.3347 4 24.3804Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',

    nextArrow: '<button type="button" class="slick-next"></button>',
  });

  // Hero slider
  $("#hero-carousel").slick({
    draggable: true,
    dots: false,
    autoplay: true,
    infinite: true,
    slidesToShow: 1,
    adaptiveHeight: true,
    fade: true,
    speed: 1000,
    cssEase: "linear",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // gallery silder
  $("#gallery-slider").slick({
    dots: false,
    autoplay: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 6,
    slidesToScroll: 1,
    adaptiveHeight: false,
    cssEase: "linear",
    variableWidth: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          variableWidth: false,
        },
      },
    ],
    prevArrow: '<button type="button" class=" slick-prev"></button>',

    nextArrow: '<button type="button" class="slick-next"></button>',
  });
}); //main function end.



// post carousel
jQuery(document).ready(function($){
  $('.post-carousel').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
          {
          breakpoint: 1024,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
          }
          },
          {
          breakpoint: 600,
          settings: {
              slidesToShow: 2,
              slidesToScroll: 2
          }
          },
          {
          breakpoint: 480,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
          }
      ]
  });
});
