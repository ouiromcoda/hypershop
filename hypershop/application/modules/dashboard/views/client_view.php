<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
	<title>Gestion des clients - HyperSHOP</title>


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
						<li class="active">Gestion des clients</li>
					</ul>
				</div>
			</div>
			<!--/Page Header-->

			<div class="container-fluid page-content">

				<!-- Basic datatable -->
				<div class="panel panel-flat table-responsive">
					<div class="panel-heading">
						<div class="panel-title">Liste des clients</div>
					</div>
					<table class="table datatable table-striped">
						<thead>
							<tr>
								<th>Civilité</th>
								<th>Noms</th>
								<th>Prénoms</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user) {
								if($user->usr_group==3){?>
							<tr>
								<td><?php if($user->usr_civilite==1){ echo "Mr.";} if($user->usr_civilite==2){ echo "Mme/Mlle.";}  ?></td>
								<td><?php echo $user->usr_name; ?></td>
								<td>
									<?php echo $user->usr_surname; ?>
								</td>
								
							<td class="text-center">
									<ul class="icons-list">
										<li><a href="#" data-toggle="modal" data-target="#viewClient_<?php echo $user->usr_id;?>"><i class="icon-eye2" title="Aperçu"></i></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
											<ul class="dropdown-menu dropdown-menu-right">											
												<li><a href="#"><i class="icon-pencil6"></i> Editer</a></li>
												<li><a href="#"><i class="icon-trash"></i> Supprimer</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php } } ?>
							
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

<?php foreach ($users as $user) { ?>
<!-- VOIR CLIENT -->
<div id="viewClient_<?php echo $user->usr_id;?>" class="modal fade" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="modal-title"><?php echo $user->usr_surname." ".$user->usr_name; ?></div>
            </div>

            <div class="modal-body">
                <p>
                	<div class="col-lg-12">
                				<div class="panel-body text-center">
							<h1 class="m-t-20 text-light text-center x4"><?php if($user->usr_civilite==1){ echo "Mr.";} if($user->usr_civilite==2){ echo "Mme/Mlle.";}  ?> <?php echo $user->usr_surname." ".$user->usr_name; ?></h1>
						</div>

						<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 p-b-30">
							<div class="clearfix border-bottom border-grey-100 p-t-15 p-b-15">
								<h5 class="text-grey no-margin">Contact</h5>
								<h4 class="pull-left no-margin"><?php echo $user->usr_telephone; ?></h4>
							</div>

							<div class="clearfix border-bottom border-grey-100 p-t-15 p-b-15">
								<h5 class="text-grey no-margin">Email</h5>
								<h4 class="pull-left no-margin"><?php echo $user->usr_email; ?></h4>
							</div>

							<div class="clearfix border-bottom border-grey-100 p-t-15 p-b-15">
								<h5 class="text-grey no-margin ">Lieu d'habitation</h5>
								<h4 class="pull-left no-margin"><?php echo $user->usr_telephone; ?></h4>
							</div>

							<div class="clearfix border-bottom border-grey-100 p-t-15 p-b-15">
								<h5 class="text-grey no-margin">Date d'insciption</h5>
								<h4 class="pull-left no-margin"><?php echo date("d/m/Y à H:i:s",strtotime($user->created_at)); ?></h4>
							</div>

							<div class="clearfix border-bottom border-grey-100 p-t-15 p-b-15">
								<h5 class="text-grey no-margin">Adresse</h5>
								<h4 class="pull-left no-margin"><?php echo $user->usr_adresse; ?></h4>
							</div>
						</div>
                	</div>
                	
				<div class="col-lg-12">
                		<h4 class="text-semibold text-uppercase">Dernières commandes</h4>
                		<table class="table datatable-button-init-basic">
                  <thead>
                    <tr>
                  <!--     <th class="col-md-1 col-sm-1">Image</th>
                      <th>Produit</th> -->
                      <th>Date</th>
                      <th>Code Pickup</th>
                      <th>Numéro Pickup</th>                      
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=0;
                    foreach ($factures as $facture) { 
                    	if($facture->user_id==$user->usr_id){?>
                        <tr>
                          <td><?php echo date("d/m/Y à H:i:s",strtotime($facture->created_at)); ?></td>
                          <td><?php echo $facture->codepikup; ?></td>
                          <td><?php echo $facture->numero_pickup; ?></td>
                           <td>
                            <?php 
                            switch ($facture->status) {
                                 case 'paye_livre':
                                   $color="success";
                                   $text="Payée et Livrée";
                                  break;
                               case 'paye_nonlivre':
                                  $color="info";
                                  $text="Payée et non Livrée";
                                  break;
                                
                              }
                                                 ?>
                           <span class="badge bg-<?php if(isset($color)){echo $color;}?>-400 p-l-10 p-r-10"><?php if(isset($text)){echo $text;} ?></span>
                          </td>
                        </tr>
                   <?php if (++$i == 5) break;}} ?>


                   
                  </tbody>
                </table>
                	</div>
						<div class="clearfix"></div>
					
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

<?php $this->load->view('dashboard/template/script'); ?>

</body>

</html>
