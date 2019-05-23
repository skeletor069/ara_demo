<div class="row">
	<div class="col-md-12 p-x-1"><h3>Contact Us</h3></div>
</div>

<form method="post" action="<?php echo base_url()."index.php/admin/updateContactInfo";?>">
<div class="row m-b-1">
    <div class="col-md-2"> Mail Receiver : </div>
    <input class="col-md-6" type="email" name="receiverEmail" value="<?php echo $receiverEmail;?>">
</div>

<div class="row m-b-1">
    <div class="col-md-2"> Address : </div>
    <input class="col-md-6" type="text" name="address" value="<?php echo $address;?>">
</div>

<div class="row m-b-1">
    <div class="col-md-2"> Telephone : </div>
    <input class="col-md-6" type="text" name="telephone" value="<?php echo $tel;?>">
</div>

<div class="row">
    <div class="col-md-2"> Display Email : </div>
    <input class="col-md-6" type="email" name="displayEmail" value="<?php echo $displayEmail;?>">
</div>

<div class="row">
    <input type="submit" value="update" class="m-a-1 col-md-6">
</div>
</form>