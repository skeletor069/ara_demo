<?php if(isset($albums)):?>
<div id="uniqueCategories" class="col-md-5 pre-scrollable" style="max-height: 72px;">
    <ul class="main_nav p-l-0">
        <?php foreach ($albums as $alb):?>
            <li><a id="<?php echo "alb".$alb['id'];?>" href="<?php echo base_url();?>index.php/media/videoAlbum/<?php echo $alb['id'];?>"><?php echo $alb['album_name'];?></a></li>
        <?php endforeach;?>
    </ul>
</div>
<?php endif;?>