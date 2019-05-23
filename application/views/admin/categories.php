<div class="row">
    <div class="col-md-12 p-x-1 m-y-1"><h2>Categories</h2></div>
</div>

<div class="row">
    <div class="col-md-12 card p-a-1">
        <div class="col-md-12">
            <h5>Add New Category</h5>
        </div>
        <div class="col-md-12 m-b-1">
            <form action="<?php echo base_url();?>index.php/admin/addNewCategory" method="post">
                <input type="text" name="category_name" class="col-md-6" placeholder="New Category">
                <input type="submit" value="Add" class="col-md-2">
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 card p-a-1">
        <div class="col-md-12">
            <h5>Category List</h5>
        </div>
        <div class="col-md-12 m-b-1">
        <?php

        foreach ($categories as $cat){
        ?>

            <div class="col-md-12 p-a-1">
                <form action="<?php echo base_url();?>index.php/admin/updateCategory" method="post">
                <input type="hidden" name="category_id" value="<?php echo $cat['category_id'];?>">
                <input class="col-md-8" type="text" value="<?php echo $cat['category_name'];?>" name="category_name">
                <input type="submit" value="Update" class="col-md-2">
                <div class="col-md-2" align="center"><a class="danger" href="<?php echo base_url();?>index.php/admin/removeCategory/<?php echo $cat['category_id'];?>">Remove</a> </div>
                </form>
            </div>

        <?php
        }

        ?>
        </div>
    </div>
</div>