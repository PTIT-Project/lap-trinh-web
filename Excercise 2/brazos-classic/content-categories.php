<?php
wp_reset_query();
$category_data = new WP_Query(array('post_type' => 'the_loai'));
?>

<!-- CATEGORY block -->
<section id="category" class="container-fluid bg-light">
    <div class="row">
        <div class="col-12 text-center header-box">
            <h2 class="text-capitalize title-section">Thể loại</h3>
                <h6 class="text-muted">Thỏa sức lựa chọn với đầy đủ thể loại</h6>
        </div>
    </div>

    <div class="container">
        <div class="slider-outer row">

            <?php while ($category_data->have_posts()) {
                $category_data->the_post();
                ?>

                <!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"> -->
                    <div class="card shadow p-0">
                        <div class="card-body p-0">
                            <a href="http://google.com.vn" target="_blank">
                                <img class="w-100 h-100" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                            </a>
                            <button type="button" class="view-on btn"><?php the_title(); ?></button>
                        </div>
                    </div>
                <!-- </div> -->

            <?php } ?>
        </div>
    </div>
    <div class="col-12 text-center footer-box">
        <a name="" class="shadow-sm pt-2 pb-2 pl-4 pr-4 btn-rounded btn my-btn btn-secondary text-uppercase" href="#" role="button">Khám phá thêm nhiều thể loại khác</a>
    </div>
</section>
<!-- end category -->