<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="MediaCenter, Template, eCommerce">
  <meta name="robots" content="all">

  <title>Paiement éffectué | African Village</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

  <!-- Customizable CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.transitions.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/rateit.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/modern-ticker.css">
  <!-- Icons/Glyphs -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css">

  <!-- Fonts --> 
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>
<body class="cnt-home">
 <!-- ============================================== HEADER ============================================== -->
 <?php $this->load->view('home/template/flash'); ?>
 <?php $this->load->view('home/template/menu'); ?>

        <!-- ============================================== HEADER : END ============================================== -->
        <div class="breadcrumb">
         <div class="container">
          <div class="breadcrumb-inner">
           <ul class="list-inline list-unstyled">
            <li><a href="#">Accueil</a></li>
            <li class='active'>Paiement éffectué</li>
          </ul>
        </div><!-- /.breadcrumb-inner -->
      </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
     <div class="container">
      <div class="row ">
       <div class="shopping-cart">
        <div class="shopping-cart-table ">
         <div class="table-responsive">
          <?php 
          $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          ?>
         <div class="col-md-8">
           <h3>Félicitation <?php echo $user_connected->usr_name; ?>,</h3>
           Merci d'avoir acheté un produit avec nous. Toute l'équipe de AFRICAN Village tient à vous remercie et reste disponible pour toutes questions.

         </div> 
         <div class="col-md-4">
             <div class="shopping-cart-btn">
             <span class="">
              <a href="<?php echo site_url('panier/imprimer-mon-recu/hhhh');?>" class="btn btn-upper btn-primary outer-left-xs"><i class="fa fa-print"></i> Imprimer mon reçu </a><br><br>
              <a href="<?php echo site_url('notre-store');?>" class="btn btn-upper btn-primary outer-left-xs"><i class="fa fa-shopping-cart"></i>  faire un autre achat ?</a>
            
            </span>
          </div><!-- /.shopping-cart-btn -->
         </div>
        </div>
        </div><!-- /.shopping-cart-table -->		
        		</div><!-- /.shopping-cart -->
        </div> <!-- /.row -->

        </div><!-- /.container -->
        </div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->
<?php $this->load->view('home/template/footer'); ?>
<!-- ============================================================= FOOTER : END============================================================= --> 



<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">

  const numberWithCommas = (x) => {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}
  $(document).ready(function(){
    //$('#TCArt').find('td').each (function() {
          var qty=$("#qte");
          var total=isNaN(parseInt(qty.val()* $("#price").val())) ? 0 :(qty.val()* $("#price").val())
              $("#total").val(numberWithCommas(total)+" FCFA");
          qty.keyup(function(){
              var total=isNaN(parseInt(qty.val()* $("#price").val())) ? 0 :(qty.val()* $("#price").val())
              $("#total").val(numberWithCommas(total)+" FCFA");
          });
    //});
});

 function update_commande() {
     var qte = $("#qte option:selected").val();
     var rowid=$("#rowid").val();
   
     $.ajax({
      url: "<?=base_url()?>panier/home/update_commande",
      type : "POST",
      data: {"rowid":rowid,"qte":qte},
      beforeSend: function(){
                $('#msg').html('<img src="<?=base_url()?>assets/images/ajax.gif" class="center-block" />');
                console.log('Chargement');
            },
      success : function(data) {
          location.reload();
          $("#msg").html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Produit ajouté avec succès.</strong> </div>');
      },
       error: function(data, statut) {
          $("#msg").html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur sur la mise à jour.</strong> </div>');
      }

  });
}


</script>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>

<script src="<?php echo base_url();?>assets/js/echo.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.easing-1.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/lightbox.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>assets/js/wow.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.modern-ticker.min.js"></script>
<script src="<?php echo base_url();?>assets/js/scripts.js"></script>





</body>
</html>
