<?php
    $linkMan = "index.php?source=user&act=man_admin";
    $linkSave = "index.php?source=user&act=save_admin";
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết tài khoản admin</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <?=$flash->getMessages('admin')?>
        
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title"><?=($act=="edit_admin")?"Cập nhật":"Thêm mới";?> tài khoản</h3>
            </div>
            <div class="card-body">
            	<div class="row">
					<div class="form-group col-md-4">
						<label for="username">Tài khoản: <span class="text-danger">*</span></label>
						<input type="text" class="form-control text-sm" name="data[username]" id="username" placeholder="Tài khoản" value="<?=(!empty($flash->has('username'))) ? $flash->get('username') : @$item['username']?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="fullname">Họ tên: <span class="text-danger">*</span></label>
						<input type="text" class="form-control text-sm" name="data[fullname]" id="fullname" placeholder="Họ tên" value="<?=(!empty($flash->has('fullname'))) ? $flash->get('fullname') : @$item['fullname']?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="password">Mật khẩu:</label>
						<input type="password" class="form-control text-sm" name="data[password]" id="password" placeholder="Mật khẩu" <?=($act=="add_admin")?'required':'';?>>
					</div>
					<div class="form-group col-md-4">
						<label for="confirm_password">Nhập lại mật khẩu:</label>
						<input type="password" class="form-control text-sm" name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu" <?=($act=="add_admin")?'required':'';?>>
					</div>
					<div class="form-group col-md-4">
						<label for="email">Email:</label>
						<input type="email" class="form-control text-sm" name="data[email]" id="email" placeholder="Email" value="<?=(!empty($flash->has('email'))) ? $flash->get('email') : @$item['email']?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="phone">Điện thoại:</label>
						<input type="text" class="form-control text-sm" name="data[phone]" id="phone" placeholder="Điện thoại" value="<?=(!empty($flash->has('phone'))) ? $flash->get('phone') : @$item['phone']?>" required>
					</div>
					<div class="form-group col-md-4">
						<label for="gender">Giới tính:</label>
						<?php $flashGender = $flash->get('gender'); ?>
						<select class="custom-select text-sm" name="data[gender]" id="gender" required>
							<option value="">Chọn giới tính</option>
							<option <?=(!empty($flashGender) && $flashGender == 1) ? 'selected' : ((@$item['gender'] == 1) ? 'selected' : '')?> value="1">Nam</option>
							<option <?=(!empty($flashGender) && $flashGender == 2) ? 'selected' : ((@$item['gender'] == 2) ? 'selected' : '')?> value="2">Nữ</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="birthday">Ngày sinh:</label>
						<input type="text" class="form-control text-sm max-date" name="data[birthday]" id="birthday" placeholder="Ngày sinh" value="<?= (!empty($flash->has('birthday'))) ? date("d/m/Y", $flash->get('birthday')) : ((!empty($item['birthday'])) ? date("d/m/Y", $item['birthday']) : '') ?>" required autocomplete="off">
					</div>
					<div class="form-group col-md-4">
						<label for="address">Địa chỉ:</label>
						<input type="text" class="form-control text-sm" name="data[address]" id="address" placeholder="Địa chỉ" value="<?=(!empty($flash->has('address'))) ? $flash->get('address') : @$item['address']?>" required>
					</div>
				</div>
				
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>