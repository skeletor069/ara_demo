<div class="row">
	<div class="col-md-12 p-x-1"><h3>Add New project</h3></div>
</div>

<form action="<?php echo base_url();?>index.php/admin/addProject" method="post">
<div class="row">
	<div class="col-md-12 p-x-2">
		<div class="row p-y-1">
			<div class="col-md-3" align="right">Project Name</div>
			<input type="text" name="name" placeholder="Project Name" class="col-md-9" required>
		</div>

		<div class="row p-y-1">
			<div class="col-md-3" align="right">Description</div>
			<textarea name="description" placeholder="Project Description" class="col-md-9" required></textarea>
		</div>

		<div class="row p-y-1">
			<div class="col-md-3" align="right">Location</div>
			<input type="text" name="location" placeholder="Location" class="col-md-9" required>
		</div>

		<div class="row p-y-1">
			<div class="col-md-3" align="right">
				Start Date : 
			</div>
			<input type="date" name="startDate" class="col-md-3" required>
			<div class="col-md-3" align="right">
				End Date : 
			</div>
			<input type="date" name="endDate" class="col-md-3">
		</div>

        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Create" class="col-md-4 offset-md-4">
            </div>
        </div>

	</div>
</div>
</form>