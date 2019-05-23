<div class="row">
	<div class="col-md-12 p-x-1"><h3>Awards</h3></div>
</div>
<div class="row m-x-1">
<div class="col-md-6 m-y-1 pre-scrollable">
	<hr />
		<?php
			if($awards){
				foreach ($awards as $key => $awd) { ?>
					
					<div class="row">
						<div class="col-md-8"><?php echo $awd["name"];?></div>
						<a href="<?php echo base_url();?>index.php/admin/editAward/<?php echo $awd["id"];?>"><div class="col-md-2">Edit</div></a>
						<a href="<?php echo base_url();?>index.php/admin/removeAward/<?php echo $awd["id"];?>" onclick="return RemovePublication()"><div class="col-md-2">Remove</div></a>
					</div>
					<hr />

				<?php }
			}
		?>
</div>
<div class="col-md-6 m-y-1">
    <div class="row">
        <div class="col-md-12">
            <h4>New Award</h4>
        </div>
    </div>
		<?php echo form_open_multipart('admin/addNewAward');?>
		<div class="row p-x-1">
			<input type="text" name="title" class="col-md-12 m-y-1 p-y-1" placeholder="Title" required>
		</div>
        <div class="row p-x-1">

            <select name="year" class="col-md-4 full-width">
                <?php
                for($year = 1960; $year <= date("Y"); $year++){
                    echo '<option value="'.$year.'">'.$year.'</option>';
                }
                ?>
            </select>
            <select name="month" class="col-md-4">
                <?php
                for($month = 1; $month <= 12; $month++){
                    echo '<option value="'.$month.'">'.date("F", mktime(0, 0, 0, $month, 10)).'</option>';
                }
                ?>
            </select>
            <select name="day" class="col-md-4">
                <?php
                for($day = 1; $day <= 31; $day++){
                    echo '<option value="'.$day.'">'.$day.'</option>';
                }
                ?>
            </select>
        </div>
    <div class="row p-x-1">
        <input type="text" name="location" class="col-md-12 m-y-1 p-y-1" placeholder="Location" required>
    </div>
    <div class="row p-x-1">
        <input type="text" name="desc" class="col-md-12 m-y-1 p-y-1" placeholder="Description" required>
    </div>

		<div class="row p-x-1">
<!--			<textarea id="description" name="desc" class="col-md-12" required></textarea>-->
			<input type="submit" name="submit" value="Add Award" class="p-x-2 p-y-1">
		</div>
		<?php echo form_close();?>
</div>
</div>
<script type="text/javascript">
//	$(document).ready(function () {
//		$('#description').trumbowyg();
//	});

	function RemovePublication(){
		if(confirm("Are you sure??")){
			return true;
		}else{
			return false;
		}
	}
</script>