<div class="menu-page">
    <div class="wrap-content">
        <div class="row-menu">
            <div class="col-left">
                <div class="menu-left">
                    <div class="title-menu-l"><i class="fas fa-bars"></i>DANH MỤC SẢN PHẨM</div>
                    <div class="menu-l <?php if ($source != 'index') {
                        echo 'displist';
                    } ?>">
                    <?php if (count($splist)) { ?>
                        <ul class="list-menu 
                        <?php if ($source != 'index') {
                            echo 'showopen';
                        } ?> ">
                        <?php foreach ($splist as $klist => $vlist) { ?>
                            <li >
                                <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
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
                <li><a class="<?php if($source=='' || $source=='index') echo 'active'; ?> transition " href="<?= $configBase ?>" title="Trang chủ"><i class="fas fa-home"></i> Trang chủ</a></li>
                <li><a class="<?php if($source=='gioi-thieu') echo 'active'; ?> transition" href="<?= $configBase ?>gioi-thieu" title="Giới thiệu"><i class="fas fa-pen"></i> Giới thiệu</a></li>
                <li><a class="<?php if($source=='san-pham') echo 'active'; ?> transition" href="<?= $configBase ?>san-pham" title="Sản phẩm"><i class="fa-solid fa-box-open"></i> Sản phẩm</a></li>
                <li><a class="<?php if($source=='tuyen-dung') echo 'active'; ?> transition" href="<?= $configBase ?>tuyen-dung" title="Tuyển dụng"><i class="fas fa-user"></i> Tuyển dụng</a></li>
                <li><a class="<?php if($source=='tin-tuc') echo 'active'; ?> transition" href="<?= $configBase ?>tin-tuc" title="Tin tức"><i class="fas fa-newspaper"></i> Tin tức</a></li>
                <li><a class="<?php if($source=='lien-he') echo 'active'; ?> transition" href="<?= $configBase ?>lien-he" title="Liên hệ"><i class="fas fa-phone-alt"></i> Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>