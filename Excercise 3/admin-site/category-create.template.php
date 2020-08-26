<!-- Button trigger modal for creating category -->
<button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#createModal">
    Thêm thể loại
</button>
<!-- Modal create -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tạo một thể loại mới</h5>
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
                                        alt="thumbnail">
                                </div>

                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                <div>
                                    <span class="btn-sm btn btn-raised btn-round btn-default btn-file">
                                        <input id="newThumb" type="file" name="thumb" />
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="left:0" class="bmd-label-floating">Tên thể loại</label>
                                            <input id="newName" type="text" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label style="left:0" class="bmd-label-floating">Mô tả chi tiết thể
                                                    loại</label>
                                                <textarea id="newDescription" class="form-control" rows="5"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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