<div class="row">
    <div class="col-md-12 p-x-1 m-y-1"><h3>All projects</h3></div>
</div>

<div class="row">
<?php

foreach ($projects as $project){
?>

    <div class="row p-l-1">
        <div class="col-md-3">
            <a href="<?php echo base_url()."index.php/admin/updateProject/".$project["id"];?>"><?php echo $project["project_name"];?></a>
        </div>
        <div class="col-md-3">
            <?php
                foreach ($project["categories"] as $cat){
                    echo '<span class="chip">'.$cat["category_name"].'</span> ';
                }
            ?>
        </div>
        <div class="col-md-3">
            <?php
                if($project["published"])
                    echo '<span class="">Published</span>';
                else
                    echo '<span class="alert-danger">Not yet published</span>';
            ?>
        </div>
        <div class="col-md-3"><a onclick="return confirm('Are you sure?');" href="<?php echo base_url()."index.php/admin/deleteProject/".$project["id"]?>">Delete</a></div>
    </div>
    <hr />

<?php
}

?>
</div>