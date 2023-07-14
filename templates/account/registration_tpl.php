<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb fix-padding">
            <li class="breadcrumb-item">
                <a href="<?= $configBase ?>">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="dang-ky">Đăng ký</a>
            </li>
        </ol>
    </div>
</nav>
<div class="wrap-user wrap-chill">
    <div class=" title-user">
        <span>ĐĂNG KÝ</span>

    </div>
    <?= $flash->getMessages("frontend") ?>
    <form class="fix-user" action="" method="post" style="padding: 25px;">
        <div class="form-group mb-3">

            <label class="label" for="name">Tên tài khoản *</label>
            <input type="text" class="form-control text-sm" id="username" name="username" placeholder="Nhập tài khoản hoặc địa chỉ email" required="">
            <div class="invalid-feedback">Vui lòng nhập tài khoản hoặc địa chỉ email</div>
        </div>
        <div class="form-group mb-3">
            <label class="label" for="name">Mật khẩu *</label>
            <input type="password" class="form-control text-sm" id="password" name="password" placeholder="Nhập mật khẩu" required="">
            <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>
        </div>
        <div class="form-group mb-3">
            <label class="label" for="name">Nhập lại mật khẩu *</label>
            <input type="password" class="form-control text-sm" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" required="">
            <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>
        </div>
        <div class="form-group mb-3">
            <label class="label" for="name">Họ tên *</label>
            <input type="text" class="form-control text-sm" id="fullname" name="fullname" placeholder="Nhập họ tên" required="">
            <div class="invalid-feedback">Vui lòng nhập họ tên</div>
        </div>
        <div class="form-group mb-3">
            <label class="label" for="name">Email *</label>
            <input type="email" class="form-control text-sm" id="email" name="email" placeholder="Nhập email" required="">
            <div class="invalid-feedback">Vui lòng nhập email</div>
        </div>
        <div class="form-group mb-3">
            <label class="label" for="name">Ngày sinh *</label>
            <input type="date" class="form-control text-sm" id="birthday" name="birthday" placeholder="Nhập họ tên" required="">
            <div class="invalid-feedback">Vui lòng nhập ngày sinh</div>
        </div>

        <div class="form-group mb-3">
            <label class="label" for="name">Số điện thoại *</label>
            <input type="number" class="form-control text-sm" id="phone" name="phone" placeholder="Nhập số điện thoại" required="">
            <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
        </div>
        <div class="form-group mb-3">
            <label class="label" for="name">Địa chỉ *</label>
            <input type="text" class="form-control text-sm" id="address" name="address" placeholder="Nhập địa chỉ" required="">
            <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
        </div>
        
        <!-- <div class="form-group mb-3">
            <label class="label" for="name">PHOTO *</label>
            <input type="file" name="file" id="file-zone">
        </div> -->
        
        <div class="button-user d-flex align-items-center justify-content-between">
            <button type="submit" class="btn form-control btn-primary rounded submit px-3" name="register-user" value="1">Đăng ký</button>
        </div>
    </form>
</div>