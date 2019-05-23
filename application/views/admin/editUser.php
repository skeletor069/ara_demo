<div class="row">
	<div class="col-md-12 p-x-1 m-y-1"><h3>Edit User</h3></div>

    <div class="col-md-8">

        <form action="<?php echo base_url();?>index.php/admin/updateUser" method="post">
            <input type="hidden" name="id" value="<?php echo $user["id"];?>">
            <input class="col-md-12 m-t-1" type="text" name="name" value="<?php echo $user["name"];?>" required  placeholder="Name">
            <input class="col-md-12 m-t-1" type="email" name="email" value="<?php echo $user["email"];?>" required  placeholder="Email">
            <input class="col-md-12 m-t-1" type="text" name="password" required placeholder="Password">
            <input class="m-t-1" type="submit" value="Update">
        </form>

    </div>



    <?php

    if($err == "errmail")
        echo '<div class="col-md-12 alert-warning">Email already taken</div>';

    ?>

</div>