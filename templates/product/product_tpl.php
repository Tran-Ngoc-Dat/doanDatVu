<div class="row">
    <div class="col-lg-3">
        <div class="box-filter">
            <div class="filter-items">
                <div class="filter-items-name"> Sắp xếp</div>
                <div class="items-filter-sort" data-sort="0">
                    <div class="name-filter">
                        Giá mặc định
                    </div>
                    <div class="check-box"><i></i></div>
                </div>
                <div class="items-filter-sort" data-sort="1">
                    <div class="name-filter">
                        Giá tăng dần
                    </div>
                    <div class="check-box"><i></i></div>
                </div>
                <div class="items-filter-sort" data-sort="2">
                    <div class="name-filter">
                        Giá giảm dần
                    </div>
                    <div class="check-box"><i></i></div>
                </div>
            </div>
            <div class="filter-items">
                <div class="filter-items-name"> Danh mục sản phẩm</div>
                <?php foreach ($splist as $key => $v) { ?>
                <div class="items-filter-child filter-category" data-idcategory="<?= $v['id'] ?>">
                    <div class="name-filter">
                        <?= $v['name'] ?>
                    </div>
                    <div class="check-box"><i></i></div>
                </div>
                <?php } ?>
            </div>
            <div class="filter-items">
                <div class="filter-items-name"> Giá</div>
                <div class="items-filter-child">
                    <div class="w-100">
                        <div id="range_price"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="title-main"><span>
                <?= (!empty($titleCate)) ? $titleCate : @$titleMain ?>
            </span></div>
        <div class="content-main  w-clear">
            <?php if (!empty($product)) { ?>
            <div class="grid-products grid-4">
                <?php foreach ($product as $k => $v) { ?>
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
                <?php } ?>
            </div>
            <?php } else { ?>
            <div class="col-12">
                <div class="alert alert-warning w-100" role="alert">
                    <strong>Không tìm thấy kết quả</strong>
                </div>
            </div>
            <?php } ?>
            <div class="clear"></div>
            <div class="col-12">
                <div class="pagination-home w-100 mt-3 mb-3">
                    <?= (!empty($paging)) ? $paging : '' ?>
                </div>
            </div>
        </div>
    </div>
</div>