<?php include './template-parts/header.php' ?>
<?php 
    $rsGET = mysqli_query($DB_LINK, 'SELECT count(CategoryID) AS total FROM categories');
    $row = mysqli_fetch_assoc($rsGET);
    $total_records = $row['total'];
    
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    
    // tổng số trang
    $total_page = ceil($total_records / $limit);
    
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    
    // Tìm Start
    $start = ($current_page - 1) * $limit;
    
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách bản ghi
    $rsGET = mysqli_query($DB_LINK, "SELECT * FROM categories LIMIT $start, $limit");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Thể loại</h4>
                        <p class="card-category">Tất cả các thể loại sách hiện có</p>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-6 text-center">
                                <?php include 'category-create.template.php' ?>
                            </div>
                        </div>

                        <?php 
                            if(mysqli_num_rows($rsGET) > 0) {
                                while($row = mysqli_fetch_assoc($rsGET)) {
                                    $currID = $row['CategoryID'];
                                    $currName = $row['CategoryName'];
                                    $currDescription = $row['Description'];
                                    $currThumbnail = $row['ThumbnailURI'];
                        ?>
                        <div class="row mb-4 mt-4" id="category<?php $currID ?>">

                            <!-- //TODO: Up ảnh -->
                            <div class="col-md-3 h-100">
                                <div class="card h-100 bg-dark text-white">
                                    <div id="ifExistHere<?php echo $currID ?>"
                                        class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <!-- //TODO: ẢNH HIỆN TẠI -->
                                        <div class="fileinput-new thumbnail img-raised">
                                            <?php if($currThumbnail) {
                                                ?>
                                            <img id="<?php echo $currID ?>" class="w-100 thumb-input"
                                                src="./upload/image/category-thumbnail/<?php echo $currThumbnail ?>"
                                                alt="<?php echo $currThumbnail ?>">
                                            <?php } else { ?>
                                            <img id="<?php echo $currID ?>" class="thumb-input"
                                                src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png"
                                                alt="no-image">
                                            <?php } ?>
                                        </div>

                                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                        <div>
                                            <span class="btn-sm btn btn-raised btn-round btn-default btn-file">
                                                <input id="newThumb<?php echo $currID ?>" type="file" name="thumb" />
                                            </span>
                                            <div class="row justify-content-center">
                                                <div class="col-4">
                                                    <button class="btn btn-sm btn-danger btn-round fileinput-exists"
                                                        data-dismiss="fileinput"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>

                            <!-- //TODO: Up nội dung -->
                            <div class="col-md-9 h-100">
                                <div class="card h-100">
                                    <div class="card-body p-3">
                                        <!-- <form method="POST" action=""> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Tên thể loại</label>
                                                    <input id="categoryName<?php echo $currID ?>" type="text"
                                                        name="categoryName" class="form-control"
                                                        value="<?php echo $currName ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Mô tả chi tiết thể
                                                            loại</label>
                                                        <textarea id="description<?php echo $currID ?>"
                                                            class="form-control" name="description"
                                                            rows="5"><?php echo $currDescription ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="update($(this).attr('id'))"
                                            id="<?php echo $currID ?>" class="btn-round btn btn-primary pull-right">
                                            Cập nhật
                                        </button>
                                        <a href="category-delete.php?id=<?php echo $currID ?>"
                                            id="<?php echo $currID ?>" class="btn-round btn btn-danger pull-right">
                                            Xoá
                                        </a>
                                        <div class="clearfix"></div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php  }
                        } 
                      ?>

                        <!-- Phân trang -->
                        <div class="mt-5">
                            <nav aria-label="...">
                                <style>
                                .page-item.active .page-link {
                                    background-color: #9c27b0;
                                    border-color: #9c27b0;
                                }

                                .page-link {
                                    color: #9c27b0;
                                }
                                </style>
                                <ul class="pagination justify-content-right">
                                    <?php 
                                  // Lặp khoảng giữa
                                  for ($i = 1; $i <= $total_page; $i++){
                                      if ($i == $current_page){
                                          echo '
                                              <li class="page-item active">
                                                  <a class="page-link" href="#">' . $i . '<span class="sr-only">(current)</span></a>
                                              </li>
                                          ';
                                      }
                                      else{
                                          echo '
                                              <li class="page-item"><a class="page-link" href="customer.php?page='.$i.'">'.$i.'</a></li>
                                          ';
                                      }
                                  }
                              ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function create() {
    var selector = '#status.alert-success';

    var name = $('#newName').val();
    var desc = $('#newDescription').val();
    var file_data = $('#newThumb').prop('files')[0];
    console.log($('#newThumb').prop('files')[0]);
    console.log(file_data);

    //Nếu có tải lên ảnh mới thì kiểm tra nó có phải ảnh không
    if (file_data) {
        console.log("Phát hiện ảnh đã chọn");
        var fileType = file_data.type;
        var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
        if ($.inArray(fileType, validImageTypes) < 0) {
            showMyNotification('top', 'center', 'File thumbnail phải là ảnh', 'danger', 'cancel', 1500);
            $('#newThumb').val('');
            return;
        }
    }

    var form_data = new FormData();
    //thêm files vào trong form data
    form_data.append('file', file_data);
    form_data.append('name', name);
    form_data.append('desc', desc);
    //sử dụng ajax post
    $.ajax({
        url: 'category-create.php', // gửi đến file category-create.php 
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(res) {
            if (res === 'Tạo mới thành công') {
                showMyNotification('top', 'center', res, 'success', 'done', 1000);
                setTimeout(() => {
                    location.reload();
                    return;
                }, 1100);
            }
            showMyNotification('top', 'center', res, 'danger', 'error', 1500);
        },
        error: function(res) {
            showMyNotification('top', 'center', res, 'danger', 'cancel', 1500);
            $('#newThumb').val('');
        }
    });
}

function update(cateId) {
    var selector = '#status' + cateId + '.alert-success';
    console.log('Your update id: ' + cateId);

    var name = $('#categoryName' + cateId).val();
    var desc = $('#description' + cateId).val();
    var file_data = $('#newThumb' + cateId).prop('files')[0];
    console.log($('#newThumb' + cateId).prop('files')[0]);
    console.log(file_data);

    //Nếu có tải lên ảnh mới thì kiểm tra nó có phải ảnh không
    if (file_data) {
        console.log("Phát hiện ảnh đã chọn");
        var fileType = file_data.type;
        var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
        if ($.inArray(fileType, validImageTypes) < 0) {
            showMyNotification('top', 'center', 'File thumbnail phải là ảnh', 'danger', 'cancel', 3000);
            $('#newThumb' + cateId).val('');
            return;
        }
    }

    var form_data = new FormData();
    //thêm files vào trong form data
    form_data.append('file', file_data);
    form_data.append('id', cateId);
    form_data.append('name', name);
    form_data.append('desc', desc);
    //sử dụng ajax post
    $.ajax({
        url: 'category-update.php', // gửi đến file category-update.php 
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(res) {
            showMyNotification('top', 'center', res, 'success', 'done', 3000);
            if (file_data) {
                $('#newThumb' + cateId).val('');
                $('#' + cateId + ".thumb-input").attr('src', './upload/image/category-thumbnail/' +
                    file_data.name);
                $('#ifExistHere' + cateId).removeClass('fileinput-exists');
                $('.fileinput-preview img').remove();
            }
        },
        error: function(res) {
            showMyNotification('top', 'center', res, 'danger', 'cancel', 3000);
            $('#newThumb' + cateId).val('');
        }
    });
}
</script>

<?php include './template-parts/footer.php' ?>