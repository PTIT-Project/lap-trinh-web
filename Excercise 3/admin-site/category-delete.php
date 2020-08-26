<?php 
    include './template-parts/database.php';

    $id = $_GET['id'];
    mysqli_query($DB_LINK, "DELETE FROM categories WHERE CategoryId = $id");
    header('location:category.php');
?>