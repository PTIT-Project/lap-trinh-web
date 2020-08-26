function showMyNotification(from, align, message, type, icon, delay) {
  $.notify(
    {
      icon: icon,
      message: message
    },
    {
      type: type,
      timer: 500,
      delay: delay,
      placement: {
        from: from,
        align: align
      },
      z_index: 999999
    }
  );
}

function isInteger(event) {
  var keyCode = event.keyCode;
  if ((keyCode >= 48 && keyCode <= 57) || keyCode == 08) {
    return true;
  }
  return false;
}

$(function() {
  // Thêm class 'lazy' vào tất cả hình ảnh trên website
  $("img").each(function() {
    $(this).addClass("lazy");
  });

  // Gọi hàm lazy load
  $(function() {
    $("img.lazy").lazyload();
  });

  var body = "html, body";

  var footerY = $("#footer").offset().top - 2500;

  var allHiddenClass = "hidden right-hidden left-hidden bottom-hidden";
  var appearClass = "shown";

  var footerSection = "#footer";

  /**
   * Scroll when clicking
   */

  $(".toFooter").click(function(e) {
    $(body).animate({ scrollTop: footerY });
  });

  // Go to top button scroll handling
  $("#goTopBtn").click(function(e) {
    $(body).animate({ scrollTop: 0 });
  });

  /**
   * Scroll Event Handling
   */
  $(window).scroll(function() {
    var top = $("html,body").scrollTop();

    if (top > 0) {
      $(".navbar").removeClass("bg-none");
      $(".navbar").addClass("small-navbar bg-white shadow");
      $(".easy-autocomplete").removeClass("w-75");
      $(".easy-autocomplete").addClass("w-100");
      $("#input-search").addClass("form-control-sm");
      $(".form-control-feedback").addClass("sm");
    } else {
      $(".easy-autocomplete").addClass("w-75");
      $(".easy-autocomplete").removeClass("w-100");
      $("#input-search").removeClass("form-control-sm");
      $(".form-control-feedback").removeClass("sm");
      $(".navbar").removeClass("small-navbar bg-white shadow");
      $(".navbar").addClass("bg-none");
    }

    $(".hidden, .bottom-hidden, .top-hidden, .left-hidden, .right-hidden").each(
      function() {
        var elTop = $(this)[0].getBoundingClientRect().top;

        if (top > elTop) {
          $(this).removeClass(allHiddenClass);
          $(this).addClass(appearClass);
        }
      }
    );

    // // var navHeight = $('.navbar').height();
    // if (top > 0) {
    //   $(".navbar").removeClass("bg-none");
    //   $(".navbar").addClass("small-navbar bg-white shadow");
    //   $("#input-search").removeClass("w-75");
    //   $("#input-search").addClass("form-control-sm");
    //   $(".form-control-feedback").addClass("sm");
    // } else {
    //   $("#input-search").addClass("w-75");
    //   $("#input-search").removeClass("form-control-sm");
    //   $(".form-control-feedback").removeClass("sm");
    //   $(".navbar").removeClass("small-navbar bg-white shadow");
    //   $(".navbar").addClass("bg-none");
    // }

    if (top > 300) {
      $("#goTopBtn").removeClass(allHiddenClass);
      $("#goTopBtn").addClass(appearClass);
    } else {
      $("#goTopBtn").removeClass(appearClass);
      $("#goTopBtn").addClass("right-hidden");
    }
    if (top > footerY) {
      $(footerSection).removeClass(allHiddenClass);
      $(footerSection).addClass(appearClass);
    }
  });

  /**
   * Fancy Box - Image zoom effect
   */
  // Remove padding, set opening and closing animations, close if clicked and disable overlay
  $("a.thumbnail").fancybox({
    padding: 0,

    openEffect: "elastic",
    openSpeed: 150,

    closeEffect: "elastic",
    closeSpeed: 150,

    closeClick: true,

    helpers: {
      overlay: { closeClick: true }
    }
  });

  /**
   * Slick - Carousel effect
   */
  $(".slider-outer").slick({
    autoplaySpeed: 1500,
    autoplay: true,
    dots: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });

  $("input.input-quantity").each(function() {
    var _priceSelector = "span#" + $(this).attr("id") + ".price";
    var _costSelector = "span#" + $(this).attr("id") + ".cost";

    $(this).keypress(function(e) {
      if (isInteger(event)) {
        var price = $(_priceSelector).text();
        var cost = Math.round((price * $(this).val() * 100) / 100);
        $(_costSelector).text(cost);
        return true;
      }
      return false;
    });
    
    $(this).keyup(function(e) {
      var max = parseInt($(this).attr("max"));
      var min = parseInt($(this).attr("min"));

      if ($(this).val() > max) {
        $(this).val(max);
      }

      if ($(this).val() === "" || $(this).val() == 0) {
        $(this).val(min);
      }

      var price = $(_priceSelector).text();
      var cost = Math.round((price * $(this).val() * 100) / 100);
      $(_costSelector).text(cost);
    });

    $(this).click(function(e) {
      var price = $(_priceSelector).text();
      var cost = Math.round((price * $(this).val() * 100) / 100);
      $(_costSelector).text(cost);
    });
  });
});
