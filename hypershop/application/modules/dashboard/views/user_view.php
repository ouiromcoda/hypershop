<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des utilisateurs - HyperSHOP</title>


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
						<i class="icon-user position-left"></i> Utilisateurs
					</div>
					<ul class="breadcrumb">
						<li><a href="#"></a></li>
						<li>Accueil</li>
						<li class="active">Gestion des Utilisateurs </li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des Utilisateurs</div>
						 <?php if($this->session->userdata('add')){?>
                          <div class="alert alert-success" role="alert" id="add">
	                        <strong>Bravo !</strong>  <?php echo $this->session->userdata('add'); ?>
	                       </div>
                        <?php }?>
                        <?php if($this->session->userdata('update')){?>
                          <div class="alert alert-success" role="alert" id="update">
	                        <strong>Bravo !</strong>  <?php echo $this->session->userdata('update'); ?>
	                       </div>
                        <?php }?>
                         <?php if($this->session->userdata('delete')){?>
                          <div class="alert alert-danger" role="alert" id="delete">
	                        <strong>Bravo !</strong>  <?php echo $this->session->userdata('delete'); ?>
	                       </div>
                        <?php }?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser" style="float: right;margin-top: -30px;"><i class="icon-plus22 position-left text-right"></i> Ajouter un utilisateur</button>
					</div>
					<table class="table datatable table-striped">
						<thead>
							<tr>
								    <th>Noms</th>
                                    <th>Prénoms</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user) {
                if($user->usr_group==1 or $user->usr_group==2){?>
							<tr>
								<td>
									<?php echo $user->usr_name; ?>
								</td>
								<td>
									<?php echo $user->usr_surname; ?>
								</td>
								<td>
									<?php echo $user->label_role; ?>
								</td>
								<td class="text-center">
									<ul class="icons-list">
										<li><a href="" data-toggle="modal" data-target="#detailUser_<?php echo $user->usr_id; ?>"><i class="icon-eye2" title="Aperçu"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="" data-toggle="modal" data-target="#edituser_<?php echo $user->usr_id; ?>" title="Editer"><i class="icon-pencil6"></i> Editer</a></li>
												<li><a href="#" onClick="javascript:if(window.confirm('Voulez-vous supprimer cet utilisateur ?')){location.href='<?php echo site_url('dashboard/deleteUtilisateur/'.$user->usr_id) ; ?>'; return true;} else {return false;}"><i class="icon-trash"></i> Supprimer</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php }} ?>

							
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


<div id="addUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un utilisateur</h4>
      </div>
      <div class="modal-body">
        <p>

            <?php echo form_open_multipart('dashboard/addUtilisateur');?>
              <div class="form-group">
                    <label>Affectation de magasin</label>
                    <select class="form-control" name="id_magasin">
                        <option value="0">----------------------</option>
                        <?php foreach ($magasins as $magasin) {?>
                        <option value="<?php echo $magasin->id_magasin; ?>"><?php echo $magasin->label_magasin; ?></option>
                        <?php }?>
                    </select>
                </div> 
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" name="usr_name">
                    <?php echo form_error('usr_name','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" name="usr_surname">
                    <?php echo form_error('usr_surname','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" name="usr_email">
                    <?php echo form_error('usr_email','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="usr_password">
                    <?php echo form_error('usr_password','<font color="red">','</font>'); ?>
                </div>

                <div class="form-group">
                    <label>Image de profil</label>
                    <input type="file" class="form-control" name="userfile">
                    <?php echo form_error('userfile','<font color="red">','</font>'); ?>
                </div>
                
                <div class="form-group">
                    <label>Type d'utilisateur</label>
                    <select class="form-control" name="id_role">
                        <?php foreach ($roles as $role) {?>
                        <option value="<?php echo $role->id_role; ?>"><?php echo $role->label_role; ?></option>
                        <?php }?>
                    </select>
                </div>
                 <div class="form-group" style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                 </div>
                
            <?php echo form_close()?>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
 <?php foreach ($users as $user) { ?>
    <div id="detailUser_<?php echo $user->usr_id; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Détails de l'utilisateur <b><?php echo $user->usr_name; ?></b></h4>
          </div>
          <div class="modal-body">
            <p><img src="<?php echo base_url(); ?>uploads/utilisateur/<?php echo $user->usr_photo; ?>" class="img-responsive"> <br>
                <b>Nom</b> : <?php echo $user->usr_name; ?> <br>
                <b>Prénom</b> : <?php echo $user->usr_surname; ?> <br>
                <b>Email</b> : <?php echo $user->usr_email; ?> <br>
                <b>Rôle</b> : <?php echo $user->label_role; ?> <br>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>
 <?php } ?>

 <?php foreach ($users as $user) { ?>
    <div id="edituser_<?php echo $user->usr_id; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modifier l'utilisateur <b><?php echo $user->usr_name; ?></b></h4>
          </div>
          <div class="modal-body">
            <p>
               <?php echo form_open_multipart('dashboard/updateUtilisateur');?>
               <input type="hidden" name="usr_id" value="<?php echo $user->usr_id; ?>">
             <div class="form-group">
                    <label>Affectation de magasin</label>
                    <select class="form-control" name="id_magasin">
                        <option value="0">----------------------</option>
                        <?php foreach ($magasins as $magasin) {?>
                        <option value="<?php echo $magasin->id_magasin; ?>" <?php if($magasin->id_magasin==$user->id_magasin){echo "selected";} ?>><?php echo $magasin->label_magasin; ?></option>
                        <?php }?>
                    </select>
                </div> 
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" name="usr_name" value="<?php echo $user->usr_name; ?>">
                    <?php echo form_error('usr_name','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" name="usr_surname" value="<?php echo $user->usr_surname; ?>">
                    <?php echo form_error('usr_surname','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" name="usr_email" value="<?php echo $user->usr_email; ?>">
                    <?php echo form_error('usr_email','<font color="red">','</font>'); ?>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="usr_password" value="<?php echo $user->usr_password; ?>">
                    <?php echo form_error('usr_password','<font color="red">','</font>'); ?>
                </div>

                <div class="form-group">
                    <b>Ancienne image</b>
                    <input type="hidden" name="usr_photo" value="<?php echo $user->usr_photo; ?>">
                    <img src="<?php echo base_url(); ?>uploads/utilisateur/<?php echo $user->usr_photo; ?>" width="100" heght="100"> <br>

                    <label>Image de profil</label>
                    <input type="file" class="form-control" name="userfile">
                    <?php echo form_error('picture_user','<font color="red">','</font>'); ?>
                </div>
                
                <div class="form-group">
                    <label>Type d'utilisateur</label>
                    <select class="form-control" name="id_role">
                        <?php foreach ($roles as $role) {?>
                        <option value="<?php echo $role->id_role; ?>" <?php if($role->id_role==$user->usr_group){echo "selected";} ?>><?php echo $role->label_role; ?></option>
                        <?php }?>
                    </select>
                </div>
                 <div class="form-group" style="text-align:center;">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                 </div>
                
            <?php echo form_close()?>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>
 <?php } ?>
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
