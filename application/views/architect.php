<div class="row page_content">
<!--    <div class="col-md-12 m-b-1">-->
<!--        <h3>Founder</h3>-->
<!--    </div>-->
    <div class="col-md-12 p-x-0">
        <div class="col-md-6 offset-md-6">
            <div class="col-md-12" style="font-size: 16px;"><?php echo $founder_name;?></div>
        </div>
    </div>
    <div class="col-md-12" style="min-height: 30px;"></div>
    <div class="col-md-12 p-x-0">
        <div class="col-md-6">
            <div class="fotorama" data-width="100%" data-minwidth="300"
                 data-maxwidth="600"
                 data-minheight="200"
                 data-maxheight="430" data-autoplay="true" data-transition="crossfade" data-arrows="false"
                 data-click="false"
                 data-nav="false"
                 data-swipe="false"
                 data-autoplay="3000"
            >

                <?php
                if(isset($founder_image)){
                    foreach ($founder_image as $image){ ?>

                        <img src="<?php echo base_url().$image['image_path'];?>" width="100%">

                    <?php }
                }
                ?>
            </div>

        </div>
        <div class="col-md-6">
            <div class="col-md-12 pre-scrollable text-justify p-r-0" style="max-height: 320px;"><?php echo $founder_info;?></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (e) {
        $("#menufounder").css("color", "#000");
        $("#menufounder").css("font-weight", "bold");
    })
</script>