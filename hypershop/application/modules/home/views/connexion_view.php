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

        <title>Espace connexion | HyperSHOP</title>

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
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class='active'>Connexion / Inscription </li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="" style="font-weight: bold;color:#3ab54a;text-align: center;">Vous Avez Déjà Un Compte HyperSHOP ? <br> Connectez-Vous !</h4>
   
    
    <?php 
                      $attr = array('class' => 'register-form outer-top-xs','role' => 'form', );
                      echo form_open('cp/check', $attr); 

                      if(isset($error_message)){
                        echo "<div class='error'>".$error_message."</div> <p>&nbsp;</p>";
                     }
                    ?>
                  <div class="form-group">
                      <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                      <input type="email" class="form-control unicase-form-control text-input" name="usr_email">
                      <?php echo form_error('usr_email','<span class="error">','</span>'); ?>
                  </div>
                    <div class="form-group">
                      <label class="info-title" for="exampleInputPassword1">Mot de passe <span>*</span></label>
                      <input type="password" class="form-control unicase-form-control text-input" name="usr_password">
                      <?php echo form_error('usr_password','<span class="error">','</span>'); ?>
                  </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color: #3ab54a;">Se connecter</button>
                <?php echo form_close(); ?>                  
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle" style="font-weight: bold;color:#3ab54a;text-align: center;">Nouveau Client <br>HyperSHOP</h4>
    <p class="text title-tag-line">Créez votre compte sur HyperSHOP maintenant ! Rien de plus simple, il vous suffit de renseigner votre adresse mail et de suivre les étapes.</p><br><br>
    <a href="<?php echo site_url('utilisateur/s-inscrire');?>"> <button type="button" class="btn btn-primary btn-lg btn-block" style="background-color: #3ab54a;">Inscription</button></a>
    
    
    
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
