<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="<?php echo base_url();?>style/jquery.min.js"></script>
    <script src="<?php echo base_url();?>style/tether.min.js"></script>
    <script src="<?php echo base_url();?>style/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>style/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>style/ara_style.css" />
</head>
<body id="<?php echo $body_id;?>">

<div class="container-fluid">
	<div class="row">
		<div class="nav-side-menu col-md-2">
		    <div class="brand">Brand Logo</div>
		    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
		  
		        <div class="menu-list">
		  
		            <ul id="menu-content" class="menu-content collapse out">
		                <li>
		                  <a href="#">
		                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
		                  </a>
		                </li>

		                <li  data-toggle="collapse" data-target="#products" class="collapsed">
		                  <a href="#"><i class="fa fa-gift fa-lg"></i> Site Pages<span class="arrow"></span></a>
		                </li>
		                <ul class="sub-menu collapse" id="products">
		                    <li class=""><a href="#">Company Slogan</a></li>
		                    <li><a href="#">Principal Architect</a></li>
		                    <li><a href="#">Teams</a></li>
		                    <li><a href="#">Publications</a></li>
		                    <li><a href="#">Awards</a></li>
		                    <li><a href="#">Contact</a></li>
		                    <li><a href="#">Job Opportunity</a></li>
		                    <li><a href="#">Location</a></li>
		                </ul>


		                <li data-toggle="collapse" data-target="#service" class="collapsed">
		                  <a href="#"><i class="fa fa-globe fa-lg"></i> Projects <span class="arrow"></span></a>
		                </li>  
		                <ul class="sub-menu collapse" id="service">
		                  <li><a href="<?php echo base_url();?>index.php/admin/addProject">Add New Project</a></li>
		                  <li>All Projects</li>
		                </ul>


		                <li data-toggle="collapse" data-target="#new" class="collapsed">
		                  <a href="#"><i class="fa fa-car fa-lg"></i> News <span class="arrow"></span></a>
		                </li>
		                <ul class="sub-menu collapse" id="new">
		                  <li>Add New Post</li>
		                  <li>All Posts</li>
		                </ul>


		                 <li>
		                  <a href="#">
		                  <i class="fa fa-user fa-lg"></i> Profile
		                  </a>
		                  </li>

		                 <li>
		                  <a href="#">
		                  <i class="fa fa-users fa-lg"></i> Users
		                  </a>
		                </li>
		            </ul>
		     </div>
		</div>

		<div class="col-md-10">
		something
		</div>
	</div>



    		
</div>
</body>
</html>