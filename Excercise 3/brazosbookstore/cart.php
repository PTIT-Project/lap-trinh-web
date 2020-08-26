<?php
    //HACK: Thêm vào để sửa lỗi header(), gọi hàm này ở dòng đầu tiên của file
    ob_start(); 
?>
<?php include 'set-cart.php' ?>
<?php 
    include './template-parts/database.php';
    $items = 0;
    $totalCost = 0;

    if(isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
        if(!empty($cart)) {
            foreach ($cart as $id => $quantity) {
                $items += $quantity;
            }
        }
    }
?>
<?php include './mini-header-withoutCart.php' ?>

<section id="mini-background" class="align-items-center justify-content-center d-flex">
    <div class="row align-items-center">
        <h1 class="text-white text-capitalize">
            Giỏ hàng
        </h1>
    </div>
</section>

<?php 
    if(isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
    }
?>

<style>
input[type=checkbox],
input[type=radio] {
    height: 1.25rem;
    width: 1.25rem;
}
</style>
<section class="container-fluid bg-light p-3 shadow">
    <div class="container-fluid shadow pt-5 pb-5 bottom-hidden">
        <table class="table table-hover">
            <thead>
                <tr class="row w-100 m-0">
                    <th class="col-5 d-center">Sản phẩm</th>
                    <th class="col-1 d-center">Đơn giá</th>
                    <th class="col-2 d-center">Số lượng</th>
                    <th class="col-2 d-center">Số tiền</th>
                    <th class="col-2 d-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($cart)) {?>
                <tr class="d-center">
                    <td>
                        <h4>Chưa có sản phẩm nào trong giỏ hàng</h4>
                    </td>
                </tr>
                <?php } else {
                    foreach ($cart as $id => $quantity) {
                        $result = mysqli_query($DB_LINK, "SELECT * FROM books WHERE BookID = $id");
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $title = $row['Title'];
                                $price = $row['Price'];
                                $poster = $row['PosterURI'];
                                $desc = $row['ShortDescription'];

                                $authorID = $row['AuthorID'];
                                $authorRS = mysqli_query($DB_LINK, "SELECT Name FROM authors WHERE AuthorID = $authorID") or die('Tác giả: Không rõ');
                                $author = 'Không rõ tác giả';
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($authorRS)) {
                                        $author = $row['Name'];
                                    }
                                }
                    ?>
                <!-- Lặp item -->
                <tr class="row w-100 m-0">
                    <!-- Cột sản phẩm -->
                    <td class="col-5">
                        <div class="row">
                            <!-- <div class="p-0 col-2 d-center">
                                <input class="form-check-input w-100 position-static m-0" type="checkbox" value=""
                                    id="check<?php //$id ?>">
                            </div> -->
                            <div class="pl-0 col-10">
                                <a style="color: unset" href="http://google.com.vn" target="_blank"
                                    rel="noopener noreferrer" title="<?php echo $title ?>">
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="item-thumb" src="./img/loading.gif"
                                                data-original="../admin-site/upload/image/book-poster/<?php echo $poster ?>"
                                                alt="<?php echo $poster ?>" srcset="">
                                        </div>
                                        <div class="col-8">
                                            <h6><?php echo $title ?></h6>
                                            <small>
                                                <i class="text-muted">
                                                    <?php echo $author ?>
                                                </i>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </td>
                    <!-- Cột đơn giá -->
                    <td class="col-1 d-center">
                        $<span id="<?php echo $id ?>" class="price"><?php echo $price ?></span>
                    </td>
                    <!-- Cột số lượng -->
                    <td class="col-2 d-center">
                        <input id="<?php echo $id ?>" type="number" value="<?php echo $quantity ?>" step="1"
                            class="input-quantity numeric form-control form-control-sm w-50" placeholder="Số lượng"
                            min="1" max="99" required>
                    </td>
                    <!-- Cột số tiền -->
                    <td class="col-2 d-center">
                        <?php $totalCost += round($quantity*$price,2); ?>
                        $<span id="<?php echo $id ?>" class="cost"><?php echo round($quantity*$price,2); ?></span>
                    </td>
                    <!-- Cột thao tác -->
                    <td class="col-2 d-center">
                        <a href="remove-cart-item.php?id=<?php echo $id ?>" type="button" class="btn btn-danger">Xoá</a>
                    </td>
                </tr>
                <!-- #end lặp item -->
                <?php       } //#end lấy thuộc tính
                        }
                    } //#end lặp item
                ?>

                <!-- Mã giảm giá, nút thanh toán và tổng tiền -->
                <tr class="row w-100 m-0">
                    <!-- Mã giảm giá -->
                    <td class="col-6 text-right pt-3">
                        <div class="input-group">
                            <input type="text" name="voucher" id="inputVoucher"
                                class="w-25 form-control-sm form-control" value="" placeholder="Mã giảm giá...">
                            <div class="input-group-append">
                                <button type="button" class="btn-sm btn btn-primary">Áp dụng mã giảm giá</button>
                            </div>
                        </div>
                    </td>
                    <td class="col-2 text-right p-3"><strong>Tổng tiền: </strong></td>
                    <td class="col-2 text-center p-3">
                        <strong>$ <span id="totalCost"><?php echo $totalCost ?></span></strong>
                    </td>
                    <td class="col-2 text-right">
                        <?php if(isset($_COOKIE['username'])) { ?>
                        <button onclick="onPayment()"
                            class="shadow ml-auto my-btn btn btn-danger btn-rounded pt-2 pb-2 pl-4 pr-4">Thanh
                            toán</button>
                        <?php } else { ?>
                        <button onclick="login()"
                            class="shadow ml-auto my-btn btn btn-danger btn-rounded pt-2 pb-2 pl-4 pr-4">Đăng nhập để
                            thanh toán</button>
                        <?php } ?>
                    </td>
                </tr>
                <hr>
                <tr class="row w-100 m-0">
                    <th class="col-5">
                        <h6 class="mt-3 mb-3">Chọn phương thức thanh toán: </h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="CODPayment" name="payment" class="custom-control-input">
                            <label class="custom-control-label" for="CODPayment">Thanh toán khi nhận hàng</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="OnlinePayment" name="payment" class="custom-control-input">
                            <label class="custom-control-label" for="OnlinePayment">Thanh toán online bằng mã QR</label>
                        </div>
                        <small class="d-none" id="noteQRCode"><i class="text-muted">Nhấn nút thanh toán bên trên để lấy
                                mã QR</i></small>
                    </th>
                    <td class="col-7">
                        <div class="form-group">
                            <label for="noteOrdered" class="col-12 control-label">Ghi chú: (Nếu có)</label>
                            <div class="col-12">
                                <textarea name="" id="noteOrdered" class="form-control" rows="3"
                                    placeholder="Ghi chú..."></textarea>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<!-- QRCode Modal -->
