<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des partenaires - African Village</title>


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
						<i class="icon-image3 position-left"></i> Partenaires
					</div>
					<ul class="breadcrumb">
						<li><a href="#"></a></li>
						<li>Accueil</li>
						<li class="active">Gestion des partenaires</li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des partenaires</div>
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
                        <?php }?>   <?php if($this->session->flashdata('img_error')){?>
	                        <?php echo $this->session->flashdata('img_error'); ?>
	                       </div>
                        <?php }?>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpartner"><i class="fa fa-plus-square  fa-fw"></i> Ajouter un partenaire</button>
					</div>
				
                                <table class="table datatable table-striped">
						<thead>
						 <tr>
                                            <th>Noms</th>
                                            <th>Site internet</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
						</thead>
						<tbody>
							<?php foreach ($partners as $partner) { ?>
                                        <tr class="odd gradeX">
                                            <td><img src="<?php echo base_url(); ?>uploads/slides/<?php echo $partner->image_partner; ?>"  style="height:50px;" class="img-responsive"></td>
                                            <td><?php echo $partner->label_partner; ?></td>
                                             <td> <?php echo $partner->link_site_partner; ?></td>
                                              <td><?php  
                                             if($partner->a_la_une==1){
                                               echo "1ère position";
                                              }else{
                                               echo "Posiition aléatoire";
                                              } ?></td>
        								<td class="text-center">
        									<ul class="icons-list">
        										<li class="dropdown">
        											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
        											<ul class="dropdown-menu dropdown-menu-right">
        												<li><a href="" <a href=""data-toggle="modal" data-target="#editpartner_<?php echo $partner->id_partner; ?>" title="Editer"> Editer</a>
                                </li>
                              
        												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer ce partenaire ?')){location.href='<?php echo site_url('dashboard/deletepartner/'.$partner->id_partner) ; ?>'; return true;} else {return false;}" title="Supprimer><i class="icon-trash"></i> Supprimer</a></li>
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
<div id="addpartner" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un partenaire</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/addPartner');?>
                <div class="form-group">
                    <label>Selectionnez le logo du partenaire</label>
                    <input type="file" class="form-control" name="userfile">
                </div>

                <div class="form-group">
                    <label>Nom du partenaire</label>
                    <input class="form-control" name="label_partner">
                </div>
                <div class="form-group">
                    <label>Lien du site internet du partenaire</label>
                    <input class="form-control" name="link_site_partner">
                </div>
                <div class="form-group">
                    <label>Mettre à l'une</label>                              
                     <label class="radio-inline">
                      <input type="radio" name="a_la_une" value="1">Oui
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="a_la_une" value="0">Non
                    </label>
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
<?php foreach ($partners as $partner) { ?>
<div id="editpartner_<?php echo $partner->id_partner; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modification d'un partner</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/updatePartner');?>
                <div class="form-group">
                  <input type="hidden" name="id_partner" value="<?php echo $partner->id_partner; ?>">
                   <b>Ancien logo</b>
                    <input type="hidden" name="image_partner" value="<?php echo $partner->image_partner; ?>">
                    <img src="<?php echo base_url(); ?>uploads/slides/<?php echo $partner->image_partner; ?>" width="auto" heght="auto" class="img-responsive"> <br>
                    <label>Selectionnez le logo</label>
                    <input type="file" class="form-control" name="userfile">
                </div>

                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" name="label_partner" value="<?php echo $partner->label_partner; ?>">
                </div>
                <div class="form-group">
                    <label>Lien du site internet</label>
                    <input class="form-control" name="link_site_partner" value="<?php echo $partner->link_site_partner; ?>">
                </div>
                <div class="form-group">
                    <label>Mettre à l'une</label>                              
                     <label class="radio-inline" >
                      <input type="radio" name="a_la_une" value="1">Oui
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="a_la_une" value="0">Non
                    </label>
                </div>
                 <div class="form-group" style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Modifier</button>
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
 <?php } ?>
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

<script src="<?php echo base_url();?>assets/dashboard/lib/js/forms/datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/forms/datepicker.en.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/pages/forms/picker_date.js"></script>

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
