<?php
	if($act=="add") $labelAct = "Thêm mới";
	else if($act=="edit") $labelAct = "Chỉnh sửa";
	else if($act=="copy")  $labelAct = "Sao chép";

	$linkMan = "index.php?source=product&act=man";
	if($act=='add') $linkFilter = "index.php?source=product&act=add";
	else if($act=='edit') $linkFilter = "index.php?source=product&act=edit"."&id=".$id;
    if($act=="copy") $linkSave = "index.php?source=product&act=save_copy";
    else $linkSave = "index.php?source=product&act=save";

    if(
    	(isset($config['product']['dropdown']) && $config['product']['dropdown'] == true) ||
    	(isset($config['product']['images']) && $config['product']['images'] == true))
    {
    	$colLeft = "col-xl-8";
    	$colRight = "col-xl-4";
        $colLeft1 = "col-xl-7";
    	$colRight1 = "col-xl-5";
    }
    else
    {
    	$colLeft = "col-12";
    	$colRight = "d-none";	
        $colLeft1 = "col-12";
    	$colRight1 = "d-none";	
    }
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active"><?=$labelAct?> <?=$config['product']['title_main']?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i
                    class="far fa-save mr-2"></i>Lưu tại trang</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>

        <?=$flash->getMessages('admin')?>

        <div class="row">
            <div class="<?=$colLeft1?>">
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung <?=$config['product']['title_main']?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                    <li class="nav-item">
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body card-article">
                                <div class="form-group-category row">
                                    <div class="form-group col-xl-12 col-sm-6">
                                        <label class="d-block" for="id_list">Danh mục sản phẩm:</label>
                                        <select name="data[id_category]" id="id_category" class="select2 w-100">
                                            <option value="">Chọn danh mục sản phẩm</option>
                                            <?php foreach($category as $v) { ?>
                                            <option value="<?=$v['id']?>"
                                                <?=($v['id'] == $item['id_category'] ? 'selected' : '')?>>
                                                <?=$v['name']?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                    <div class="tab-pane fade show active" id="tabs-lang-vi" role="tabpanel"
                                        aria-labelledby="tabs-lang">
                                        <div class="form-group">
                                            <label for="name">Tiêu đề:</label>
                                            <input type="text" class="form-control for-seo text-sm" name="data[name]"
                                                id="name" placeholder="Tiêu đề"
                                                value="<?=(!empty($flash->has('name'))) ? $flash->get('name') : @$item['name']?>"
                                                required>
                                        </div>
                                        <?php if(isset($config['product']['desc']) && $config['product']['desc'] == true) { ?>
                                        <div class="form-group">
                                            <label for="description">Mô tả:</label>
                                            <textarea
                                                class="form-control for-seo text-sm <?=(isset($config['product']['desc_cke']) && $config['product']['desc_cke'] == true)?'form-control-ckeditor':''?>"
                                                name="data[description]" id="description" rows="5"
                                                placeholder="Mô tả"><?=htmlspecialchars_decode((!empty($flash->has('description'))) ? $flash->get('description') : @$item['description'])?></textarea>
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($config['product']['content']) && $config['product']['content'] == true) { ?>
                                        <div class="form-group">
                                            <label for="content">Nội dung:</label>
                                            <textarea
                                                class="form-control for-seo text-sm <?=(isset($config['product']['content_cke']) && $config['product']['content_cke'] == true)?'form-control-ckeditor':''?>"
                                                name="data[content]" id="content" rows="5"
                                                placeholder="Nội dung"><?=htmlspecialchars_decode((!empty($flash->has('content'))) ? $flash->get('content') : @$item['content'])?></textarea>
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($config['product']['specifications']) && $config['product']['specifications'] == true) { ?>
                                        <div class="form-group">
                                            <label for="specifications">Thông số kỹ thuật</label>
                                            <textarea
                                                class="form-control for-seo text-sm <?=(isset($config['product']['specifications_cke']) && $config['product']['specifications_cke'] == true)?'form-control-ckeditor':''?>"
                                                name="data[specifications]" id="specifications" rows="5"
                                                placeholder="Nội dung"><?=htmlspecialchars_decode((!empty($flash->has('specifications'))) ? $flash->get('specifications') : @$item['specifications'])?></textarea>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?=$colRight1?>">
                <?php
                	if(isset($config['product']['slug']) && $config['product']['slug'] == true)
	                {
	                	$slugchange = ($act=='edit') ? 1 : 0;
						include TEMPLATE.LAYOUT."slug.php";
				    }
			    ?>


                <?php if(isset($config['product']['images']) && $config['product']['images'] == true) { ?>
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh <?=$config['product']['title_main']?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
	                    		/* Photo detail */
	                    		$photoDetail = array();
	                    		$photoDetail['upload'] = "upload/product";
	                    		$photoDetail['image'] = (!empty($item) && $act != 'copy') ? $item['photo'] : '';
	                    		$photoDetail['dimension'] = "Width: ".$config['product']['width']." px - Height: ".$config['product']['height']." px (".$config['product']['img_type'].")";

	                    		/* Image */
	                    		include TEMPLATE.LAYOUT."image.php";
	                    	?>
                    </div>
                </div>
                <?php } ?>
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin <?=$config['product']['title_main']?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
                            <?php if(isset($config['product']['check'])) { foreach($config['product']['check'] as $key => $value) { ?>
                            <div class="form-group d-inline-block mb-2 mr-2">
                                <label for="<?=$key?>-checkbox"
                                    class="d-inline-block align-middle mb-0 mr-2"><?=$value?>:</label>
                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                    <input type="checkbox" class="custom-control-input <?=$key?>-checkbox"
                                        name="status[<?=$key?>]" id="<?=$key?>-checkbox"
                                        <?=(empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : ''?>
                                        value="<?=$key?>">
                                    <label for="<?=$key?>-checkbox" class="custom-control-label"></label>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                        <div class="row">
                            <?php if(isset($config['product']['sku']) && $config['product']['sku'] == true) { ?>
                            <div class="form-group col-md-12">
                                <label class="d-block" for="sku">Mã sản phẩm:</label>
                                <input type="text" class="form-control text-sm" name="data[sku]" id="sku"
                                    placeholder="Mã sản phẩm"
                                    value="<?=(!empty($flash->has('sku'))) ? $flash->get('sku') : @$item['sku']?>">
                            </div>
                            <?php } ?>
                            
                            <?php if(isset($config['product']['regular_price']) && $config['product']['regular_price'] == true) { ?>
                            <div class="form-group col-md-6">
                                <label class="d-block" for="regular_price">Giá bán:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control format-price regular_price text-sm"
                                        name="data[regular_price]" id="regular_price" placeholder="Giá bán"
                                        value="<?=(!empty($flash->has('regular_price'))) ? $flash->get('regular_price') : @$item['regular_price']?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><strong>VNĐ</strong></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(isset($config['product']['sale_price']) && $config['product']['sale_price'] == true) { ?>
                            <div class="form-group col-md-6">
                                <label class="d-block" for="sale_price">Giá mới:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control format-price sale_price text-sm"
                                        name="data[sale_price]" id="sale_price" placeholder="Giá mới"
                                        value="<?=(!empty($flash->has('sale_price'))) ? $flash->get('sale_price') : @$item['sale_price']?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><strong>VNĐ</strong></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(isset($config['product']['discount']) && $config['product']['discount'] == true) { ?>
                            <div class="form-group col-md-6">
                                <label class="d-block" for="discount">Chiết khấu:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control discount text-sm" name="data[discount]"
                                        id="discount" placeholder="Chiết khấu"
                                        value="<?=(!empty($flash->has('discount'))) ? $flash->get('discount') : @$item['discount']?>"
                                        maxlength="3" readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><strong>%</strong></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group col-md-6">
                                <label class="d-block" for="inventory">Số lượng tồn kho:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control inventory text-sm" name="data[inventory]"
                                        id="inventory" placeholder="Số lượng tồn kho"
                                        value="<?=(!empty($flash->has('inventory'))) ? $flash->get('inventory') : @$item['inventory']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i
                    class="far fa-save mr-2"></i>Lưu</button>
            <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i
                    class="far fa-save mr-2"></i>Lưu tại trang</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm
                lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i
                    class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
        </div>
    </form>
</section>