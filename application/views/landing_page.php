<?php $this->load->view("header.php");?>
<?php $this->load->view("main_menu.php");?>

    <div class="container-fluid main_container">
        <div class="row page_content">
            <div class="fotorama" data-width="100%" data-ratio="800/400" data-minwidth="400"
                 data-maxwidth="1000"
                 data-minheight="200"
                 data-maxheight="460" data-autoplay="7000" data-transition="crossfade" data-transition-duration="1000">

                <?php
                if(isset($displayImages)){
                    foreach ($displayImages as $image){ ?>

                        <img src="<?php echo base_url().$image['img_path'];?>">

                    <?php }
                }
                ?>
            </div>
        </div>
    </div>

<?php $this->load->view("footer.php");?>