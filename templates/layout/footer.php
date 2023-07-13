<div class="footer">
    <div class="footer-article">
        <div class="wrap-content">
            <div class="box-footer">
                <div class="item-footer1">
                    <div class="footer-news">
                        <a href="" class="logo-footer">
                            <img src="<?=$configBase?>upload/photo/<?= $logo['photo'] ?>" alt="">
                        </a>
                        <div class="content-footer">
                            <span>Hotline: <span> <?= $optsetting['hotline'] ?> - <?= $optsetting['phone'] ?></span></span>
                            <span>Địa chỉ: <span> <?= $optsetting['address'] ?></span></span>
                            <span>Email: <span> <?= $optsetting['email'] ?></span></span>
                            <span>Website: <span> <?= $optsetting['website'] ?></span></span>
                            <span>Fanpage: <span> <?= $optsetting['fanpage'] ?></span></span>
                        </div>
                        <ul class="social-ft list-unstyled p-0 m-0 text-center">
                            <li>Mạng xã hội: </li>
                            <?php foreach ($social as $k => $v) { ?>
                            <li class="hrv-rotateY d-inline-block align-top">
                                <a href="<?= $v['link'] ?>" target="_blank" class="hrv-rotateY">
                                    <img src="<?=$configBase?>upload/photo/<?= $v['photo'] ?>" alt="" width="35"
                                        height="35">
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="item-footer2">
                    <div><?= $optsetting['coords_iframe'] ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered">
    </div>


    <!-- Modal cart -->
    <div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="popup-cart-label">Giỏ hàng của bạn</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <div class="btn-opencart">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="count-cart"><?=(!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0?></span>
    </div>