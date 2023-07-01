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
if($idList > 0)
{
	$tempLink .= "&idList=".$idList;
	$where .= " and id_list = ?";
	array_push($params, $idList);
}
$tempLink .= "&p=";
$pageLink .= $tempLink;
/* Get data */

$sql = "select name, slug, id, photo, code , regular_price, sale_price, discount from #_product where and find_in_set('noibat',status) and find_in_set('hienthi',status) order by id desc";
$sqlCache = $sql." limit $start, $pagingAjax->perpage";
$items = $cache->get($sqlCache, $params);

/* Count all data */
$countItems = count($cache->get($sql, $params, 'result', 7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<div class="row">
    <?php foreach ($items as $k => $v) { ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-6 rp-product">
        <div class="item-product">
            <a class="hover-glass scale-img" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>">
                <img src="<?= $configBase ?>upload/product/<?= $v['photo'] ?>" alt="" width="262" height="222">
            </a>
            <div class="title-product">
				<h3 class="name-product"><a class="text-split text-decoration-none" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>"><?= $v['name'] ?></a></h3>

            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="pagination-ajax"><?= $pagingItems ?></div>
