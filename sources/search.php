<?php
if (!defined('SOURCES')) die("Error");

/* Tìm kiếm sản phẩm */
if (!empty($_GET['keyword'])) {
    $tukhoa = htmlspecialchars($_GET['keyword']);
    $tukhoaslug = $func->changeTitle($tukhoa);

    if ($tukhoa) {
        $where = "";
        $where = "id <> 0 and (name LIKE ? or slug LIKE ? or sku LIKE ? ) and find_in_set('hienthi',status)";
        $params = array("%$tukhoa%", "%$tukhoa%","%$tukhoaslug%");

        $curPage = $getPage;
        $perPage = 15;
        $startpoint = ($curPage * $perPage) - $perPage;
        $limit = " limit " . $startpoint . "," . $perPage;
        $sql = "select * from product where $where order by id desc $limit";
        $product = $d->rawQuery($sql, $params);
        $sqlNum = "select count(*) as 'num' from product where $where order by id desc";
        $count = $d->rawQueryOne($sqlNum, $params);
        $total = (!empty($count)) ? $count['num'] : 0;
        $url = $func->getCurrentPageURL();
        $paging = $func->pagination($total, $perPage, $curPage, $url);
    }
}