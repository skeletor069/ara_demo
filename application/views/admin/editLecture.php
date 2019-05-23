<?php

    $m0 = ($news["month"] < 10) ? "0" : "";
    $d0 = ($news["day"] < 10) ? "0" : "";
    $publish_date = $news["year"]."-".$m0.$news["month"]."-".$d0.$news["day"];

?>
<div class="row">
	<div class="col-md-20 p-a-1"><h3>Update Lecture</h3></div>
</div>
<div class="row">
    <div class="col-md-7">
        <form action="<?php echo base_url();?>index.php/admin/updateLecture" method="post">
            <input type="hidden" name="news_id" value="<?php echo $news["id"];?>">
            <div class="row">
                <input type="text" name="title" class="col-md-12 m-y-1 p-y-1" placeholder="Title" required value="<?php echo $news["title"];?>">
            </div>
            <div class="row">
                <span class="col-md-2">Date : </span>
                <input type="date" name="date" class="col-md-4" required value="<?php echo $publish_date?>">
            </div>
            <div class="row">
                <input type="text" name="description" class="col-md-12 m-y-1 p-y-1" placeholder="Description" required value="<?php echo $news["description"];?>">
            </div>
            <div class="row">
                <input type="text" name="address" class="col-md-12 m-y-1 p-y-1" placeholder="Address" required value="<?php echo $news["address"];?>">
            </div>
            <div class="row">
                <input type="text" name="city" class="col-md-12 m-y-1 p-y-1" placeholder="City" required value="<?php echo $news["city"];?>">
            </div>
            <div class="row">
                <input type="submit" value="Update Lecture" class="p-a-1">
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <div class="col-md-12 m-b-1">
            <?php
                if($news["published"])
                    echo '<a class="btn-danger p-a-1" href="'.base_url().'index.php/admin/draftLecture/'.$news["id"].'">Un-publish</a>';
                else {
                    if(sizeof($images) == 0)
                        echo '<a class="btn-primary p-a-1" href="#" onclick="alert(\'Upload image to make the news publishable.\');">Publish</a>';
                    else
                        echo '<a class="btn-primary p-a-1" href="' . base_url() . 'index.php/admin/publishLecture/' . $news["id"] . '">Publish</a>';
                }
            ?>
        </div>
        <div class="col-md-12">
            <h4>Images of this lecture</h4>
        </div>
        <div class="col-md-12 m-y-2">
            <?php
            if(sizeof($images) > 0)
                echo "To replace news image, delete it first";
            else {
                echo form_open_multipart('admin/lectureUpload');
                echo form_upload(array('id' => 'file', 'name' => 'file'));
                echo form_submit('upload', 'Upload');
                echo form_hidden('post_id', $news["id"]);
                echo form_close();
            }
            ?>
        </div>

        <div class="col-md-12 card">
            <?php

            foreach($images as $image){
                ?>
                <form action="<?php echo base_url();?>index.php/admin/deleteLectureImage" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $news["id"];?>">
                    <input type="hidden" name="image_id" value="<?php echo $image["image_id"];?>">
                    <input type="hidden" name="url" value="<?php echo FCPATH.$image["image_path"];?>">
                    <div class="col-md-4">
                        <div class="col-md-12 m-y-1" align="center">
                            <img src="<?php echo base_url().$image['image_path'];?>" style="max-width: 100%; max-height: 150px; margin: 0 auto;">
                        </div>
                        <input type="submit" value="Delete" class="col-md-12 danger">
                    </div>
                </form>
                <?php
            }

            ?>
        </div>
    </div>
</div>
