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

      <title>Mon panier | HyperSHOP</title>

      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
      
      <!-- Customizable CSS -->
      <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
      <link rel="stylesheet" href="<?=base_url()?>assets/css/blue.css">
      <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.transitions.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/rateit.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.min.css">

    

    
<!-- Icons/Glyphs -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/simple-line-icons.css">

        <!-- Fonts --> 
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


  </head>
    <body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

   <!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
   <div class="container">
      <div class="header-top-inner">
        <div class="cnt-block">
        <ul class="list-unstyled list-inline">
          <li class="dropdown dropdown-small">
            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">Bienvenue chez HyperSHOP -  votre e-commerce 2.0 </span></a>
          </li>
        </ul><!-- /.list-unstyled -->
      </div>
      <div class="cnt-account">
            <ul class="list-unstyled">
            <?php if(!$this->session->userdata('usr_id')){ ?>
            <li><a href="<?php echo site_url('utilisateur/se-connecter') ?>"><i class="icon fa-sign-in-alt"></i>Connexion </a>/ <a href="<?php echo site_url('utilisateur/s-inscrire') ?>"><i class="icon fa-sign-in-alt"></i>Inscription</a></li>
            <?php }else{ ?>
           <li><a href="<?php echo site_url('utilisateur/espace-personnel') ?>"><i class="icon fa fa-user"></i>Mon compte [<?php echo $user_connected->usr_surname." ".$user_connected->usr_name; ?>]</a>
            <li><a href="<?php echo site_url('panier/voir-mes-commandes') ?>"><i class="icon fa fa-shopping-cart"></i>Mon panier</a></li>
           </li>
           <?php } ?>
          </ul>
        </div>

         <div class="clearfix"></div>
      </div><!-- /.header-top-inner -->
   </div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ============================================== TOP MENU : END ============================================== -->
   <div class="main-header">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
               <!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
   <a href="<?php echo base_url();?>">
      
      <img src="<?=base_url()?>assets/images/logo.png" alt="">

   </a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->          </div><!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
               <!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
   <div class="search-area">
            <form>
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Catégories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <?php foreach ($categories as $categorie) {?>
                      <li class="menu-header"><?php echo $categorie->label_cat; ?></li>
                    <?php } ?>
                    </ul>
                  </li>
                </ul>
                <input class="search-field" placeholder="Rechercher un produit ici..." />
                <a class="search-button" href="#" ></a> </div>
            </form>
          </div>
<!-- ============================================================= SEARCH AREA : END ============================================================= -->            </div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"></div>
              <div class="basket-item-count"><span class="count"><?= $this->cart->total_items(); ?></span></div>
              <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"> <span class="sign"><?php echo number_format($this->cart->total(),0," "," "); ?> </span><span class="value">CFA</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <?php 

                      $i=0;
                      foreach ($this->cart->contents() as $items): 
                      $i++;
                      //var_dump($this->cart->contents());
                    ?>
              <li>
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="<?php echo base_url();?>assets/uploads/<?= $items['pro_image'] ?>" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="<?php echo site_url('produit/details/'.$items['slug']) ?>"><?= $items['name'] ?></a></h3>
                      <div class="price"><?= $items['qty']; ?> x <?php echo number_format($items['price'],0," "," "); ?></div>
                    </div>
                    <div class="col-xs-1 action"> <a href="<?php echo site_url('panier/home/clear_one_item/'.$items['rowid']).'/2' ?>"><i class="fa fa-trash"></i></a> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  
                
              </li>
          <?php endforeach;?> 
          <?php if($this->cart->total()==0){ ?>
                    <div class="pull-right"> <span class="text">Aucun produit ajouté</span>
                    <?php } ?>  
          <?php if($this->cart->total()!=0){ ?>
          <div class="pull-right"> 
            <span class="text">Sous-total : </span><span class='price'><?php echo number_format($this->cart->total(),0," "," "); ?> FCFA</span> 
          </div>
          <div class="clearfix"></div>
                <a href="<?php echo site_url('panier/voir-mes-commandes') ?>" class="btn btn-upper btn-primary btn-block m-t-20">Payer</a>
          <?php } ?>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div><!-- /.top-cart-row -->
         </div><!-- /.row -->

      </div><!-- /.container -->

   </div><!-- /.main-header -->

   <!-- ============================================== NAVBAR ============================================== -->

