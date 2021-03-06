<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des Stocks - African Village</title>


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
						<li class="active">Gestion des stocks de produits </li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Mouvements des produits produits</div>
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
					</div>
					<table class="table datatable table-striped">
						<thead>
							<tr>
								<th>Libellés</th>
								<th>Catégories</th>
								<th>Quantités achetées</th>
								<th>Quantités à l'approvisonnement</th>
								<th>Reste</th>
								<!-- <th class="text-center">Actions</th> -->
							</tr>
						</thead>
						<tbody>
							<?php foreach ($produits as $produit) {?>
							<tr>
								<td>
									<?php echo $produit->pro_name; ?>
								</td>
								<td>
									<?php echo $produit->label_cat; ?>
								</td>
								<td>
									<?php echo "0"; ?>
								</td>
								<td>
									<?php echo $produit->pro_stock; ?>
								</td>
								<td>
									<?php echo $produit->pro_stock; ?>
								</td>
								<!-- <td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="" data-toggle="modal" data-target="#editCat_<?php echo $produit->pro_id; ?>" title="Editer"><i class="icon-pencil6"></i> Voir + </a></li>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer cette catégorie ?')){location.href='<?php echo site_url('dashboard/deleteproduitProduit/'.$produit->id_cat) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li> 
											</ul>
										</li>
									</ul>
								</td> -->
							</tr>
							<?php } ?>

							
						</tbody>
					</table>
				</div>
				<!-- /Basic datatable -->

				

			</div>

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
<!-- 

<?php foreach ($produits as $produit) { ?>
<div id="editCat_<?php echo $produit->pro_id; ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="modal-title">Mouvement du produit <?php echo $produit->pro_name; ?></div>
            </div>

            <div class="modal-body">
				<table class="table datatable table-striped">
						<thead>
							<tr>
								<th>Client</th>
								<th>Quantités achetées</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($produits as $produit) {?>
							<tr>
								<td>
									<?php echo $produit->pro_name; ?>
								</td>
								<td>
									<?php echo $produit->label_cat; ?>
								</td>
								
								
							<?php } ?>

							
						</tbody>
					</table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?php } ?> -->
<script type="text/javascript">
       setTimeout(function(){ 
        $("#add").hide();
       }, 3000);

       setTimeout(function(){ 
        $("#delete").hide();
       }, 3000);

       setTimeout(function(){ 
        $("#update").hide();
       }, 3000);

       setTimeout(function(){ 
        $("#img_error").hide();
       }, 3000);
  </script>

<?php $this->load->view('dashboard/template/script'); ?>

</body>

</html>
