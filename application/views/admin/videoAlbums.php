<div class="row">
    <div class="col-md-12 p-x-1 m-y-1"><h3>Video Albums</h3></div>

    <div class="col-md-6">
        <?php
            if(sizeof($albums) > 0){
                $index = 0;
                foreach($albums as $album){
                    $index++;
                    ?>
                    <div class="col-md-12">
                        <div class="col-md-1"><?php echo $index;?>.</div>
                        <div class="col-md-9">
                            <form action="<?php echo base_url();?>index.php/admin/updateVideoAlbum" method="post">
                                <input type="hidden" name="id" value="<?php echo $album["id"];?>">
                                <input type="text" name="album_name" required value="<?php echo $album["album_name"];?>" class="col-md-9">
                                <input type="submit" value="Update" class="col-md-3">
                            </form>
                        </div>
                        <div class="col-md-1">
                            <a href="<?php echo base_url()."index.php/admin/removeVideoAlbum/".$album["id"];?>">Delete</a>
                        </div>
                    </div>


                <?php }
            }else
                echo "Create some video albums from the right side form.";
        ?>
    </div>

    <div class="col-md-6 table-bordered p-y-1">
        <h4>Add New Video Album</h4>
        <form method="post" action="<?php echo base_url()?>index.php/admin/addVideoAlbum">
            <input class="col-md-12 m-b-1" type="text" name="album_name" required placeholder="Album Name">
            <input type="submit" value="Add Album" class="btn-primary">

        </form>
    </div>
</div>