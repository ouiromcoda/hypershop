<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
						<i class="icon-cart2 position-left"></i> Ventes
					</div>
					<ul class="breadcrumb">
						<li><a href="#"></a></li>
						<li>Accueil</li>
						<li class="active">Gestion des flashs </li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addflash" style="float: right;margin-top: -30px;"><i class="icon-plus22 position-left text-right"></i> Ajouter une annonce flash</button>
					</div>
					<table class="table datatable table-striped">
						<thead>
							<tr>
								<th>Libellés</th>
								<th>Contenus</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($flashs as $flash) {?>
							<tr>
								<td>
									<?php echo $flash->label_flash; ?>
								</td>
								<td>
									<?php echo $flash->content_flash; ?>
								</td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="" data-toggle="modal" data-target="#editflash_<?php echo $flash->id_flash; ?>" title="Editer"><i class="icon-pencil6"></i> Editer</a></li>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer cette annonce flash ?')){location.href='<?php echo site_url('dashboard/deleteFlash/'.$flash->id_flash) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php } ?>

							
						</tbody>
					</table>
				</div>
				<!-- /Basic datatable -->

				

			</div>

			<!-- Footer -->
			   <footer class="footer-container">
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
                </footer>
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

<!-- AJOUTER flash -->
<div id="addflash" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="modal-title">Ajouter une annonce flash</div>
            </div>

            <div class="modal-body">
								
				<?php echo form_open('dashboard/addFlash'); ?>
				<div class="form-group">
					<label class="control-label col-lg-4">Libellé du flash</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="label_flash">
					</div>
				</div>
					<div class="form-group">
					<label class="control-label col-lg-4">Contenu du flash</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="content_flash" >
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ajouter</button>
				</div>
			<?php echo form_close(); ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?php foreach ($flashs as $flash) { ?>
<div id="editflash_<?php echo $flash->id_flash;?>" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="modal-title">Modifier une flashégorie</div>
            </div>

            <div class="modal-body">
								
				<?php echo form_open('dashboard/updateFlash'); ?>
				<div class="form-group">
					<label class="control-label col-lg-4">Libellé du flash</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="label_flash" value="<?php echo $flash->label_flash; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Contenu du flash</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="content_flash" value="<?php echo $flash->content_flash; ?>">
					</div>
				</div>
				<div class="form-group">
					<input type="hidden" name="id_flash" value="<?php echo $flash->id_flash; ?>">
					<button type="submit" class="btn btn-primary">Modifier</button>
				</div>
			<?php echo form_close(); ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>


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
