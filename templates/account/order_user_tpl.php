<nav aria-label="breadcrumb" id="bar_breadcrumb">
    <div class="warp-content">
        <ol class="breadcrumb fix-padding">
            <li class="breadcrumb-item">
                <a href="<?= $configBase ?>">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="don-hang-cua-ban">Đơn hàng của bạn</a>
            </li>
        </ol>
    </div>
</nav>
<div class="wrap-user">
    
    <div class="title-user">
        <span><?=$titleMain?></span>
    </div>
    <div class="d-flex justify-content-between align-items-start">
    <div class="box-user">
    <div class="items-info"><a href="thong-tin-ca-nhan" class="<?=$action=='thong-tin-ca-nhan' ? 'act' : ''?> text-decoration-none">Thông tin cá nhân</a></div>
    <div class="items-info"><a href="don-hang-cua-ban" class="<?=$action=='don-hang-cua-ban' ? 'act' : ''?> text-decoration-none">Đơn hàng của bạn</a></div>
    <div class="items-info"><a href="doi-mat-khau" class="<?=$action=='doi-mat-khau' ? 'act' : ''?> text-decoration-none">Đổi mật khẩu</a></div>
    <div class="items-info"><a href="dang-xuat" class="text-decoration-none">Đăng xuất</a></div>
</div>
<div class="box-info">
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Email</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($order_user as $key => $v) { ?>
        <tr>
            <th scope="row"><?=$key+1?></th>
            <td><a href="chi-tiet-don-hang?id=<?=$v['id']?>"><?=$v['code']?></a></td>
            <td><?=$v['email']?></td>
            <td>
            <?php
                if(isset($v['order_status']) && $v['order_status'] == 1)
                {
                    ?>
                    <span class="info-box-text text-primary font-weight-bold text-capitalize text-sm">Mới đặt</span>
            <?php } ?>
            <?php
                if(isset($v['order_status']) && $v['order_status'] == 2)
                {
                    ?>
                    <span class="info-box-text text-info font-weight-bold text-capitalize text-sm">Đã xác nhận</span>
            <?php } ?>
            <?php
                if(isset($v['order_status']) && $v['order_status'] == 3)
                {
                    ?>
                    <span class="info-box-text text-success font-weight-bold text-capitalize text-sm">Đã giao</span>
            <?php } ?>
            <?php
                if(isset($v['order_status']) && $v['order_status'] == 4)
                {
                    ?>
                    <span class="info-box-text text-danger font-weight-bold text-capitalize text-sm">Đã hủy</span>
            <?php } ?>
            </td>
            <td><?=$func->formatMoney($v['total_price']);?></td>
            <td><?=date('d/m/Y',$v['date_created']);?></td>
            <td>
                <?php if(isset($v['order_status']) && $v['order_status'] < 2){?>
                    <a href="huy-don-hang?id=<?=$v['id']?>" class="btn btn-danger">Hủy</a>
                <?php } ?>
                <?php if(isset($v['order_status']) && $v['order_status'] > 2) { ?>
                    <a class="btn btn-secondary">Hủy</a>
                 <?php } ?>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
</div>
    </div>
</div>