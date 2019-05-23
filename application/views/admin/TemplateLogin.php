<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="<?php echo base_url();?>style/jquery.min.js"></script>
    <script src="<?php echo base_url();?>style/tether.min.js"></script>
    <script src="<?php echo base_url();?>style/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/dropzone.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/dropzone.css">
    <link rel="stylesheet" href="<?php echo base_url();?>style/ara_style.css" />
</head>
<body id="<?php echo $body_id;?>">

<div class="container-fluid">

<?php $this->load->view($page);?>

</div>
</body>
</html>