<?php if(isset($all_news)):?>
    <div id="newsTitles" class="col-md-4 pre-scrollable" style="max-height: 80px;">
        <ul class="main_nav p-l-0">
            <?php foreach ($all_news as $news):?>
                <li><a id="<?php echo "news".$news["id"];?>" href="<?php echo base_url();?>index.php/media/lectureDetails/<?php echo $news["id"];?>"><?php echo $news["title"];?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>