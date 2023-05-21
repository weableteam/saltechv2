/**
 * Process scrollbar width
 *
 */
const scrollbarWidth = window.innerWidth - document.body.clientWidth;
document.body.style.setProperty("--scrollbarWidth", `${scrollbarWidth}px`);

/**
 * Fix 100vh on iOS (When address bar is show)
 *
 * Source: https://stackoverflow.com/questions/37112218/css3-100vh-not-constant-in-mobile-browser
 */
function appHeight() {
  const doc = document.documentElement;
  doc.style.setProperty("--vh", window.innerHeight * 0.01 + "px");
}
window.addEventListener("resize", appHeight);
appHeight();

/**
 * jQuery
 *
 */
(function ($) {
  var helpers = {
    addZeros: function (n) {
      return n < 10 ? '0' + n : '' + n;
    },
  };

  function sliderInit() {
    var $slider = $('.slider-holder');
    $slider.each(function () {
      var $sliderParent = $(this).parent();
      $(this).slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        prevArrow: $('.w-gl .slick-prev'),
        nextArrow: $('.w-gl .slick-next'),
        infinite: true,
    //      autoplay: true,
    //   autoplaySpeed: 1000,
    dots:false,
        responsive: [
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
              adaptiveHeight: true,
            },
          },
          {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
              adaptiveHeight: true,
            },
          },
        ],
      });

      if ($(this).find('.item').length > 1) {
        $(this).siblings('.slides-numbers').show();
      }

      $(this).on('afterChange', function (event, slick, currentSlide) {
        $sliderParent
          .find('.slides-numbers .active')
          .html(helpers.addZeros(currentSlide + 1));
      });

      var sliderItemsNum = $(this)
        .find('.slick-slide')
        .not('.slick-cloned').length;
      $sliderParent
        .find('.slides-numbers .total')
        .html(helpers.addZeros(sliderItemsNum));
    });

    //   $('.slick-next').on('click', function () {
    //     console.log('test');
    //     $('.slider-holder').slick('slickGoTo', 5);
    // });
  }

  sliderInit();
  $(document).ready(function () {
    sal({
      once: false,
    });
  });

  $("#hamburger-menu").click(function () {
    $(this).toggleClass("active");
    $(".m-menu").toggleClass("show");
    $(".overlay").toggleClass("show");
  });
  $(".overlay").click(function () {
    $("#hamburger-menu").toggleClass("active");
    $(".m-menu").toggleClass("show");
    $(".overlay").toggleClass("show");
  });

  // Loader
  // $(window).on("load",function(){
  // 	$(".w-loader").fadeOut("slow");
  // });

  // PAGEBLOGDETAIL
  // var header = document.getElementById("v-blogDetail-tab");
  // var btns = header.getElementsByClassName("detail-light");
  // for (var i = 0; i < btns.length; i++) {
  // btns[i].addEventListener("click", function() {
  // var current = document.getElementsByClassName("active");
  // current[0].className = current[0].className.replace(" active", "");
  // this.className += " active";
  // });

  // }
  if (window.location.href === "https://saltech.webmau.net/branding/") {
    $("header").addClass("d-none");
    $("footer").addClass("d-none");
  }
  $(".pageHiring .specialPost .list").slick({
    infinite: false,
    arrows: true,
    dots: false,
    autoplay: false,
    speed: 1100,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow:
      '<button type="button" class="slick-prev "><i class="bi bi-chevron-left"></i></button>',
    nextArrow:
      '<button type="button" class="slick-next "><i class="bi bi-chevron-right"></i></button>',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
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
  $(".pageHiring .contentSlideHiring .slideHiring .list").slick({
    infinite: false,
    arrows: false,
    dots: true,
    autoplay: false,
    speed: 1000,
    slidesToShow: 1.5,
    slidesToScroll: 1,
  });

  
  // backtop
  $(".toTop").click(() => {
    $("html, body").animate({
      scrollTop: $("html, body").offset().top,
    },3000);
  });
  $(".toTop").fadeOut();

  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      $(".toTop").fadeIn();
    } else {
      $(".toTop").fadeOut();
    }
  });
  $(window).on("load", function() {
    var marginLeft = $('.w-timeline .container').css('margin-left');
    $('.w-timeline .slick-list').css('margin-left',`calc(${marginLeft} + 15px)`)

    window.addEventListener('resize', function() {
    var marginLeft = $('.w-timeline .container').css('margin-left');

      $('.w-timeline .slick-list').css('margin-left',`calc(${marginLeft} + 15px)`)
  
    });

    var marginLeft = $('.w-member .container').css('margin-left');
    $('.w-member .slick-list').css('margin-left',`calc(${marginLeft} + 15px)`)

    window.addEventListener('resize', function() {
    var marginLeft = $('.w-member .container').css('margin-left');

      $('.w-member .slick-list').css('margin-left',`calc(${marginLeft} + 15px)`)
  
    });
  });


  // $('.link-prj').on('click', function(e) {
  //   e.preventDefault();
  //   var projectId = $(this).data('project-id');
  //   $.ajax({
  //   url: myAjax.ajaxurl,
  //   type: 'POST',
  //   data: {
  //       action: 'get_project_content',
  //       project_id: projectId,
  //       nonce: myAjax.nonce
  //   },
  //   success: function(response) {
  //   // Mở popup và chèn nội dung dự án vào
  //   console.log('response')
  //   },
  //   error: function(jqXHR, textStatus, errorThrown) {
  //   console.log('Lỗi khi lấy nội dung dự án: ' + textStatus + ' - ' + errorThrown);
  //   }
  //   });
  //   });
  $(document).ready(function () {
    $(".w-apj .about-slider").slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      draggable: true,
      prevArrow: `<button type='button' class='slick-prev slick-arrow'><i class="bi bi-chevron-left"></i></button>`,
      nextArrow: `<button type='button' class='slick-next slick-arrow'><i class="bi bi-chevron-right"></i></button>`,
      dots: false,
      responsive: [
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            arrows: false,
            infinite: false,
          },
        },
      ],
      // autoplay: true,
      // autoplaySpeed: 1000,
    });
  });
  $(".w-apj .about-slider").on(
    "afterChange",
    function (event, slick, currentSlide) {
      var counter = $(this).closest(".w-apj").find(".about-slider--counter");
      counter.text(currentSlide + 1 + "/" + slick.slideCount);
    }
  );
    })(jQuery);

