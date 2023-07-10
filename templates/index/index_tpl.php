<div class="wrap-product">
    <div class="wrap-content">
        <div class="box-product">
            <div class="product-left">
                <?php if (!empty($productlist)) { 
                    // $func->dump($productlist);    
                ?>
                <div class="product-top">
                    <p>Danh mục sản phẩm</p>
                    <ul class="pro-list scrollbar" id="style-2">
                        <?php foreach ($productlist as $v) { ?>
                        <li><a href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>"><i
                                    class="fas fa-tag"></i> <?= $v['name'.$lang] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="product-right">
                <div class="title-main-second">
                    <span><i class="fas fa-tag"></i> Sản phẩm nổi bật</span>
                </div>
                <div class="paging-product"></div>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($intro)) { ?>
<div class="wrap-introduce">
    <div class="wrap-content">
        <div class="row-intro">
            <div class="intro-left">
                <div class="introduce">
                    <div class="title-introduce">
                        <p>Giới thiệu</p>
                        <span><?= $intro[0]['name'] ?></span>
                    </div>
                    <p class="desc-introduce text-split"><?= $intro[0]['description'] ?></p>
                    <div class="btn-intro">
                        <a class="text-decoration-none" href="gioi-thieu">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="intro-right rp-introduce">
                <div class="images">
                    <a class="img scale-img none-introduce">
                        <img src="<?= $configBase ?>upload/photo/<?= $imggt['photo'] ?>" alt="" width="465"
                            height="350">
                    </a>
                    <a href="gioi-thieu" class="img scale-img ">
                        <img src="<?= $configBase ?>upload/news/<?= $intro[0]['photo'] ?>" alt="" width="465"
                            height="350">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if (!empty($partner)) { ?>
<div class="wrap-partner">
    <div class="wrap-content">
        <div class="slick-10 none">
            <?php foreach ($partner as $v) { ?>
            <div>
                <div class="item-partner">
                    <img src="<?= $configBase ?>upload/photo/<?= $v['photo'] ?>" alt="" width="125" height="100">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<?php if (!empty($productlist)) { ?>
<div class="wrap-productnb">
    <div class="wrap-content">
        <?php foreach ($productlist as $vlist) { 
				$product = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where id_category = ? and find_in_set('hienthi',status)  order by id desc", array($vlist['id']));
				?>
        <div class="title-main-third">
            <span><?= $vlist['name'] ?></span>
            <div class="d-flex  justify-content-between align-item-center">
                <span class="hotline-main">Liên hệ: <span><?= $optsetting['hotline'] ?></span></span>
                <span class="email-main">Email: <span><?= $optsetting['email'] ?></span></span>
                <a class="btn-pro-main" href="<?= $configBase ?><?= $vlist['slug'] ?>">Xem thêm</a>
                <div class="css-null"></div>
            </div>
        </div>
        <div class="slick-4 none">
            <?php foreach ($product as $v) { ?>
            <div>
                <div class="item-product fix-product">
                    <div class="img-product">
                        <a class="scale-img" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>">
                            <img src="<?= $configBase ?>upload/product/<?= $v['photo'] ?>" alt="" width="280"
                                height="280">
                        </a>
                        <a class="text-decoration-none btn-product cart-add addcart" data-id="<?=$v['id']?>"
                            data-action="addnow">
                            <span>Thêm giỏ hàng</span>
                        </a>
                    </div>
                    <div class="title-product">
                        <h3 class="name-product"><a class="text-split text-decoration-none"
                                href="<?= $configBase ?><?= $v['slug'] ?>"
                                title="<?= $v['name'] ?>"><?= $v['name'] ?></a></h3>
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
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>

<?php if (!empty($criteria)) { ?>
<div class="wrap-criteria">
    <div class="wrap-content">
        <div class="title-main-third">
            <span>Vì sao chọn chúng tôi</span>
            <div class="d-flex  justify-content-between align-item-center">
                <span class="hotline-main">Liên hệ: <span><?= $optsetting['hotline'] ?></span></span>
                <span class="email-main">Email: <span><?= $optsetting['email'] ?></span></span>
                <div class="css-null"></div>
            </div>
        </div>
        <div class="slide-criteria none">
            <?php foreach ($criteria as $v) { ?>
            <div>
                <div class="box-criteria hrv-rotateY">
                    <div class="img-criteria">
                        <a class="">
                            <img src="<?= $configBase ?>upload/news/<?= $v['photo'] ?>" alt="" width="40" height="40">
                        </a>
                        <span class="text-split"><?= $v['name'] ?></span>
                    </div>
                    <p class="desc-criteria text-split"><?= $v['description'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="img-criteria-main">
            <img src="<?= $configBase ?>upload/photo/<?= $imgtc['photo'] ?>" alt="" width="825" height="200">
        </div>
    </div>
</div>
<?php } ?>

<?php if (!empty($advertise)) : ?>
<div class="advertise-index">
    <div class="wrap-content">
        <div class="slick-advertise none">
            <?php foreach ($advertise as $v) : ?>
            <div>
                <div class="items">
                    <a href="<?= $v['link'] ?>" class="scale-img" title="<?= $v['name'] ?>">
                        <img src="<?= $configBase ?>upload/photo/<?= $v['photo'] ?>" alt="" width="640" height="230">
                    </a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php endif ?>

<?php if (!empty($newsnb)) { ?>
<div class="wrap-news">
    <div class="wrap-content">
        <div class="row-news">
            <div class="news-left">
                <div class="title-news">
                    <span>Tin tức nổi bật</span>
                    <a href="tin-tuc" class="text-decoration-none">Xem thêm</a>
                </div>
                <div class="slide-news none">
                    <?php foreach ($newsnb as $key => $v) { ?>
                    <div>
                        <div class="box-news <?= $key % 2==0? 'item-odd':'' ?>">
                            <a href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>" class="hover-glass scale-img">
                                <img src="upload/news/<?= $v['photo'] ?>" alt="" width="182" height="140">
                            </a>
                            <div class="item-news">
                                <div class="title-name-news"><a class="text-split text-decoration-none" href="<?= $v['slug'] ?>"
                                        title="<?= $v['name'] ?>"><?= $v['name'] ?></a></div>
                                <p class="text-split"><?= $v['description'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="news-right">
                <div class="title-news fix-video">
                    <span>Video nổi bật</span>
                    <a href="video" class="text-decoration-none">Xem thêm</a>
                </div>
				<img src="./assets/images/zero/img_video.jpg" alt="video">
            </div>
        </div>
    </div>
</div>
<?php } ?>