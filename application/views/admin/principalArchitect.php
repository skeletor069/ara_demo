<div class="row">
	<div class="col-md-12 p-x-1"><h3>Principal Architect</h3></div>
</div>

<div class="row">
    <form action="<?php echo base_url();?>index.php/admin/updatePrincipalArchitect" method="post">
        <div class="col-md-6 p-x-1 m-x-1">
            <div class="row">
                <input class="col-md-12 m-y-1 p-y-1" type="text" name="name" placeholder="Architect Name" value="<?php echo $main_architect["name"];?>">
            </div>
            <div class="row">
                <input class="col-md-12 m-y-1 p-y-1" type="text" name="subtitle" placeholder="Subtitle" value="<?php echo $main_architect["subtitle"];?>">
            </div>

            <div class="row">
                    <textarea id="description" class="col-md-12 m-y-1" name="description" placeholder="Description"><?php echo $main_architect["description"];?></textarea>
            </div>

            <div class="row">
                <input class="col-md-12 p-y-1" type="submit" value="Update Info">
            </div>
        </div>
    </form>
	<div class="col-md-5">
		<div class="row m-b-1">
		<?php
			echo form_open_multipart('admin/principal_upload');
			echo form_upload(array('id' => 'file', 'name' => 'file'));
			echo form_submit('upload', 'Upload');
			echo form_hidden('architect', 1);
			echo form_close();
		?>
		</div>
			<?php
				foreach ($main_architect["images"] as $row) {
					echo '<div class="col-md-6">';
					echo '<a href="'.base_url().'index.php/admin/DeletePrincipalImage/'.$row["image_id"].'/'.$row["image_path"].'" class="close" onclick="return confirm(\'Are you sure??\');">&times;</a>';
					echo '<img src="'.base_url().$row["image_path"].'" class="col-md-12" />';
					echo '</div>';
				}
			?>
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#description').trumbowyg();
	});
</script>
