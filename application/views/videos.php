<div class="row page_content ">
    <div class="col-md-12">
        <div class="col-md-7 p-a-0" id="videoPlayer">

            <video class="col-md-12 p-a-0" controls >
                <source src="<?php echo (isset($preLoadedVideo))?base_url()."uploads/videos/".$preLoadedVideo["file_name"]:"#";?>" id="videoSource">
            </video>
            <div class="col-md-12 h5 p-a-0 m-y-1" id="nameDiv">
                <?php echo (isset($preLoadedVideo))? $preLoadedVideo["title"]:"";?>
            </div>
            <div class="col-md-12 p-a-0 m-b-1" id="publishedDiv">
                <?php echo (isset($preLoadedVideo))? "Published on ".$preLoadedVideo["published"]:"";?>
            </div>
            <div class="col-md-12 p-a-0" id="descriptionDiv">
                <?php echo (isset($preLoadedVideo))? $preLoadedVideo["description"]:"";?>
            </div>
        </div>
        <div class="col-md-5 pre-scrollable" id="videoListing">

                <?php
                if(isset($videos)) :
                    foreach ($videos as $video):
                        $thumb = base_url()."uploads/videos/thumbs/".$video["thumb"];
                        if($video["thumb"] == null)
                            $thumb = base_url()."assets/video_sample.png";
                        ?>

<!--                        <div class="col-md-12 p-a-1 table-bordered" style="font-size: large;">-->
<!--                            <img src="--><?php //echo $thumb;?><!--" style="max-width: 60px; max-height: 30px;"> --><?php //echo $video["title"];?>
<!--                        </div>-->
                        <a href="#" onclick='LoadVideo("<?php echo base_url()."uploads/videos/".$video["file_name"]; ?>", "<?php echo $video["title"];?>","<?php echo $video["description"];?>","<?php echo $video["published"];?>","thumb<?php echo $video["id"];?>")'>
                            <div class="col-md-12 p-a-1 m-b-1" id="thumb<?php echo $video["id"];?>">
                                <div class="col-md-6 p-a-0" style="">
                                    <!--                            --><?php //echo $video["title"];?>
                                    <img src="<?php echo $thumb;?>" class="side_thumb_img">
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 p-a-0"><?php echo $video["title"];?></div>
                                    <div class="col-md-12 p-a-0"><?php echo $video["published"];?></div>
                                </div>
                            </div>

                        </a>

                        <?php
                    endforeach;
                endif;
                ?>
        </div>

    </div>
    <div class="col-md-12">


<!--    <div class="msrItems">-->
<!--        --><?php
//        $cat_id = 0;
//        if(isset($menuid)){
//            $cat_id = substr($menuid,4);
//        }
//        //print_r($all_projects);
//        foreach ($videos as $video){
//            $thumb = base_url()."uploads/videos/thumbs/".$video["thumb"];
//            if($video["thumb"] == null)
//                $thumb = base_url()."assets/video_sample.png";
//            ?>
<!---->
<!--            <a href="--><?php //echo base_url()."index.php/media/videoPlayback/".$video['id'];?><!--">-->
<!--                <div class="msrItem table-bordered">-->
<!--                    <img class="msrImg p-a-1" src="--><?php //echo $thumb;?><!--" width="100%"/>-->
<!--                    <img src="--><?php //echo base_url()."assets/video_icon.png";?><!--" width="40px" height="40px" style="position: absolute; top: 0; left: 0;">-->
<!--                </div>-->
<!--            </a>-->
<!--            --><?php
//        }
//
//        ?>
<!--    </div>-->

    </div>
</div>



<script>

    var selectedThumbId = null;
    <?php if(isset($menuid)):?>
    $("<?php echo $menuid;?>").css("color", "#000");
    $("<?php echo $menuid;?>").css("font-weight", "bold");
    <?php endif;?>

    <?php if(isset($album_menu_id)):?>
    $("<?php echo $album_menu_id;?>").css("color", "#000");
    $("<?php echo $album_menu_id;?>").css("font-weight", "bold");
    <?php endif;?>

    function LoadVideo(filename, title, description, published, thumbId) {
        //alert(filename);
        $("#nameDiv").html(title);
        $("#publishedDiv").html("Published on "+published);
        $("#descriptionDiv").html(description);
        $("#videoPlayer video source").attr('src', filename);
        $("#videoPlayer video")[0].load();
        $(selectedThumbId).removeClass("focusThumb");
        selectedThumbId = "#"+thumbId;
        $(selectedThumbId).addClass("focusThumb");
    }

    <?php
    if(!isset($preLoadedVideo) && sizeof($videos)>0):
    ?>
    LoadVideo("<?php echo base_url()."uploads/videos/".$videos[0]["file_name"]; ?>", "<?php echo $videos[0]["title"];?>","<?php echo $videos[0]["description"];?>","<?php echo $videos[0]["published"];?>", "thumb<?php echo $videos[0]["id"];?>");

    <?php endif;?>

    <?php
    if(isset($preLoadedVideo)){
    ?>
    selectedThumbId = "#thumb" + <?php echo $preLoadedVideo["id"];?>;
    $(selectedThumbId).addClass("focusThumb");

    <?php
    }
    ?>
</script>