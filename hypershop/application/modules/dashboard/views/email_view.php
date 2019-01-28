<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des slides - African Village</title>


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
						<i class="icon-image3 position-left"></i> Slides
					</div>
					<ul class="breadcrumb">
						<li><a href="#"></a></li>
						<li>Accueil</li>
						<li class="active">Gestion des Slides</li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des slides</div>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addslide" style="float: right;margin-top: -30px;"><i class="icon-plus22 position-left text-right"></i> Ajouter un slide</button>
					</div>
				
                                <table class="table datatable table-striped">
						<thead>
							<tr>
                                <th>Image</th>
                                <th>Titres</th>
                                <th>Liens de redirection</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
						</thead>
						<tbody>
							<?php foreach ($slides as $slide) { ?>
							<tr>
                 <td><img src="<?php echo base_url(); ?>uploads/slides/<?php echo $slide->link_slide; ?>"class="img-responsive" style="height:50px;"> </td>
                 <td><?php echo $slide->label_slide; ?></td>
                 <td><?php echo $slide->link_redirection; ?></td>
								 <td><?php echo date("d/m/Y", strtotime($slide->date_slide)); ?></td>
                  <td><?php  
                                             if($slide->status==1){
                                               echo "Activé";
                                              }else{
                                               echo "Désactivé";
                                              } ?></td>
                                             <td><?php  
                                             if($slide->a_la_une==1){
                                               echo "1";
                                              }else{
                                               echo "2";
                                              } ?></td>
								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="#" data-toggle="modal" data-target="#editSlide_<?php echo $slide->id_slide; ?>"><i class="icon-eye2" title="Aperçu"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
                        <?php  if($slide->status==1){ ?>
												<li><a href="<?php echo site_url('dashboard/desactiverSlide/'.$slide->id_slide) ; ?>"><i class="icon-blocked"></i> Désactiver</a>
                        </li>
                      <?php }  if($slide->status==0){ ?>
                        <li><a href="<?php echo site_url('dashboard/activerSlide/'.$slide->id_slide) ; ?>"><i class="icon-checkmark3"></i> Activer</a>
                        </li>
                      <?php } ?>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer ce slide ?')){location.href='<?php echo site_url('dashboard/deleteSlide/'.$slide->id_slide) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li>
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
<div id="addslide" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un slide</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/addSlide');?>
                <div class="form-group">
                    <label>Selectionnez l'image de dimensions (700X375 en pixel)</label>
                    <input type="file" class="form-control" name="userfile">
                </div>

                <div class="form-group">
                    <label>Titre</label>
                    <input class="form-control" name="label_slide">
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
                <div class="input-group">
                  <label>Date</label> 
                  <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                  <input type="date" class="form-control datepicker-here" name="date_slide">
                </div>
                <div class="form-group">
                    <label>Lien de rédirection</label>
                    <input class="form-control" name="link_redirection">
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
<?php foreach ($slides as $slide) { ?>
<div id="editSlide_<?php echo $slide->id_slide; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modification d'un slide</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/updateSlide');?>
                <div class="form-group">
                  <input type="hidden" name="id_slide" value="<?php echo $slide->id_slide; ?>">
                   <b>Ancien slide</b>
                    <input type="hidden" name="link_slide" value="<?php echo $slide->link_slide; ?>">
                    <img src="<?php echo base_url(); ?>uploads/slides/<?php echo $slide->link_slide; ?>" width="auto" heght="auto" class="img-responsive"> <br>
                    <label>Selectionnez l'image de dimensions (700X375 en pixel)</label>
                    <input type="file" class="form-control" name="userfile">
                </div>

                <div class="form-group">
                    <label>Titre</label>
                    <input class="form-control" name="label_slide" value="<?php echo $slide->label_slide; ?>">
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
                 <div class="input-group">
                  <label>Date</label> 
                  <span class="input-group-addon"><i class="icon-calendar2"></i></span>
                  <input type="date" class="form-control datepicker-here" name="date_slide" value="<?php echo date("d/m/Y", strtotime($slide->date_slide)); ?>">
                </div>
                <div class="form-group">
                    <label>Lien de rédirection</label>
                    <input class="form-control" name="link_redirection" value="<?php echo $slide->link_redirection; ?>">
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
