<div class="row page_content">
    <div class="col-md-12"><span class="text-muted"><?php echo $news["day"]."/".$news["month"]."/".$news["year"];?></span></div>
    <div class="col-md-12">
        <span class="featured_title"><?php echo $news["title"];?></span>
    </div>

    <div class="col-md-12 pre-scrollable">
    <?php
    if(sizeof($news["images"]) > 0){
    ?>
        <div style="margin: 5px; width: 250px; float: right;" class="fotorama"
             data-minwidth="100"
             data-minheight="100"
             data-maxheight="300" data-autoplay="true" data-transition="crossfade" data-arrows="false"
             data-click="false"
             data-nav="false"
             data-swipe="false"
             data-autoplay="3000"
        >

            <?php
            if(isset($news["images"])){
                foreach ($news["images"] as $image){ ?>

                    <img src="<?php echo base_url().$image['image_path'];?>">

                <?php }
            }
            ?>
        </div>
    <?php
    }
    ?>
    <?php echo $news["description"];?>
    </div>
</div>