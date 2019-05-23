<div class="row">
	<div class="col-md-12 p-x-1 m-y-1"><h3>All Posts</h3></div>
</div>

<div class="row">


<?php
foreach ($posts as $news){
    ?>

    <div class="row p-l-1">

        <div class="col-md-6"><a href="<?php echo base_url()."index.php/admin/editPost/".$news["id"];?>"><?php echo $news["title"];?></a></div>
        <div class="col-md-2 <?php echo $news["published"]?"":"text-danger";?>"><?php echo $news["published"]?"Published":"Not published";?></div>
        <div class="col-md-2"><?php echo $news["day"]."/".$news["month"]."/".$news["year"];?></div>

        <div class="col-md-2"><a class="text-danger" onclick="return confirm('Are you sure?');" href="<?php echo base_url()."index.php/admin/removeNews/".$news["id"];?>">Delete</a></div>
    </div>
    <hr/>
    <?php
}
?>


</div>