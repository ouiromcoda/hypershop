<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des produits - HyperSHOP</title>


    <!-- Global stylesheets -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/main.css">
    <!-- /Global stylesheets -->
    <style type="text/css" media="screen">
    	.error{
    		color:rd;
    	}
    </style>
</head>
<body id="top">



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
						<li class="active">Gestion des produits</li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->
			
			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des produits</div>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduit" style="float: right;margin-top: -30px;"><i class="icon-plus22 position-left text-right"></i> Ajouter un produit</button>
					</div>
				
					<table class="table datatable table-striped">
						<thead>
							<tr>
								<th>Nom du produit</th>
								<th>Catégories</th>
								<th>Quantité </th>
								<th>Prix</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if($user_connected->usr_group==1){ 
							foreach ($produits as $produit) { ?>
							<tr>
								<td><?php echo $produit->pro_name; ?></td>
								<td>
								<?php echo $produit->label_cat; ?>
								</td>
								<td>
									<?php echo $produit->pro_stock; ?>
								</td>
								<td>
									<span class="label label-success"><?php echo $produit->pro_price; ?></span>
								</td>
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="#" data-toggle="modal" data-target="#viewproduit_<?php echo $produit->pro_id;?>"><i class="icon-eye2" title="Aperçu"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
												
												<!-- <li><a href="#"><i class="icon-printer2"></i> Imprimer</a></li>
												<li class="divider"></li> -->
												<li><a href="#" data-toggle="modal" data-target="#editerproduit_<?php echo $produit->pro_id;?>"><i class="icon-pencil6"></i> Editer</a></li>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer ce produit ?')){location.href='<?php echo site_url('dashboard/deleteProduit/'.$produit->pro_id) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php } } ?>

							<?php if($user_connected->usr_group==2){ 
							foreach ($produits as $produit) {
							if($produit->id_magasin == $user_connected->id_magasin){ ?>
							<tr>
								<td><?php echo $produit->pro_name; ?></td>
								<td>
								<?php echo $produit->label_cat; ?>
								</td>
								<td>
									<?php echo $produit->pro_stock; ?>
								</td>
								<td>
									<span class="label label-success"><?php echo $produit->pro_price; ?></span>
								</td>
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="#" data-toggle="modal" data-target="#viewproduit_<?php echo $produit->pro_id;?>"><i class="icon-eye2" title="Aperçu"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
												
												<!-- <li><a href="#"><i class="icon-printer2"></i> Imprimer</a></li>
												<li class="divider"></li> -->
												<li><a href="#" data-toggle="modal" data-target="#editerproduit_<?php echo $produit->pro_id;?>"><i class="icon-pencil6"></i> Editer</a></li>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer ce produit ?')){location.href='<?php echo site_url('dashboard/deleteProduit/'.$produit->pro_id) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php } } } ?>
							
							
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

