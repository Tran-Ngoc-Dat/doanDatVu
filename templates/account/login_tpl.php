<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb fix-padding">
            <li class="breadcrumb-item">
                <a href="<?=$configBase?>">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Đăng nhập</a>
            </li>
        </ol>
    </div>
</nav>
<div class="wrap-main  w-clear row">
    <div class="wrap-user wrap-chill">
        <div class=" title-user">
            <span>Đăng nhập</span>
        </div>
        <?= $flash->getMessages("frontend") ?>
        <form class="fix-user" action="" name="login-user" method="post" style="padding: 25px;">
            <div class="form-group mb-3">
            
            <label class="label" for="name">Email / tài khoản *</label>
                <input type="text" class="form-control text-sm" id="username" name="username" placeholder=" Nhập tên tài khoản/ email  " required="">
                    <div class="invalid-feedback">Vui lòng nhập tài khoản</div> 
            </div>
            <div class="form-group mb-3">
            <label class="label" for="name">Mật khẩu *</label>
                <input type="password" class="form-control text-sm" id="password" name="password" placeholder=" Nhập mật khẩu " required="">
                    <div class="invalid-feedback">Vui lòng nhập mật khẩu</div> 
            </div>
            <div class="forget-password d-flex align-items-center justify-content-between p-0">
                <a class="" href="quen-mat-khau">Quên mật khẩu</a>
                <a class="" href="dang-ky">Đăng ký</a>
            </div>
            <div class="button-user d-flex align-items-center justify-content-between">
                <button type="submit" class="btn form-control btn-primary rounded submit px-3" name="login-user" value="1">Đăng nhập</button>
            </div>
            

        </form>
    </div>
</div>
