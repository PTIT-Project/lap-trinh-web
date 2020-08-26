<?php include './template-parts/header.php' ?>

<?php 
    $rsGET = mysqli_query($DB_LINK, 'SELECT count(CustomerID) AS total FROM customers');
    $row = mysqli_fetch_assoc($rsGET);
    $total_records = $row['total'];
    
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    
    // tổng số trang
    $total_page = ceil($total_records / $limit);
    
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    
    // Tìm Start
    $start = ($current_page - 1) * $limit;
    
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách bản ghi
    $rsGET = mysqli_query($DB_LINK, "SELECT * FROM customers LIMIT $start, $limit");

    $id = '';
    $name = '';
    $phone = '';
    $address = '';
    $country = '';
    $postalCode = '';
    $city = '';
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Khách hàng</h4>
                        <p class="card-category">Bảng chi tiết thông tin khách hàng đã mua hàng tại website</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="">
                                    <th>Mã</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Thành phố</th>
                                    <th>Quốc tịch</th>
                                    <th>Mã bưu chính</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($rsGET) > 0) {
                                            while($row = mysqli_fetch_assoc($rsGET)) {
                                                $currID = $row['CustomerID'];
                                                $currName = $row['CustomerName'];
                                                $currPhone = $row['Phone'];
                                                $currAddress = $row['Address'];
                                                $currCity = $row['City'];
                                                $currCountry = $row['Country'];
                                                $currPostalCode = $row['PostalCode'];
                                    ?>
                                    <tr>
                                        <td><?php echo $currID ?></td>
                                        <td><?php echo $currName ?></td>
                                        <td><?php echo $currPhone ?></td>
                                        <td><?php echo $currAddress ?></td>
                                        <td><?php echo $currCity ?></td>
                                        <td><?php echo $currCountry ?></td>
                                        <td><?php echo $currPostalCode ?></td>
                                        <td>
                                            <a href="update-customer.php?id=<?php echo $currID ?>" type="button"
                                                class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="remove-customer.php?id=<?php echo $currID ?>" type="button"
                                                class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php   }
                                        } 
                                    ?>
                                </tbody>
                            </table>

                            <nav aria-label="...">
                                <style>
                                .page-item.active .page-link {
                                    background-color: #9c27b0;
                                    border-color: #9c27b0;
                                }

                                .page-link {
                                    color: #9c27b0;
                                }
                                </style>
                                <ul class="pagination justify-content-right">
                                    <?php 
                                    // Lặp khoảng giữa
                                    for ($i = 1; $i <= $total_page; $i++){
                                        if ($i == $current_page){
                                            echo '
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">' . $i . '<span class="sr-only">(current)</span></a>
                                                </li>
                                            ';
                                        }
                                        else{
                                            echo '
                                                <li class="page-item"><a class="page-link" href="customer.php?page='.$i.'">'.$i.'</a></li>
                                            ';
                                        }
                                    }
                                ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './template-parts/footer.php' ?>