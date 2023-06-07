<div class="wrap-slide">
    <div class="wrap-content">
        <?php if(count($slider)) { ?>
            <div class="slideshow none">
                <?php foreach($slider as $v) { ?>
                    <div>
                        <div class="slideshow-item">
                            <a class="slideshow-image" href="<?=$v['link']?>" title="<?=$v['name']?>">
                                <img src="<?=$configBase?>upload/photo/<?=$v['photo']?>" alt="" width="1065" height="500">
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div> 
</div>