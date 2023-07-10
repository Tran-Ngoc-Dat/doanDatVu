<?php  
if(!defined('SOURCES')) die("Error");

$productlist = $d->rawQuery("select name,id,slug,photo from category where find_in_set('hienthi',status) order by id desc");

$intro = $d->rawQuery("select name, photo, slug, id, description from #_news where type = 'gioi-thieu' order by id desc limit 1");
$imggt = $d->rawQueryOne("select photo from multi_media where type = 'img-gt'");
$imgtc = $d->rawQueryOne("select photo from multi_media where type = 'img-tc'");
$criteria = $d->rawQuery("select name, photo, id, description, photo from #_news where type = 'tieu-chi' order by id desc");
$newsnb = $d->rawQuery("select name, photo, slug, id, date_created, description from #_news where type = 'tin-tuc' order by id desc");
$partner = $d->rawQuery("select name,id,link,photo,description from multi_media where type = 'doitac'");
$video = $d->rawQuery("select name,id,link_video,photo from multi_media where type = 'video' order by id desc limit 1");
?>