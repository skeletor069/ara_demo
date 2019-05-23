<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="<?php echo base_url();?>style/jquery.min.js"></script>
    <script src="<?php echo base_url();?>style/tether.min.js"></script>
    <script src="<?php echo base_url();?>style/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/editor/trumbowyg.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/dropzone.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/dropzone.css">
    <link rel="stylesheet" href="<?php echo base_url();?>style/ara_style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/editor/ui/trumbowyg.min.css">
</head>
<body id="<?php echo $body_id;?>">

<div class="container-fluid">
  <div class="row">
      <div class="col-md-12 p-a-1 top-bar">
          <div class="col-md-2"><a href="<?php echo base_url();?>" target="_blank"><div class="brand">Visit ARA Website</div></a></div>
          <div class="col-md-3 offset-md-7 text-md-right">

              <div class="dropdown">
                  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $currentUserName['email'];?>
                      <span class="caret"></span></button>
                  <ul class="dropdown-menu" id="user_dropdown">

                          <a href="<?php echo base_url();?>index.php/admin/profile">
                              <li><i class="fa fa-user fa-lg"></i> Admin Profile</li>
                          </a>


                        <?php if($currentUserName['role'] == 1) :?>
                          <a href="<?php echo base_url();?>index.php/admin/users">
                              <li><i class="fa fa-users fa-lg"></i> Users Management</li>
                          </a>
                        <?php endif;?>


                          <a href="<?php echo base_url();?>index.php/admin/logout">
                              <li><i class="fa fa-users fa-lg"></i> Log Out</li>
                          </a>

                  </ul>
              </div>
          </div>
      </div>
    <div class="nav-side-menu col-md-2">

        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      
            <div class="menu-list">
      
                <ul id="menu-content" class="menu-content collapse out">
                    <a href="<?php echo base_url();?>index.php/admin/dashboard">
                    <li>
                      
                      <i class="fa fa-dashboard fa-lg"></i> Landing Page
                      
                    </li>
                    </a>

                    <li  data-toggle="" data-target="#products" class="">
                      <a href="#"><i class="fa fa-gift fa-lg"></i> Profile Pages<span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu" id="products">
                        <a href="<?php echo base_url();?>index.php/admin/companySlogan"><li class="">Philosophy</li></a>
                        <a href="<?php echo base_url();?>index.php/admin/principalArchitect"><li>Founder</li></a>
<!--                        <a href="--><?php //echo base_url();?><!--index.php/admin/teams"><li>Teams</li></a>-->
<!--                        <a href="--><?php //echo base_url();?><!--index.php/admin/publications"><li>Publications</li></a>-->
                        <a href="<?php echo base_url();?>index.php/admin/awards"><li>Awards</li></a>

<!--                        <a href="--><?php //echo base_url();?><!--index.php/admin/jobOpportunity"><li>Job Opportunity</li></a>-->
<!--                        <a href="--><?php //echo base_url();?><!--index.php/admin/location"><li>Location</li></a>-->
                    </ul>


                    <li data-toggle="" data-target="#service" class="collapsed">
                      <a href="#"><i class="fa fa-globe fa-lg"></i> Projects <span class="arrow"></span></a>
                    </li>  
                    <ul class="sub-menu" id="service">
                        <a href="<?php echo base_url();?>index.php/admin/categories"><li>Categories</li></a>
                      <a href="<?php echo base_url();?>index.php/admin/addProject"><li>Add New Project</li></a>
                      <a href="<?php echo base_url();?>index.php/admin/viewProjects"><li>All Projects</li></a>
                    </ul>


                    <li data-toggle="" data-target="#new" class="collapsed">
                      <a href="#"><i class="fa fa-car fa-lg"></i> Media <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu " id="new">
                      <a href="<?php echo base_url();?>index.php/admin/addPost"><li>Add New News</li></a>
                      <a href="<?php echo base_url();?>index.php/admin/viewPosts"><li>All News</li></a>
                        <a href="<?php echo base_url();?>index.php/admin/addLecture"><li>Add New Lecture</li></a>
                        <a href="<?php echo base_url();?>index.php/admin/viewLectures"><li>All Lectures</li></a>
                        <a href="<?php echo base_url();?>index.php/admin/videoAlbums"><li>Video Albums</li></a>
                        <a href="<?php echo base_url();?>index.php/admin/videos"><li>Videos</li></a>
                    </ul>

<!--                    <li data-toggle="collapse" data-target="#lecture" class="collapsed">-->
<!--                        <a href="#"><i class="fa fa-car fa-lg"></i> Lectures <span class="arrow"></span></a>-->
<!--                    </li>-->
<!--                    <ul class="sub-menu collapse" id="lecture">-->
<!---->
<!--                    </ul>-->
<!---->
<!--                    <li>-->
<!--                        <a href="--><?php //echo base_url();?><!--index.php/admin/videoAlbums">-->
<!--                            <i class="fa fa-user fa-lg"></i> Video Albums-->
<!--                        </a>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <a href="--><?php //echo base_url();?><!--index.php/admin/videos">-->
<!--                            <i class="fa fa-user fa-lg"></i> Videos-->
<!--                        </a>-->
<!--                    </li>-->

                    <li>
                        <a href="<?php echo base_url();?>index.php/admin/contact">
                            <i class="fa fa-user fa-lg"></i> Contact
                        </a>
                    </li>

<!--                     <li>-->
<!--                      <a href="--><?php //echo base_url();?><!--index.php/admin/profile">-->
<!--                      <i class="fa fa-user fa-lg"></i> Admin Profile-->
<!--                      </a>-->
<!--                      </li>-->
<!---->
<!--                     <li>-->
<!--                      <a href="--><?php //echo base_url();?><!--index.php/admin/users">-->
<!--                      <i class="fa fa-users fa-lg"></i> Users Management-->
<!--                      </a>-->
<!--                     </li>-->
<!---->
<!--                      <li>-->
<!--                      <a href="--><?php //echo base_url();?><!--index.php/admin/logout">-->
<!--                      <i class="fa fa-users fa-lg"></i> Log Out-->
<!--                      </a>-->
<!--                    </li>-->
                </ul>
         </div>
    </div>
    <div class="col-md-10">
