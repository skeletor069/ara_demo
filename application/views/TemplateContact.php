<?php $this->load->view("header");?>

<?php $this->load->view("main_menu");?>

    <div class="container-fluid main_container">
        <div class="row page_content fill_height">
            <div class="col-md-12 m-b-1">
                <p><?php echo $data["address"];?></p>
                <p><?php echo $data["tel"];?></p>
                <p><?php echo $data["email"];?></p>
            </div>

            <form id="contact_form" action="<?php echo base_url()."index.php/contact/sendMail";?>" method="post">
                <div class="col-md-12 m-b-1">
                    <div class="col-md-2 offset-md-1 p-x-0">name:</div>
                    <input type="text" class="col-md-5" name="client_name" required>
                </div>

                <div class="col-md-12 m-b-1">
                    <div class="col-md-2 offset-md-1 p-x-0">email:</div>
                    <input type="email" class="col-md-5" name="client_email" required>
                </div>

                <div class="col-md-12 m-b-1">
                    <div class="col-md-2 offset-md-1 p-x-0">phone:</div>
                    <input type="text" class="col-md-5" name="client_phone" required>
                </div>

                <div class="col-md-12 m-b-1">
                    <div class="col-md-2 offset-md-1 p-x-0">interested in:</div>
                    <input type="text" class="col-md-5" name="client_interest">
                </div>

                <div class="col-md-12 m-b-1">
                    <div class="col-md-2 offset-md-1 p-x-0">comment:</div>
                    <textarea class="col-md-5" rows="5" name="client_comment" required></textarea>
                </div>

                <div class="col-md-12 m-b-1 text-md-right">
                    <div class="col-md-2 offset-md-1"></div>
                    <div class="col-md-5 text-md-right p-a-0">
                        <input type="submit" value="submit">
                    </div>
                </div>

            </form>


        </div>
    </div>
<?php if(isset($notification_message)):?>
<script>
    $(document).ready(function () {
        alert("<?php echo $notification_message;?>")
    });
</script>
<?php endif;?>
<?php $this->load->view("footer");?>