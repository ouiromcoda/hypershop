<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des vidéos - African Village</title>


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
						<li class="active">Gestion des vidéos</li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des vidéos</div>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addvideo" style="float: right;margin-top: -30px;"><i class="icon-plus22 position-left text-right"></i> Ajouter une video</button>
					</div>
				
                                <table class="table datatable table-striped">
						<thead>
							<tr>
                                 <th>Titres</th>
                                <th>A la une</th>
                                <th>Actions</th>
                            </tr>
						</thead>
						<tbody>
							<?php foreach ($videos as $video) { ?>
							<tr>
								 <td><?php echo $video->label_video; ?></td>
								 <td><?php  
                                             if($video->a_la_une==1){
                                               echo "Oui";
                                              }else{
                                               echo "Non";
                                              } ?></td>
								
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="#" data-toggle="modal" data-target="#detailvideo_<?php echo $video->id_video; ?>"><i class="icon-eye2" title="Voir"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="#" data-toggle="modal" data-target="#editvideo_<?php echo $video->id_video;?>"><i class="icon-pencil6"></i> Editer</a></li>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer cette vidéo ?')){location.href='<?php echo site_url('dashboard/deletevideo/'.$video->id_video) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li>
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
<div id="addvideo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'une vidéo</h4>
      </div>
      <div class="modal-body">
        <p>

         <?php echo form_open_multipart('dashboard/video_upload');?>
                            <div class="form-group">
                              <label>Choisissez le type d'élement</label>
                              <select class="form-control" name="id_type_video" id="id_type_video">
                                <option value=""> ---- Votre choix ---- </option>
                                    <option value="1">Un fichier vidéo</option>
                                    <option value="2">Un lien vidéo (Youtube) </option>
                                
                              </select>
                            </div>
                            
                                                       
                            <div id="titre">
                                <div class="form-group">
                                    <label>Titre de la vidéothèque</label>
                                    <input class="form-control" name="label_video">
                                    <?php echo form_error('label_video','<span class="error">','</span>'); ?>
                                </div>
                                <div class="form-group">
                            <label>Catégories</label>
                            <select class="form-control" name="id_category">
                                <?php foreach ($types as $type) {?>
                                <option value="<?php echo $type->id_type; ?>"><?php echo $type->label; ?></option>
                                <?php }?>
                            </select>
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
                            </div>
                            <div id="lien">
                                <div class="form-group lien">
                                <label>Lien de la vidéothèque</label>
                                <input class="form-control" id="link_video" name="link_video" placeholder="https://youtube.com/?watch=vjd668221">
                                <?php echo form_error('link_video','<span class="error">','</span>'); ?>
                            </div>
                            </div>
                            <div id="file_upload">
                                <div class="form-group">
                                    <label>Uploadez votre vidéo</label>
                                    <input type="file" class="form-control" name="userfile">
                                </div>
                            </div>
                            
                            
                             <input type="hidden" name="id_user">
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
 <?php foreach ($videos as $video) { ?>
    <div id="editvideo_<?php echo $video->id_video; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editer la video<?php echo $video->label_video; ?> </h4>
          </div>
          <div class="modal-body">
            <p>
              <div class="row">
                
                  <?php if($video->link_video!=null) {
                    $code=substr($video->link_video, 32,strlen($video->link_video));?>
                 <center><iframe width="510" height="510" src="https://www.youtube.com/embed/<?php echo $code; ?>" frameborder="0" allowfullscreen></iframe></center>  
              <?php } ?>

               <?php if($video->video_path!=null) {?>
                <center><embed  width="510" height="510" src="<?php echo base_url()."uploads/video/".$video->video_path; ?>" CONTROLLER="true" LOOP="false" AUTOPLAY="false"></embed></center>  
              <?php } ?>
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
  <?php foreach ($videos as $video) { ?>
    <div id="detailvideo_<?php echo $video->id_video; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Détails sur la vidéothèque<?php echo $video->label_video; ?> </h4>
          </div>
          <div class="modal-body">
            <p>
              <div class="row">
                
                  <?php if($video->link_video!=null) {
                    $code=substr($video->link_video, 32,strlen($video->link_video));?>
                 <center><iframe width="510" height="510" src="https://www.youtube.com/embed/<?php echo $code; ?>" frameborder="0" allowfullscreen></iframe></center>  
              <?php } ?>

               <?php if($video->video_path!=null) {?>
                <center><embed  width="510" height="510" src="<?php echo base_url()."uploads/video/".$video->video_path; ?>" CONTROLLER="true" LOOP="false" AUTOPLAY="false"></embed></center>  
              <?php } ?>
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
        $( document ).ready(function() {
            $('#titre').hide();
            $('#lien').hide();
            $('#file_upload').hide();
        });
       $('#id_type_video').change(function() {
        var id_type_video = $(this).val();

        if (id_type_video == '1') {
             $('#titre').show();
             $('#file_upload').show();
             $('#lien').hide();
        }
        else if (id_type_video == '2') {
             $('#file_upload').hide();
             $('#titre').show();
             $('#lien').show();
             
        }
        else{
          $('#titre').hide();
            $('#lien').hide();
            $('#file_upload').hide();

        }
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
