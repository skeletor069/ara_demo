<div class="row">
	<div class="col-md-12 p-x-1"><h3>Publications</h3></div>
</div>
<div class="row">
	<div class="col-md-6 p-x-1">
		<hr />
		<?php
			if($publications){
				foreach ($publications as $key => $pub) { ?>
					
					<div class="row">
						<div class="col-md-8"><?php echo $pub["name"];?></div>
						<a href="<?php echo base_url();?>index.php/admin/editPublication/<?php echo $pub["id"];?>"><div class="col-md-2">Edit</div></a>
						<a href="<?php echo base_url();?>index.php/admin/RemovePublication/<?php echo $pub["id"];?>" onclick="return RemovePublication()"><div class="col-md-2">Remove</div></a>
					</div>
					<hr />

				<?php }
			}
		?>
	</div>
	<div class="col-md-6">
		<?php echo form_open_multipart('admin/addNewPublication');?>
		<div class="row p-x-1">
			<input type="text" name="title" class="col-md-12 m-y-1 p-y-1" placeholder="Title" required>
		</div>
		<div class="row p-x-1">
			<textarea id="description" name="desc" class="col-md-12" required></textarea>
			<?php echo form_upload(array('id' => 'file', 'name' => 'file', 'required'=>"true", "class" => "col-md-12 m-y-1")); ?>
			<input type="submit" name="submit" value="Add Publication" class="p-x-2 p-y-1">
		</div>
		<?php echo form_close();?>

	</div>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#description').trumbowyg();

	});

	function RemovePublication(){
		if(confirm("Are you sure??")){
			return true;
		}else{
			return false;
		}
	}
</script>