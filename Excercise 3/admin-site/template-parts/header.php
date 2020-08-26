<?php 
    if(!((isset($_COOKIE['username']) && isset($_COOKIE['password'])))) {
        header('location:login.php');
    } else {
        include 'database.php';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Brazos BookStore - Trang quản lý dành cho Admin
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/c9b4e5a8a2.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link href="./assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />

    <link href="./assets/css/custome.css" rel="stylesheet" />
    <script src="./assets/js/custom.js"></script>

</head>

<body class="">

    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://localhost/brazosbookstore" class="simple-text logo-normal">
                    Brazos Bookstore
                </a>
            </div>

            <!-- <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="./index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Tổng quan</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./company-info.php">
                            <i class="material-icons">home_work</i>
                            <p>Thông tin công ty</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./customer.php">
                            <i class="material-icons">content_paste</i>
                            <p>Thông tin khách hàng</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./book.php">
                            <i class="material-icons">menu_book</i>
                            <p>Thông tin sách</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./category.php">
                            <i class="material-icons">category</i>
                            <p>Thể loại</p>
                        </a>
                    </li>

                    <li class="nav-item active-pro ">
                        <a class="nav-link" href="./upgrade.php">
                            <i class="material-icons">unarchive</i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div> -->
            <?php include 'sidebar.php' ?>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="http://localhost/brazosbookstore/">
                            <img style="height: 100%" src="./assets/img/logo.png" alt="logo.png">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Tìm kiếm...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item" title="Thống kê">
                                <a class="nav-link" href="#pablo">
                                    <i class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Thống kê
                                    </p>
                                </a>
                            </li>

                            <!-- Chuông thông báo -->
                            <li class="nav-item dropdown" title="Thông báo">
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="d-lg-none d-md-block">
                                        Các hành động được thông báo
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="#">Another Notification</a>
                                    <a class="dropdown-item" href="#">Another One</a>
                                </div>
                            </li>

                            <!-- Nút thông tin tài khoản -->
                            <li class="nav-item dropdown" title="Tài khoản">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Tài khoản
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Hồ sơ</a>
                                    <a class="dropdown-item" href="#">Cài đặt</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="http://localhost/admin-site/logout.php">Đăng xuất</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->