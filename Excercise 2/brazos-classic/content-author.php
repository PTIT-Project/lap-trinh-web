<!-- POPULAR WRITER block -->
<?php
wp_reset_query();
?>

<section id="popularWriter" class="container-fluid">
    <div class="row">
        <div class="col-12 text-center header-box hidden" id="popularWriterTitle">
            <h2 class="text-capitalize title-section">Cây viết nổi bật</h3>
                <h6 class="text-muted">Những tác giả được yêu thích nhất gần đây</h6>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $writer = new WP_Query(array('post_type' => 'cay_viet_noi_bat'));
            while ($writer->have_posts()) {
                $writer->the_post();
                
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'large');
                $facebook = get_field('writer_facebook');
                $twitter = get_field('writer_twitter');
                $instagram = get_field('writer_instagram');
                $youtube = get_field('writer_youtube');
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow p-0 author text-center left-hidden">
                        <a class="author-image w-100 thumbnail" target="_blank" href="<?php echo $thumb[0] ?>">
                            <img class="img-responsive w-100 " src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                        </a>
                        <h5 class="title"><?php the_title() ?></h5>
                        <div class="social mb-3">
                            <a href="<?php echo $twitter ?>" title="Twitter" target="_blank" class="icon-link fa-lg mr-2 fab fa-twitter"></a>
                            <a href="<?php echo $instagram ?>" title="Instagram" target="_blank" class="icon-link fa-lg mr-2 fab fa-instagram"></a>
                            <a href="<?php echo $facebook ?>" title="Facebook" target="_blank" class="icon-link fa-lg mr-2 fab fa-facebook"></a>
                            <a href="<?php echo $youtube ?>" title="Youtube" target="_blank" class="icon-link fa-lg mr-2 fab fa-youtube"></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- end popular-writer -->