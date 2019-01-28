<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#1C2B36" />
  <title>Tableau de bord -HyperSHOP</title>


    <!-- Global stylesheets -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/css/main.css">
    <!-- /Global stylesheets -->

  <!-- Page css -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/assets/icons/weather/weather-icons.min.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/lib/assets/icons/weather/weather-icons-wind.min.css">
  <!-- /page css -->
</head>
<body id="top">

<!-- Preloader -->
<!-- <div id="preloader">
  <div id="status">
    <div class="loader"></div>
  </div>
</div> -->
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
          <div class="page-title"><i class="icon-home"></i> Tableau de bord</div>
        </div>
      </div>
      <!-- /Page Header-->
      <?php if($this->session->flashdata('add')){?>
          <div class="alert alert-success" role="alert" id="add">
          <strong>Bravo !</strong>  <?php echo $this->session->flashdata('add'); ?>
         </div>
        <?php }?>
      <div class="container-fluid page-content">

        <div class="row">

          <div class="col-md-12 col-sm-12">
            <?php if($user_connected->usr_group==1){ ?>
            <div class="row">
                 <div class="col-md-6 col-sm-6">

                <!-- Total sales -->
                <div class="panel panel-flat bg-purple-a200">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-8">Ventes confirmées</h5>
                  </div>
                   <div class="panel-body">
                    <div class="row m-b-10">
                     <!--  <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-coin-dollar x5 text-alpha-4"></i>
                      </div> -->
                      
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x5 text-light no-line-height text-right"><small class="x2 position-left"></small><?php echo number_format($ventes_solde->total,0," "," "); ?></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <!-- /Total sales -->

              </div>
              <div class="col-md-6 col-sm-6">

                <!-- Revenue -->
                <div class="panel panel-flat bg-purple-a200">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-8">Ventes non-confirmées</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row m-b-10">
                    <!--   <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-coin-dollar x5 text-alpha-4"></i>
                      </div> -->
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x5 text-light no-line-height text-right"><small class="x2 position-left"></small><?php echo number_format($ventes_reel->total,0," "," "); ?></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <!-- /Revenue -->

              </div>
         
            </div>

            <div class="row">
                   <div class="col-md-3 col-sm-6">

                <!-- factures received -->
                <div class="panel panel-flat bg-purple-a200">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-4">Nombre de clients</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row m-b-10">
                     <!--  <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-user2 x5 text-alpha-2"></i>
                      </div> -->
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x6 text-light no-line-height text-alpha-9 text-right"><?php echo count($count_client); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /factures received -->

              </div>
           
              <div class="col-md-3 col-sm-6">

                <!-- Total profits -->
                <div class="panel panel-flat bg-teal-700">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-8">Nombre d'articles vendus</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row m-b-10">
                     <!--  <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-wallet x5 text-alpha-4"></i>
                      </div> -->
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x5 text-light no-line-height text-right"><small class="x2 position-left"></small><?php echo count($count_client); ?></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <!-- /Total profits -->

              </div>
              <div class="col-md-3 col-sm-6">

                <!-- factures received -->
                <div class="panel panel-flat bg-purple-a200">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-4">Nombre de magasins</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row m-b-10">
                     <!--  <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-user2 x5 text-alpha-2"></i>
                      </div> -->
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x6 text-light no-line-height text-alpha-9 text-right"><?php echo count($magasins); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /factures received -->

              </div>
              <div class="col-md-3 col-sm-6">

                <!-- Total sales -->
                <div class="panel panel-flat bg-amber-600">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-8">Nombre de ventes</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row m-b-10">
                     <!--  <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-price-tags x5 text-alpha-4"></i>
                      </div> -->
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x6 text-light no-line-height text-right"> <?php echo count($ventes); ?></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <!-- /Total sales -->

              </div>
             
            </div>
          <?php } ?>

           <?php if($user_connected->usr_group==2){ ?>
            <div class="row">
              <div class="col-md-6 col-sm-6">

                <!-- factures received 
                <div class="panel panel-flat bg-purple-a200">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-4">Nombre de comptes crées</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row m-b-10">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-user2 x5 text-alpha-2"></i>
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x6 text-light no-line-height text-alpha-9 text-right"><?php echo count($count_client); ?></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-6 col-sm-6">

                <div class="panel panel-flat bg-amber-600">
                  <div class="panel-heading">
                    <h5 class="text-uppercase text-semibold text-alpha-8">Nombre de ventes</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row m-b-10">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                        <i class="icon-price-tags x5 text-alpha-4"></i>
                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="x6 text-light no-line-height text-right"> <?php echo number_format($ventes->price,0," "," "); ?></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                 /Total sales -->

              </div>
            </div>
          <?php } ?>
          </div>

     
        </div>


        <div class="row">
          <div class="col-md-12">

            <!-- Recent factures -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h4 class="text-semibold text-uppercase">Les dernières commandes</h4>
              </div>
              <div class="table-responsive">
                  <table class="table datatable-button-init-basic">
                  <thead>
                    <tr>
                  <!--     <th class="col-md-1 col-sm-1">Image</th>
                      <th>Produit</th> -->
                      <th>Date</th>
                      <th>Code Pickup</th>
                      <th>Numéro Pickup</th>                      
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($user_connected->usr_group==1){ 
                    $i=0;
                    foreach ($factures as $facture) { ?>
                        <tr>
                        <!--   <td><img src="<?php echo base_url();?>assets/uploads/<?php echo $facture->pro_image; ?>" class="img-responsive" alt="product" style="width:70px"/></td>
                          <td><?php echo $facture->pro_name; ?></td> -->
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
                              <td>                          
                            <a href="" title="Voir la commande" data-toggle="modal" data-target="#voirCommande_<?php echo $facture->id;?>"><i class="icon icon-eye2"></i></a> 

                            <a href="#" title="Imprimer le bon de livraison"><i class="icon icon-printer22"></i></i></a> 
                           </td>
                        </tr>
                   <?php if (++$i == 5) break;} ?>

                    <?php } ?>

                    <!-- Sous-administrateur   -->
                    <?php if($user_connected->usr_group==2){

                    foreach ($factures as $facture) {
                    if($user_connected->id_magasin==$facture->id_magasin){ ?>
                          <tr>
                        <!--   <td><img src="<?php echo base_url();?>assets/uploads/<?php echo $facture->pro_image; ?>" class="img-responsive" alt="product" style="width:70px"/></td>
                          <td><?php echo $facture->pro_name; ?></td> -->
                          <td><?php echo date("d/m/Y à H:i:s",strtotime($facture->created_at)); ?></td>
                          <td><?php echo $facture->codepikup; ?></td>
                          <td><?php echo $facture->numero_pickup; ?></td>
                           <td>
                            <?php switch ($facture->status) {
                                case 'paye_livre':
                                   $color="success";
                                   $text="Payée et Livrée";
                                  break;
                               case 'paye_nonlivre':
                                  $color="info";
                                  $text="Payée et non Livrée";
                                  break;
                                
                              } ?>
                            <span class="badge bg-<?php if(isset($color)){echo $color;}?>-400 p-l-10 p-r-10"><?php if(isset($text)){echo $text;} ?></span>
                          </td>
                           <td>                          
                            <a href="" title="Voir la commande" data-toggle="modal" data-target="#voirCommande_<?php echo $facture->id;?>"><i class="icon icon-eye2"></i></a> 
                           </td>
                        </tr>
                   <?php }} }?>

                   
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /Recent factures -->

          </div>
        </div>

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

