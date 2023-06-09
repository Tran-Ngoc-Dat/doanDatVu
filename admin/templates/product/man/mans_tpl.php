<?php 
	$linkView = $configBase;
	$linkMan = $linkFilter = "index.php?source=product&act=man";
	$linkAdd = "index.php?source=product&act=add";
    $linkCopy = "index.php?source=product&act=copy";
    $linkEdit = "index.php?source=product&act=edit";
    $linkDelete = "index.php?source=product&act=delete";
    $linkMulti = "index.php?source=product&act=man_photo&kind=man";
    $copyImg = (isset($config['product']['copy_image']) && $config['product']['copy_image'] == true) ? TRUE : FALSE;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý <?=$config['product']['title_main']?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
    	<a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
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
        <select name="" id="select-prolist" class="select-prolist select2 w-50">
            <option value="">Danh mục sản phẩm</option>
            <?php foreach($category as $v) { ?>
                <option value="<?=$v['id']?>" <?=($v['id'] == $id_category ? 'selected' : '')?> ><?=$v['name']?></option>
            <?php }?>
        </select>
    </div>
    <?php if(
        (isset($config['product']['dropdown']) && $config['product']['dropdown'] == true)
    ) { ?>
	    <div class="card-footer form-group-category text-sm bg-light row">
			<?php if(isset($config['product']['list']) && $config['product']['list'] == true) { ?>
				<div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?=$func->getLinkCategory('product', 'list', $type)?></div>
			<?php } ?>
			<?php if(isset($config['product']['cat']) && $config['product']['cat'] == true) { ?>
				<div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?=$func->getLinkCategory('product', 'cat', $type)?></div>
			<?php } ?>
	    </div>
	<?php } ?>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách <?=$config['product']['title_main']?></h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle">STT</th>
						<?php if(isset($config['product']['show_images']) && $config['product']['show_images'] == true) { ?>
							<th class="align-middle">Hình</th>
						<?php } ?>
						<th class="align-middle" style="width:30%">Tiêu đề</th>
                        <th class="align-middle text-center">Số lượng tồn kho</th>
						<?php if(isset($config['product']['check'])) { foreach($config['product']['check'] as $key => $value) { ?>
							<th class="align-middle text-center"><?=$value?></th>
						<?php } } ?>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) {
                        	$linkID = "";
							if($items[$i]['id_list']) $linkID .= "&id_list=".$items[$i]['id_list'];
							if($items[$i]['id_cat']) $linkID .= "&id_cat=".$items[$i]['id_cat']; ?>
                            <tr>
                                <td class="align-middle">
                                    <a class="text-dark text-break"><?=$i+1?></a>
                                </td>
                                <?php if(isset($config['product']['show_images']) && $config['product']['show_images'] == true) { ?>
                                    <td class="align-middle">
                                    	<a href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['name']?>">
                                            <img src="../upload/product/<?=$items[$i]['photo']?>" width="100" height="100" alt="" onerror="this.src='../assets/images/No-Image.png'">
                                        </a>
                                    </td>
                                <?php } ?>
                                <td class="align-middle">
                                    <a class="text-dark text-break" href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['name']?>"><?=$items[$i]['name']?></a>
                                </td>
                                <td class="align-middle text-center">
                                    <label><?=$items[$i]['inventory']?></label>
                                </td>
                                <?php $status_array = (!empty($items[$i]['status'])) ? explode(',', $items[$i]['status']) : array(); ?>
                                <?php if(isset($config['product']['check'])) { foreach($config['product']['check'] as $key => $value) { ?>
								  	<td class="align-middle text-center">
	                                	<div class="custom-control custom-checkbox my-checkbox">
	                                        <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" data-table="product" data-id="<?=$items[$i]['id']?>" data-attr="<?=$key?>" <?=(in_array($key, $status_array)) ? 'checked' : ''?>>
	                                        <label for="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" class="custom-control-label"></label>
	                                    </div>
	                                </td>
								<?php } } ?>
                                <td class="align-middle text-center text-md text-nowrap">
                                    <a class="text-primary mr-2" href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                    <a class="text-danger" id="delete-item" data-url="<?=$linkDelete?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php if($paging) { ?>
        <div class="card-footer text-sm pb-0"><?=$paging?></div>
    <?php } ?>
    <div class="card-footer text-sm">
    	<a class="btn btn-sm bg-gradient-primary text-white" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
    </div>
</section>