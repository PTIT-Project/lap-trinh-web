<?php
    //HACK: Thêm vào để sửa lỗi header(), gọi hàm này ở dòng đầu tiên của file
    ob_start(); 
?>

<?php include './template-parts/header.php' ?>
<?php 
    if(isset($_GET['id'])) {
        $currID = $_GET['id'];
        $rsGET = mysqli_query($DB_LINK, "SELECT * FROM customers WHERE CustomerID=$currID");
        while($row = mysqli_fetch_assoc($rsGET)) {
            $currID = $row['CustomerID'];
            $currName = $row['CustomerName'];
            $currPhone = $row['Phone'];
            $currAddress = $row['Address'];
            $currCity = $row['City'];
            $currCountry = $row['Country'];
            $currPostalCode = $row['PostalCode'];
        }
    }
?>
<?php 
    if(isset($_POST['update'])) {
        $name = $_POST['customerName'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postalcode = $_POST['postalcode'];

        $queryPOST = "UPDATE `customers` 
                        SET 
                            `CustomerName` = '$name', `Address` = '$address',
                            `Country` = '$country', `City` = '$city',
                            `Phone` = '$phone', `PostalCode` = '$postalcode'
                        WHERE `CustomerID`=$currID";
        mysqli_query($DB_LINK, $queryPOST) or die("Cập nhật dữ liệu thất bại");
        header('location:customer.php');
    }
?>
<div class="content">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Cập nhật thông tin khách hàng</h4>
            <p class="category">Cập nhật thông tin chi tiết cho khách hàng - Mã số: <?php echo $currID ?></p>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row mt-5 mb-4">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">Mã khách
                                hàng</label>
                            <input type="text" name="customerID" class="form-control" value="<?php echo $currID ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label class="bmd-label-floating">Tên khách
                                hàng</label>
                            <input type="text" name="customerName" class="form-control" value="<?php echo $currName ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Quốc
                                tịch</label>
                            <input type="text" name="country" class="form-control" value="<?php echo $currCountry ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa
                                chỉ</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $currAddress ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Thành
                                phố</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $currCity ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="bmd-label-floating">Số điện
                                thoại</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $currPhone ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Mã bưu
                                chính</label>
                            <input type="text" name="postalcode" class="form-control"
                                value="<?php echo $currPostalCode ?>">
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-default pull-right"><a style="color: white"
                        href="customer.php">Huỷ</a></button>
                <input type="submit" name="update" class="btn btn-primary pull-right" data-dismiss="modal"
                    value="Lưu thay đổi"></input>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<?php include './template-parts/footer.php' ?>