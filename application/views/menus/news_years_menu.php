<?php if(isset($years)):?>
<div id="uniqueYears" class="col-md-2 pre-scrollable" style="max-height: 80px;">
    <ul class="main_nav p-l-0">
        <?php foreach ($years as $yr):?>
            <li><a id="<?php echo $yr;?>" href="<?php echo base_url();?>index.php/media/newsByYear/<?php echo $yr;?>"><?php echo $yr;?></a></li>
        <?php endforeach;?>
    </ul>
</div>
<?php endif;?>