<div class="row page_content pre-scrollable" style="min-height: 400px;">
    <?php
    foreach ($videos as $video):
        if($video["thumb"] == "")
            $thumb = base_url()."assets/video_sample.png";
        else
            $thumb = base_url()."uploads/videos/thumbs/".$video["thumb"];
    ?>
    <div class="col-md-4 p-a-1">
        <a href="<?php echo base_url()."index.php/media/videoPlayback/".$video["id"];?>"> <img src="<?php echo $thumb;?>" width="100%" height="100%"> </a>

<!--        <div style="height: 100%; width: 100%; background-image: url("--><?php //echo base_url()."uploads/videos/thumbs/".$video["thumb"];?><!--")"></div>-->
    </div>
    <?php endforeach;?>
</div>

<script>
    <?php if(isset($menuid)):?>
    $("<?php echo $menuid;?>").css("color", "#000");
    $("<?php echo $menuid;?>").css("font-weight", "bold");
    <?php endif;?>
</script>