$(function () {

    var body = 'html, body';
    var heightScreen = $(window).height();

    var trendingY = $('#trending').offset().top;
    var justReleasedY = $('#justReleased').offset().top;
    var categoryY = $('#category').offset().top;
    var popularWriterY = $('#popularWriter').offset().top - 2100;
    var footerY = $('#footer').offset().top - 2500;
    console.log(trendingY)
    console.log(justReleasedY)
    console.log(categoryY)
    console.log(popularWriterY)
    console.log(footerY)

    var allHiddenClass = 'hidden right-hidden left-hidden bottom-hidden';
    var appearClass = 'shown';

    var trendingSection = '#trending';
    // var categorySection = '#category';
    // var justReleasedSection = '#justReleased';
    // var writerSection = '#popularWriter';
    var footerSection = '#footer';
    // var addressSection = '#address';


    /**
     * Hero background scaling
     */
    $(trendingSection).css({ 'height': heightScreen });
    $(window).resize(function () {
        var heightScreen = $(window).height();
        $(trendingSection).css({ 'height': heightScreen });
    });

    /**
     * Scroll when clicking
     */
    $('.toTrending').click(function (e) {
        $(body).animate({ scrollTop: trendingY });
    });
    $('.toJustReleased').click(function (e) {
        $(body).animate({ scrollTop: justReleasedY });
    });
    $('.toCategory').click(function (e) {
        $(body).animate({ scrollTop: categoryY });
    });
    $('.toPopularWriter').click(function (e) {
        $(body).animate({ scrollTop: popularWriterY });
    });
    $('.toFooter').click(function (e) {
        $(body).animate({ scrollTop: footerY });
    });

    // Go to top button scroll handling
    $('#goTopBtn').click(function (e) {
        $(body).animate({ scrollTop: 0 });
    });

    setTimeout(() => {
        /**
         * Display trending content immediately after the page loads
         */
        $('#trendingBookContent, #trendingBookImg').removeClass(allHiddenClass);
        $('#trendingBookContent, #trendingBookImg').addClass(appearClass);
    }, 30);

    /**
     * Scroll Event Handling
     */
    $(window).scroll(function () {
        var top = $('html,body').scrollTop();
        // var navHeight = $('.navbar').height();
        if (top > 0) {
            $('.navbar').removeClass('bg-none');
            $('.navbar').addClass('small-navbar bg-white shadow');
            $('#input-search').removeClass('w-75');
            $('#input-search').addClass('form-control-sm');
            $('.form-control-feedback').addClass('sm');
        }
        else {
            $('#input-search').addClass('w-75');
            $('#input-search').removeClass('form-control-sm');
            $('.form-control-feedback').removeClass('sm');
            $('.navbar').removeClass('small-navbar bg-white shadow');
            $('.navbar').addClass('bg-none');
        }

        if (top > justReleasedY - 300) {
            $('#justReleasedTitle').removeClass(allHiddenClass);
            $('#justReleasedTitle').addClass(appearClass);
        }
        if (top > justReleasedY) {
            $('.just-released-card').removeClass(allHiddenClass);
            $('.just-released-card').addClass(appearClass);

            $('#goTopBtn').removeClass(allHiddenClass);
            $('#goTopBtn').addClass(appearClass);
        }
        else {
            $('#goTopBtn').removeClass(appearClass);
            $('#goTopBtn').addClass('right-hidden');
        }
        if (top > popularWriterY) {
            $('#popularWriterTitle').removeClass(allHiddenClass);
            $('#popularWriterTitle').addClass(appearClass);
            if (top > popularWriterY + 270) {
                $('.author').removeClass(allHiddenClass);
                $('.author').addClass(appearClass);
            }
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

        openEffect: 'elastic',
        openSpeed: 150,

        closeEffect: 'elastic',
        closeSpeed: 150,

        closeClick: true,

        helpers: {
            overlay: { closeClick: true }
        }
    });

    /**
     * Slick - Carousel effect
     */
    $('.slider-outer').slick({
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
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
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
})