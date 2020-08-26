<?php 
    include './template-parts/database.php';

    $id = $_GET['id'];
    mysqli_query($DB_LINK, "DELETE FROM books WHERE BookID = $id");
    header('location:book.php');
?>