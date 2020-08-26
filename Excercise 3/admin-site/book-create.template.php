<!-- Button trigger modal for creating book -->
<button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#createModal">
    Thêm ấn phẩm
</button>
<!-- Modal create -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tạo một ấn phẩm mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- //TODO: Up ảnh -->
                    <div class="col-md-3 h-100">
                        <div class="card h-100 bg-dark text-white">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                                <div class="fileinput-new thumbnail img-raised">
                                    <img class="thumb-input"
                                        src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png"
                                        alt="poster">
                                </div>

                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                <div>
                                    <span class="btn-sm btn btn-raised btn-round btn-default btn-file">
                                        <input id="newPoster" type="file" />
                                    </span>
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                            <button class="btn btn-sm btn-danger btn-round fileinput-exists"
                                                data-dismiss="fileinput"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- //TODO: Up nội dung -->
                    <div class="col-md-9 h-100">
                        <div class="card h-100">
                            <div class="card-body p-3">
                                <!-- Tên sách -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="left:0" class="bmd-label-floating">Tên sách</label>
                                            <input id="bookTitle" type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Mô tả ngắn gọn về sách -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="left:0" class="bmd-label-floating">Mô tả ngắn gọn</label>
                                            <input id="shortDesc" type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>

                                <!-- Mã tác giả & Mã thể loại & Giá-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="left:0" class="bmd-label-floating">Mã tác giả</label>
                                            <input id="authorID" type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="left:0" class="bmd-label-floating">Mã thể loại</label>
                                            <input id="categoryID" type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="left:0" class="bmd-label-floating">Giá bán</label>
                                            <input id="price" type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div id="status" class="d-none position-absolute alert alert-success"></div>
                                <div id="status" class="d-none position-absolute alert alert-danger"></div>
                                <button type="button" onclick="create()" class="btn-round btn btn-primary pull-right">
                                    Thêm mới
                                </button>
                                <button class="btn btn-danger btn-round pull-right" data-dismiss="modal">
                                    Huỷ bỏ
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>