<?php
    include './template-parts/database.php';

    if (isset($_POST)) {
        $name = $_REQUEST['name'];
        $desc = $_REQUEST['desc'];
        
        if($name !== '') {
            if(!empty($_FILES['file'])){
                if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/image/category-thumbnail/' . $_FILES['file']['name'])) {
                    $thumbName = $_FILES['file']['name'];
                    if(mysqli_query($DB_LINK, "INSERT INTO categories (CategoryName, Description, ThumbnailURI) VALUES ('$name','$desc','$thumbName')")) {
                        die('Tạo mới thành công');
                    } else {
                        die('Tạo mới thất bại');
                    }
                } else {
                    die('Upload ảnh bị lỗi!');
                }
            }
            else {
                if(mysqli_query($DB_LINK, "INSERT INTO categories (CategoryName, Description) VALUES ('$name','$desc')")) {
                    die('Tạo mới thành công');
                } else {
                    die('Tạo mới thất bại');
                }
            }
        } else {
            die("Tên thể loại là bắt buộc");
        }
    }
?>