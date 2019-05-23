<header class="p-y-2 container-fluid" style="width: 100%;">
    <nav class="row page_content">

        <div class="col-md-2">
            <ul class="main_nav p-l-0">
                <li class="profile"><a href="<?php echo base_url();?>index.php/profile/philosophy">Profile</a></li>
                <li class="projects"><a href="<?php echo base_url();?>index.php/projects">Projects</a></li>
                <li class="media"><a href="<?php echo base_url();?>index.php/media">Media</a></li>
                <li class="contact"><a href="<?php echo base_url();?>index.php/contact">Contact</a></li>
            </ul>
        </div>
        <?php
            if(isset($menu))
                $this->load->view($menu);

            if(isset($menu2))
                $this->load->view($menu2);

            if(isset($menu3))
                $this->load->view($menu3);
        ?>
    </nav>

</header>
