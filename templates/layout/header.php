<div class="header">
	<div class="header-bottom">
		<div class="wrap-content">
			<div class="box-header-bottom">
				<a class="banner-header" href="<?=$configBase?>">
					<img src="<?=$configBase?>upload/photo/<?= $logo['photo'] ?>" alt="" width="370" height="100">
				</a>
				<div class="search w-clear">
					<input type="text" id="keyword" placeholder="Sản phẩm cần tìm..." onkeypress="doEnter(event,'keyword');"/>
					<p onclick="onSearch('keyword');"><i class="fas fa-search"></i></p>
				</div>
				<div class="box-header-right ">
					<div class="hotline-header">
						<span><?= $optsetting['hotline'] ?></span>
						<span><?= $optsetting['phone'] ?></span>
					</div>
					<div class="cart-header">
						<?php if ($_SESSION[$loginMember]['active'] == true) { ?>
							<p class="title-login"><a class="" href="<?=$configBase?>account/thong-tin-ca-nhan"> Xin chào, <?=$_SESSION[$loginMember]['fullname']?></a></p>
						<?php } else { ?>
							<a href="<?=$configBase?>account/dang-nhap">
								<div class="icon-hd">
									<i class="fa-solid fa-user"></i>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
