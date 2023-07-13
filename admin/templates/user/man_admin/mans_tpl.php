<?php
	$linkMan = "index.php?source=user&act=man_admin";
    $linkAdd = "index.php?source=user&act=add_admin";
	$linkEdit = "index.php?source=user&act=edit_admin";
	$linkDelete = "index.php?source=user&act=delete_admin";
?>

<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý tài khoản admin</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <!-- <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?=$linkDelete?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a> -->
        <div class="form-inline form-search d-inline-block align-middle ml-3" style="width:30%">
            <div class="input-group input-group-sm input-group-button input-group-primary">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword"
                    placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                    value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>"
                    onkeypress="doEnter(event,'keyword','<?= $linkMan ?>')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white btn btn-primary input-group-addon" type="button"
                        onclick="onSearch('keyword','<?= $linkMan ?>')">
                        Tìm kiếm
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách tài khoản admin</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" width="10%">STT</th>
                        <th class="align-middle">Tài khoản</th>
                        <th class="align-middle">Họ tên</th>
                        <th class="align-middle">Email</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) { ?>
                            <tr>
                                <td class="align-middle">
                                    <a class="text-dark text-break"><?=$i+1?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['username']?>"><?=$items[$i]['username']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['fullname']?>"><?=$items[$i]['fullname']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['email']?>"><?=$items[$i]['email']?></a>
                                </td>
                                <td class="align-middle text-center text-md text-nowrap">
                                    <a class="text-primary mr-2" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                    <a class="text-danger" id="delete-item" data-url="<?=$linkDelete?>&id=<?=$items[$i]['id']?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($paging) { ?>
        <div class="card-footer text-sm pb-0">
            <?=$paging?>
        </div>
    <?php } ?>
    <div class="card-footer text-sm">
        <a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <!-- <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?=$linkDelete?>" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a> -->
    </div>
</section>