<?php  
if(!defined('SOURCES')) die("Error");

$productlist = $d->rawQuery("select name,id,slug,photo from category where find_in_set('hienthi',status) order by id desc");

$intro = $d->rawQuery("select name, photo, slug, id, description from #_news where type = 'gioi-thieu' order by id desc limit 1");
$imggt = $d->rawQueryOne("select photo from multi_media where type = 'img-gt'");
$imgtc = $d->rawQueryOne("select photo from multi_media where type = 'img-tc'");
$criteria = $d->rawQuery("select name, photo, id, description, photo from #_news where type = 'tieu-chi' order by id desc");
$newsnb = $d->rawQuery("select name, photo, slug, id, date_created, description from #_news where type = 'tin-tuc' order by id desc");
$partner = $d->rawQuery("select name,id,link,photo,description from multi_media where type = 'doitac'");




$pronb = $d->rawQuery("select name,photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('hot',status) and find_in_set('hienthi',status) order by id desc");
// $prolist = $d->rawQuery("select name,photo, slug, id from #_category where find_in_set('hot',status) and find_in_set('hienthi',status) order by id desc");

    $prolist = $d->rawQuery("select name,id,slug from category where find_in_set('hienthi',status) order by id desc");


$producthot = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('hot',status) and find_in_set('hienthi',status) order by id desc");
$advertise = $d->rawQuery("select photo from multi_media where type = 'advertise'");
$bestseller = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from product where find_in_set('banchay',status) and find_in_set('hienthi',status) order by id desc");
$promotion = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where find_in_set('khuyenmai',status) and find_in_set('hienthi',status) order by id desc");
    // $question = $d->rawQuery("select name, photo, slug, id, date_created from #_news where type = 'cau-hoi' and find_in_set('hienthi',status) order by id desc");


$newdv = $d->rawQuery("select name, photo, slug, id, date_created, description from #_news where type = 'dich-vu' order by id desc");

?>