<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="doi-mat-khau">Đổi mật khẩu</a>
            </li>
        </ol>
    </div>
</nav>
<div class="wrap-user">
    
    <div class="title-user">
        <span>Đổi mật khẩu</span>
    </div>
    <div class="d-flex justify-content-between align-items-start">
    <div class="box-user">
    <div class="items-info"><a href="thong-tin-ca-nhan" class="<?=$action=='thong-tin-ca-nhan' ? 'act' : ''?> text-decoration-none">Thông tin cá nhân</a></div>
    <div class="items-info"><a href="don-hang-cua-ban" class="<?=$action=='don-hang-cua-ban' ? 'act' : ''?> text-decoration-none">Đơn hàng của bạn</a></div>
    <div class="items-info"><a href="doi-mat-khau" class="<?=$action=='doi-mat-khau' ? 'act' : ''?> text-decoration-none">Đổi mật khẩu</a></div>
    <div class="items-info"><a href="dang-xuat" class="text-decoration-none">Đăng xuất</a></div>
</div>
<div class="box-info">
    <form class="form-user validation-user" novalidate method="post" action="" enctype="multipart/form-data">
        <?= $flash->getMessages("frontend") ?>
        <label>Mật khẩu cũ</label>
        <div class="input-group input-user">
            <input type="password" class="form-control text-sm" id="password-old" name="password-old" placeholder="Nhập mật khẩu cũ của bạn" value="" required>
            <div class="invalid-feedback">Nhập mật khẩu cũ của bạn</div> 
        </div>
        <label>Mật khẩu mới</label>
        <div class="input-group input-user">
            <input type="password" class="form-control text-sm" id="password-new" name="password-new" placeholder="Nhập mật khẩu mới của bạn" value="" required>
            <div class="invalid-feedback">Nhập mật khẩu mới của bạn</div> 
        </div>
        <label>Nhập lại mật khẩu mới</label>
        <div class="input-group input-user">
            <input type="password" class="form-control text-sm" id="password" name="password" placeholder="Nhập mật khẩu mới của bạn" value="" required>
            <div class="invalid-feedback">Nhập mật khẩu mới của bạn</div> 
        </div>
        <div class="button-user">
            <input type="submit" class="btn btn-primary btn-block" name="change_password" value="Cập nhật">
        </div>
    </form>
</div>
    </div>
</div>