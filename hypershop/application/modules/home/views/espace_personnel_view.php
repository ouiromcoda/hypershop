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

        <title>Espace personnel | HyperSHOP</title>

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

<style type="text/css" media="screen">
    
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 50px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #3ab54a;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #3ab54a;
  background-image: #3ab54a;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #3ab54a;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
  </style>
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
            <li><a href="<?php echo site_url('utilisateur/se-connecter');?>"><i class="icon fa fa-user"></i>Je me connecte</a></li>
            <?php }else{ ?>
           <li><a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><i class="icon fa fa-user"></i>Mon compte [<?php echo $user_connected->usr_surname." ".$user_connected->usr_name; ?>]</a>
              <ul class="dropdown-menu">
                <li><a href="#">Mon profil</a></li>
                <li><a href="#">Se déconnecter</a></li>
              </ul>
           </li>
           <?php } ?>
          </ul>
         </div><!-- /.cnt-account -->

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
                <li><a href="<?php echo base_url();?>">Accueil</a></li>
                <li class='active'>Mon Espace personnel</li>
              
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
                <div class="row">
                  <div class="col-md-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                              <div class="list-group">
                                <a href="#" class="list-group-item active text-center">
                                  <h4 class="glyphicon glyphicon-home"></h4><br/>Mon espace personnel
                                </a>
                                <a href="#" class="list-group-item text-center">
                                  <h4 class="glyphicon glyphicon-user"></h4><br/>Mes informations personnelles
                                </a>
                                <a href="#" class="list-group-item text-center">
                                  <h4 class="glyphicon glyphicon-shopping-cart"></h4><br/>Mes transactions
                                </a>
                                <a href="#" class="list-group-item text-center">
                                  <h4 class="glyphicon glyphicon-pencil"></h4><br/>Changer mon mot de passe
                                </a>
                                <a href="#" class="list-group-item text-center">
                                  <h4 class="glyphicon glyphicon-log-out"></h4><br/>Se déconnecter
                                </a>
                                <!-- <a href="#" class="list-group-item text-center">
                                  <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                                </a> -->
                              </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                <!-- flight section -->
                                <div class="bhoechie-tab-content active">
                                  <p>
                                    Bonjour <b><?php echo $user_connected->usr_surname. " ".$user_connected->usr_name; ?></b><br><br>
                                    À partir de votre Compte, vous pouvez obtenir l'historique de vos activités et mettre à jour vos informations. Sélectionnez un lien ci-dessous pour afficher ou modifier vos informations.
                                    <img src="<?php echo base_url();?>assets/images/contact.png" class="img-responsive">
                                  </p>
                                </div>
                                <!-- train section -->
                                <div class="bhoechie-tab-content">
                                   <p>
                                     <?php 
                              $attr = array('role' => 'form','class' => 'register-form outer-top-xs');
                              echo form_open_multipart('utilisateur/mettre-a-jour', $attr); 
                            ?>
                           <div class="radio outer-xs">
                            <label>
                                <?php if($user_connected->usr_civilite==1){ ?>
                              <input type="radio" name="optionsRadios" value="option2" checked> M.
                              <?php } ?>
                            </label>
                            &nbsp; &nbsp;
                            <label>
                             <?php if($user_connected->usr_civilite==0){ ?>
                              <input type="radio" name="optionsRadios" value="option2" checked> Mme
                              <?php } ?>
                            </label>
                          </div>

                          <div class="form-group">
                            <label class="info-title">Pseudo <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_pseudo; ?>" name="usr_pseudo">
                            <?php echo form_error('usr_pseudo','<span class="error">','</span>'); ?>
                          </div>
                          <div class="row">
                           <div class="form-group col-md-6">
                            <label class="info-title">Nom <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_name; ?>" name="usr_name">
                            <?php echo form_error('usr_name','<span class="error">','</span>'); ?>
                          </div>

                          <div class="form-group col-md-6">
                            <label class="info-title">Prénom(s) <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_surname; ?>" name="usr_surname">
                            <?php echo form_error('usr_surname','<span class="error">','</span>'); ?>
                          </div>
                        </div>

                      <div class="row">
                         <div class="form-group col-md-6">
                          <label class="info-title">E-mail <span>*</span></label>
                          <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_email; ?>" name="usr_email">
                          <?php echo form_error('usr_email','<span class="error">','</span>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                          <label class="info-title">Téléphone <span>*</span></label>
                          <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_telephone; ?>" name="usr_telephone">
                          <?php echo form_error('usr_telephone','<span class="error">','</span>'); ?>
                        </div>
                      </div>

                      <div class="row">
                         <div class="form-group col-md-6">
                          <label class="info-title">Date de naissance<span>*</span></label>
                          <input type="date" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_date_naissance; ?>" name="usr_date_naissance">
                          <?php echo form_error('usr_date_naissance','<span class="error">','</span>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                          <label class="info-title">Nationalité <span>*</span></label>
                          <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_nationalite; ?>" name="usr_nationalite">
                          <?php echo form_error('usr_nationalite','<span class="error">','</span>'); ?>
                        </div>
                      </div>
                      <div class="row">
                         <div class="form-group col-md-6">
                          <label class="info-title">Adresse<span>*</span></label>
                          <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_adresse; ?>" name="usr_adresse">
                          <?php echo form_error('usr_adresse','<span class="error">','</span>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                          <label class="info-title">Pays <span>*</span></label>
                          <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_pays; ?>" name="usr_pays">
                          <?php echo form_error('usr_pays','<span class="error">','</span>'); ?>
                        </div>
                      </div>

                      <div class="row">
                         <div class="form-group col-md-6">
                          <label class="info-title">Numéro du passeport<span>*</span></label>
                          <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user_connected->usr_numero_passeport; ?>" name="usr_numero_passeport">
                          <?php echo form_error('usr_numero_passeport','<span class="error">','</span>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                          <?php if($user_connected->usr_scan_passeport){ ?>
                          Passeport enrégistré :
                          <img src="<?php echo base_url();?>uploads/utilisateur/<?php echo $user_connected->usr_scan_passeport; ?>" height="50"><BR>
                          <?php } ?>
                          <label class="info-title">Page scannée du passeport <span>*</span></label>
                          <input type="file" class="form-control unicase-form-control text-input" name="userfile">
                          <input type="hidden" name="usr_scan_passeport" value="<?php echo $user_connected->usr_scan_passeport; ?>">
                          <input type="hidden" name="usr_id" value="<?php echo $user_connected->usr_id; ?>">
                        </div>
                      </div>

                      <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Modifier</button>


                  <?php  echo form_close(); ?>
                                   </p>
                                </div>
                    
                                <!-- hotel search -->
                                <div class="bhoechie-tab-content">
                                    <p>
                                      <table class="table table-hover table-striped">
                                        <thead>
                                          <tr>
                                            <th>N° de commnde</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Détails</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($factures as $facture) {
                                          if($facture->user_id==$user_connected->usr_id){ ?>
                                          <tr>
                                            <td>001548 <?php echo $facture->id; ?></td>
                                            <td><?php echo date("d/m/Y à H:i:s",strtotime($facture->created_at)); ?></td>
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
                                             <span class="badge bg-<?php if(isset($color)){echo $color;}?>-400 p-l-10 p-r-10"><?php if(isset($text)){echo $text;} ?></span></td>
                                            <td><a data-toggle="modal" href="#detail-cmd_<?php echo $facture->id;?>" class="btn btn-primary">Voir les détails</a></td>
                                          </tr>
                                          <?php } }?>
                                        </tbody>
                                      </table>
                                    </p>
                                </div>
                                <div class="bhoechie-tab-content">
                                    <p>
                                       <h4 class="checkout-subtitle">Changer mon mot de passe</h4>
                       <?php if($this->session->flashdata('successUpdatePwd')){?>
                          <div class="alert alert-success" role="alert" id="successUpdatePwd">
                        <strong>Félicitation !</strong>  <?php echo $this->session->flashdata('successUpdatePwd'); ?>
                       </div>
                        <?php }?>
                        <?php if($this->session->flashdata('EchecUpdatePwd')){?>
                          <div class="alert alert-danger" role="alert" id="EchecUpdatePwd">
                        <strong>Problème !</strong>  <?php echo $this->session->flashdata('EchecUpdatePwd'); ?>
                       </div>
                        <?php }?>
                      <?php 
                          $attr = array('role' => 'form','class' => 'register-form outer-top-xs');
                          echo form_open_multipart('utilisateur/changer-mot-de-passe', $attr); 
                        ?>
                        <input type="hidden" name="usr_id" value="<?php echo $user_connected->usr_id; ?>">
                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Ancien Mot de passe <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="old_password">
                        <?php echo form_error('old_password','<span class="error">','</span>'); ?>
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Nouveau Mot de passe <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="new_passeword" >
                        <?php echo form_error('new_passeword','<span class="error">','</span>'); ?>
                      </div>

                      <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirmer Mot de passe <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="confirm_new_passeword" >
                        <?php echo form_error('confirm_new_passeword','<span class="error">','</span>'); ?>
                      </div>
                      <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Modifier</button>
                                    </p>
                                </div>
                                <div class="bhoechie-tab-content">
                                    <center>
                                      <h1 class="glyphicon glyphicon-log-out" style="font-size:12em;color:#55518a"></h1>
                                      <h2 style="margin-top: 0;color:#55518a">Aurevoir :)</h2>
                                      <h3 style="margin-top: 0;color:#55518a"><a href="<?php echo site_url('utilisateur/se-deconnecter');?>">Se déconnecter</a></h3>
                                    </center>
                                </div>
                            </div>
                        </div>
                  </div>
              </div>
    </div>

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->

<section class="bottom-section">
<div class="container">
  
</section>
<?php foreach ($factures as $facture) {
if($facture->user_id==$user_connected->usr_id){ ?>
    <div id="detail-cmd_<?php echo $facture->id;?>" class="modal fade" role="dialog">
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
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

      </div>
    </div>
 <?php } }?>
<?php $this->load->view('home/template/footer'); ?>


    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script> 
      <script type="text/javascript">
       $(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
    </script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-hover-dropdown.min.js"></script> 
<script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script> 
<script src="<?=base_url()?>assets/js/echo.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.easing-1.3.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-slider.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.rateit.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-select.min.js"></script> 
<script src="<?=base_url()?>assets/js/wow.min.js"></script> 
<script src="<?=base_url()?>assets/js/scripts.js"></script>
    
    

    

</body>
</html>
