<?php 
    $rsGET = mysqli_query($DB_LINK, "SELECT * FROM books LIMIT 4");
?>

<section id="justReleased" class="row justify-content-center w-100 m-0">
    <div id="justReleasedTitle" class="hidden col-12 text-center header-box">
        <h2 class="text-capitalize title-section">Vừa Ra Mắt</h3>
            <h6 class="text-muted">Những cuốn sách đỉnh nhất cho năm 2019</h6>
    </div>

    <div class="row container">
        <?php 
            if(mysqli_num_rows($rsGET) > 0) {
                while($row = mysqli_fetch_assoc($rsGET)) {
                    $currID = $row['BookID'];
                    $currTitle = $row['Title'];
                    $currPoster = $row['PosterURI'];
                    $currPrice = $row['Price'];
        ?>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <div class="just-released-card left-hidden card shadow p-0">
                <div class="card-body p-0 product" title="<?php echo $currTitle ?>">
                    <a href="http://google.com.vn">
                        <img class="w-100 h-100" src="./img/loading.gif"
                            data-original="../../admin-site/upload/image/book-poster/<?php echo $currPoster ?>"
                            alt="<?php echo $currPoster ?>" srcset="">
                    </a>
                    <button onclick="addToCart($(this).attr('id'), 1)" id="<?php echo $currID ?>" type="button" class="add-to-cart btn"><i
                            class="fas fa-lg fa-cart-plus mr-2"></i> Thêm
                        vào giỏ</button>
                </div>
            </div>
        </div>

        <?php  }
            } 
        ?>
    </div>

    <div class="col-12 text-center footer-box">
        <a name="" class="shadow-sm pt-2 pb-2 pl-4 pr-4 btn-rounded btn my-btn btn-secondary text-uppercase" href="#"
            role="button">Xem thêm những ấn bản mới nhất</a>
    </div>
</section>