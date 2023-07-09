<?php
include "config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (!empty($_GET['perpage'])) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);
$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "api/product.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
$order = "";
$params = array();

$id_category = (!empty($_POST['id_category'])) ? htmlspecialchars($_POST['id_category']) : "";
$id_sort = (!empty($_POST['id_sort'])) ? htmlspecialchars($_POST['id_sort']) : 0;
$from = (!empty($_POST['from'])) ? htmlspecialchars($_POST['from']) : 0;
$to = (!empty($_POST['to'])) ? htmlspecialchars($_POST['to']) : 0;
if (!empty($id_category)) {
    $where .= " and find_in_set(id_category,'$id_category')";
}
if (!empty($to)) {
    $where .= " and sale_price >=" . $from . " and sale_price <= " . $to;
}

if ($id_sort == 2) {
    $order .= " order by sale_price desc";
} elseif ($id_sort == 1) {
    $order .= " order by sale_price asc";
} else {
    $order .= " order by id desc";
}

$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select name, slug, id, photo, regular_price, sale_price, discount from product where id <> 0 $where and find_in_set('hienthi',status) $order ";
$sqlCache = $sql . " ";
$items = $d->rawQuery($sqlCache, $params);

/* Count all data */
// $countItems = count($cache->get($sql, $params, 'result', 7200));

/* Get page result */
// $pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if ($items) { ?>
<?php foreach ($items as $k => $v) { ?>
<div class="item-product fix-product">
    <div class="img-product">
        <a class="scale-img" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>">
            <img src="<?= $configBase ?>upload/product/<?= $v['photo'] ?>" alt="" width="280" height="280">
        </a>
        <a class="text-decoration-none btn-product cart-add addcart" data-id="<?=$v['id']?>" data-action="addnow">
            <span>Thêm giỏ hàng</span>
        </a>
    </div>
    <div class="title-product">
        <h3 class="name-product"><a class="text-split text-decoration-none" href="<?= $configBase ?><?= $v['slug'] ?>"
                title="<?= $v['name'] ?>"><?= $v['name'] ?></a></h3>
        <p class="price-product">
            <?php if($v['discount']>0) { ?>
            <span class="price-new"><?=$func->formatMoney($v['sale_price'])?></span>
            <span class="price-old"><?=$func->formatMoney($v['regular_price'])?></span>
            <span class="price-per"><?='-'.$v['discount'].'%'?></span>
            <?php } else { ?>
            <span class="price-new"><?=($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe?></span>
            <?php } ?>
        </p>
    </div>
</div>
<?php } ?>
<div class="pagination-ajax mt-3 mb-3">
    <?= $pagingItems ?>
</div>
<?php } else { ?>
<div class="full-row">
    <div class="alert alert-warning w-100" role="alert">
        <strong>
            Không có sản phẩm phù hợp
        </strong>
    </div>
</div>
<?php } ?>