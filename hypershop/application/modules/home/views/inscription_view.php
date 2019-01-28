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

        <title>Espace Inscription | HyperSHOP</title>

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
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
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
                  <?php if($this->cart->total()==0){ ?>
                    <div class="pull-right"> <span class="text">Aucun produit ajouté</span>
                    <?php } ?> 

                             <?php if($this->cart->total()!=0){ ?>
                              
                            
                              <?php 
                              if  ($this->cart->total_items()!=0){?>
                              
                              
                              <?php }} ?>
                            
                  <!-- <div class="pull-right"> <span class="text">Sous-total :</span><span class='price'><?php echo number_format($this->cart->total(),0," "," "); ?> FCFA</span> </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Payer</a> </div> -->
                <!-- /.cart-total--> 
                
              </li>
          <?php endforeach;?>  <div class="pull-right"> <span class="text">Sous-tota :</span><span class='price'><?php echo number_format($this->cart->total(),0," "," "); ?> FCFA</span> </div>
                              <div class="clearfix"></div>
                              <a href="<?php echo site_url('panier/voir-mes-commandes') ?>" class="btn btn-upper btn-primary btn-block m-t-20">Payer</a>
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
                <li class='active'>Espace Inscription</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-12 col-sm-12 sign-in">
    <h4 class="" style="font-weight: bold;color:#3ab54a;text-align: left;">Créer un nouveau compte client</h4>
   <?php if($this->session->flashdata('successInsc')){?>
        <div class="alert alert-success" role="alert" id="successInsc">
      <strong>Bravo !</strong>  <?php echo $this->session->flashdata('successInsc'); ?>
     </div>
      <?php }?>
    
      <?php 
          $attr = array('class' => 'register-form outer-top-xs','role' => 'form', );
          echo form_open('utilisateur/register', $attr); 
        ?>

         <div class="radio outer-xs">
            <label>
                <input type="radio" name="usr_civilite" value="1"> Homme
            </label>
            &nbsp; &nbsp;
             <label>
                <input type="radio" name="usr_civilite" value="2"> Femme
            </label><br>
            <?php echo form_error('usr_civilite','<span class="error">','</span>'); ?>
        </div>
        <div class="row">
             <div class="form-group col-md-6">
                <label class="info-title">Nom <span>*</span></label>
                <input type="text" class="form-control unicase-form-control text-input" name="usr_name">
                <?php echo form_error('usr_name','<span class="error">','</span>'); ?>
            </div>

             <div class="form-group col-md-6">
                <label class="info-title">Prénom(s) <span>*</span></label>
                <input type="text" class="form-control unicase-form-control text-input" name="usr_surname">
                <?php echo form_error('usr_surname','<span class="error">','</span>'); ?>
            </div>
        </div>

        <div class="row">
             <div class="form-group col-md-6">
                <label class="info-title">E-mail <span>*</span></label>
                <input type="email" class="form-control unicase-form-control text-input" name="usr_email">
                <?php echo form_error('usr_email','<span class="error">','</span>'); ?>
            </div>

             <div class="form-group col-md-6">
                <label class="info-title">Téléphone <span>*</span> </label>
                <input type="text" class="form-control unicase-form-control text-input" name="usr_telephone">
                <small>Veuillez précéder votre numéro du préfixe de votre pays, sans 00 et +</small>
                <?php echo form_error('usr_telephone','<span class="error">','</span>'); ?>
            </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
            <label class="info-title" for="exampleInputEmail1">Mot de passe <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
             <?php echo form_error('password','<span class="error">','</span>'); ?>
        </div>
         <div class="form-group col-md-6">
            <label class="info-title" for="exampleInputEmail1">Lieu d'habitation <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" name="usr_adresse" >
           <?php echo form_error('usr_adresse','<span class="error">','</span>'); ?>
        </div>
      </div>
      <?php //debug($magasins); ?>
       <div class="form-group">
              <label class="info-title control-label">Magasin de livraison</label>
              <select class="form-control unicase-form-control selectpicker" name="id_magasin" id="id_magasin">
                <option>--Selectionner le magasin --</option>
                <?php foreach ($magasins as $magasin) { ?>
                <option value="<?php echo $magasin->id_magasin; ?>"><?php echo $magasin->label_magasin." - ".$magasin->adresse_magasin ." (".$magasin->label_ville." / Région ".$magasin->region_ville.")"; ?></option>
              <?php } ?>
              </select>
            </div>
      <div class="form-group col-md-12">
      <label class="info-title" for="exampleInputEmail1">Entrer le numéro chargé de recevoir votre code de livraison</label>
      <input type="text" class="form-control unicase-form-control text-input" name="numero_pickup" >
     <?php echo form_error('numero_pickup','<span class="error">','</span>'); ?>
  </div>
        <div class="form-group col-md-12">
          <label class="checkbox">
          <input checked="checked" type="checkbox" name="tnc">
               J'accepte les <a class="blue" href="#">Termes de politique de confidentialité du service HyperSHOP</a>
               <br></label>
          </div>
          <input type="hidden" name="url" value="<?php echo $this->session->userdata('url'); ?>">
        <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color: #3ab54a;">SOUMETTRE</button>
    <?php echo form_close(); ?>                 
</div>
<!-- Sign-in -->


    
    
    
</div>  
<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->

<section class="bottom-section">
<div class="container">
  
</section>
<?php $this->load->view('home/template/footer'); ?>


    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script> 
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
