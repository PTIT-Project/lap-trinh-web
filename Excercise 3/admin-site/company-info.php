<?php include './template-parts/header.php' ?>

<?php 
    $queryGET = "SELECT * FROM `company-info` WHERE id = 'DEFAULT'";
    $rsGET = mysqli_query($DB_LINK, $queryGET);

    if(mysqli_num_rows($rsGET) > 0) {
        while($row = mysqli_fetch_assoc($rsGET)) {
            $currName = $row['name'];
            $currAddress = $row['address'];
            $currCountry = $row['country'];
            $currPhone = $row['phone'];
            $currEmail = $row['email'];
            $currFB = $row['facebook'];
            $currTT = $row['twitter'];
            $currIG = $row['instagram'];
            $currMap = $row['map'];
        }

    }
?>

<?php 
    if(isset($_POST['update'])) {
        $name = $_POST['companyName'];
        $address = $_POST['companyAddress'];
        $country = $_POST['companyCountry'];
        $phone = $_POST['companyPhone'];
        $email = $_POST['companyEmail'];
        $facebook = $_POST['companyFB'];
        $twitter = $_POST['companyTT'];
        $instagram = $_POST['companyIG'];
        $map = $_POST['companyMap'];

        $queryPOST = "UPDATE `company-info` 
                        SET 
                            `name` = '$name', `address` = '$address',
                            `country` = '$country', `email` = '$email',
                            `phone` = '$phone', `facebook` = '$facebook',
                            `twitter` = '$twitter', `instagram` = '$instagram', `map` = '$map'
                        WHERE `id`='DEFAULT'";
        mysqli_query($DB_LINK, $queryPOST) or die("Cập nhật dữ liệu thất bại");
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

<div class="content">
    <div class="container-fluid">
        <?php include './template-parts/quick-view.php' ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Thông tin Công ty</h4>
                        <p class="card-category">Các thông tin liên hệ sẽ được hiển thị ở phần chân trang</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="row mt-5 mb-4">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tên công ty</label>
                                        <input type="text" name="companyName" class="form-control"
                                            value="<?php echo $currName ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Số điện thoại</label>
                                        <input type="text" name="companyPhone" class="form-control"
                                            value="<?php echo $currPhone ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" name="companyEmail" class="form-control"
                                            value="<?php echo $currEmail ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Địa chỉ</label>
                                        <input type="text" name="companyAddress" class="form-control"
                                            value="<?php echo $currAddress ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quốc gia</label>
                                        <input type="text" name="companyCountry" class="form-control"
                                            value="<?php echo $currCountry ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Facebook</label>
                                        <input type="text" name="companyFB" class="form-control"
                                            value="<?php echo $currFB ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Twitter</label>
                                        <input type="text" name="companyTT" class="form-control"
                                            value="<?php echo $currTT ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Instagram</label>
                                        <input type="text" name="companyIG" class="form-control"
                                            value="<?php echo $currIG ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Bản đồ</label>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Sao chép đoạn mã nhúng vào ô bên
                                                dưới</label>
                                            <textarea class="form-control" name="companyMap"
                                                rows="5"><?php echo $currMap ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" name="update" class="btn btn-primary pull-right"
                                value="Cập nhật thông tin"></input>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="https://github.com/nptran">
                            <img class="img" src="https://avatars1.githubusercontent.com/u/39763631?s=460&v=4" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                        <h4 class="card-title">Trần Ngọc Phúc</h4>
                        <p class="card-description">
                            Trang quản trị nằm trong "Dự án xây dựng Website tiệm sách trực tuyến" phục vụ môn học Lập
                            trình Web 2019
                        </p>
                        <a href="https://github.com/nptran" class="btn btn-primary btn-round" target="_blank">Xem hồ
                            sơ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './template-parts/footer.php' ?>