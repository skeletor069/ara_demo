<div class="row">
	<div class="col-md-20 p-x-1 m-y-1"><h3>Profile</h3></div>

    <div class="col-md-6">
        <form action="<?php echo base_url();?>index.php/admin/changeUsername" method="post">
            <div class="col-md-6 m-b-1">Previous Username : </div>
            <input type="text" name="pre_user" class="col-md-6 m-b-1" required>
            <div class="col-md-6 m-b-1">Previous Password : </div>
            <input type="password" name="pre_pass" class="col-md-6 m-b-1" required>
            <div class="col-md-6 m-b-1">New Username : </div>
            <input type="text" name="new_user" class="col-md-6 m-b-1" required>
            <input type="submit" value="Change Username" class="col-md-6 offset-md-6">
        </form>
    </div>

    <div class="col-md-6">
        <form action="<?php echo base_url();?>index.php/admin/changePassword" method="post">
            <div class="col-md-6 m-b-1">Previous Password : </div>
            <input type="password" name="pre_pass" class="col-md-6 m-b-1" required>
            <div class="col-md-6 m-b-1">New Password : </div>
            <input type="password" name="new_pass" class="col-md-6 m-b-1" required>
            <div class="col-md-6 m-b-1">Retype Password : </div>
            <input type="password" name="re_pass" class="col-md-6 m-b-1" required>
            <input type="submit" value="Change Password" class="col-md-6 offset-md-6">
        </form>
    </div>

</div>