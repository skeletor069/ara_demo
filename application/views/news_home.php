<div class="row page_content">
    <div class="col-md-6">
        <div class="col-md-12 bg-faded p-a-1">
            Featured News
        </div>
        <div class="col-md-12" style="max-height: 400px; overflow: hidden;">
            <?php
            //print_r($featured);
            if(sizeof($featured["images"]) > 0){
            ?>
            <img src="<?php echo base_url().$featured["images"][0]["image_path"];?>" width="40%" style="float: left; margin: 10px;">

            <?php }
                echo '<span class="featured_title">'.$featured["title"].'</span>';
                echo $featured["description"];
            ?>
        </div>
        <div class="col-md-12 m-t-1">Read More</div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12 bg-faded p-a-1">
            Latest News
        </div>

        <div class="col-md-12" style="max-height: 400px; overflow: hidden;">
        <?php
        $count = 0;
        foreach ($all_news as $news){
            $count++;
            $imgsrc = base_url()."assets/news.png";
            if(sizeof($news["images"]) > 0)
                $imgsrc = base_url().$news["images"][0]["image_path"];
        ?>
            <div class="col-md-12 p-a-1" style="border-bottom: 1px solid #999;">
                <div class="col-md-2">
                    <img src="<?php echo $imgsrc;?>" width="100%">
                </div>
                <div class="col-md-10">
                    <div class="col-md-12 text-muted"><?php echo $news["day"]."/".$news["month"]."/".$news["year"];?></div>

                    <div class="col-md-12"><?php echo $news["title"];?></div>
                </div>

            </div>

        <?php
            if($count > 4)
                break;
        }
        ?>
        </div>
    </div>
</div>