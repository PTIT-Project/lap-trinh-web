<?php include './template-parts/header.php' ?>

<?php 
    $rsGET = mysqli_query($DB_LINK, 'SELECT count(id) AS total FROM orders');
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
    $rsGET = mysqli_query($DB_LINK, "SELECT Title, Price, id, CustomerID, o.BookID, Quantity, Date, Status FROM orders AS o INNER JOIN books AS b ON o.BookID = b.BookID ORDER BY o.Date DESC LIMIT $start, $limit");

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Đơn hàng</h4>
                        <p class="card-category">Bảng danh sách đơn hàng</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="">
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Mã khách hàng</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Trạng thái</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($rsGET) > 0) {
                                            while($row = mysqli_fetch_assoc($rsGET)) {
                                                $ID = $row['id'];
                                                $customerID = $row['CustomerID'];
                                                $bookID = $row['BookID'];
                                                $bookTitle = $row['Title'];
                                                $quantity = $row['Quantity'];
                                                $status = $row['Status'];
                                                $cost = $row['Price'] * $quantity;
                                                $date = $row['Date'];
                                    ?>
                                    <tr>
                                        <td><?php echo $ID ?></td>
                                        <td class="text-center"><?php echo $date ?></td>
                                        <td class="text-center"><?php echo $customerID ?></td>
                                        <td class="text-center"><?php echo $bookID ?></td>
                                        <td><?php echo $bookTitle ?></td>
                                        <td class="text-center"><?php echo $quantity ?></td>
                                        <td>$<?php echo number_format((float)$cost, 2, '.', '') ?></td>
                                        <td>
                                            <?php if($status==1) { ?>
                                            <span class="badge badge-success">Đã thanh toán</span>
                                            <?php } else { ?>
                                            <span class="badge badge-warning">Đang chờ</span>
                                            <?php } ?>
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