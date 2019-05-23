<div class="row page_content pre-scrollable" style="min-height: 400px;height: 400px;">
    <div class="col-md-6" align="center">
        <img src="<?php echo base_url().$news['images'][0]['image_path'];?>"
             style="max-height: 400px; max-width: 100%; margin: 0 auto; border: 1px solid gray;">
    </div>
    <div class="col-md-6 p-a-0">
        <div class="col-md-12" style="text-transform: uppercase; font-size: 16px;"><?php echo $news['description'];?></div>
        <div class="col-md-12" style="min-height: 20px;"></div>
        <div class="col-md-12"><?php echo $news['day'].".".$news["month"].".".$news["year"];?></div>
        <div class="col-md-12"><?php echo $news['address'];?></div>
        <div class="col-md-12"><?php echo $news['city'];?></div>
        <div class="col-md-12"><a href="<?php echo base_url().$news['images'][0]['image_path'];?>">Press Release</a> </div>
    </div>
</div>

<script>
    $(document).ready(function (e) {

        $("#menunews").css("color", "#000");
        $("#menunews").css("font-weight", "bold");

        $("<?php echo $yearmenuid;?>").css("color", "#000");
        $("<?php echo $yearmenuid;?>").css("font-weight", "bold");

        $("<?php echo $newsmenuid;?>").css("color", "#000");
        $("<?php echo $newsmenuid;?>").css("font-weight", "bold");


        $('#uniqueYears').animate({ scrollTop: $("<?php echo $yearmenuid;?>").offset().top - 25 }, 500);
        $('#newsTitles').animate({ scrollTop: $("<?php echo $newsmenuid;?>").offset().top - 25 }, 500);
    });
</script>