<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Acueil</a></li>
        <li class='active'>Résumé de ma commande</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
  <div class="container">
    <?php if($this->session->flashdata('remove')){?>
          <div class="alert alert-danger" role="alert" style="text-align: center;" id="remove">
          <strong><?php echo $this->session->flashdata('remove'); ?></strong>
         </div>
        <?php }?>
         <?php if($this->session->flashdata('error')){?>
          <div class="alert alert-danger" role="alert" style="text-align: center;" id="error">
          <strong><?php echo $this->session->flashdata('error'); ?></strong>
         </div>
        <?php }?>
         <?php if($this->session->flashdata('valide')){?>
          <div class="alert alert-success" role="alert" style="text-align: center;" id="valide">
          <strong><?php echo $this->session->flashdata('valide'); ?></strong>
         </div>
        <?php }?>
    <div>
      <div class="shopping-cart">
        <div class="shopping-cart-table ">
  <div class="table-responsive">
   <form action="https://secure.cinetpay.com" method="POST" accept-charset="utf-8">
          <div id="msg"></div>
    <table class="table">
      <thead>
          <?php if($this->cart->total()!=0){ ?>
            <tr>
            <!--  <th class="cart-romove item">Supprimer</th> -->
             <th class="cart-description item">Image</th>
             <th class="cart-product-name item">Article</th>
             <th class="cart-qty item">Quantité</th>
             <th class="cart-sub-total item">Prix unitaire</th>
             <th class="cart-total last-item">Sous-total</th>
           </tr>
           <?php } ?>
      </thead><!-- /thead -->
     <tfoot>
          <tr>
           <td colspan="7">
            <div class="shopping-cart-btn">
             <span class="">
              <?php if($this->cart->total()!=0){ ?>
              <a href="<?php echo site_url('notre-store');?>" class="btn btn-upper btn-primary outer-left-xs">Continuer mes achats</a>
              <?php } ?>
            </span>
          </div><!-- /.shopping-cart-btn -->
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php 
      if($this->cart->total()==0){
        echo '<p style="text-align:center;">Panier  vide !</p>';
      }else{
      $i=0;

      $q=0;
      $sst=0;

      $libelle="";
     // debug($this->cart->contents());
      foreach ($this->cart->contents() as $items){
      $i++;      ?>
      <tr class="rows">
         <!-- <td class="romove-item"><a href="<?php echo site_url('panier/home/clear_one_item/'.$items['rowid']).'/2' ?>" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td> -->
         <td class="cart-image text-center">
          <a class="entry-thumbnail" href="<?php echo site_url('produit/details/'.$items['slug']) ?>">
          
            <img src="<?php echo base_url();?>assets/uploads/<?= $items['pro_image'] ?>" alt="">
         <br>
            <a href="<?php echo site_url('panier/home/clear_one_item/'.$items['rowid']).'/2' ?>" title="cancel" class="icon"><small>Supprimer</small></a>
          </a>
        </td>
        <td class="cart-product-name-info">
          <h4 class='cart-product-description'><a href="<?php echo site_url('produit/details/'.$items['slug']) ?>"><?= $items['name'] ?></a></h4>
          <div class="cart-product-info">
          <!--  <span class="product-color">Couleur:<span>Vert</span></span> -->
         </div>
       </td>

       <td class="cart-product-quantity">
        <!-- <input type="hidden" id="rowid" name="rowid" class="qte" value="<?php echo $items['rowid']; ?>"> -->
        <b>Ancienne Qté </b>: <?php echo $items['qty']; ?><br>
        <select id="qte" class="qte">
          <!-- <option value="<?php echo $items['qty']; ?>"><?php echo $items['qty']; ?></option> -->
          <?php for($i = 1; $i<50; $i++){ ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php } ?>
        </select>
        <b><a href="javascript:update_commande(<?php echo $items['rowid']; ?>);" title="Mise à jours">Mise à jours</a></b>
      </td>
      <td class="cart-product-sub-total"><span class="cart-sub-total-price" id="subtotal"> <!-- <input type="hidden" name="price" id="price" value="<?php echo $items['price']; ?>"> --><?php echo number_format($items['price'],0," "," "); ?> FCFA</span></td>
      <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo number_format($items['qty']*$items['price'],0," "," "); ?> FCFA</span></td>
  </tr>
 <?php $libelle=$libelle. ",".$items['name'];} }?>
