<div class="menu-page">

    <div class="wrap-content">

        <div class="row-menu">

            <div class="col-left">

                <div class="menu-left">

                    <div class="title-menu-l"><i class="fas fa-bars"></i>DANH MỤC SẢN PHẨM</div>

                    <div class="menu-l <?php if ($source != 'index') {

                        echo 'dispmenu';

                    } ?>">

                    <?php if (count($splist)) { ?>

                        <ul class="list-menu 

                        <?php if ($source != 'index') {

                            echo 'showopen';

                        } ?> ">

                        <?php foreach ($splist as $klist => $vlist) {?>

                            <li >
                                <a class="has-child transition" title="<?= $vlist['name'] ?>" href="<?= $vlist['slug'] ?>"><?= $vlist['name'] ?></a>
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

                <li><a class="<?php if($source=='' || $source=='index') echo 'active'; ?> transition" href="<?=$configBase?>" title="<?=trangchu?>"><i class="fa-sharp fa-solid fa-house-chimney"></i></a></li>
                <li class="line"></li>
                <li><a class="<?php if($source=='gioi-thieu') echo 'active'; ?> transition" href="<?=$configBase?>gioi-thieu" title="Giới thiệu">Giới thiệu</a></li>
                <li class="line"></li>
                <li><a class="<?php if($source=='san-pham') echo 'active'; ?> transition" href="<?=$configBase?>san-pham" title="Sản phẩm">Sản phẩm</a></li>

                <li class="line"></li>

                <li><a class="<?php if($source=='dich-vu') echo 'active'; ?> transition" href="<?=$configBase?>dich-vu" title="Dịch vụ">Dịch vụ</a></li>

                <li class="line"></li>

                <li>

                    <a class="<?php if($source=='bao-duong') echo 'active'; ?> transition" href="<?=$configBase?>bao-duong" title="Bảo dưỡng">Bảo dưỡng</a>

                </li>

                <li class="line"></li>

                <li>

                    <a class="<?php if($source=='khach-hang') echo 'active'; ?> transition" href="<?=$configBase?>khach-hang" title="Khách hàng">Khách hàng</a>

                </li>
                <li class="line"></li>

                <li><a class="<?php if($source=='tin-tuc') echo 'active'; ?> transition" href="<?=$configBase?>tin-tuc" title="Tin tức">Tin tức</a></li>
                <!-- <li class="line"></li> -->

                <!-- <li>

                    <a class="<?php if($source=='cau-hoi-thuong-gap') echo 'active'; ?> transition" href="<?=$configBase?>cau-hoi-thuong-gap" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a>

                </li> -->

            </ul>

        </div>

    </div>

</div>

</div>

</div>
