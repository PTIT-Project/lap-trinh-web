<?php 
    $rsGET = mysqli_query($DB_LINK, "SELECT * FROM categories LIMIT 6");
?>

<section id="category" class="container-fluid bg-light">
    <div class="row">
        <div class="col-12 text-center header-box">
            <h2 class="text-capitalize title-section">Thể loại</h3>
                <h6 class="text-muted">Thỏa sức lựa chọn với đầy đủ thể loại</h6>
        </div>
    </div>

    <div class="container">
        <div class="slider-outer row">
            <?php 
                if(mysqli_num_rows($rsGET) > 0) {
                    while($row = mysqli_fetch_assoc($rsGET)) {
                        $currID = $row['CategoryID'];
                        $currName = $row['CategoryName'];
                        $currDescription = $row['Description'];
                        $currThumbnail = $row['ThumbnailURI'];
            ?>

            <!-- Lặp khối bên dưới -->
            <div class="card shadow p-0">
                <div class="card-body p-0 product">
                    <a href="http://google.com.vn">
                        <img class="w-100 h-100" src="../../admin-site/upload/image/category-thumbnail/<?php echo $currThumbnail ?>"
                            alt="<?php echo $currName ?>" srcset="">
                    </a>
                    <button type="button" class="add-to-cart btn">
                        <?php echo $currName ?></button>
                </div>
            </div>
            <!-- #end-lặp -->

            <?php  }
                } 
            ?>
        </div>
    </div>
    <div class="col-12 text-center footer-box">
        <a name="" class="shadow-sm pt-2 pb-2 pl-4 pr-4 btn-rounded btn my-btn btn-secondary text-uppercase" href="#"
            role="button">Khám phá thêm nhiều thể loại khác</a>
    </div>
</section>