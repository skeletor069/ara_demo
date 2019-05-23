<div class="row">
	<div class="col-md-12 m-x-1 m-y-1">
		<h3>Edit team member :</h3>
	</div>
</div>

<div class="row m-x-1 m-y-1">
	<?php echo form_open_multipart('admin/updateMember');?>
			<input type="hidden" name="id" value="<?php echo $member['id'];?>">
			<input type="hidden" name="previous_image" value="<?php echo $member['avatar'];?>">
			<input type="text" name="name" class="col-md-12 col-sm-12 m-y-1 p-x-2 p-y-1" placeholder="Member Name" required value="<?php echo $member['name'];?>">
			<input type="text" name="designation" class="col-md-4 m-y-1 p-x-2 p-y-1" placeholder="Designation" required value="<?php echo $member['designation'];?>">
			<input type="text" name="phone" class="col-md-4 m-y-1 p-x-2 p-y-1" placeholder="Phone" required value="<?php echo $member['phone'];?>">
			<input type="email" name="email" class="col-md-4 m-y-1 p-x-2 p-y-1" placeholder="Email" required value="<?php echo $member['email'];?>">
			<img src="<?php echo base_url().$member['avatar'];?>" class="col-md-4">
			<div class="col-md-4 col-sm-4 m-y-1 p-x-2 p-y-1">
				<?php echo form_upload(array('id' => 'file', 'name' => 'file'));?>
			</div>
			<input type="submit" name="submit" class="col-md-3 m-y-1 p-x-2 p-y-1" value="Update Member">
		</form>
</div>