<button class="btn btn-secondary" data-toggle="modal" data-target="#signupModal">
    Đăng ký
</button>

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-signup" role="document" style="max-width:70%">
        <div class="modal-content">
            <div class="card card-signup card-plain mt-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title card-title ml-auto mr-auto">Đăng ký tài khoản</h5>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="info info-horizontal">
                                <div class="icon icon-rose">
                                    <i class="material-icons">timeline</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Marketing</h4>
                                    <p class="description">
                                        We've created the marketing campaign of the website. It
                                        was a very interesting collaboration.
                                    </p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">code</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Fully Coded in HTML5</h4>
                                    <p class="description">
                                        We've developed the website with HTML5 and CSS3. The
                                        client has access to the code using GitHub.
                                    </p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Built Audience</h4>
                                    <p class="description">
                                        There is also a Fully Customizable CMS Admin Dashboard
                                        for this product.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 mr-auto">
                            <div class="social text-center">
                                <button class="btn btn-just-icon btn-round btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="btn btn-just-icon btn-round btn-dribbble">
                                    <i class="fab fa-dribbble"></i>
                                </button>
                                <button class="btn btn-just-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"> </i>
                                </button>
                                <h4> hoặc tạo tài khoản </h4>
                            </div>

                            <form class="form" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input id="txtUsername" name="username" type="text" class="form-control"
                                                placeholder="Tên đăng nhập..." required>
                                            <div class="alert alert-danger alert-username d-none" role="alert">
                                                Tên đăng nhập đã tồn tại
                                            </div>
                                            <div id="alertUsernameNull" class="alert alert-danger d-none" role="alert">
                                                Tên đăng nhập không được để trống
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">lock_outline</i>
                                                </div>
                                            </div>
                                            <input id="txtPassword" name="password" type="password"
                                                placeholder="Mật khẩu..." class="form-control" required>
                                            <div id="alertPasswordNull" class="alert alert-danger d-none" role="alert">
                                                Mật khẩu không được để trống
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="acceptPolicy" class="form-check-input" type="checkbox" value=""
                                                checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            Tôi đồng ý với mọi <a href="#something">điều khoản và chính sách của công
                                                ty</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button onclick="register($('#txtUsername').val(), $('#txtPassword').val())"
                                        type="button" class="btn btn-primary">Tạo tài
                                        khoản</button>
                                    <div class="alert alert-success d-none" role="alert">
                                        Đăng ký thành công
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>