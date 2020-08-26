<?php
$pages = array();
$pages["index.php"] = "Tổng quan";
$pages["company-info.php"] = "Thông tin công ty";
$pages["customer.php"] = "Thông tin khách hàng";
$pages["book.php"] = "Thông tin sách";
$pages["category.php"] = "Thể loại";
$pages["order.php"] = "Đơn hàng";
$pages["mini-preview.php"] = "Chế độ xem trang";
// $pages["notifications.php"] = "Notifications";
// $pages["upgrade.php"] = "Upgrade to PRO";

$icons = array();
$icons['index.php'] = "dashboard";
$icons['company-info.php'] = "home_work";
$icons['customer.php'] = "supervisor_account";
$icons['book.php'] = "menu_book";
$icons['category.php'] = "category";
$icons['order.php'] = "content_paste";
$icons['mini-preview.php'] = "visibility";
// $icons['notifications.php'] = "notifications";
// $icons['upgrade.php'] = "unarchive";

function active($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css 
    }
}
?>
<div class="sidebar-wrapper">
    <ul class="nav">
        <?php foreach ($pages as $url => $title) : ?>
        <li class="nav-item <?php active($url);?>">
            <a class="nav-link" href="<?php echo $url; ?>">
                <i class="material-icons"><?php echo $icons[$url] ?></i>
                <p><?php echo $title ?></p>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>