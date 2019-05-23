<div class="row">
	<div class="col-md-12 p-x-1 m-y-1"><h2>Landing Page</h2></div>
</div>

<div class="row">
	<div class="col-md-12 card p-a-1 m-x-auto">
		<div class="col-md-12 m-b-1"><h3>Landing Page Slider</h3></div>

		<div class="col-md-4 card p-a-1">
			<div class="col-md-12"><h4>Preview Area</h4></div>
			<div class="col-md-12">
				<img id="preview_img" src="" width="100%">
                <a class="btn-primary col-md-12 m-t-1 p-a-1" id="btn_add">Add to display</a>
                <a class="btn-danger col-md-12 m-t-1 p-a-1" id="btn_remove">Remove from display</a>
                <a class="btn-danger col-md-12 m-t-1 p-a-1" id="btn_delete">Delete Permanently</a>
			</div>
		</div>
		<div class="col-md-8">

			<div class="col-md-12 card p-a-1">
				<div class="col-md-12"><h4>Upload New Image</h4></div>
				<?php echo form_open_multipart('admin/uploadLandingPageImages');?>
				<div class="col-md-8">
					<?php echo form_upload(array('id' => 'file', 'name' => 'file'));?>
				</div>
				<div class="col-md-4">
					<input type="submit" value="Upload">
				</div>
				<?php echo form_close();?>
			</div>

			<div class="col-md-12 card p-a-1">
				<div class="col-md-12"><h4>Displayed Images</h4></div>
                <div class="col-md-12">
                    <?php
                        if(isset($displayed_images)){
                            foreach($displayed_images as $image) {
                                ?>

                                <img class="col-md-2 img_thumbs" src="<?php echo base_url().$image['img_path']; ?>" width="100%" data-id="<?php echo $image["id"];?>" data-selected="<?php echo $image['display'];?>">

                                <?php
                            }
                        }
                    ?>
                </div>
			</div>

			<div class="col-md-12 card p-a-1">
				<div class="col-md-12"><h4>Not Displayed Images</h4></div>
                <?php
                if(isset($hidden_images)){
                    foreach($hidden_images as $image) {
                        ?>

                        <img class="col-md-2 img_thumbs" src="<?php echo base_url().$image['img_path']; ?>" width="100%" data-id="<?php echo $image["id"];?>" data-selected="<?php echo $image['display'];?>">

                        <?php
                    }
                }
                ?>
			</div>

		</div>

	</div>
</div>

<script>

    $(document).ready(function () {
        $("#btn_add").css("display","none");
        $("#btn_remove").css("display", "none");
        $("#btn_delete").css("display", "none");
        var previewImg = $("#preview_img");
        var selectedImageId = -1;
       $(".img_thumbs").click(function () {
//           console.log($(this).attr("data-selected"));
           previewImg.attr("src",$(this).attr("src"));
           var display = $(this).attr("data-selected");
           selectedImageId = $(this).attr("data-id");
           if(display==1){
               $("#btn_add").css("display","none");
               $("#btn_remove").css("display", "block");

           }else{
               $("#btn_add").css("display","block");
               $("#btn_remove").css("display", "none");
           }
           $("#btn_delete").css("display", "block");
       });

       $("#btn_add").click(function () {
            location.href = "<?php echo base_url();?>index.php/admin/addToDisplay/"+selectedImageId;
       });
       
       $("#btn_remove").click(function () {
           location.href = "<?php echo base_url();?>index.php/admin/removeFromDisplay/"+selectedImageId;
       });

        $("#btn_delete").click(function () {
            location.href = "<?php echo base_url();?>index.php/admin/deleteLandingImage/"+selectedImageId;
        });
    });
</script>