<!-- AJOUTER CLIENT -->
<div id="addproduit" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="modal-title">Ajouter un produit</div>
            </div>

            <div class="modal-body">
                <p>
                	<?php echo form_open_multipart('dashboard/addProduit'); ?>
                	<?php if($user_connected->usr_group==1){ ?>
		                 <div class="form-group">
		                    <label>Affectation de magasin</label>
		                    <select class="form-control col-lg-12" name="id_magasin">
		                        <option value="0">----------------------</option>
		                        <?php foreach ($magasins as $magasin) {?>
		                        <option value="<?php echo $magasin->id_magasin; ?>"><?php echo $magasin->label_magasin; ?></option>
		                        <?php }?>
		                    </select>
		                    <?php echo form_error('id_magasin','<span class="error">','</span>'); ?>
		                </div>
		            <?php } ?>
				<div class="form-group">
					<label class="control-label col-lg-2">Libellé du produit</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="pro_name">
						     <?php echo form_error('pro_name','<span class="error">','</span>'); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Prix du produit</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="pro_price">
						     <?php echo form_error('pro_price','<span class="error">','</span>'); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Détails du produit</label>
					<div class="col-lg-10">
						<textarea rows="3" cols="5" class="form-control" name="pro_description"></textarea>
						     <?php echo form_error('pro_description','<span class="error">','</span>'); ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Quantité</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="pro_stock">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Catégorie</label>
					<div class="col-lg-4">
						<select class="form-control" name="id_cat">
							<?php foreach ($categories as $categorie) { ?>
								<option value="<?php echo $categorie->id_cat; ?>"><?php echo $categorie->label_cat; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2">Image</label>
					<div class="col-lg-10">
						<input type="file" name="userfile" class="form-control">
					</div>
				</div>
				<input type="hidden" name="id_magasin" value="<?php echo $user_connected->id_magasin;?>">

				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ajouter </button>
				</div>
			<?php echo form_close(); ?>
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<?php foreach ($produits as $produit) { ?>
<!-- VOIR CLIENT -->
<div id="viewproduit_<?php echo $produit->pro_id;?>" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="modal-title">Voir le produit : <?php echo $produit->pro_name;?></div>
            </div>

            <div class="modal-body">
                <p>
                <div class="row">

					<div class="col-md-4 col-sm-4">
						<div class="panel panel-flat">
							<div class="panel-body">

								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo base_url();?>assets/uploads/<?php echo $produit->pro_image;?>" class="venobox vbox-item" data-vbgall="gallery01"><img src="<?php echo base_url();?>assets/uploads/<?php echo $produit->pro_image;?>" alt="" class="img-responsive"></a>
									</div>
								</div>

								<hr>

							</div>
						</div>
					</div>

					<div class="col-md-8 col-sm-8">
						<div class="panel panel-flat">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="x2"><?php echo $produit->pro_name;?></div>
									
										<span class="x5 text-light no-margin text-danger no-line-height"><?php echo $produit->pro_price;?></span>
										<h5 class="text-semibold text-uppercase">Catégorie : <?php echo $produit->label_cat;?></h5>
										<h5 class="text-semibold text-uppercase text-muted m-b-20">En stock : <?php echo $produit->pro_stock;?></h5>
								

										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="panel-body border-top border-top-grey-100">
								<h4 class="text-semibold text-uppercase">Description</h4>
								<p> <?php echo $produit->pro_description;?></p>
							</div>
						</div>
					</div>

				</div>
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<?php foreach ($produits as $produit) { ?>
<!-- EDITER CLIENT -->
<div id="editerproduit_<?php echo $produit->pro_id;?>" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="modal-title">Editer le produit : <?php echo $produit->pro_name;?></div>
            </div>

            <div class="modal-body">
                <p>
                  	<?php echo form_open_multipart('dashboard/updateProduit'); ?>
                  	<?php if($user_connected->usr_group==1){ ?>
		                 <div class="form-group">
		                    <label>Affectation de magasin</label>
		                    <select class="form-control col-lg-12" name="id_magasin">
		                        <option value="0">----------------------</option>
		                        <?php foreach ($magasins as $magasin) {?>
		                        <option value="<?php echo $magasin->id_magasin; ?>" <?php if($magasin->id_magasin==$produit->id_magasin){echo "selected";} ?>><?php echo $magasin->label_magasin; ?></option>
		                        <?php }?>
		                    </select>
		                </div>
		            <?php } ?>
				<div class="form-group">
					<label class="control-label col-lg-2">Libellé du produit</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="pro_name" value="<?php echo $produit->pro_name;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Prix du produit</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="pro_price" value="<?php echo $produit->pro_price;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Détails du produit</label>
					<div class="col-lg-10">
						<textarea rows="3" cols="5" class="form-control" name="pro_description"><?php echo $produit->pro_description;?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Quantité</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="pro_stock" value="<?php echo $produit->pro_stock;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">Catégorie</label>
					<div class="col-lg-4">
						<select class="form-control" name="id_cat">
							<?php foreach ($categories as $categorie) { ?>
								<option value="<?php echo $categorie->id_cat; ?>" <?php if($categorie->id_cat==$produit->id_cat){ echo "selected";} ?>><?php echo $categorie->label_cat; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					Ancienne image : <img src="<?php echo base_url();?>assets/uploads/<?php echo $produit->pro_image;?>" height="50">
					<label class="control-label col-lg-2">Image</label>
					<div class="col-lg-10">
						<input type="file" name="userfile" class="form-control">
					</div>
				</div>

				<input type="hidden" name="id_magasin" value="<?php echo $user_connected->id_magasin;?>">
			<!-- 	<div class="col-lg-12">
				Ajouter dans une varinte ?<input type="checkbox" value="1" id="variante">	
				</div>
				 -->
			<!-- 	<div class="form-group"> -->
				<div id="vVariante">
					<?php foreach ($variantes as $variante) { 
						$record = explode(",",$variante->content_variante);
										$name = $record[0]; ?>	
						<div class="form-group col-md-3" >
								<?php echo $variante->label_variante; ?>
								<input type="hidden" name="id_variante" value="<?php echo $variante->id_variante; ?>">
								<?php $i=0;
								$n = count($record);
								for($i=0;$i<$n; $i++){ ?>
									<div class="checkbox">
									  <label><input type="checkbox" value="<?php echo $variante->id_variante.",".$record[$i]; ?>" name="id_variante[]"><?php echo $record[$i]; ?></label>
								   </div>
							 <?php } ?>		
						</div>
					<?php } ?>
				<!-- </div> -->
				</div>
				<div class="form-group">
					<input type="hidden" name="pro_id" value="<?php echo $produit->pro_id;?>">
					<input type="hidden" name="pro_image" value="<?php echo $produit->pro_image;?>">
					<button type="submit" class="btn btn-primary">Modifier </button>
				</div>
			<?php echo form_close(); ?>
                </p>
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
<script type="text/javascript">
	$(document).ready(function(){ 
		 $("#vVariante").hide();
		  $("#variante").change(function () {
		  		if (this.checked)         //  ^
		            $("#vVariante").show();
		        else 
		             $("#vVariante").hide();
	           
	    	});
    });
</script>
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
