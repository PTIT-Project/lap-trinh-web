<?php 
    include './template-parts/database.php';
    
    $queryGET = "SELECT * FROM `company-info` WHERE id = 'DEFAULT'";
    $result = mysqli_query($DB_LINK, $queryGET);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $currName = $row['name'];
            $currAddress = $row['address'];
            $currCountry = $row['country'];
            $currPhone = $row['phone'];
            $currEmail = $row['email'];
            $currFB = $row['facebook'];
            $currTT = $row['twitter'];
            $currIG = $row['instagram'];
            $currMap = $row['map'];
        }
    }
?>

<div class="container-fluid bg-light p-3 shadow">
    <section id="footer" class="container-fluid shadow bottom-hidden pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4 col-lg-4 text-center">
                    <h5 class="text-capitalize title">Nhận thông báo mới hàng tuần</h5>
                    <div class="subscribe mb-5">
                        <input type="email" placeholder="Email của bạn...*" name=""
                            class="shadow-sm input-rounded input-lg form-control form-control-lg" value=""
                            required="required" title="">
                        <button type="button" class="shadow-sm btn-rounded btn my-btn btn-lg w-100 mt-3">Đăng
                            ký</button>
                    </div>
                    <h5 class="text-capitalize title">Theo dõi chúng tôi</h5>
                    <div class="social text-center mb-3">
                        <a title="Theo dõi chúng tôi trên Facebook" href="<?php echo $currFB ?>" target="_blank"
                            class="fab fa-facebook-square fa-2x mr-3"></a>
                        <a title="Theo dõi chúng tôi trên Twitter" href="<?php echo $currTT ?>" target="_blank"
                            class="fab fa-twitter-square fa-2x mr-3"></a>
                        <a title="Theo dõi chúng tôi trên Instagram" href="<?php echo $currIG ?>" target="_blank"
                            class="fab fa-instagram fa-2x mr-3"></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3 text-center">
                        <a href="index.php">
                            <img class="w-25 h-50" src="./img/logo.png" alt="logo.png" srcset="">
                        </a>
                    </div>
                    <div>
                        <p>
                            <a class="text-muted" title="Ghé thăm chúng tôi"
                                href="https://goo.gl/maps/X2EMxCNNreQrC2JS7">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo $currAddress.', '.$currCountry ?>
                            </a>
                        </p>
                        <p>
                            <a class="text-muted" title="Gọi cho chúng tôi" href="tel:<?php echo $currPhone ?>">
                                <i class="fas fa-phone mr-2"></i> <?php echo $currPhone ?>
                            </a>
                        </p>
                        <p>
                            <a class="text-muted" title="Gửi thư cho chúng tôi"
                                href="mailto: <?php echo $currEmail ?>"><i class="fas fa-envelope mr-2"></i>
                                <?php echo $currEmail ?></a>
                        </p>

                        <!-- Facbook fanpage -->
                        <div class="fb-page d-none d-md-block" data-href="https://www.facebook.com/facebook"
                            data-tabs="" data-width="500" data-height="70" data-small-header="true"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section id="address" class="container-fluid bg-dark p-0">
    <!-- <div class="row">
            <div class="col-12 text-center header-box mb-4">
                <h2 class="text-capitalize title-section" style="color: white">Ghé thăm chúng tôi</h3>
                    <h6 class="text-muted">Nơi chúng tôi đặt trụ sở và bạn có thể ghé qua bất cứ lúc nào</h6>
            </div>
        </div> -->
    <div class="map">
        <!-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2688308447737!2d105.7966720144066!3d20.9818582947549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc4106a8a99%3A0xda4db9c48cf21b05!2s1st+Domitory!5e0!3m2!1svi!2s!4v1558973902818!5m2!1svi!2s"
            width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe> -->
        <?php echo $currMap ?>
    </div>
</section>
<!-- end address with map -->

<button type="button" id="goTopBtn" title="Lên đầu trang" class="m-0 my-btn right-hidden btn"><i
        class="fas fa-angle-double-up"></i></button>
</body>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
        xfbml: true,
        version: 'v4.0'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="105784994178316" theme_color="#fa3c4c"
    logged_in_greeting="Xin chào, Brazos có thể giúp gì cho bạn?"
    logged_out_greeting="Xin chào, Brazos có thể giúp gì cho bạn?">
</div>

</html>