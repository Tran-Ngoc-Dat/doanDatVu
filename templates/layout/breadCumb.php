<?php if($breadCumb){ ?>
	<div class="breadCrumbs" aria-label="breadcrumb" id="bar_breadcrumb">
		<div class="wrap-content">
			<ol class="breadcrumb">
				<?php foreach($breadCumb as $k => $v) { ?>
					<li class="breadcrumb-item"><a href="#" class="text-decoration-none"><?=$breadCumb[$k]?></a></li>
				<?php } ?>
			</ol>
		</div>
	</div>
<?php } ?>