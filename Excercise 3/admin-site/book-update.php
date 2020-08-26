<?php
    include './template-parts/database.php';

    if (isset($_POST)) {
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $author = $_REQUEST['author'];
        $cate = $_REQUEST['category'];
        $price = $_REQUEST['price'];
        $shortDesc = $_REQUEST['shortDesc'];
        
        if(!empty($_FILES['file'])){
            if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/image/book-poster/' . $_FILES['file']['name'])) {
                $thumbName = $_FILES['file']['name'];
                if(mysqli_query($DB_LINK, "UPDATE books SET Title = '$title', Price = $price, AuthorID = $author, CategoryID = $cate, ShortDescription = '$shortDesc', PosterURI = '$thumbName' WHERE BookID = $id")){
                    die('Cập nhật thành công');
                } else {
                    die('Cập nhật thất bại');
                }
            } else {
                die('Upload ảnh bị lỗi!');
            }
        }
        else {
            if(mysqli_query($DB_LINK, "UPDATE books SET Title = '$title', AuthorID = $author, CategoryID = $cate, Price = $price, ShortDescription = '$shortDesc' WHERE BookID = $id")) {
                die('Cập nhật thành công');  
            } else {
                die('Cập nhật thất bại');
            }
        }
    }
?>