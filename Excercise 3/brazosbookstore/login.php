<div class="modal fade" id="modalLogin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h4 class="card-title">Brazos Bookstore</h4>
                        <p class="category">Đăng nhập tài khoản</p>
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
                                            placeholder="Tên tài khoản...">
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
                                <input type="submit" name="login" class="btn btn-primary my-btn btn-rounded"
                                    value="Đăng nhập">
                                <?php 
                                    if(isset($_POST['login'])) {
                                        include './template-parts/database.php';
                                        
                                        $user = $_POST['username'];
                                        $pass = $_POST['password'];

                                        $query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
                                        $rs = mysqli_query($DB_LINK, $query);
                                    
                                        if(mysqli_num_rows($rs) > 0) {
                                            while($row = mysqli_fetch_assoc($rs)) {
                                                $id =  $row['id'];
                                                setcookie('userID', $id, time()+3600);
                                                setcookie('username', $user, time()+3600);
                                                setcookie('password', $pass, time()+3600);
                                                header('location:cart.php');
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
    if ($('#txtUsername').val() === '') {
        $('#alertUsernameNull').removeClass('d-none');
    } else {
        $('#alertUsernameNull').addClass('d-none');
    }
});
$('#txtPassword').blur(function(e) {
    if ($('#txtPassword').val() === '') {
        $('#alertPasswordNull').removeClass('d-none');
    } else {
        $('#alertPasswordNull').addClass('d-none');
    }
});

// đăng ký tài khoản
function register(user, pass, name, phone, address, city, country, postalCode) {
    console.log(user);
    console.log(pass);
    $.get("./template-parts/register.php", {
            username: user,
            password: pass,
            name: name,
            phone: phone,
            address: address,
            city: city,
            country: country,
            postalCode: postalCode
        },
        function(data) {
            if (data === 'USERNAME_EXIST') {
                $('.alert-username').removeClass('d-none');
                $('.alert-success').addClass('d-none');
            } else if (data === 'SUCCESS') {
                showMyNotification("top", "center", "Đăng ký thành công", "success", "", 600);
                $('#signupModal').modal('toggle');
                $('.alert-username').addClass('d-none');
            } else if (data === 'NULL') {
                showMyNotification("top", "center", "Hãy điền đủ tất cả các trường bên dưới", "danger", "", 600);
            }
        },
    );
}
</script>
</body>

</html>