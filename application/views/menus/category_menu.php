<?php if(isset($categories)):?>
<div id="uniqueCategories" class="col-md-2 pre-scrollable" style="max-height: 72px;">
    <ul class="main_nav p-l-0">
        <?php foreach ($categories as $cat):?>
            <li><a id="<?php echo "cat".$cat['category_id'];?>" href="<?php echo base_url();?>index.php/projects/projectsByCategory/<?php echo $cat['category_id'];?>"><?php echo $cat['category_name'];?></a></li>
        <?php endforeach;?>
    </ul>
</div>
<?php endif;?>