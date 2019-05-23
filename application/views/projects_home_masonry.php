
<div class="row page_content pre-scrollable" style="min-height: 400px;height: 400px;">

    <div style="width: 100%; text-align: center;" align="center">
        <img src="<?php echo base_url();?>assets/loader.gif" id="loading_icon">
    </div>

    <div class="msrItems">
        <?php
        $cat_id = 0;
        if(isset($menuid)){
            $cat_id = substr($menuid,4);
        }
        //print_r($all_projects);
        foreach ($all_projects as $project){?>

            <a href="<?php echo base_url()."index.php/projects/projectDetails/".$project['id']."/".$cat_id;?>">
                <div class="msrItem">
                    <img class="msrImg" src="<?php echo base_url().$project["images"][0]["image_path"];?>" width="100%" st/>
                </div>
            </a>
            <?php
        }

        ?>
    </div>


</div>

<script>
    var time;
    $(window).on('load',function () {

        <?php if(isset($menuid)):?>
        $("<?php echo $menuid;?>").css("color", "#000");
        $("<?php echo $menuid;?>").css("font-weight", "bold");
        $('#uniqueCategories').animate({ scrollTop: $("<?php echo $menuid;?>").offset().top - 25 }, 500);
        <?php endif;?>

        <?php if(isset($project_menuid)):?>

        <?php endif;?>

//        $('#projectTitles').animate({ scrollTop: $("<?php //echo $project_menuid;?>//").offset().top - 25 }, 500);

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

        $("#loading_icon").css("display", "none");
        $(".msrImg").fadeIn("slow");
        $('.msrItems').msrItems('refresh');

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