<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> 

<head>
<meta charset="utf-8"/>
<title>Réinitialisez votre mot de passe - Votre banque mobile!</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content name="description"/>
<meta content name="author"/>

<meta name="robots" content="index, follow">
<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png"  />

<link rel="canonical" href="<?php echo base_url('mot-de-passe-oublie') ?>" />

<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url(); ?>assets/new_login/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/new_login/assets/plugins/select2/select2_metro.css"/>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css"/>


<link href="<?php echo base_url(); ?>assets/new_login/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico"/>

<style>
    .error {color: red;}
    .success {color: green;}
</style>

<script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>';
</script>

</head>

<body class="login">

<div class="logo">
    <a href="<?php echo site_url('accueil'); ?>">
        <img style="width: 150px; height: 45px;" src="<?php echo base_url(); ?>assets/images/logo_scash.png">
    </a>
</div>


<div class="content">

    <form method="post" action="<?php echo site_url('changer-mot-de-passe'); ?>" class="form-vertical">
        <center><h3>Réinitialisez votre mot de passe</h3></center>
        <p>Entrez votre nouveau mot de passe</p>

        <?php if(isset($error_message)) {
                  echo "<div class='error'>".$error_message."</div> <p>&nbsp;</p>";
              }
        ?>

        <div class="control-group">
            <div class="controls">
            <div class="input-icon left">
            <i class="icon-lock"></i>
            <input name="password_user" class="m-wrap placeholder-no-fix" type="password" placeholder="Mot de passe" autocomplete="off" />
            <?php echo form_error('password_user', '<span class="error">', '</span>'); ?>
            </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
            <div class="input-icon left">
            <i class="icon-lock"></i>
            <input name="password_confirmation" class="m-wrap placeholder-no-fix" type="password" placeholder="Confirmation" autocomplete="off" />
            <?php echo form_error('password_confirmation', '<span class="error">', '</span>'); ?>
            </div>
            </div>
        </div>

        <input type="hidden" name="token_password" value="<?= $token_password; ?>" />

        <div class="form-actions">
            <button type="submit" class="btn green pull-right">
            Valider <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>

    </form>




</div>


<div class="copyright">
2017 &copy; <a href="http://www.wellibo.ci/">Wellibo</a>
</div>


 <script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>


<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/new_login/assets/plugins/select2/select2.min.js"></script>


<script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/new_login/assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/new_login/assets/scripts/login-soft.js" type="text/javascript"></script>

<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
</script>


<?php
        if($this->session->flashdata('password_changed')) {
             
             $message = $this->session->flashdata('password_changed');
             $url_redirect_page = site_url('espace-client');

             $success_dialog = <<< DIALOG
                 <script type="text/javascript">
                      
                      swal({
                          title: "Bravo",
                          text: "$message",
                          type: "success",
                          showCancelButton: false,
                          confirmButtonColor: "#35aa47",
                          confirmButtonText: "Okay",
                          closeOnConfirm: false,
                        },
                        function(isConfirm){
                          if (isConfirm) {
                            window.location.href = '{$url_redirect_page}';
                          }
                      });

                  </script>
DIALOG;
            echo $success_dialog;
            die();
        }
?>



</body>

</html>
