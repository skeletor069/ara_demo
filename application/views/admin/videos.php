<div class="row">
    <div class="col-md-12 p-x-1 m-y-1"><h3>Manage Videos</h3></div>

    <div class="col-md-12">
        <div class="col-md-6">

            <div class="col-md-12 p-a-1 table-bordered">
                <?php echo form_open_multipart('admin/uploadVideo');?>
                <div class="col-md-12 h4">
                    Upload New
                </div>
                <div class="col-md-12 m-b-1">
                    <input class="col-md-12" type="text" name="title" placeholder="Video Title" required>
                </div>
                <div class="col-md-12 m-b-1">
                    <input class="col-md-12" type="text" name="description" placeholder="Short Description" required>
                </div>
                <div class="col-md-12 m-b-1">
                    <input class="col-md-12" type="date" name="published" required>
                </div>
                <div class="col-md-12">
                    <?php echo form_upload(array('id' => 'file', 'name' => 'file', "required" => 'required', "accept" => "video")); ?>
                    <input type="submit" value="Upload" class="m-t-1">
                </div>
                </form>
            </div>

            <?php if($err == "err") :?>
                <div class="col-md-12 p-a-1 alert-info"><?php echo $err;?></div>
            <?php endif;?>

            <div class="col-md-12 m-t-1 m-x-0 pre-scrollable">
                <div class="col-md-12 h5">Video List</div>

                <?php foreach ($videos as $video) :?>

                    <div class="col-md-12 p-y-1" id="video_listing_<?php echo $video["id"];?>">
                        <!--                    <a href="#" onclick="videoDetails(<?php //echo $video["id"];?>//,'<?php //echo base_url()."uploads/videos/".$video["file_name"];?>//')"> <div class="col-md-6"><?php //echo $video["title"];?></div></a>-->
                        <a href="<?php echo base_url()."index.php/admin/videos/".$video["id"];?>" onclick="">
                            <div class="col-md-10"><?php echo $video["title"];?></div>
                            <div class="col-md-2">
                                <div style="width: 20px; height: 20px; background-color: <?php echo ($video["display"] == 0) ? "#900" : "#090";?>"></div>
                            </div>
                        </a>
                    </div>

                <?php endforeach;?>

            </div>

        </div>
        <div class="col-md-6">

            <?php if(isset($selectedVideo)):?>
                <div class="col-md-12 p-a-0" id="details_panel">

                    <div class="col-md-12 m-b-1">
                        <form action="<?php echo base_url()?>index.php/admin/updateVideoTitle" method="post">
                            <input type="hidden" name="id" value="<?php echo $selectedVideo["id"];?>">
                            <input type="text" value="<?php echo $selectedVideo["title"];?>" name="title" class="col-md-6">
                            <input type="submit" value="Update Title">
                        </form>
                    </div>
                    <div class="col-md-12 m-b-1">
                        <form action="<?php echo base_url()?>index.php/admin/updateVideoDescription" method="post">
                            <input type="hidden" name="id" value="<?php echo $selectedVideo["id"];?>">
                            <input type="text" value="<?php echo $selectedVideo["description"];?>" name="description" class="col-md-6">
                            <input type="submit" value="Update Description">
                        </form>
                    </div>
                    <div class="col-md-12 m-b-1">
                        <form action="<?php echo base_url()?>index.php/admin/updateVideoDate" method="post">
                            <input type="hidden" name="id" value="<?php echo $selectedVideo["id"];?>">
                            <input type="date" value="<?php echo $selectedVideo["published"];?>" name="published" class="col-md-6">
                            <input type="submit" value="Update Published Date">
                        </form>
                    </div>
                    <video class="col-md-12" id="video_panel"  controls>
                        <source src="<?php echo base_url()."uploads/videos/".$selectedVideo["file_name"];?>">
                    </video>

                    <div class="col-md-12 table-bordered m-t-1 p-b-1">
                        <div class="col-md-12">Thumb</div>
                        <div class="col-md-4"><img id="thumb_preview" src="<?php echo $selectedVideo["thumb"];?>" style="max-width: 90%;"></div>
                        <div class="col-md-8">
                            <?php echo form_open_multipart('admin/uploadThumb');?>
                            <input type="hidden" name="id" value="<?php echo $selectedVideo["id"];?>">
                            <input type="hidden" name="source_name" value="<?php echo $selectedVideo["file_name"];?>">
                            <?php echo form_upload(array('id' => 'thumb', 'name' => 'thumb', "required" => 'required')); ?>
                            <input type="submit" value="Upload Thumb" class="m-t-1">
                            <?php echo form_close();?>
                        </div>


                    </div>

                    <div class="col-md-12 m-y-1">
                        <div class="h4 col-md-12">Assign Albums</div>

                        <?php
                            foreach ($albums as $album){ ?>

                                <div class="col-md-12">
                                    <input <?php echo (in_array($album['id'], $video_albums)) ? "checked" : "";?> id="alb<?php echo $album['id'];?>" type="checkbox" name="selected" onclick="VideoAlbumChanged(this, <?php echo $album['id'];?>, <?php echo $selectedVideo["id"];?>);"> <?php echo $album['album_name'];?>
                                </div>

                            <?php }
                        ?>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-12 m-y-1 p-y-1 <?php echo ($selectedVideo["display"] == 0) ? "text-danger" : "text-primary";?>">
                            Visibility : <?php echo ($selectedVideo["display"] == 0) ? "Hidden" : "Visible";?>
                            <a href="<?php echo base_url()?>index.php/admin/changeVideoVisibility/<?php echo $selectedVideo["id"];?>" class="btn-primary p-a-1">Change</a>
                        </div>

                        <div class="col-md-12">
                            <a class="btn-danger m-t-1 p-a-1 text-md-center" onclick="return confirm('Are you sure??');" href="<?php echo base_url()."index.php/admin/deleteVideo/".$selectedVideo["id"];?>">Delete</a>
                        </div>
                    </div>



                </div>

                <script>
                    var domId = "#video_listing_<?php echo $selectedVideo["id"];?>";
                    $(domId).addClass("alert-info");
                </script>
            <?php endif;?>


        </div>
    </div>


</div>

<script>
    function VideoAlbumChanged(check, albumId, videoId) {

        var url = "";
        if(check.checked){
            // add entry
            url = "<?php echo base_url().'index.php/admin/addVideoToAlbum/';?>" + albumId + "/" + videoId;

        }else{
            // remove entry
            url = "<?php echo base_url().'index.php/admin/removeVideoFromAlbum/';?>" + albumId + "/" + videoId;
        }

        location.href = url;
    }
</script>



