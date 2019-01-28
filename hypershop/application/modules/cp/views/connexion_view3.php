<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>S-Cash - Votre banque mobile!</title>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/logincalmbreeze/css/style.css">
    <style>
        .error {color: red;}
        a {text-decoration: none;}
    </style>
</head>

<body>
  <div class="wrapper">
	<div class="container">
		<a href="<?php echo site_url(); ?>"><img style="width: 150px; height: 45px;" src="<?php echo base_url(); ?>assets/images/logo_scash.png" /></a>
		<h4>Connexion</h4>
		<?php if(isset($error_message)) {
                echo "<div class='error'>".$error_message."</div> <p>&nbsp;</p>";
              }
        ?>
		<form method="post" action="<?php echo site_url('cp/check'); ?>" class="form">
			<input name="email_user" id="email_user" value="<?= set_value('email_user'); ?>" type="text" placeholder="Nom d'utilisateur">
			<?php echo form_error('email_user','<span class="error">','</span>'); ?>
			<input name="password_user" id="password_user" type="password" placeholder="Mot de passe">
			<?php echo form_error('password_user','<span class="error">','</span>') . '<br/>'; ?>
			<button type="submit" id="login-button">Connexion</button>
			<div style="margin-top: 5%;">
			    <p><a href="<?php echo site_url('cp/inscription'); ?>">S'inscrire</a></p><br/>
			    <a href="<?php echo site_url(''); ?>">Acceuil</a> &nbsp; |  &nbsp;
			    <a href="<?php echo site_url('mot-de-passe-oublie'); ?>">Mot de passe oublié?</a>
			</div>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="<?php echo base_url(); ?>assets/logincalmbreeze/js/index.js"></script>
</body>
</html>
