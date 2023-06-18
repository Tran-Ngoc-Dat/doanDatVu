<?php if (!empty($partner)) { ?>
	<div class="wrap-artner">
		<div class="wrap-content">
			<div class="slick-10 none">
				<?php foreach ($partner as $v) { ?>
					<div>
						<div class="item-partner">
							<img src="<?= $configBase ?>upload/photo/<?= $v['photo'] ?>" alt="" width="125" height="100">
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>


<?php if (!empty($pronb)) { ?>
	<div class="wrap-pronb">
		<div class="wrap-content">
			<div class="title-main">
				<span>Sản phẩm nổi bật</span>
				<p><?= $slogan['name' . $lang] ?></p>
			</div>
			<div class="slick-4 none">
				<?php foreach ($pronb as $v) { ?>
					<div>
						<div class="item-pronb">
							<a class="scale-img" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>">
								<img src="<?= $configBase ?>upload/product/<?= $v['photo'] ?>" alt="" width="310" height="310">
							</a>
							<div class="content-pronb">
								<h3 class="name-pronb"><a class="text-split text-decoration-none" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>"><?= $v['name'] ?></a></h3>
								<div class="d-flex justify-content-between align-items-center">
									<p class="price-pronb">
										<?php if ($v['sale_price'] > 0) { ?>
											<span class="price-new"><?= $func->formatMoney($v['sale_price']) ?></span>
											<span class="price-old"><?= $func->formatMoney($v['regular_price']) ?></span>
										<?php } else { ?>
											<span class="price-new"><?= ($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe ?></span>
										<?php } ?>
									</p>
									<div class="product-cart">
										<a class="addcart" data-id="<?= $v['id'] ?>" data-action="addnow">
											<i class="fas fa-shopping-cart"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<?php if (!empty($productlist)) {  ?>
	<div class="wrap-prolist">
		<div class="wrap-content">
			<?php foreach ($productlist as $v) {
				$productnb = $d->rawQuery("select name, photo, slug, id, regular_price, sale_price, discount from #_product where id_category = ? and find_in_set('hienthi',status)  order by id desc", array($v['id']));
			?>
				<div class="item-product-listcat">
					<div class="title-product-listcat"><span><?= $v['name'] ?></span></div>
					<div class="box-product-ul">
						<div class="btn-product"><a href="<?= $configBase ?><?= $v['slug'] ?>">Xem thêm</a></div>
					</div>
				</div>

				<div class="slick-4 none">
					<?php foreach ($productnb as $v) { ?>
						<div>
							<div class="item-pronb">
								<a class="scale-img" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>">
									<img src="<?= $configBase ?>upload/product/<?= $v['photo'] ?>" alt="" width="310" height="310">
								</a>
								<div class="content-pronb">
									<h3 class="name-pronb"><a class="text-split text-decoration-none" href="<?= $configBase ?><?= $v['slug'] ?>" title="<?= $v['name'] ?>"><?= $v['name'] ?></a></h3>
									<div class="d-flex justify-content-between align-items-center">
										<p class="price-pronb">
											<?php if ($v['sale_price'] > 0) { ?>
												<span class="price-new"><?= $func->formatMoney($v['sale_price']) ?></span>
												<span class="price-old"><?= $func->formatMoney($v['regular_price']) ?></span>
											<?php } else { ?>
												<span class="price-new"><?= ($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe ?></span>
											<?php } ?>
										</p>
										<div class="product-cart">
											<a class="addcart" data-id="<?= $v['id'] ?>" data-action="addnow">
												<i class="fas fa-shopping-cart"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>

<?php if (!empty($criteria)) { ?>
	<div class="wrap-criteria">
		<div class="wrap-content">
			<div class="slick-criteria">
				<?php foreach ($criteria as $v) { ?>
					<div>
						<div class="item-criteria">
							<p class="m-0">
								<img src="upload/photo/<?= $v['photo'] ?>" alt="" width="80" height="80">
							</p>
							<div class="content-criteria">
								<span class="text-split"><?= $v['name'] ?></span>
								<p class="text-split"><?= $v['description'] ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<?php if (!empty($advertise)) : ?>
	<div class="advertise-index">
		<div class="wrap-content">
			<div class="slick-advertise">
				<?php foreach ($advertise as $v) : ?>
					<div>
						<div class="items">
							<a href="<?= $v['link'] ?>" class="scale-img" title="<?= $v['name'] ?>">
								<img src="<?= $configBase ?>upload/photo/<?= $v['photo'] ?>" alt="" width="640" height="230">
							</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>

<?php if (!empty($newdv)) : ?>
	<div class="wrap-service">
		<div class="wrap-content">
			<div class="title-main">
				<span>DỊCH VỤ</span>
			</div>
			<div class="grid-services">
				<?php foreach ($newdv as $v) { ?>
					<div class="item-service">
						<div class="name-service"><a href="<?= $v['slug'] ?>" class="text-decoration-none text-split"><?= $v['name'] ?></a></div>
						<div class="content-service">
							<div class="img-service">
								<a class="scale-img" href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>">
									<img class="w-100" src="<?= $configBase ?>upload/news/<?= $v['photo'] ?>" alt="<?= $v['name'] ?>"> </a>
							</div>
							<div class="service-bottom">
								<div class="slogan-service"></div>
								<a class="text-decoration-none btn-service" href="<?= $v['slug'] ?>">Xem chi tiết</a>
							</div>
						</div>
					</div>
				<?php	}  ?>
			</div>
		</div>
	</div>
<?php endif ?>

<?php if (!empty($newsnb)) : ?>
	<div class="news-index">
		<div class="wrap-content">
			<div class="title-main">
				<span>tin tức</span>
				<p><?= $slogan['name' . $lang] ?></p>
			</div>
			<div class="slick-news">
				<?php foreach ($newsnb as $v) : ?>
					<div class="">
						<div class="items-newsnb">
							<div class="">
								<a href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>" class="scale-img">
									<img src="upload/news/<?= $v['photo'] ?>" alt="" width="185" height="210">
								</a>
							</div>
							<div class="fix-news">
								<h3 class="news-name"><a href="<?= $v['slug'] ?>" title="<?= $v['name'] ?>" class="text-split">
										<?= $v['name'] ?>
									</a></h3>
								<span class="news-desc text-split">
									<?= $v['description'] ?>
								</span>
							</div>
							<p class="news-time mb-0">
								<span>
									<?= date("d", $v['date_created']) ?>
								</span>
								<span>Th
									<?= date("m", $v['date_created']) ?>
								</span>
							</p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>