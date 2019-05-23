<div class="row">
	<div class="col-md-12 p-x-1"><h3>Team Members</h3></div>
</div>

<div class="row">
	<div class="col-md-5">
		<?php 
			if($members){
				foreach ($members as $member) { ?>
					
					<div class="row m-y-1 p-x-1">
						<div class="col-md-8"><?php echo $member["name"]?></div>
						<a href="<?php echo site_url('admin/editMember/'.$member['id']);?>"><div class="col-md-2">Edit</div></a>
						<a onclick="return Surity();" href="<?php echo site_url('admin/removeMember/'.$member["id"]);?>"><div class="col-md-2">Remove</div></a>
					</div>
					<hr />

		<?php	}
			}
		?>
	</div>
	<div class="col-md-7">
		<div class="row m-x-1">
		<?php echo form_open_multipart('admin/addNewMember');?>
			<input type="text" name="name" class="col-md-12 col-sm-12 m-y-1 p-x-2 p-y-1" placeholder="Member Name" required>
			<input type="text" name="designation" class="col-md-4 m-y-1 p-x-2 p-y-1" placeholder="Designation" required>
			<input type="text" name="phone" class="col-md-4 m-y-1 p-x-2 p-y-1" placeholder="Phone" required>
			<input type="email" name="eml" class="col-md-4 m-y-1 p-x-2 p-y-1" placeholder="Email" required>
			<div class="col-md-12 col-sm-12 m-y-1 p-x-2 p-y-1">
				<?php echo form_upload(array('id' => 'file', 'name' => 'file', 'required'=>"true"));?>
			</div>
			<input type="submit" name="submit" class="col-md-3 m-y-1 p-x-2 p-y-1" value="Add Member">
		</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function Surity() {
		if(confirm("Are you sure??"))
			return true;
		else
			return false;
	}
</script>


