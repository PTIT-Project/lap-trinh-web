<?php include './template-parts/header.php' ?>
<div class="content">
  <div class="container-fluid">
    <div class="container-fluid">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Chế độ xem trang</h4>
          <p class="card-category">Xem trang web của bạn sẽ trông như thế nào. Hoặc chuyển trực tiếp tới 
            <a target="_blank" href="http://localhost/brazosbookstore/">Brazos Bookstore - Tiệm sách quốc dân</a>
          </p>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card-body">
              <div class="iframe-container d-none d-lg-block">
                <iframe src="http://localhost/brazosbookstore/" style="height: 650px;">
                  <p>Trình duyệt không hỗ trợ iframes.</p>
                </iframe>
              </div>
              <div class="col-md-12 d-none d-sm-block d-md-block d-lg-none d-block d-sm-none text-center ml-auto mr-auto">
                <h5>Chế độ này chỉ hỗ trợ trên các thiết bị Desktop. Nếu bạn sử dụng điện thoại hoặc máy tính bảng, vui lòng xem trực tiếp trên
                  <a href="http://localhost/brazosbookstore/" target="_blank">Brazos Bookstore - Tiệm sách quốc dân</a>
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include './template-parts/footer.php' ?>