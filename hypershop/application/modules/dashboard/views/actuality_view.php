<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des actualities - African Village</title>


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
						<li class="active">Gestion des actualities</li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des actualities</div>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcategory" style="float: right;margin-top: -30px;"><i class="icon-plus22 position-left text-right"></i> Ajouter une catégorie d'actualité</button>&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addActuality" style="float: right;margin-top: -30px;"><i class="icon-plus22 position-left text-right"></i> Ajouter une actualité</button>
					</div>
					<table class="table datatable table-striped">
						<thead>
							<tr>
								   <th>Titres</th>
                                    <th>Catégories</th>
                                    <th>Contenus</th>
                                    <th>Ajoutée</th>
                                    <th>Date</th>
                                    <th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($actualities as $actuality) { ?>
							<tr>
								<td><?php echo $actuality->label_actuality; ?></td>
                                            <td><?php echo $actuality->label; ?></td>
                                            <td><?php echo substr($actuality->description_actuality, 0,60)."...."; ?></td>
                <td class="center"><?php echo $actuality->usr_name; ?></td>
								<td class="center"><?php echo date("d/m/Y à h:m:i", strtotime($actuality->created_at)); ?></td>
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="#" data-toggle="modal" data-target="#detailActu_<?php echo $actuality->id_actuality; ?>"><i class="icon-eye2" title="Aperçu"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
												
												<!-- <li><a href="#"><i class="icon-printer2"></i> Imprimer</a></li>
												<li class="divider"></li> -->
												<li><a href="#"  data-toggle="modal" data-target="#editActu_<?php echo $actuality->id_actuality; ?>"><i class="icon-pencil6"></i> Editer</a></li>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer cette actualité ?')){location.href='<?php echo site_url('dashboard/deleteActualite/'.$actuality->id_actuality) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li>
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

		</section>
		<!-- /Page Container ends -->

		<!-- ScrolltoTop -->
		<a id="scrollTop" href="#top"><i class="icon-arrow-up12"></i></a>
		<!-- /ScrolltoTop -->

	</div>
<div id="addActuality" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'une actualité</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/addActualite');?>
                <div class="form-group">
                    <label>Titre</label>
                    <input class="form-control" name="label_actuality">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description_actuality" class="form-control" placeholder="Entrez votre contenu ..."></textarea>
                </div>
                <div class="form-group">
                    <label>Image (Dimension 700 x 400)</label>
                    <input type="file" class="form-control" name="userfile">
                </div>
                
                <div class="form-group">
                    <label>Catégories</label>
                    <select class="form-control" name="id_type_actuality">
                        <?php foreach ($types as $type) {?>
                        <option value="<?php echo $type->id_type; ?>"><?php echo $type->label; ?></option>
                        <?php }?>
                    </select>
                </div>
                 <div class="form-group" style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                 </div>
                
            <?php echo form_close();?>
        </p>
      </div>
    </div>

  </div>
</div>

 <?php foreach ($actualities as $actuality) { ?>
        <div id="editActu_<?php echo $actuality->id_actuality; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modification de <?php echo $actuality->label_actuality; ?> </h4>
              </div>
              <div class="modal-body">
                <p>

                    <?php echo form_open_multipart('dashboard/updateActualite');?>
                        <div class="form-group">
                            <label>Titre</label>
                             <input type="hidden" name="id_actuality" value="<?php echo $actuality->id_actuality; ?>">
                            <input class="form-control" name="label_actuality" value="<?php echo $actuality->label_actuality; ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description_actuality" class="form-control"><?php echo $actuality->description_actuality; ?></textarea>
                        </div>
                        <div class="form-group">
                            <b>Ancienne image à la une</b>
                    <input type="hidden" name="actuality_image" value="<?php echo $actuality->actuality_image; ?>">
                    <img src="<?php echo base_url(); ?>uploads/actualite/<?php echo $actuality->actuality_image; ?>" width="100" heght="100"> <br>
                            <label>Image (Dimension 700x400)</label>
                            <input type="file" class="form-control" name="userfile">
                        </div>
                        
                        <div class="form-group">
                            <label>Catégories</label>
                            <select class="form-control" name="id_type_actuality">
                                <?php foreach ($types as $type) {?>
                                <option value="<?php echo $type->id_type; ?>"><?php echo $type->label; ?></option>
                                <?php }?>
                            </select>
                        </div>
                         <div class="form-group" style="text-align:center;">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                         </div>
                        
                    <?php echo form_close();?>
                </p>
              </div>
            </div>

          </div>
        </div>
    <?php } ?>

 <?php foreach ($actualities as $actuality) { ?>
    <div id="detailActu_<?php echo $actuality->id_actuality; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Détails sur <b><?php echo $actuality->label_actuality; ?></b></h4>
          </div>
          <div class="modal-body">
            <p><img src="<?php echo base_url(); ?>uploads/actualite/<?php echo $actuality->actuality_image; ?>"  class="img-responsive"><br>
                <?php echo $actuality->description_actuality; ?>
                </p>
                <p>Ajouté par <b><?php echo $actuality->usr_name; ?></b>,  le <?php echo date('d/m/Y à h:m:i', strtotime($actuality->created_at)); ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>
<?php } ?>

<div id="addcategory" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un type actualité</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/addCatActualite');?>
                <div class="form-group">
                    <label>Titre</label>
                    <input class="form-control" name="label">
                </div>
                 <div class="form-group" style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                 </div>
                
            <?php echo form_close();?>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
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
