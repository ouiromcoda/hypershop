<!DOCTYPE html>
<html lang="fr">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>HyperSHOP - Le marketplace des volailles</title>

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
<link rel="stylesheet" href="<?=base_url()?>assets/css/simple-line-icons.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<?php $this->load->view('home/template/header'); ?>
<div class="info-row">
<div class="container">
<div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="info-box first">
                     <div class="icon-img"><i class="fa fa-credit-card"></i></div>
                     <div class="icon-text">
                      <h4 class="info-box-heading green">Garantie de remboursement</h4>
                  <h6 class="text">Garantie de remboursement de 30 jours</h6>
                  </div>
                </div>
              </div>
              <!-- .col -->
              
           <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="info-box">
                
                <div class="icon-img"> <i class="fa fa-truck"></i></div>
               <div class="icon-text">
                
                      <h4 class="info-box-heading green">Livraison gratuite</h4>
           
                  <h6 class="text">Pour les commandes + de 10 000 FCFA</h6>
                  </div>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="info-box last">
                <div class="icon-img"><i class="fa fa-life-ring"></i></div>
                <div class="icon-text">
                      <h4 class="info-box-heading green">Support en ligne</h4>
                   
                  <h6 class="text">Appelez-nous au +225 49 11 9598</h6>
                  </div>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
    </div>
    </div>
       <?php if($this->session->flashdata('succes')){?>
          <div class="alert alert-success" role="alert" style="text-align: center;" id="succes">
          <strong><?php echo $this->session->flashdata('succes'); ?></strong>
         </div>
        <?php }?>
        <?php if($this->session->flashdata('successInsc')){?>
          <div class="alert alert-success" role="alert" style="text-align: center;" id="successInsc">
          <strong><?php echo $this->session->flashdata('successInsc'); ?></strong>
         </div>
        <?php }?>
         <?php if($this->session->flashdata('remove')){?>
          <div class="alert alert-danger" role="alert" style="text-align: center;" id="remove">
          <strong><?php echo $this->session->flashdata('remove'); ?></strong>
         </div>
        <?php }?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
  <div class="row">
   <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
    <!-- ================================== TOP NAVIGATION ================================== -->
   <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Catégories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
         <?php foreach ($categories as $categorie) {?>
              <li class="dropdown menu-item"> <a href="<?php echo site_url('categorie/produit/'.$categorie->slug_cat) ?>" ><?php echo $categorie->label_cat; ?></a></li>
         <?php } ?>
              <!-- /.menu-item -->
              <!-- /.menu-item -->
              
           
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
         <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
      
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9">
           <div id="hero">
                   <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                     <div class="item" style="background-image: url(<?=base_url()?>assets/images/sliders/02.jpg);">
                       <div class="container-fluid">
                         <div class="caption bg-color vertical-center text-left">
                           <div class="slider-header fadeInDown-1">Poule </div>
                           <div class="big-text fadeInDown-1" style="font-size: 35px">consomnmation<span class="highlight"></span></div>
                           <div class="excerpt fadeInDown-2 hidden-xs"> <span>Obtenez 50% de rabais sur <br>les articles sélectionnés</span> </div>
                           <div class="button-holder fadeInDown-3"> <a href="#" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Achetez </a> </div>
                         </div>
                         <!-- /.caption --> 
                       </div>
                       <!-- /.container-fluid --> 
                     </div>
                     <!-- /.item -->
                     
                     <div class="item" style="background-image: url(<?=base_url()?>assets/images/sliders/01.jpg);">
                       <div class="container-fluid">
                         <div class="caption bg-color vertical-center text-left">
                           <div class="slider-header fadeInDown-1">Poulet de chair</div>
                           <div class="big-text fadeInDown-1" style="font-size: 35px"> Super <span class="highlight">bon</span> </div>
                           <div class="excerpt fadeInDown-2 hidden-xs"> <span>Obtenez 80% de rabais sur<br>les articles sélectionnés.</span> </div>
                           <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Achetez</a> </div>
                         </div>
                         <!-- /.caption --> 
                       </div>
                       <!-- /.container-fluid --> 
                     </div>
                     <!-- /.item --> 
                     
                   </div>
                   <!-- /.owl-carousel --> 
                 </div>
        </div>
  </div>
  
    <!-- ============================================== INFO BOXES ============================================== -->
    
       
        
        <!-- /.info-boxes --> 
     
                 <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Nouveaux produits</h3>
         
          </div>
          <div class="tab-content">

            <div class="tab-pane in active" id="tous">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  <?php if(count($products)==0){
                    echo "Aucun produits ajoutés !";
                  }else{
                  foreach ($products as $product) { ?>
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?php echo site_url('produit/details/'.$product->pro_slug) ?>"><img  src="<?php echo base_url();?>assets/uploads/<?php echo $product->pro_image; ?>" alt="" height="250"></a> </div>
                          <!-- /.image -->
                        </div>
                        <!-- /.product-image -->
                     
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo site_url('produit/details/'.$product->pro_slug) ?>"><?php echo $product->pro_name; ?></a></h3>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> <?php echo number_format($product->pro_price,0," "," "); ?> FCFA </span></div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <center><a href="<?= site_url('panier/home/add_to_cart/'.$product->pro_id);?>"><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Ajouter au panier"> <i class="fa fa-shopping-cart"></i> </button></center>
                                <button class="btn btn-primary cart-btn" type="button">Ajouter au panier</button></a>
                              </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
               <?php } }?>
                  <!-- /.item -->

                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane --> 

         <?php //} ?>
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        
        
        <!-- ============================================== banners ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="<?=base_url()?>assets/images/banners/home-banner1.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="<?=base_url()?>assets/images/banners/home-banner2.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== banners : END ============================================== -->  
        
        </div>
   

 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 

    
     <div class="container">
    
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand1.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand2.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand3.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand4.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand5.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand6.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand2.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand4.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand1.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="<?=base_url()?>assets/images/brands/brand5.png" src="<?=base_url()?>assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item--> 
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

