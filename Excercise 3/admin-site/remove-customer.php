<?php
    //HACK: Thêm vào để sửa lỗi header(), gọi hàm này ở dòng đầu tiên của file
    ob_start(); 
?>
<?php 
    if(isset($_GET['id'])) {
        include './template-parts/database.php';
        $currID = $_GET['id'];
        $rsGET = mysqli_query($DB_LINK, "DELETE FROM customers WHERE CustomerID=$currID");
        header('location:customer.php');
    }
?>