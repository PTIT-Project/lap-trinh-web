<?php
$title = get_field('tieu_de_k1');
$desc = get_field('mo_ta_k1');
$add = get_field('btn_add_to_cart');
?>

<!-- JUST RELEASED block -->
<section id="justReleased" class="row justify-content-center">
    <div id="justReleasedTitle" class="hidden col-12 text-center header-box">
        <h2 class="text-capitalize title-section"><?php echo $title ?></h3>
            <h6 class="text-muted"><?php echo $desc ?></h6>
    </div>

    <div class="row container">
        <!-- Loop to show post type san_pham -->
        <?php
        $product_data = new WP_Query(array('post_type' => 'san_pham'));

        while ($product_data->have_posts()) {
            $product_data->the_post();
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'large');
            $link = get_field('link_sản_phẩm');
            ?>

            <!-- This one san_pham -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="just-released-card card bottom-hidden shadow p-0 mt-3">
                    <div class="card-body p-0 product">
                        <a href="<?php echo $thumb[0] ?>" target="_blank" class="thumbnail" title="<?php the_title(); ?>">
                            <img class="w-100 h-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" srcset="">
                        </a>
                        <button type="button" class="add-to-cart btn"><i class="fas fa-lg fa-cart-plus mr-2"></i> <?php echo $add ?></button>
                    </div>
                </div>
            </div>
            <!-- #end one san_pham -->

        <?php } ?>
        <!-- #end loop san_pham -->
    </div>

    <div class="col-12 text-center footer-box">
        <a name="" class="shadow-sm pt-2 pb-2 pl-4 pr-4 btn-rounded btn my-btn btn-secondary text-uppercase" href="#" role="button">Xem thêm những ấn bản mới nhất</a>
    </div>
</section>
<!-- end just-released -->