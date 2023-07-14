<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb fix-padding">
            <li class="breadcrumb-item">
                <a href="<?= $configBase ?>">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="quen-mat-khau">Quên mật khẩu</a>
            </li>
        </ol>
    </div>
</nav>

<div class="wrap-user wrap-chill">

    <div class="title-user">

        <span>Quên mật khẩu</span>

    </div>
    <div class="box-info">
    <form class="form-user validation-user" novalidate method="post" action="quen-mat-khau" enctype="multipart/form-data">

        <?=$flash->getMessages("frontend")?>
        <div class="form-group mb-3">
            <label class="label" for="name">Tài khoản *</label>

            <div class="input-group input-user">
                <input type="text" class="form-control text-sm" id="username" name="username" placeholder="Tài khoản" required>

                <div class="invalid-feedback">Vui lòng nhập tài khoản</div>

            </div>
        </div>
        <div class="form-group mb-3">

        <label class="label" for="name">Email *</label>

        <div class="input-group input-user">
            <input type="email" class="form-control text-sm" id="email" name="email" placeholder="Nhập email" required>

            <div class="invalid-feedback">Email</div>

        </div>
        </div>

        <div class="button-user">

            <input type="submit" class="btn btn-primary btn-block" name="forgot-password" value="Lấy mật khẩu" >

        </div>

    </form>
</div>
</div>