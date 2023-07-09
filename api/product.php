<?php 
	include "config.php";

	/* Paginations */
	include LIBRARIES."class/class.PaginationsAjax.php";
	$pagingAjax = new PaginationsAjax();
	$pagingAjax->perpage = (!empty($_GET['perpage'])) ? htmlspecialchars($_GET['perpage']) : 1;
	$eShow = htmlspecialchars($_GET['eShow']);
	$idList = (!empty($_GET['idList'])) ? htmlspecialchars($_GET['idList']) : 0;
	$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
	$start = ($p-1) * $pagingAjax->perpage;
	$pageLink = "api/product.php?perpage=".$pagingAjax->perpage;
	$tempLink = "";
	$where = "";
	$params = array();

	/* Math url */
	if($idList)
	{
		$tempLink .= "&idList=".$idList;
		$where .= " and id_list = ?";
		array_push($params, $idList);
	}
	$tempLink .= "&p=";
	$pageLink .= $tempLink;

	/* Get data */
	$sql = "select name, slug, id, photo, regular_price, sale_price, discount, sku from #_product where id <> 0 and find_in_set('noibat',status) and find_in_set('hienthi',status) order by id desc";
	$sqlCache = $sql." limit $start, $pagingAjax->perpage";
    $items = $d->rawQuery($sqlCache, $params, 'result', 7200);

	/* Count all data */
	$countItems = count($d->rawQuery($sql, $params, 'result', 7200));

	/* Get page result */
	$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if($countItems) { ?>
<div class="grid-products w-clear">
    <?php foreach($items as $k => $v) { ?>
    <div class="item-product fix-product">
        <div class="img-product">
            <a class="scale-img" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>">
                <img src="<?= $configBase ?>upload/product/<?= $v['photo'] ?>" alt="" width="250" height="220">
            </a>
            <a class="text-decoration-none btn-product cart-add addcart" data-id="<?=$v['id']?>" data-action="addnow">
                <span>Thêm giỏ hàng</span>
            </a>
        </div>
        <div class="title-product">
            <h3 class="name-product"><a class="text-split text-decoration-none"
                    href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>"><?= $v['name'] ?></a></h3>
            <p class="price-product">
                <?php if($v['discount']>0) { ?>
                <span class="price-new"><?=$func->formatMoney($v['sale_price'])?></span>
                <span class="price-old"><?=$func->formatMoney($v['regular_price'])?></span>
                <span class="price-per"><?='-'.$v['discount'].'%'?></span>
                <?php } else { ?>
                <span
                    class="price-new"><?=($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe?></span>
                <?php } ?>
            </p>
        </div>
    </div>
    <?php } ?>
</div>
<div class="pagination-ajax"><?=$pagingItems?></div>
<?php } ?>