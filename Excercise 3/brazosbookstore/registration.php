<button class="btn btn-primary my-btn btn-rounded" data-toggle="modal" data-target="#signupModal">
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
                        <div class="col-12">
                            <form class="form" method="POST">
                                <div class="card-body">

                                    <!-- Tên đăng nhập -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input id="txtUsername" name="username" type="text" class="form-control"
                                                placeholder="Tên đăng nhập..." required>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger alert-username d-none" role="alert">
                                        Tên đăng nhập đã tồn tại
                                    </div>
                                    <div id="alertUsernameNull" class="alert alert-danger d-none" role="alert">
                                        Tên đăng nhập không được để trống
                                    </div>

                                    <!-- Mật khẩu -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">lock_outline</i>
                                                </div>
                                            </div>
                                            <input id="txtPassword" name="password" type="password"
                                                placeholder="Mật khẩu..." class="form-control" required>
                                        </div>
                                    </div>
                                    <div id="alertPasswordNull" class="alert alert-danger d-none" role="alert">
                                        Mật khẩu không được để trống
                                    </div>

                                    <!-- Họ và tên -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input id="nameOrdered" type="text" name="fullName" class="form-control"
                                                placeholder="Họ và tên" required>
                                        </div>
                                    </div>

                                    <!-- Địa chỉ -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input placeholder="Địa chỉ" id="addressOrdered" type="text" name=""
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Thành phố -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input placeholder="Thành phố/Tỉnh" id="cityOrdered" type="text" name=""
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Quốc gia -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input placeholder="Quốc gia" id="countryOrdered" type="text" name=""
                                                class="form-control" value="Việt Nam" required>
                                        </div>
                                    </div>

                                    <!-- Mã bưu chính -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input placeholder="Mã bưu chính" id="postalcodeOrdered" type="text" name=""
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Số điện thoại -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input id="phoneOrdered" type="text" name="" class="form-control"
                                                placeholder="Số điện thoại" required>
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
                                    <button onclick="register($('#txtUsername').val(), $('#txtPassword').val(), $('input#nameOrdered').val(), $('input#phoneOrdered').val(), $('input#addressOrdered').val(), $('input#cityOrdered').val(), $('input#countryOrdered').val(), $('input#postalcodeOrdered').val())"
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