<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user_connected-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des Flash - African Village</title>


    <!-- Global stylesheets -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/main.css">
    <!-- /Global stylesheets -->
</head>
<body id="top">

<!-- Preloader -->
<div id="preloader">
	<div id="status">
		<div class="loader"></div>
	</div>
</div>
<!-- /Preloader -->

<div id="body-wrapper" class="body-container">

	<!-- Header begins -->
<?php $this->load->view('dashboard/template/header'); ?>
	<!-- /Header ends -->

	<!-- Sidebar -->
	<?php $this->load->view('dashboard/template/menu'); ?>
	<!-- /Sidebar -->

	<!-- Page container begins -->
	<section class="main-container">

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title">
						<i class="icon-user_connected position-left"></i> Mon Compte
					</div>
					<ul class="breadcrumb">
						<li><a href="#"></a></li>
						<li>Accueil</li>
						<li class="active">Compte Utilisateur </li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des flashs</div>
						 <?php if($this->session->flashdata('add')){?>
                          <div class="alert alert-success" role="alert" id="add">
	                        <strong>Bravo !</strong>  <?php echo $this->session->flashdata('add'); ?>
	                       </div>
                        <?php }?>
                        <?php if($this->session->flashdata('update')){?>
                          <div class="alert alert-success" role="alert" id="update">
	                        <strong>Bravo !</strong>  <?php echo $this->session->flashdata('update'); ?>
	                       </div>
                        <?php }?>
                         <?php if($this->session->flashdata('delete')){?>
                          <div class="alert alert-danger" role="alert" id="delete">
	                        <strong>Bravo !</strong>  <?php echo $this->session->flashdata('delete'); ?>
	                       </div>
                        <?php }?>

                      <?php echo form_open_multipart('dashboard/updateUtilisateur');?>
               <input type="hidden" name="usr_id" value="<?php echo $user_connected->usr_id; ?>">
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" name="usr_name" value="<?php echo $user_connected->usr_name; ?>">
                    <?php echo form_error('usr_name','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" name="usr_surname" value="<?php echo $user_connected->usr_surname; ?>">
                    <?php echo form_error('usr_surname','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" name="usr_email" value="<?php echo $user_connected->usr_email; ?>">
                    <?php echo form_error('usr_email','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="usr_password" value="<?php echo $user_connected->usr_password; ?>">
                    <?php echo form_error('usr_password','<font color="red">','</font>'); ?>
                </div>

                <div class="form-group">
                    <b>Ancienne image</b>
                    <input type="hidden" name="usr_photo" value="<?php echo $user_connected->usr_photo; ?>">
                    <img src="<?php echo base_url(); ?>uploads/utilisateur/<?php echo $user_connected->usr_photo; ?>" width="100" heght="100"> <br>

                    <label>Image de profil</label>
                    <input type="file" class="form-control" name="user_connectedfile">
                    <?php echo form_error('picture_user_connected','<font color="red">','</font>'); ?>
                </div>
                
                <div class="form-group">
                    <label>Type d'utilisateur</label>
                    <select class="form-control" name="id_role">
                        <?php foreach ($roles as $role) {?>
                        <option value="<?php echo $role->id_role; ?>"><?php echo $role->label_role; ?></option>
                        <?php }?>
                    </select>
                </div>
                <input type="hidden" name="postU" value="1">
                 <div class="form-group" style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                 </div>
                
            <?php echo form_close()?>
					</div>
		
				</div>
				<!-- /Basic datatable -->

				

			</div>

			<!-- Footer -->
			<!--    <footer class="footer-container">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="pull-left">
                      ©  2018 &nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;AFRICAN Village par <a href="http://ngser.com/" target="_blank">NGSER</a>.        </div>
                    <div class="pull-right">
                      <div class="label label-info">Version: 1.1.1</div>
                    </div>
                          </div>
                        </div>
                      </div>
                </footer> -->
			<!-- /Footer -->

		</section>
		<!-- /Page Container ends -->

		<!-- ScrolltoTop -->
		<a id="scrollTop" href="#top"><i class="icon-arrow-up12"></i></a>
		<!-- /ScrolltoTop -->

	</div>

<!-- Rightbar -->
<div id="right_sidebar" class="right_bar"></div>
<script>
function open_rightbar() {
	$(window).resize(function() {
		if(($(window).width() < 500)){
			document.getElementById("right_sidebar").style.width = "100%";
		}
		else if($(window).width() > 500) {
			document.getElementById("right_sidebar").style.width = "260px";
		}
	}).resize();
}
function close_rightbar() {
	document.getElementById("right_sidebar").style.width = "0";
}
</script>
<!-- /Rightbar -->

<!-- Layout settings -->
<div class="layout"></div>
<span class="is_hidden" id="jquery_vars">
	<span class="is_hidden switch-active"></span>
	<span class="is_hidden switch-inactive"></span>
	<span class="is_hidden chart-bg"></span>
	<span class="is_hidden chart-gridlines-color"></span>
	<span class="is_hidden chart-legends-text-color"></span>
	<span class="is_hidden chart-grid-text-color"></span>
	<span class="is_hidden chart-data-color-option1"></span>
	<span class="is_hidden chart-data-color-option2"></span>
	<span class="is_hidden chart-data-color-option3"></span>
	<span class="is_hidden chart-data-color-option4"></span>
	<span class="is_hidden chart-data-color-option5"></span>
	<span class="is_hidden chart-data-color-option6"></span>
	<span class="is_hidden chart-data-color-option7"></span>
	<span class="is_hidden chart-data-color-option8"></span>
</span>
<!-- /Layout settings -->



<!-- Global scripts -->
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/jquery/jquery.ui.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/bootstrap/jasny_bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/navigation/nav.accordion.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/hammer/hammerjs.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/hammer/jquery.hammer.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/extensions/smart-resize.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/extensions/blockui.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/forms/uniform.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/forms/switchery.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/forms/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/plugins/venobox.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/app/layouts.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/core/app/core.js"></script>
<!-- /Global scripts -->

<!-- Page scripts -->
<script src="<?php echo base_url();?>assets/dashboard/lib/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/pages/tables/datatable_basic.js"></script>
<!-- /Page scripts -->

</body>

</html>
