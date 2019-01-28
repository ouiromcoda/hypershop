<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des magasins - HyperSHOP</title>


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
						<i class="icon-home position-left"></i> Magasins
					</div>
					<ul class="breadcrumb">
						<li><a href="#"></a></li>
						<li>Accueil</li>
						<li class="active">Gestion des magasins</li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des magasins</div>
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

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmagasin"><i class="fa fa-plus-square  fa-fw"></i> Ajouter un magasin</button>
					</div>
				
                                <table class="table datatable table-striped">
						<thead>
						 <tr>
                  <th>Noms</th>
                  <th>Villes</th>
                  <th>Précisions</th>
                  <th>Contact</th>
                  <th>Actions</th>
              </tr>
						</thead>
						<tbody>
							<?php foreach ($magasins as $magasin) { ?>
                                        <tr class="odd gradeX">
                                       
                                            <td><?php echo $magasin->label_magasin; ?></td>
                                            <td><?php echo $magasin->label_ville; ?></td>
                                             <td> <?php echo $magasin->adresse_magasin; ?></td>
                                             <td> <?php echo $magasin->contact_magasin; ?></td>
                                            
                      								<td class="text-center">
                      									<ul class="icons-list">
                      										<li class="dropdown">
                      											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                      											<ul class="dropdown-menu dropdown-menu-right">
                      												<li><a href="" <a href=""data-toggle="modal" data-target="#editmagasin_<?php echo $magasin->id_magasin; ?>" title="Editer"> Editer</a>
                                              </li>
                                            
                      												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer ce magasin ?')){location.href='<?php echo site_url('dashboard/deleteMagasin/'.$magasin->id_magasin) ; ?>'; return true;} else {return false;}" title="Supprimer><i class="icon-trash"></i> Supprimer</a></li>
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
<div id="addmagasin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un magasin</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/addMagasin');?>
                 <div class="form-group">
                        <label>Ville</label>
                        <select class="form-control col-lg-12" name="id_ville">
                            <option value="0">----------------------</option>
                            <?php foreach ($villes as $ville) {?>
                            <option value="<?php echo $ville->id_ville; ?>"><?php echo $ville->label_ville. " (Région : ".$ville->region_ville. ")"; ?></option>
                            <?php }?>
                        </select>
                </div>
                <div class="form-group">
                        <label>Commune</label>
                        <select class="form-control col-lg-12" name="id_ville" id="listeCommune">
                         
                        </select>
                </div>

                <div class="form-group">
                    <label>Nom du magasin</label>
                    <input class="form-control" name="label_magasin">
                </div>
                <div class="form-group">
                    <label>Localisation du magasin</label>
                    <input class="form-control" name="adresse_magasin">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input class="form-control" name="contact_magasin">
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
<?php foreach ($magasins as $magasin) { ?>
<div id="editmagasin_<?php echo $magasin->id_magasin; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modification d'un magasin</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/updatemagasin');?>
                <div class="form-group">
                        <label>Ville</label>
                        <select class="form-control col-lg-12" name="id_ville" id="id_ville">
                            <option value="0">----------------------</option>
                            <?php foreach ($villes as $ville) {?>
                            <option value="<?php echo $ville->id_ville; ?>" <?php if($ville->id_ville==$magasin->id_ville){ echo "selected";} ?>><?php echo $ville->label_ville. " (Région : ".$ville->region_ville. ")"; ?></option>
                            <?php }?>
                        </select>
                    </div>
                <div class="form-group">
                    <label>Nom du magasin</label>
                    <input class="form-control" name="label_magasin" value="<?php echo $magasin->label_magasin; ?>">
                </div>
                <div class="form-group">
                    <label>Localisation du magasin</label>
                    <input class="form-control" name="adresse_magasin" value="<?php echo $magasin->adresse_magasin; ?>">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input class="form-control" name="contact_magasin" value="<?php echo $magasin->contact_magasin; ?>">
                </div>


                 <div class="form-group" style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                 </div>
                <input type="hidden" name="id_magasin" value="<?php echo $magasin->id_magasin; ?>">
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

<script type="text/javascript">
   $('#id_ville').change(function(){

            id_ville=$('#id_ville').val();  

               $("#listeCommune").html('');
               $.ajax({
                   url: '<?=base_url()?>dashboard/getcommuneVille/'+id_ville,
                   type: 'POST',
                  /* data: data,*/
                   contentType: 'application/json',
                   success: function(data)
                   {
                     var rep = JSON.parse(data);
                     console.log(rep);
                     if(rep.content!==null){
                        tabledata='';
                        for (var i =0; i < rep.content.length; i++) {  
                         $("#souscompte").text(rep.content[i].DESCRIPTION_SCPT);                                                 
                           tabledata+="<option value="+rep.content[i].ID_SCPT+">";
                           tabledata+=rep.content[i].DESCRIPTION_SCPT;
                           tabledata+="</option>";
                           console.log(rep.content[i]);
                        }
                        $("#listeCommune").html(tabledata);
                     }
                   }
               });
          });
</script>

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
