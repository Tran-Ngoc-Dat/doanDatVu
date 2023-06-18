<?php  
if(!defined('SOURCES')) die("Error");

$criteria = $d->rawQuery("select name,id,link,photo,description from multi_media where type = 'tieuchi'");
$partner = $d->rawQuery("select name,id,link,photo,description from multi_media where type = 'doitac'");
$pronb = $d->rawQuery("select name,photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('hot',status) and find_in_set('hienthi',status) order by id desc");
// $prolist = $d->rawQuery("select name,photo, slug, id from #_category where find_in_set('hot',status) and find_in_set('hienthi',status) order by id desc");

    $prolist = $d->rawQuery("select name,id,slug from category where find_in_set('hienthi',status) order by id desc");


$producthot = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('hot',status) and find_in_set('hienthi',status) order by id desc");
$advertise = $d->rawQuery("select photo from multi_media where type = 'advertise'");
$bestseller = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from product where find_in_set('banchay',status) and find_in_set('hienthi',status) order by id desc");
$promotion = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('khuyenmai',status) and find_in_set('hienthi',status) order by id desc");
$newsnb = $d->rawQuery("select name, photo, slug, id, date_created, description from #_news where type = 'tin-tuc' order by id desc");
    // $question = $d->rawQuery("select name, photo, slug, id, date_created from #_news where type = 'cau-hoi' and find_in_set('hienthi',status) order by id desc");


$productlist = $d->rawQuery("select name,id,slug from category");
$newdv = $d->rawQuery("select name, photo, slug, id, date_created, description from #_news where type = 'dich-vu' order by id desc");

?>