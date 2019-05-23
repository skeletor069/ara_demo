

<div class="row page_content pre-scrollable" style="min-height: 400px;height: 400px;">

    <div class="msrItems full-width">
        <?php

        foreach ($all_news as $news){?>

            <a href="<?php echo base_url()."index.php/media/newsDetails/".$news["id"];?>">
                <div class="msrItem">
                    <img class="msrImg" alt="<?php echo $news["title"];?>" src="<?php echo base_url().$news["images"][0]["image_path"];?>" width="100%"/>
                </div>
            </a>
            <?php
        }

        ?>
    </div>
<!--    <div class="overlay_loader"></div>-->

</div>

<script>
    var time;
    $(document).ready(function () {

        $("#menunews").css("color", "#000");
        $("#menunews").css("font-weight", "bold");

        <?php if(isset($menuid)):?>
        $("<?php echo $menuid;?>").css("color", "#000");
        $("<?php echo $menuid;?>").css("font-weight", "bold");
        <?php endif;?>

        $(".msrImg").fadeIn("slow");

        if($(window).width() < 700){
            $('.msrItems').msrItems({
                'colums': 2, //columns number
                'margin': 5 //right and bottom margin
            });
        }else if($(window).width() < 850){
            $('.msrItems').msrItems({
                'colums': 3, //columns number
                'margin': 5 //right and bottom margin
            });
        }else if($(window).width() < 1000){
            $('.msrItems').msrItems({
                'colums': 4, //columns number
                'margin': 5 //right and bottom margin
            });
        }else{
            $('.msrItems').msrItems({
                'colums': 5, //columns number
                'margin': 5 //right and bottom margin
            });
        }
    });

    $( window ).on('resize', function(e) {
        clearTimeout(time);
        time = setTimeout(function(){
            //console.log($(window).width());

            if($(window).width() < 700){
                $('.msrItems').msrItems({
                    'colums': 2, //columns number
                    'margin': 5 //right and bottom margin
                });
            }else if($(window).width() < 850){
                $('.msrItems').msrItems({
                    'colums': 3, //columns number
                    'margin': 5 //right and bottom margin
                });
            }else if($(window).width() < 1000){
                $('.msrItems').msrItems({
                    'colums': 4, //columns number
                    'margin': 5 //right and bottom margin
                });
            }else{
                $('.msrItems').msrItems({
                    'colums': 5, //columns number
                    'margin': 5 //right and bottom margin
                });
            }


            $('.msrItems').msrItems('refresh');
        }, 200);
    });
</script>