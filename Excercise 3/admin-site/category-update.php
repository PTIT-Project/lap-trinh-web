<?php
    include './template-parts/database.php';

    if (isset($_POST)) {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $desc = $_REQUEST['desc'];
        
        if(!empty($_FILES['file'])){
            if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/image/category-thumbnail/' . $_FILES['file']['name'])) {
                $thumbName = $_FILES['file']['name'];
                if(mysqli_query($DB_LINK, "UPDATE categories SET CategoryName = '$name', Description = '$desc', ThumbnailURI = '$thumbName' WHERE CategoryID = $id")){
                    die('Cập nhật thành công thể loại '.$name);
                } else {
                    die('Cập nhật thất bại');
                }
            } else {
                die('Upload ảnh bị lỗi!');
            }
        }
        else {
            if(mysqli_query($DB_LINK, "UPDATE categories SET CategoryName = '$name', Description = '$desc' WHERE CategoryID = $id")) {
                die('Cập nhật thành công thể loại '.$name);  
            } else {
                die('Cập nhật thất bại');
            }
        }
    }
?>