<div id="qrModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-danger" style="border: none;">
            <div class="modal-header text-center pb-0 bg-white" style="border:none">
                <h5 class="modal-title ml-auto"><strong>Thanh toán bằng QRCode</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0 pl-0 pr-0">
                <div class="row w-100 m-0  bg-white" style="box-shadow: 0 .75rem 0.85rem -2px #54545480;">
                    <div class="col-5 d-center" style="overflow: hidden">
                        <img id="qrCode"
                            src='https://chart.googleapis.com/chart?chs=280x280&cht=qr&choe=UTF-8&chl=Brazos+Pay+By+QRCode+<?php echo json_encode($cart) ?>'
                            title="Link to Google.com" class="lazy">
                    </div>
                    <div class="col-7 pt-4">
                        <p>
                            <strong>Thực hiện theo hướng dẫn sau để lấy mã thanh toán:</strong>
                        </p>
                        <small>

                            <p>
                                Bước 1: Mở ứng dụng quét mã QR để thanh toán.
                            </p>
                            <p>
                                Bước 2: Chọn "Quét mã" để quét mã QR code bên cạnh.
                            </p>
                            <p>
                                Bước 3: Truy cập vào đường dẫn được hiển thị trong mã QR.
                            </p>
                            <p>
                                <strong class="text-danger">
                                    Bước 4: Lấy mã thanh toán
                                </strong>
                            </p>
                            <p>
                                Bước 5: Nhập mã thanh toán vào ô bên dưới. Và bấm xác nhận
                            </p>
                        </small>
                    </div>
                </div>
                <div class="row d-center border-top w-100 m-0">
                    <small class="mt-2">
                        <i class="text-light">Lưu ý: Mỗi mã thanh toán <strong> chỉ có hiệu lực tối đa trong 5
                                phút</strong>.</i>
                    </small>
                    <div class="input-group w-50 m-3">
                        <input type="text" name="voucher" id="qrCodeInput" class="w-25 form-control-sm form-control"
                            value="" placeholder="Mã thanh toán...">
                        <div class="input-group-append">
                            <button type="button" class="btn-sm btn my-btn btn-danger">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'login.php' ?>

<script>
function login() {
    $("#modalLogin").modal('toggle');
}

function onPayment() {
    let note = $("input#noteOrdered").val();

    if ($('#CODPayment').is(':checked')) {
        $.get("pay.php", {
            note: note
        }, function(res) {
            if (res === 500) {
                showMyNotification("top", "center", "Thanh toán thất bại", "danger", "", 600);
            } else {
                // showMyNotification("top", "center", "Thanh toán thành công", "success", "", 600);
                setTimeout(
                    function() {
                        location.reload();
                    }, 0001);
            }
        })
    } else if ($('#OnlinePayment').is(':checked')) {
        $('#qrModal').modal('toggle');
    } else {
        showMyNotification("top", "center", "Vui lòng chọn một phương thức thanh toán!", "warning", "", 600);
    }
}

function pay(type) {
    if (type === "COD") {

    } else if (type === "QRCode") {

    }
}


//Phát hiện thay đổi số lượng trong giỏ hàng
$('input.input-quantity').on('keyup click', function() {
    setTimeout(() => {
        var id = $(this).attr('id');
        var quantity = $(this).val();
        console.log('id: ' + id + ' | quantity: ' + quantity);
        var _totalCostSelector = "#totalCost";
        var totalCost = 0;
        $(".cost").each(function() {
            totalCost += parseFloat($(this).text());
        });
        $(_totalCostSelector).text(totalCost);

        // Cập nhật lại cart vô cookie
        $.get("set-cart.php", {
            id: id,
            quantity: quantity
        }, function(res) {
            let s = res.replace(/"/g, "'");
            let api =
                "https://chart.googleapis.com/chart?chs=280x280&cht=qr&choe=UTF-8&chl=Your+Brazos+Payment+Code:+" +
                String(s);
            $("img#qrCode").attr("src", String(api));
        })
    }, 300);
});


//Kiểm tra phương thức thanh toán
$('input[name=payment]').click(function() {
    if ($('#OnlinePayment').is(':checked')) {
        $('#noteQRCode').removeClass('d-none');
    } else {
        $('#noteQRCode').addClass('d-none');
    }
});

$(function() {
    var miniHeaderHeight =
        $("#mini-background")[0].getBoundingClientRect().bottom - 50;

    setTimeout(() => {
        $("html, body").animate({
            scrollTop: miniHeaderHeight
        }, 500);
    }, 2000);
});
</script>
<?php include 'footer.php' ?>