</tbody><!-- /tbody -->
    </table><!-- /table -->
  </div>

</div><!-- /.shopping-cart-table -->   
<?php if($this->cart->total()!=0){ ?>

<!-- /.estimate-ship-tax<div class="col-md-4 col-sm-12 estimate-ship-tax">
    <tbody>
        <tr>
          <td>
            <div class="form-group">
              <label class="info-title control-label">Magasin de livraison</label>
              <select class="form-control unicase-form-control selectpicker" name="id_magasin" id="id_magasin">
                <option>--Selectionner le dépôt --</option>
                <?php foreach ($magasins as $magasin) { ?>
                <option value="<?php echo $magasin->id_magasin; ?>"><?php echo $magasin->label_magasin; ?></option>
              <?php } ?>
              </select>
            </div>
          </td>
        </tr>
    </tbody>
</div> -->
<!-- <div class="col-md-4 col-sm-12 estimate-ship-tax">
    <tbody>
        <tr>
          <td>
            <div class="form-group">
              <label class="info-title">Entrer ou modifier votre numéro (Exple : 22549119598)  <span></span></label>
              <input type="text" class="form-control unicase-form-control text-input" name="numero_pickup" id="numero_pickup">
              </div>
          </td>
        </tr>
    </tbody>
</div> -->
<div class="col-md-12 col-sm-12">
<div class="cart-shopping-total">
  <table class="table">
    <thead>
      <tr>
        <th>
          <!-- <div class="cart-sub-total">
            Subtotal<span class="inner-left-md">$600.00</span>
          </div> -->
          <div class="cart-grand-total">
            Total<span class="inner-left-md"><?php echo number_format($this->cart->total(),0," "," "); ?> FCFA</span>
          </div>
        </th>
      </tr>
    </thead><!-- /thead -->
    <tbody>

        <tr>
          <td>
            <div class="cart-checkout-btn pull-right">
              <?php if(isset($user_connected->usr_id)){
              require_once __DIR__ . '/pay/cinetpay.php';
            require_once __DIR__ . '/pay/commande.php';


            $commande = new Commande();
            try {
                //transaction id
                $id_transaction = Cinetpay::generateTransId();
                // Payment description
                $description_du_paiement = ltrim($libelle,",");
                // Payment Date must be on date format
                $date_transaction = date("Y-m-d H:i:s");
                // Amount
                $montant_a_payer = "5";

                $custom_value = $user_connected->id_magasin.",".$user_connected->numero_pickup;
                //Blanche met ici  ton apiKey et ton side_id
             
                $apiKey = "173450395b4734073656d1.28965845";
                
                //Serge met ici  ton site_id
                $site_id ="410521";
                  
                $plateform = "PROD";

                //la version ,  utilisé V1 si vous voulez utiliser la version 1 de l'api
                $version = "V2";

                // nom du formulaire CinetPay
                $formName = "goCinetPay";

                // cinetpay button type, must be 1, 2, 3, 4 or 5
                $btnType = 2;
                // button size, can be 'small' , 'large' or 'larger'
                $btnSize = 'large';
                // fill command class
                $commande->setTransId($id_transaction);
                $commande->setMontant($montant_a_payer);

                // save transaction in db
                $commande->create();

                // create html form for your basket
                $CinetPay = new cinetPay($site_id, $apiKey, $plateform, $version);
                $CinetPay->setTransId($id_transaction)
                    ->setDesignation($description_du_paiement)
                    ->setTransDate($date_transaction)
                    ->setAmount($montant_a_payer)
                    ->setAmount($montant_a_payer)
                    ->setDebug(false)// put it on true, if you want to activate debug
                    ->setCustom($custom_value)// optional
                    //->setNotifyUrl($notify_url)// optional
                   // ->setReturnUrl($return_url)// optional
                    //->setCancelUrl($cancel_url)// optional
                    //->setCelPhoneNum($_POST['cel_phone_num'])
                    //->setPhonePrefixe($_POST['cpm_phone_prefixe'])
                    ->displayPayButton($formName, $btnType, $btnSize);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            //echo "<b>Custom : </b>". $custom_value;
               } ?>
              <?php if(!isset($user_connected->usr_id)){?>
              <b>Pour pouvoir acheter votre produit, nous invitons à vous connecter en cliquant sur ce bouton </b><a href="<?php echo site_url('utilisateur/se-connecter') ?>"><button type="button" class="btn btn-primary checkout-btn" style="margin-top: -18px;">Se connecter</button></a>
            <?php } ?>
            </div>
          </td>
        </tr>
    </tbody><!-- /tbody -->
  </table><!-- /table -->
 <?php echo form_close(); ?>
    </div>
</div><!-- /.cart-shopping-total -->      
<?php } ?>
</div><!-- /.shopping-cart -->


    </div> <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

    <div class="logo-slider-inner"> 
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand1.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand2.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand3.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand4.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand5.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand6.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand2.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand4.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand1.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->

        <div class="item">
          <a href="#" class="image">
            <img data-echo="<?=base_url()?>assets/images/brands/brand5.png" src="<?=base_url()?>assets/images/blank.gif" alt="">
          </a>  
        </div><!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->
  
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  </div><!-- /.container -->
</div><!-- /.body-content -->


<section class="bottom-section">
<div class="container">




</div>
</section>

<?php $this->load->view('home/template/footer'); ?>

  <!-- For demo purposes – can be removed on production -->
  
  <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
     <script type="text/javascript">
     function update_commande(rowid) {
      //alert(rowid);
     var qty = $("#qty").val();
   
     $.ajax({
      url: "<?=base_url()?>panier/home/update_commande/"+rowid+"/"+qty,
      type : "POST",
      data: {},
      beforeSend: function(){
                $('#msg').html('<img src="<?=base_url()?>assets/images/ajax.gif" class="center-block" />');
                console.log('Chargement');
            },
      success : function(data) {
          location.reload();
          $("#msg").html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Quantité modifiée avec succès.</strong> </div>');
      },
       error: function(data, statut) {
          $("#msg").html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur sur la mise à jour.</strong> </div>');
      }

  });
}
   </script>
<script type="text/javascript">
            //alert();
        function checkFormRecharge(form)
          {
            alert("chech");
         /*   if($.isNumeric(form.SMS_RECHARGE.value) && form.SMS_RECHARGE.value!=0){

              if(form.SMS_RECHARGE.value > parseInt(form.CREDIT_ALOUER.value)){
              alert("Veuillez entrer une valeur inférieur à "+form.CREDIT_ALOUER.value);
                form.SMS_RECHARGE.focus();
                return false;
              }
            }else{
              alert("Entrez une valeur numérique différente de 0 ");
              form.SMS_RECHARGE.focus();
                return false;
            }*/
            //alert(CREDIT_ALOUER);
            
          }

  $(document).ready(function(){
    console.log('Ready Document');



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
});


 setTimeout(function(){ 
        $("#remove").hide();
       }, 3000); 
 setTimeout(function(){ 
        $("#error").hide();
       }, 3000);
 setTimeout(function(){ 
        $("#valide").hide();
       }, 6000);

</script>
  <!-- For demo purposes – can be removed on production : End -->

  <!-- JavaScripts placed at the end of the document so the pages load faster -->
  <script src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script>
   <script src="https://unpkg.com/tooltip.js@1.2.0/dist/umd/tooltip.min.js"></script>
   <script type="text/javascript">

   /*     $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });

        });
        $('#numero_pickup').keyup(function(){
           /* alert($('#id_magasin').val());
            alert($('#numero_pickup').val());*/
           // custom_value = $('input[name="cpm_custom"]').val($('#numero_pickup').val()+","+$('#id_magasin').val());
            //alert(custom_value);
           /*$("#custom_value").val(function() {
            //var custom_value = $('#custom_value').val();
            $('[name=custom_value]').val(+$('#numero_pickup').val()+","+$('#id_magasin').val());
             console.log($('#numero_pickup').val()+","+$('#id_magasin').val());
          });

        });*/
   </script>
  <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
  
  <script src="<?=base_url()?>assets/js/bootstrap-hover-dropdown.min.js"></script>
  <script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
  
  <script src="<?=base_url()?>assets/js/echo.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.easing-1.3.min.js"></script>
  <script src="<?=base_url()?>assets/js/bootstrap-slider.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/lightbox.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?=base_url()?>assets/js/wow.min.js"></script>
  <script src="<?=base_url()?>assets/js/scripts.js"></script>

  

  

</body>
</html>