<section class="bottom-section">
<div class="container">



 <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="newsletter wow fadeInUp">
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <h4>Inscrivez-vous à la <strong>Newsletter</strong></h4>
          <div class="sidebar-widget-body">
         <p> Obtenez <strong> 40% de réduction </strong> sur les articles </p>
            </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">  <button class="btn btn-primary">Souscrire</button>
              </div>
             

            </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 



</section>


<!-- ============================================================= FOOTER ============================================================= -->
<?php $this->load->view('home/template/footer'); ?>
<!-- ============================================================= FOOTER : END============================================================= --> 


<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-hover-dropdown.min.js"></script> 
<script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script> 
<script src="<?=base_url()?>assets/js/countdown.js"></script> 
<script src="<?=base_url()?>assets/js/echo.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.easing-1.3.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-slider.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.rateit.min.js"></script> 
<script src="<?=base_url()?>assets/js/lightbox.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-select.min.js"></script> 
<script src="<?=base_url()?>assets/js/wow.min.js"></script> 
<script src="<?=base_url()?>assets/js/scripts.js"></script>
<!-- Hot Deals Timer 1--> 
<script>
var dthen1 = new Date("12/25/17 11:59:00 PM");
   start = "08/04/15 03:02:11 AM";
   start_date = Date.parse(start);
   var dnow1 = new Date(start_date);
   if (CountStepper > 0)
   ddiff = new Date((dnow1) - (dthen1));
   else
   ddiff = new Date((dthen1) - (dnow1));
   gsecs1 = Math.floor(ddiff.valueOf() / 1000);
   
   var iid1 = "countbox_1";
   CountBack_slider(gsecs1, "countbox_1", 1);
   
   var dthen1 = new Date("05/25/17 11:59:00 PM");
   start = "08/04/15 03:02:11 AM";
   start_date = Date.parse(start);
   var dnow1 = new Date(start_date);
   if (CountStepper > 0)
   ddiff = new Date((dnow1) - (dthen1));
   else
   ddiff = new Date((dthen1) - (dnow1));
   gsecs1 = Math.floor(ddiff.valueOf() / 1000);
   
   var iid1 = "countbox_2";
   CountBack_slider(gsecs1, "countbox_2", 1);
   
   setTimeout(function(){ 
        $("#succes").hide();
       }, 3000);
   setTimeout(function(){ 
        $("#remove").hide();
       }, 3000);

   setTimeout(function(){ 
        $("#successInsc").hide();
       }, 3000);
</script>

</body>
</html>