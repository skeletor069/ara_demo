<div class="row">
	<div class="col-md-12 p-x-1 m-y-1"><h3>Users Management</h3></div>



    <div class="col-md-12">
        <div class="col-md-12 h5">Add new user</div>
        <form action="<?php echo base_url();?>index.php/admin/addNewUser" method="post">
            <input type="text" name="name" class="col-md-3 m-x-1" placeholder="Name" required>
            <input type="email" name="email" class="col-md-3 m-x-1" placeholder="Email" required>
            <input type="text" name="password" class="col-md-3 m-x-1" placeholder="Password" required>
            <input type="submit" value="Add">
        </form>
    </div>
    <?php

    if($err == "errmail")
        echo '<div class="col-md-12 alert-warning">Email already taken</div>';

    ?>

    <div class="col-md-12 h5 m-a-1">Registered Users</div>
    <div class="col-md-12 m-a-1">
        <?php if(sizeof($users) == 0) {?>
            <div class="alert-info"> There are no registered users yet. Try adding it with the above form.</div>
        <?php }
        else{
            foreach ($users as $user):
        ?>

                <div class="col-md-12">
                    <div class="col-md-6 table-bordered"><?php echo $user["name"];?></div>
                    <a href="<?php echo base_url()."index.php/admin/editUser/".$user["id"]?>"><div class="col-md-1 bg-info m-r-1">Edit</div></a>
                    <a href="<?php echo base_url()."index.php/admin/deleteUser/".$user["id"]?>" onclick="return confirm('Are you sure?');"><div class="col-md-1 bg-danger">Delete</div></a>
                </div>

        <?php
            endforeach;
        }?>
    </div>
</div>