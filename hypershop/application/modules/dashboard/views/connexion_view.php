<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>AFRICAN Village - BackOffice</title>
    <!-- Global stylesheets -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/main.css">
    <!-- /Global stylesheets -->
    <style type="text/css" media="screen">
    .error{
    	color:red;
    	font-weight: bold;
    }
    </style>
</head>

<body>

	<div class="auth-container">
		<div class="center-block">
			<div class="auth-module">
					<div class="toggle">
					</div>

				<!-- Login form -->
				<div class="form">
					<h1 class="text-light">Veuillez vous connecter</h1>
						 <?php 
	                      $attr = array('class' => 'form-horizontal');
	                      echo form_open('cp/check', $attr); 

	                      if(isset($error_message)){
	                        echo "<div class='error'>".$error_message."</div> <p>&nbsp;</p>";
	                     }
	                    ?>
						<div class="form-group">
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="E-mail" name="usr_email">
								<div class="form-control-feedback">
									<i class="icon-user"></i>
								</div>
								<?php echo form_error('usr_email','<span class="error">','</span>'); ?>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Mot de passe" name="usr_password">
								<div class="form-control-feedback">
									<i class="icon-key"></i>
								</div>
								<?php echo form_error('usr_password','<span class="error">','</span>'); ?>
							</div>
							<input type="hidden" name="post_type" value="1">
				  			<button type="submit" class="btn btn-info btn-block">Se connecter</button>
						</div>
					<?php echo form_close(); ?>
				</div>
				<!-- /Login form -->
			</div>
			
		</div>
	</div>

<!-- Global scripts -->
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/jquery/jquery.ui.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/hammer/hammerjs.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/hammer/jquery.hammer.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/forms/uniform.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/app/layouts.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/app/core.js"></script>
<!-- /Global scripts -->

<!-- Page scripts -->
<script src="<?php echo base_url();?>assets/dashboard/lib/js/pages/auth/authentication.js"></script>
<!-- /Page scripts -->

</body>

</html>
