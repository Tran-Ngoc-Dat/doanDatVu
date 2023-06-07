<div class="menu-page">
    <div class="wrap-content">
        <div class="row-menu">
            <div class="col-left">
                <div class="menu-left">
                    <div class="title-menu-l"><i class="fas fa-bars"></i>DANH MỤC SẢN PHẨM</div>
                    <div class="menu-l <?php if ($source != 'index') {
                        echo 'dispmenu';
                    } ?>">
                    <?php if (count($spmenu)) { ?>
                        <ul class="list-menu 
                        <?php if ($source != 'index') {
                            echo 'showopen';
                        } ?> ">
                        <?php foreach ($spmenu as $klist => $vlist) {
                            $spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                            <li >
                                <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                <?php if (!empty($spcat)) { ?>
                                    <ul>
                                        <?php foreach ($spcat as $kcat => $vcat) { ?>
                                            <li>
                                                <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                                
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-right">
        <div class="menu">
            <ul class="d-flex align-items-center justify-content-between">
                <li><a class="<?php if($com=='dich-vu') echo 'active'; ?> transition" href="dich-vu" title="Dịch vụ">Dịch vụ</a></li>
                <li class="line"></li>
                <li>
                    <a class="<?php if($com=='bao-duong') echo 'active'; ?> transition" href="bao-duong" title="Bảo dưỡng">Bảo dưỡng</a>
                </li>
                <li class="line"></li>
                <li>
                    <a class="<?php if($com=='khach-hang') echo 'active'; ?> transition" href="khach-hang" title="Khách hàng">Khách hàng</a>
                </li>
                <li class="line"></li>
                <li>
                    <a class="<?php if($com=='cau-hoi-thuong-gap') echo 'active'; ?> transition" href="cau-hoi-thuong-gap" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a>
                </li>
            </ul>
            <?php if ($optsetting['opendoor']): ?>
                <div class="open-door">
                    <span><i class="fa-sharp fa-regular fa-clock"></i> Mở cửa: <?= $optsetting['opendoor'] ?></span>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
</div>
</div>