<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Liên hệ</a>
            </li>
        </ol>
    </div>
</nav>
<div class="title-main"><span><?= $titleMain ?></span></div>
<div class="content-main">
    <div class="contact-article row">
        
        <div class="contact-text content-ck col-lg-6"><?= htmlspecialchars_decode($lienhe['content' . $lang]) ?>
            <p>
                <strong>
                    <span style="color:#e74c3c">
                    <?= $optsetting['name'] ?>
                    </span>
                </strong>
            </p>

            <label for="address">Địa chỉ:</label>
            <span><?= $optsetting['address'] ?></span> <br>
            <label for="phone">Số điện thoại:</label>
            <span><?= $optsetting['phone'] ?></span> <br>
            <label for="hotlinee">Hotline:</label>
            <span><?= $optsetting['hotline'] ?></span> <br>
            <label for="email">Email:</label>
            <span><?= $optsetting['email'] ?></span>

            <div class="grid-social">
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/email-icon.png" alt=""></i>
                    <p>E-mail</p>
                    <a href="<?= $optsetting['email'] ?>"><?= $optsetting['email'] ?></a>
                </div>
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/icons-phone.png" alt=""></i>
                    <p>Phone</p>
                    <a href="<?= $optsetting['phone'] ?>"><?= $optsetting['phone'] ?></a>
                </div>
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/zalo-logo.png" alt=""></i>
                    <p>Zalo</p>
                    <a href="<?= $optsetting['zalo'] ?>"><?= $optsetting['zalo'] ?></a>
                </div>
                <div class="items-social">
                    <i><img class="lazy loaded" src="assets/images/messenger.png" alt=""></i>
                    <p>Zalo</p>
                    <a href=""></a>
                </div>
            </div>
        </div>
        
        
        <form id="FormContact" class="contact-form validation-contact col-lg-6" novalidate method="post" action="" enctype="multipart/form-data">
            <div class="form-row row">
                <div class="contact-input col-sm-6">
                <label class="label" for="name">Họ tên:</label>
                    <input type="text" class="form-control text-sm" id="fullname-contact" name="dataContact[fullname]" placeholder="" value="<?= $flash->get('fullname') ?>" required />
                </div>
                <div class="contact-input col-sm-6">
                <label class="label" for="name">Số điện thoại:</label>
                    <input type="number" class="form-control text-sm" id="phone-contact" name="dataContact[phone]" placeholder="" value="<?= $flash->get('phone') ?>" required />
                </div>
            </div>
            <div class="form-row row">
                <div class="contact-input col-sm-6">
                <label class="label" for="name">Địa chỉ:</label>
                    <input type="text" class="form-control text-sm" id="address-contact" name="dataContact[address]" placeholder="" value="<?= $flash->get('address') ?>" required />
                </div>
                <div class="contact-input col-sm-6">
                <label class="label" for="name">Email:</label>
                    <input type="email" class="form-control text-sm" id="email-contact" name="dataContact[email]" placeholder="" value="<?= $flash->get('email') ?>" required />
                </div>
            </div>
            <div class="contact-input">
                <label class="label" for="name">Nội dung:</label>
                <textarea class="form-control text-sm" id="content-contact" name="dataContact[content]" placeholder="" required ><?= $flash->get('content') ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary mr-2" name="submit-contact" value="Gửi" />
            <input type="reset" class="btn btn-secondary" value="Nhập lại" />
			<input type="hidden" name="contact" value="submit">
            <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
        </form>
    </div>
</div>