<?php foreach ($factures as $facture) { ?>
    <div id="voirCommande_<?php echo $facture->id; ?>" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Détails de la commande <b>001548<?php echo $facture->id; ?></b></h4>
          </div>
          <div class="modal-body">
            <p>
              <?php //echo "<pre>"; print_r($factures);echo "</pre>"; ?>
              <div class="panel panel-flat table-responsive">
          <table class="table table-lg table-bfactureed">
            <thead>
              <tr>
                <th >Image</th>
                <th>Détails</th>
                <th>Quantité</th>
                <th>Prix</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $argent=0;
              foreach ($orders as $order) {
                if($facture->id==$order->invoice_id){?>
              <tr>
                <td><img src="<?php echo base_url();?>assets/uploads/<?php echo $order->pro_image;?>" class="img-responsive" alt="product" style="width:70px"></td>
                <td>
                  <h4><?php echo $order->pro_name;?></h4>
                </td>
                <td class="text-center"><?php echo $order->qty;?></td>
                <td><h3 class="text-semibold text-right" ><?php echo number_format($order->pro_price*$order->qty,0," "," ");?></h3></td>
              </tr>
            <?php $argent=$argent+($order->pro_price*$order->qty);}} ?>
            
              <tr>
                <td colspan="3"><div class="x4 text-light text-right" style="font-size: 12px;">Total</div></td>
                <td><div class="x4 text-light text-right" style="font-size: 12px;"><?php echo number_format($argent,0," "," "); ?> FCFA</div></td>
              </tr>
            </tbody>
          </table>
        </div>
         <?php 
                        $attr = array('class' => 'form-horizontal');
                        echo form_open('dashboard/actionCommande', $attr); 

                      ?>
                  <div class="form-group">
                    <label class="control-label col-lg-4">Action à faire</label>
                    
                    <div class="col-lg-8">
                      <select name="status" class="form-control">
                        <option value="paye_livre" <?php if($facture->status=="paye_livre"){echo "selected";} ?>>Payer et Livrer</option>
                        <option value="paye_nonlivre" <?php if($facture->status=="paye_nonlivre"){echo "selected";} ?>>Payer et non livrer</option>
                      </select>
                    </div>
                  </div> 
                  <div class="form-group">
                    <?php if(!$facture->numero_pickup){ ?>
                    <label class="control-label col-lg-4">Veuillez définir un numéro</label>
                  <?php } ?>
                    <input type="<?php if($facture->numero_pickup){echo "hidden";}else{echo "text";} ?>" class="form-control"  name="numero_pickup" value="<?php echo $facture->numero_pickup; ?>"><br>
                    <div class="col-lg-12">
                      <input type="hidden" name="id" value="<?php echo $facture->id; ?>">
                     <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
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
<script src="<?php echo base_url();?>assets/dashboard/lib/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/dashboard/lib/js/pages/tables/datatable_extension_export_options.js"></script>
</body>

</html>
