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
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> -->
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/c9b4e5a8a2.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link href="./assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body style="background-size: cover; background-image: url(https://i.imgur.com/bD9rl6W.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Brazos Bookstore</h4>
                        <p class="category">Vui lòng đăng nhập để sử dụng hệ thống dành cho quản trị
                            viên!</p>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="">
                            <p class="description text-center mb-0">Đăng nhập</p>
                            <div class="card-body">

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">account_circle</i>
                                            </div>
                                        </div>
                                        <input name="username" type="text" class="form-control"
                                            placeholder="Tên đăng nhập...">
                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">lock_outline</i>
                                            </div>
                                        </div>
                                        <input name="password" type="password" placeholder="Mật khẩu..."
                                            class="form-control">
                                    </div>
                                </div>
                                <input type="submit" name="login" class="btn btn-primary" value="Đăng nhập">
                                <a href="http://localhost/brazosbookstore/" class="btn btn-secondary">Đến trang web</a>
                                <?php 
                                    if(isset($_POST['login'])) {
                                        include './template-parts/database.php';
                                        
                                        $user = $_POST['username'];
                                        $pass = $_POST['password'];

                                        $query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
                                        $rs = mysqli_query($DB_LINK, $query);
                                    
                                        if(mysqli_num_rows($rs) > 0) {
                                            while($row = mysqli_fetch_assoc($rs)) {
                                                setcookie('username', $user, time()+3600);
                                                setcookie('password', $pass, time()+3600);
                                                header('location:index.php');
                                            }
                                        } else { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Sai thông tin đăng nhập! Hãy thử lại hoặc đăng ký tài khoản mới.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </form>

                        <hr>
                        <span class="ml-3">Chưa có tài khoản? <?php include 'registration.php' ?></span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="fixed-bottom">
        <?php include './template-parts/footer.php' ?>
    </div>

    <script>
    // Mã AJAX kiểm tra tồn tại username
    var error = 0;
    $('#txtUsername').keyup(function(e) {
        setTimeout(() => {
            var chosenUsername = $('#txtUsername').val();

            $.get('./template-parts/checkUsername.php', {
                username: chosenUsername
            }, function(isExist) {
                error = isExist;
                if (error > 0) {
                    $('.alert-username').removeClass('d-none');
                } else {
                    $('.alert-username').addClass('d-none');
                }
            })
        }, 500);
    });
    $('#txtUsername').blur(function(e) {
        if($('#txtUsername').val()==='') {
            $('#alertUsernameNull').removeClass('d-none');
        } else {
            $('#alertUsernameNull').addClass('d-none');
        }
    });
    $('#txtPassword').blur(function(e) {
        if($('#txtPassword').val()==='') {
            $('#alertPasswordNull').removeClass('d-none');
        } else {
            $('#alertPasswordNull').addClass('d-none');
        }
    });

    // đăng ký tài khoản
    function register(user, pass) {
        console.log(user);
        console.log(pass);
        $.get("./template-parts/register.php", {
                username: user,
                password: pass
            },
            function(data) {
                if (data === 'USERNAME_EXIST') {
                    $('.alert-username').removeClass('d-none');
                    $('.alert-success').addClass('d-none');
                } 
                else if (data === 'SUCCESS') {
                    $('.alert-success').removeClass('d-none');
                    $('.alert-username').addClass('d-none');
                } else if (data === 'PASSWORD_NULL') {
                    $('#alertPasswordNull').removeClass('d-none');
                } else if (data === 'USERNAME_NULL') {
                    $('#alertUsernameNull').removeClass('d-none');
                } else if (data === 'NULL') {
                    $('#alertUsernameNull').removeClass('d-none');
                    $('#alertPasswordNull').removeClass('d-none');
                }
            },
        );
    }
    </script>
</body>

</html>