<div class="row page_content pre-scrollable" style="min-height: 400px;height: 400px;">
    <div id="basicExample">
        <?php

        foreach ($all_news as $news){?>

            <a href="<?php echo base_url()."index.php/media/newsDetails/".$news["id"]."#news".$news["id"];?>">
                <img alt="<?php echo $news["title"];?>" src="<?php echo base_url().$news["images"][0]["image_path"];?>"/>
            </a>

        <?php

        }

        ?>

    </div>
</div>

<script>
    $(document).ready(function () {
        $("#basicExample").justifiedGallery({
            rowHeight : 150,
            lastRow : 'nojustify',
            margins : 10
        });
    });
</script>