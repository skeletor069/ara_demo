<div class="row">
    <div class="col-md-12"><a href="<?php echo base_url();?>index.php/admin/viewProjects"><- All Projects</a> </div>
    <div class="col-md-12 p-x-1 m-y-1"><h3>Update Project</h3></div>
</div>
<div class="row p-y-1">
    <div class="col-md-12">
        <?php if(!$project_info['published']){?><a class="btn-primary p-a-1" href="<?php echo base_url()."index.php/admin/publishPost/".$project_info["id"];?>">Publish Post</a><?php }?>
        <?php if($project_info['published']){?><a class="btn-danger p-a-1" href="<?php echo base_url()."index.php/admin/draftPost/".$project_info["id"];?>">Do not publish</a><?php }?>
    </div>
</div>

<div class="row m-t-2">
    <div class="col-md-12">
        <h4>Images of this project</h4>
    </div>
    <div class="col-md-12 m-y-2">
        <?php
        echo form_open_multipart('admin/project_upload');
        echo form_upload(array('id' => 'file', 'name' => 'file'));
        echo form_submit('upload', 'Upload');
        echo form_hidden('proj_id', $project_info["id"]);
        echo form_close();
        ?>
    </div>

    <div class="col-md-12 card">
        <?php

        if(sizeof($images) == 0)
            echo '<div class="bg-warning p-a-1">You need at least one image for the project to publish it.</div>';
        else {
            foreach ($images as $image) {
                ?>
                <form action="<?php echo base_url(); ?>index.php/admin/deleteProjectImage" method="post">
                    <input type="hidden" name="project_id" value="<?php echo $project_info["id"]; ?>">
                    <input type="hidden" name="image_id" value="<?php echo $image["image_id"]; ?>">
                    <input type="hidden" name="url" value="<?php echo FCPATH . $image["image_path"]; ?>">
                    <div class="col-md-4">
                        <div class="col-md-12 m-y-1" align="center">
                            <img src="<?php echo base_url() . $image['image_path']; ?>"
                                 style="max-width: 100%; max-height: 150px; margin: 0 auto;">
                        </div>
                        <input type="submit" value="Delete" class="col-md-12 danger">
                    </div>
                </form>
                <?php
            }
        }

        ?>
    </div>

</div>

<div class="row">
    <form method="post" action="<?php echo base_url()."index.php/admin/ProcessUpdateProject";?>"
    <div class="col-md-12 p-x-2">
        <input type="hidden" name="proj_id" value="<?php echo $project_info["id"];?>">

        <div class="row p-y-1">
            <div class="col-md-3" align="right">Project Name</div>
            <input type="text" name="name" placeholder="Project Name" class="col-md-9" value="<?php echo $project_info["project_name"];?>">
        </div>

        <div class="row p-y-1">
            <div class="col-md-3" align="right">Description</div>
            <textarea name="description" placeholder="Project Description" class="col-md-9"><?php echo $project_info["description"];?></textarea>
        </div>

        <div class="row p-y-1">
            <div class="col-md-3" align="right">Location</div>
            <input type="text" name="location" placeholder="Location" class="col-md-9" value="<?php echo $project_info["location"];?>">
        </div>
<?php
if($project_info["start_year"] != null){
    $m0 = ($project_info["start_month"] < 10) ? "0" : "";
    $d0 = ($project_info["start_day"] < 10) ? "0" : "";
    $start_date = $project_info["start_year"]."-".$m0.$project_info["start_month"]."-".$d0.$project_info["start_day"];
}else
    $start_date = "";

if($project_info["end_year"] != null){
    $m0 = ($project_info["end_month"] < 10) ? "0" : "";
    $d0 = ($project_info["end_day"] < 10) ? "0" : "";
    $end_date = $project_info["end_year"]."-".$m0.$project_info["end_month"]."-".$d0.$project_info["end_day"];
}else
    $end_date = "";

?>
        <div class="row p-y-1">
            <div class="col-md-3" align="right">
                Start Date :
            </div>
            <input type="date" name="startDate" class="col-md-3" value="<?php echo $start_date;?>">
            <div class="col-md-3" align="right">
                End Date :
            </div>
            <input type="date" name="endDate" class="col-md-3" value="<?php echo $end_date;?>">
        </div>

        <div class="row p-y-1">
            <div class="col-md-3" align="right">
                <div>Categories</div>
            </div>
            <div class="col-md-9">
            <?php
            foreach ($categories as $cat){
            ?>

                <div class="col-md-12">
                    <input <?php echo (in_array($cat['category_id'], $project_categories)) ? "checked" : "";?> id="cat<?php echo $cat['category_id'];?>" type="checkbox" name="selected" onclick="CategoryChanged(this, <?php echo $cat['category_id'];?>, <?php echo $project_info["id"];?>);"> <?php echo $cat['category_name'];?>
                </div>

            <?php
            }
            ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Update" class="col-md-4 offset-md-4">
            </div>
        </div>

    </div>


    </form>




</div>

<script>
    function CategoryChanged(check, categoryId, project_id) {

        var url = "";
        if(check.checked){
            // add entry
            url = "<?php echo base_url().'index.php/admin/addProjectCategory/';?>" + categoryId + "/" + project_id;

        }else{
            // remove entry
            url = "<?php echo base_url().'index.php/admin/removeProjectCategory/';?>" + categoryId + "/" + project_id;
        }

        location.href = url;
    }
</script>