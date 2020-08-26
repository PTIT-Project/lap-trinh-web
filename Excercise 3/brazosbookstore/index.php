<?php include 'header.php' ?>

<?php 
    include './template-parts/home.php'
?>
<!-- FOOTER block -->
<?php include 'footer.php' ?>
<!-- end footer -->

<script>
function addToCart(bookId, quantity) {
    console.log('id: ' + bookId);
    $.get("add-to-cart.php", {
        id: bookId,
        quantity: quantity
    }, function(res) {
        if (res !== 404) {
            showMyNotification('top', 'right', 'Đã thêm 01 sản phẩm vào giỏ hàng',
                'success', 'done', 500);
            data = parseInt(res);
            $("#itemInCart").removeClass("d-none");
            $("#itemInCart").text(data);
        } else {
            showMyNotification('top', 'right', 'Thêm vào giỏ thất bại. Sản phẩm không còn tồn tại',
                'danger', 'error', 500);
        }
    })
}
</script>