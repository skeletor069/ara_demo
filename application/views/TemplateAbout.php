<?php $this->load->view("header.php");?>

<?php $this->load->view("main_menu.php");?>

<div class="row" align="center">
	<div class="col-md-12" align="center">
		<ul class="main_nav">
			<li class="ara"><a href="<?php echo base_url();?>index.php/about/index">ARA</a></li>
			<li> | </li>
			<li class="principal"><a href="<?php echo base_url();?>index.php/about/principal">Principal Architect</a></li>
			<li> | </li>
			<li class="team"><a href="<?php echo base_url();?>index.php/about/team">Team</a></li>
			<li> | </li>
			<li class="publication"><a href="<?php echo base_url();?>index.php/about/publication">Publication</a></li>
			<li> | </li>
			<li class="awards"><a href="<?php echo base_url();?>index.php/about/awards">Awards</a></li>
		</ul>
	</div>
	
</div>

<?php $this->load->view($page);?>

<?php $this->load->view("footer.php");?>