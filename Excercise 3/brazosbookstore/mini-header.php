<?php include 'set-cart.php' ?>
<?php 
    include './template-parts/database.php';
    $items = 0;
    if(isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
        foreach ($cart as $id => $quantity) {
            $items += $quantity;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiệm Sách Quốc Dân</title>
    <link rel="icon" href="./img/title-icon.png" type="image/x-icon">

    <!-- Js -->
    <script src="./theme/lib/bootstrap-4.2.1-dist/js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script src="./theme/lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>

    <!-- Facebook SDK -->
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=463757824153509&autoLogAppEvents=1">
    </script>

    <!-- Slick (for carousel) -->
    <script src="./theme/lib/slick-1.8.1/slick/slick.js"></script>

    <!-- Numeric -->
    <script src="./theme/lib/jquery.numeric/jquery.numeric.js"></script>

    <!-- Fancy Box -->
    <script type="text/javascript" src="./theme/lib/fancybox-2.1/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
    <script type="text/javascript" src="./theme/lib/fancybox-2.1/source/jquery.fancybox.pack.js?v=2.1.5">
    </script>

    <!-- Bootstrap Notify -->
    <script src="./theme/lib/bootstrap-notify-3.1.3/dist/bootstrap-notify.js"></script>
    <link rel="stylesheet" href="./theme/lib/bootstrap-notify-3.1.3/animate.css">

    <!-- Material icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Autocomplete -->
    <!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> -->
    <script src="./theme/lib/easyautocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>
    <link rel="stylesheet" href="./theme/lib/easyautocomplete-1.3.5/easy-autocomplete.min.css">
    <link rel="stylesheet" href="./theme/lib/easyautocomplete-1.3.5/easy-autocomplete.themes.min.css">

    <!-- Custom JS -->
    <script src="./theme/script.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./theme/style.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="150">
    <?php include './template-parts/database.php' ?>
    <!-- NAVBAR fixed-top when scrolled -->
    <nav class="navbar navbar-expand-lg navbar-light bg-none fixed-top">
        <a class="navbar-brand" href="index.php"><img class="w-100 h-100" src="./img/logo.png" alt="" srcset=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li id="toTrending" class="nav-item">
                    <a class="nav-link text-uppercase" href="index.php">Trang chủ</a>
                </li>
                <li id="toJustReleased" class="nav-item">
                    <a class="nav-link text-uppercase" href="index.php#justReleased">Mới nhất</a>
                </li>
                <li id="toCategory" class="nav-item">
                    <a class="nav-link text-uppercase" href="index.php#category">Thể loại</a>
                </li>
                <li id="toPopularWriter" class="nav-item">
                    <a class="nav-link text-uppercase" href="index.php#popularWriter">Tác giả</a>
                </li>
                <li id="toFooter" class="nav-item">
                    <a class="nav-link text-uppercase" href="#footer">Liên hệ</a>
                </li>
            </ul>

            <?php include './template-parts/search/search.php' ?>

            <ul class="navbar-nav">
                <li class="nav-item dropdown" title="Giỏ hàng">
                    <a class="nav-link ml-3" href="" target="_blank" id="navbarDropdownProfile" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                        <!-- Số lượng vật phẩm trong giỏ -->
                        <span
                            class="badge position-absolute badge-pill badge-danger <?php echo ($items>0) ? '' : 'd-none'?>"
                            id="itemInCart" style="left: 70%;"><?php echo $items ?>
                        </span>

                        <p class="d-lg-none d-md-block">
                            Giỏ hàng
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end-nav -->

    <section id="mini-background" class="align-items-center justify-content-center d-flex">
        <div class="row align-items-center">
            <h1 class="text-white text-capitalize">
                Giỏ hàng
            </h1>
        </div>
    </section>

    <script>
    $(function() {
        var miniHeaderHeight =
            $("#mini-background")[0].getBoundingClientRect().bottom - 50;

        setTimeout(() => {
            $("html, body").animate({
                scrollTop: miniHeaderHeight
            }, 500);
        }, 2000);
    });
    </script>