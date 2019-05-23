<form action="<?php echo site_url('admin/updateCompanySlogan');?>" method="post">
<div class="row">
	<div class="col-md-12 p-x-1 m-y-1"><h3>Philosophy</h3></div>
</div>

<div class="row m-y-1 m-x-1">
	<textarea class="col-md-12" rows="15" id="slogan" name="slogan"><?php echo $slogan;?></textarea>
</div>
<div class="row m-y-1 m-x-1">
	<input type="submit" name="submit" value="Update" class="p-x-2 p-y-1">
</div>
</form>
<script type="text/javascript">
	$(document).ready(function () {
		$('#slogan').trumbowyg();
	});
</script>