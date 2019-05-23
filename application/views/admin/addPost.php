<div class="row">
	<div class="col-md-20 p-a-1"><h3>Add New Post</h3></div>
</div>
<div class="row">
    <div class="col-md-12 p-x-2">
        <form action="<?php echo base_url();?>index.php/admin/createPost" method="post">
            <div class="row">
                <input type="text" name="title" class="col-md-12 m-y-1 p-y-1" placeholder="Title" required>
            </div>
            <div class="row">
                <span class="col-md-2">Date : </span>
                <input type="date" name="date" class="col-md-4" required>
            </div>
            <div class="row">
                <input type="text" name="description" class="col-md-12 m-y-1 p-y-1" placeholder="Description" required>
            </div>
            <div class="row">
                <input type="text" name="address" class="col-md-12 m-y-1 p-y-1" placeholder="Address" required>
            </div>
            <div class="row">
                <input type="text" name="city" class="col-md-12 m-y-1 p-y-1" placeholder="City" required>
            </div>
            <div class="row">
                <input type="submit" value="Create Post" class="p-a-1">
            </div>
        </form>
    </div>
</div>


<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('#description').trumbowyg();-->
<!--    });-->
<!--</script>-->