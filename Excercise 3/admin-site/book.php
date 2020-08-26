<?php include './template-parts/header.php' ?>
<?php 
    $rsGET = mysqli_query($DB_LINK, 'SELECT count(BookID) AS total FROM books');
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
    $rsGET = mysqli_query($DB_LINK, "SELECT * FROM books LIMIT $start, $limit");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Danh sách đầu sách</h4>
                        <p class="card-book">Tất cả các đầu sách hiện có</p>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-6 text-center">
                                <?php include 'book-create.template.php' ?>
                            </div>
                        </div>

                        <!-- Phân trang -->
                        <div class="">
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
                                              <li class="page-item"><a class="page-link" href="book.php?page='.$i.'">'.$i.'</a></li>
                                          ';
                                      }
                                  }
                              ?>
                                </ul>
                            </nav>
                        </div>

                        <?php 
                            if(mysqli_num_rows($rsGET) > 0) {
                                while($row = mysqli_fetch_assoc($rsGET)) {
                                    $currID = $row['BookID'];
                                    $currTitle = $row['Title'];
                                    $currCategoryID = $row['CategoryID'];
                                    $currAuthorID = $row['AuthorID'];
                                    $currPrice = $row['Price'];
                                    $currPoster = $row['PosterURI'];
                                    $currShortDesc = $row['ShortDescription'];
                        ?>
                        <div class="row mb-4 mt-4" id="book<?php $currID ?>">

                            <!-- //TODO: Up ảnh -->
                            <!-- Poster -->
                            <div class="col-md-3 h-100">
                                <div class="card h-100 bg-dark text-white">
                                    <div id="ifExistHere<?php echo $currID ?>"
                                        class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <!-- //TODO: ẢNH HIỆN TẠI -->
                                        <div class="fileinput-new thumbnail img-raised">
                                            <?php if($currPoster) {
                                                ?>
                                            <img id="<?php echo $currID ?>" class="w-100 thumb-input"
                                                src="./upload/image/book-poster/<?php echo $currPoster ?>"
                                                alt="<?php echo $currPoster ?>">
                                            <?php } else { ?>
                                            <img id="<?php echo $currID ?>" class="thumb-input"
                                                src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png"
                                                alt="no-image">
                                            <?php } ?>
                                        </div>

                                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                        <div>
                                            <span class="btn-sm btn btn-raised btn-round btn-default btn-file">
                                                <input id="newPoster<?php echo $currID ?>" type="file" />
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
                                                    <label class="bmd-label-floating">Tên sách</label>
                                                    <input required id="bookTitle<?php echo $currID ?>" type="text"
                                                        class="form-control" value="<?php echo $currTitle ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Mô tả ngắn -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Mô tả ngắn gọn</label>
                                                    <input id="shortDesc<?php echo $currID ?>" type="text"
                                                        class="form-control" value="<?php echo $currShortDesc ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Mã tác giả & Mã thể loại & Giá -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Mã tác giả</label>
                                                    <input id="authorID<?php echo $currID ?>" type="text"
                                                        class="form-control" value="<?php echo $currAuthorID ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Mã thể loại</label>
                                                    <input id="categoryID<?php echo $currID ?>" type="text"
                                                        class="form-control" value="<?php echo $currCategoryID ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Giá bán</label>
                                                    <input id="price<?php echo $currID ?>" type="text"
                                                        class="form-control" value="<?php echo $currPrice ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" onclick="update($(this).attr('id'))"
                                            id="<?php echo $currID ?>" class="btn-round btn btn-primary pull-right">
                                            Cập nhật
                                        </button>
                                        <a href="book-delete.php?id=<?php echo $currID ?>" id="<?php echo $currID ?>"
                                            class="btn-round btn btn-danger pull-right">
                                            Xoá
                                        </a>
                                        <div class="clearfix"></div>
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
                                              <li class="page-item"><a class="page-link" href="book.php?page='.$i.'">'.$i.'</a></li>
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

    var title = $('#bookTitle').val();
    var author = $('#authorID').val();
    var category = $('#categoryID').val();
    var price = $('#price').val();
    var shortDesc = $('#shortDesc').val();
    var file_data = $('#newPoster').prop('files')[0];

    console.log(title);
    console.log(author);
    console.log(category);
    console.log(price);
    console.log(shortDesc);

    //Nếu có tải lên ảnh mới thì kiểm tra nó có phải ảnh không
    if (file_data) {
        console.log("Phát hiện ảnh đã chọn");
        var fileType = file_data.type;
        var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
        if ($.inArray(fileType, validImageTypes) < 0) {
            showMyNotification('top', 'center', 'File poster phải là ảnh', 'danger', 'cancel', 1500);
            $('#newPoster').val('');
            return;
        }
    }

    var form_data = new FormData();
    //thêm files vào trong form data
    form_data.append('file', file_data);
    form_data.append('title', title);
    form_data.append('author', author);
    form_data.append('category', category);
    form_data.append('price', price);
    form_data.append('shortDesc', shortDesc);
    //sử dụng ajax post
    $.ajax({
        url: 'book-create.php', // gửi đến file book-create.php 
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
                }, 1100);
                return;
            }
            showMyNotification('top', 'center', res, 'danger', 'error', 1500);
        },
        error: function(res) {
            showMyNotification('top', 'center', res, 'danger', 'cancel', 1500);
            $('#newPoster').val('');
        }
    });
}

function update(bookId) {
    var selector = '#status' + bookId + '.alert-success';
    console.log('Your update id: ' + bookId);

    var title = $('#bookTitle' + bookId).val();
    var authorId = $('#authorID' + bookId).val();
    var categoryId = $('#categoryID' + bookId).val();
    var price = $('#price' + bookId).val();
    var shortDesc = $('#shortDesc' + bookId).val();
    var file_data = $('#newPoster' + bookId).prop('files')[0];
    // console.log($('#newPoster' + bookId).prop('files')[0]);
    // console.log(file_data);

    console.log(title);
    console.log(authorId);
    console.log(categoryId);
    console.log(price);
    console.log(shortDesc);

    //Nếu có tải lên ảnh mới thì kiểm tra nó có phải ảnh không
    if (file_data) {
        console.log("Phát hiện ảnh đã chọn");
        var fileType = file_data.type;
        var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
        if ($.inArray(fileType, validImageTypes) < 0) {
            showMyNotification('top', 'center', 'File poster phải là ảnh', 'danger', 'cancel', 3000);
            $('#newPoster' + bookId).val('');
            return;
        }
    }

    var form_data = new FormData();
    //thêm files vào trong form data
    form_data.append('file', file_data);
    form_data.append('id', bookId);
    form_data.append('title', title);
    form_data.append('author', authorId);
    form_data.append('category', categoryId);
    form_data.append('price', price);
    form_data.append('shortDesc', shortDesc);
    //sử dụng ajax post
    $.ajax({
        url: 'book-update.php', // gửi đến file book-update.php 
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(res) {
            showMyNotification('top', 'center', res, 'success', 'done', 3000);
            if (file_data) {
                $('#newPoster' + bookId).val('');
                $('#' + bookId + ".thumb-input").attr('src', './upload/image/book-poster/' + file_data
                .name);
                $('#ifExistHere' + bookId).removeClass('fileinput-exists');
                $('.fileinput-preview img').remove();
            }
        },
        error: function(res) {
            showMyNotification('top', 'center', res, 'danger', 'cancel', 3000);
            $('#newPoster' + bookId).val('');
        }
    });
}
</script>

<?php include './template-parts/footer.php' ?>