<?php
    include './template-parts/database.php';

    if (isset($_POST)) {
        $title = $_REQUEST['title'];
        $author = $_REQUEST['author'];
        $cate = $_REQUEST['category'];
        $price = $_REQUEST['price'];
        $shortDesc = $_REQUEST['shortDesc'];
        
        if($title !== '') {
            if(!empty($_FILES['file'])){
                if (move_uploaded_file($_FILES['file']['tmp_name'], 'upload/image/book-poster/' . $_FILES['file']['name'])) {
                    $thumbName = $_FILES['file']['name'];
                    if(mysqli_query($DB_LINK, "INSERT INTO books (Title, AuthorID, CategoryID, Price, PosterURI, ShortDescription) VALUES ('$title', $author, $cate, $price, '$thumbName', '$shortDesc')")) {
                        die('Tạo mới thành công');
                    } else {
                        die('Tạo mới kèm ảnh thất bại');
                    }
                } else {
                    die('Upload ảnh bị lỗi!');
                }
            }
            else {
                if(mysqli_query($DB_LINK, "INSERT INTO books (Title, AuthorID, CategoryID, Price, ShortDescription) VALUES ('$title', $author, $cate, $price, '$shortDesc')")) {
                    die('Tạo mới thành công');
                } else {
                    die('Tạo mới thất bại');
                }
            }
        } else {
            die("Tên ấn phẩm là bắt buộc");
        }
    }
?>