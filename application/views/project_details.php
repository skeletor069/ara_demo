<!--<div id="loading_bg" align="center">-->
<!--    <img src="--><?php //echo base_url()."assets/loader.gif";?><!--">-->
<!--</div>-->
<div class="row page_content" id="height_track_parent">
    <div class="col-md-6" id="height_track_child">
        <div style="min-height: 100%; min-width: 100%; display: table; text-align: center">
            <div style="display: table-cell; vertical-align: middle; ">
            <div id="page_gallery" class="fotorama" data-width="100%" data-minwidth="200"
                 data-maxwidth="600"
                 data-minheight="200"
                 data-maxheight="350" data-autoplay="true" data-transition="crossfade" data-arrows="false"
                 data-click="false"
                 data-nav="false"
                 data-swipe="false"
                 data-autoplay="3000"
            >

                <?php
                if(isset($displayImages)){
                    foreach ($displayImages as $image){ ?>

<!--                        <img src="--><?php //echo base_url().$image['image_path'];?><!--" width="100%">-->
                        <a href="<?php echo base_url().$image['image_path'];?>" ></a>

                    <?php }
                }
                ?>
            </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="col-md-12">
            <h5><?php echo $project_info["project_name"];?></h5>
        </div>
<!--        <div class="col-md-12 card m-b-1">-->
            <div class="col-md-12 text-muted">
                Location : <?php echo $project_info["location"];?>
            </div>
            <div class="col-md-12 text-muted">
                Start Date : <?php echo $project_info["start_day"].".".$project_info["start_month"].".".$project_info["start_year"];?>
                , End Date : <?php echo $project_info["end_day"].".".$project_info["end_month"].".".$project_info["end_year"];?>
            </div>

<!--        </div>-->
        <div class="col-md-12 pre-scrollable m-t-2">
            <?php echo $project_info["description"];?>
        </div>

    </div>
</div>

<div id="project_fullscreen_gallery" align="center" style="visibility: hidden;">
    <div id="opaque_bg"></div>
    <div id="close_gallery">&times;</div>
    <div id="main_gallery" class="fotorama"
         data-width="100%"
         data-minwidth="300"
         data-maxwidth="80%"
         data-minheight="200"
         data-maxheight="80%"
         data-autoplay="false"
         data-transition="crossfade"
         data-nav="thumbs"
         >

        <?php
        if(isset($displayImages)){
            foreach ($displayImages as $image){ ?>

                <img src="<?php echo base_url().$image['image_path'];?>">

            <?php }
        }
        ?>
    </div>
</div>



<script>
    $(document).ready(function () {

        <?php if(isset($menuid)):?>
        $("<?php echo $menuid;?>").css("color", "#000");
        $("<?php echo $menuid;?>").css("font-weight", "bold");
        $('#uniqueCategories').animate({ scrollTop: $("<?php echo $menuid;?>").offset().top - 25 }, 500);
        <?php endif;?>

        <?php if(isset($project_menuid)):?>
        $("<?php echo $project_menuid;?>").css("color", "#000");
        $("<?php echo $project_menuid;?>").css("font-weight", "bold");
        $('#projectTitles').animate({ scrollTop: $("<?php echo $project_menuid;?>").offset().top - 25 }, 500);
        <?php endif;?>

        var pageGallery = $("#page_gallery").fotorama().data('fotorama');
        var fullGallery = $("#main_gallery").fotorama().data('fotorama');
        $("#project_fullscreen_gallery").css("visibility","visible");
        $("#project_fullscreen_gallery").css("display","none");
//        $("#loading_bg").css("display","none");
        $("#loading_bg").fadeOut("slow");
        $("#close_gallery").click(function () {
            $("#project_fullscreen_gallery").css("display","none");
            pageGallery.startAutoplay();
        });

        $("#page_gallery").click(function () {

            $("#project_fullscreen_gallery").css("display","block");
            console.log(fullGallery.activeIndex);
            fullGallery.show(pageGallery.activeIndex);
            fullGallery.resize({
                width: 500,
                height: 500
            });
        });

        $("#height_track_child").css("height", $("#height_track_parent").css("height"));
    });

    $(window).on('resize', function () {
        $("#height_track_child").css("height", $("#height_track_parent").css("height"));
    })
</script>
