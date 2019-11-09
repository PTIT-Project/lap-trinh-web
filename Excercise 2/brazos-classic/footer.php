<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brazos_classic
 */

?>

</div><!-- #content -->
<div>
	<!-- Go top button -->
	<button type="button" id="goTopBtn" title="Lên đầu trang" class="my-btn right-hidden btn"><i class="fas fa-angle-double-up"></i></button>

	<!-- FOOTER block -->
	<div class="container-fluid bg-light p-0 shadow">
		<section id="footer" class="container-fluid bottom-hidden shadow mt-3 mr-3 ml-3 pt-5 pb-5">
			<div class="container">
				<?php
				$txt_noti = get_field('tieu_de_nhan_thong_bao');
				$placeholder = get_field('placeholder_subscribe');
				$btn_sub_content = get_field('noi_dung_nut_dang_ky');
				$btn_sub_link = get_field('link_nut_dang_ky');
				$address = get_field('dia_chi');
				$tel = get_field('so_dien_thoai');
				$email = get_field('email');
				$logo = get_field('logo');
				$social_media = get_field('tieu_dề_phần_mạng_xa_hội');
				?>
				<div class="row justify-content-between">
					<div class="col-md-4 col-lg-4 text-center">
						<h5 class="text-capitalize title"><?php echo $txt_noti ?></h5>
						<div class="subscribe mb-5">
							<input type="email" placeholder="<?php echo $placeholder ?>*" name="" class="pl-3 pr-3 shadow-sm input-rounded input-lg form-control form-control-lg" value="" required="required" title="">
							<a href="<?php echo $btn_sub_link ?>" class="shadow-sm btn-rounded btn my-btn btn-lg w-100 mt-3"><?php echo $btn_sub_content ?></a>
						</div>
						<h5 class="text-capitalize title"><?php echo $social_media ?></h5>
						<div class="social text-center">
							<a title="Theo dõi chúng tôi trên Facebook" href="https://facebook.com" target="_blank" class="fab fa-facebook-square fa-2x mr-3"></a>
							<a title="Theo dõi chúng tôi trên Twitter" href="https://twitter.com" target="_blank" class="fab fa-twitter-square fa-2x mr-3"></a>
							<a title="Theo dõi chúng tôi trên Instagram" href="https://instagram.com" target="_blank" class="fab fa-instagram fa-2x mr-3"></a>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						<div class="mb-3 text-center">
							<a href="<?php echo $home_url ?>">
								<img class="w-25 h-50" src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" srcset="">
							</a>
						</div>
						<div>
							<p>
								<a class="text-muted" target="_blank" title="Ghé thăm chúng tôi" href="https://goo.gl/maps/X2EMxCNNreQrC2JS7">
									<i class="fas fa-map-marker-alt mr-2"></i>
									<?php echo $address ?>
								</a>
							</p>
							<p>
								<a class="text-muted" title="Gọi cho chúng tôi" href="tel:<?php echo $tel ?>">
									<i class="fas fa-phone mr-2"></i> <?php echo $tel ?>
								</a>
							</p>
							<p>
								<a class="text-muted" title="Gửi thư cho chúng tôi" href="mailto:<?php echo $email ?>"><i class="fas fa-envelope mr-2"></i>
									<?php echo $email ?></a>
							</p>
							<!-- Facbook fanpage -->
							<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="" data-width="500" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
								<blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="address" class="container-fluid bg-dark pt-2 p-0">
			<!-- <div class="row">
				<div class="col-12 text-center header-box mb-4">
					<h2 class="text-capitalize title-section" style="color: white">Ghé thăm chúng tôi</h3>
						<h6 class="text-muted">Nơi chúng tôi đặt trụ sở và bạn có thể ghé qua bất cứ lúc nào</h6>
				</div>
			</div> -->
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2688308447737!2d105.7966720144066!3d20.9818582947549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc4106a8a99%3A0xda4db9c48cf21b05!2s1st+Domitory!5e0!3m2!1svi!2s!4v1558973902818!5m2!1svi!2s" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</section>
		<!-- end address with map -->
	</div>
	<!-- end footer -->
</div>
</div><!-- #page -->


<?php wp_footer(); ?>

</body>

</html>