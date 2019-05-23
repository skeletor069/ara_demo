<?php echo form_open_multipart('admin/updatePublication');?>
<div class="row p-x-1">
	<input type="text" name="title" class="col-md-12 m-y-1 p-y-1" placeholder="Title" required value="<?php echo $publication['name'];?>">
</div>
<div class="row p-x-1">
	<input type="hidden" name="id" value="<?php echo $publication['id'];?>">
	<input type="hidden" name="previous_image" value="<?php echo $publication['image_url'];?>">
	<textarea id="description" name="desc" class="col-md-12" required><?php echo $publication['description'];?></textarea>
	<img src="<?php echo base_url().$publication['image_url'];?>" class="col-md-4">
	<?php echo form_upload(array('id' => 'file', 'name' => 'file', "class" => "col-md-4 m-y-1")); ?>
	<input type="submit" name="submit" value="Update Publication" class="p-x-2 p-y-1">
</div>
<?php echo form_close();?>

<script type="text/javascript">
	$(document).ready(function () {
		$('#description').trumbowyg();

	});
</script>