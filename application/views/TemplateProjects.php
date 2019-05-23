<?php $this->load->view("header");?>

<?php $this->load->view("main_menu");?>
    <div class="container-fluid main_container">
<!--        <div id="page_overlay" style="position: absolute; width: 100%; height: 60%; min-height: 60%; z-index: 2000; background-color: white;"></div>-->
        <?php $this->load->view($page);?>
    </div>
<script>
    $(document).ready(function () {
        $("#page_holder").fadeIn("slow");
    });
</script>

<?php $this->load->view("footer");?>