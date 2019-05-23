<?php echo form_open_multipart('admin/updateAward');?>
<div class="row p-x-1">
	<input type="text" name="title" class="col-md-12 m-y-1 p-y-1" placeholder="Title" required value="<?php echo $award['name'];?>">
</div>
<div class="row p-x-1">

    <select name="year" class="col-md-4 full-width">
        <?php
        for($year = 1960; $year <= date("Y"); $year++){
            $selected = "";
            if($year == $award["year"])
                $selected = "selected";
            echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
        }
        ?>
    </select>
    <select name="month" class="col-md-4">
        <?php
        for($month = 1; $month <= 12; $month++){
            $selected = "";
            if($month == $award["month"])
                $selected = "selected";
            echo '<option '.$selected.' value="'.$month.'">'.date("F", mktime(0, 0, 0, $month, 10)).'</option>';
        }
        ?>
    </select>
    <select name="day" class="col-md-4">
        <?php
        for($day = 1; $day <= 31; $day++){
            $selected = "";
            if($day == $award["day"])
                $selected = "selected";
            echo '<option '.$selected.' value="'.$day.'">'.$day.'</option>';
        }
        ?>
    </select>
</div>
<div class="row p-x-1">
    <input type="text" name="location" class="col-md-12 m-y-1 p-y-1" placeholder="Location" required value="<?php echo $award['location'];?>">
</div>
<div class="row p-x-1">
    <input type="text" name="desc" class="col-md-12 m-y-1 p-y-1" placeholder="Description" required value="<?php echo $award['description'];?>">
</div>
<div class="row p-x-1">
	<input type="hidden" name="id" value="<?php echo $award['id'];?>">
	<input type="hidden" name="previous_image" value="<?php echo $award['image_url'];?>">
<!--	<textarea id="description" name="desc" class="col-md-12" required>--><?php //echo $award['description'];?><!--</textarea>-->
	<?php //echo form_upload(array('id' => 'file', 'name' => 'file', "class" => "col-md-4 m-y-1")); ?>
	<input type="submit" name="submit" value="Update Award" class="p-x-2 p-y-1">
</div>
<?php echo form_close();?>

<script type="text/javascript">
//	$(document).ready(function () {
//		$('#description').trumbowyg();
//
//	});
</script>