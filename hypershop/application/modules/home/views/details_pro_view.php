<!DOCTYPE html>
<html lang="fr">
<head>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
      <meta name="description" content="">
      <meta name="author" content="">
       <meta name="keywords" content="MediaCenter, Template, eCommerce">
       <meta name="robots" content="all">

       <title><?php echo $single_product->pro_name; ?> - HyperSHOP</title>

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
        <link href="<?=base_url()?>assets/css/lightbox.css" rel="stylesheet">
      

      
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
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Produit</a></li>
            <li class='active'><?php echo $single_product->pro_name; ?></li>
         </ul>
      </div><!-- /.breadcrumb-inner -->
   </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
   <div class='container'>
      <div class='row single-product'>
         <div class='col-md-3 sidebar'>
            <div class="sidebar-module-container">
            <div class="home-banner outer-top-n">
<img src="<?=base_url()?>assets/images/banners/LHS-banner.jpg" alt="Image">
</div>      



 

            </div>
         </div><!-- /.sidebar -->
         <div class='col-md-9'>
            <div class="detail-block">
            <div class="row  wow fadeInUp">
                
                    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="Gallery" href="<?php echo base_url();?>assets/uploads/<?php echo $single_product->pro_image; ?>">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?php echo base_url();?>assets/uploads/<?php echo $single_product->pro_image; ?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <!--<div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p9.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p9.jpg" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p10.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p10.jpg" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide4">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p11.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p11.jpg" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide5">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p12.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p12.jpg" />
                </a>
            </div>/.single-product-gallery-item

            <div class="single-product-gallery-item" id="slide6">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p13.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p13.jpg" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide7">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p14.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p14.jpg" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide8">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p15.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p15.jpg" />
                </a>
            </div>

            <div class="single-product-gallery-item" id="slide9">
                <a data-lightbox="image-1" data-title="Gallery" href="<?=base_url()?>assets/images/products/p16.jpg">
                    <img class="img-responsive" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p16.jpg" />
                </a>
            </div><!-- /.single-product-gallery-item -->

        </div><!-- /.single-product-slider -->

<!-- 
        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p17.jpg" />
                    </a>
                </div>

                <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p18.jpg"/>
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p19.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p20.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p21.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p22.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="7" href="#slide7">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p23.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide8">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p24.jpg" />
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="9" href="#slide9">
                        <img class="img-responsive" width="85" alt="" src="<?=base_url()?>assets/images/blank.gif" data-echo="<?=base_url()?>assets/images/products/p25.jpg" />
                    </a>
                </div>
            </div> 

            

        </div> --><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->                 
               <div class='col-sm-6 col-md-7 product-info-block'>
                  <div class="product-info">
                     <h1 class="name"><?php echo $single_product->pro_name; ?></h1>
                     
                     <div class="rating-reviews m-t-20">
                        <div class="row">
                           <div class="col-sm-3">
                              <div class="rating rateit-small"></div>
                           </div>
                           <div class="col-sm-8">
                              <div class="reviews">
                                 <a href="#" class="lnk">(0 avis)</a>
                              </div>
                           </div>
                        </div><!-- /.row -->    
                     </div><!-- /.rating-reviews -->

                     <div class="stock-container info-container m-t-10">
                        <div class="row">
                           <div class="col-sm-2">
                              <div class="stock-box">
                                 <span class="label">Disponibilité :</span>
                              </div>   
                           </div>
                           <div class="col-sm-9">
                              <div class="stock-box">
                                 <span class="value">En Stock  (<?php echo $single_product->pro_stock; ?>)</span>
                              </div>   
                           </div>
                        </div><!-- /.row --> 
                     </div><!-- /.stock-container -->

                     <div class="description-container m-t-20">
                    <?php echo $single_product->pro_description; ?>
                     </div><!-- /.description-container -->

                     <div class="price-container info-container m-t-20">
                        <div class="row">
                           

                           <div class="col-sm-6">
                              <div class="price-box">
                                 <span class="price"><?php echo number_format($single_product->pro_price,0," "," "); ?> FCFA</span>
                              </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="favorite-button m-t-10">
                                 <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                     <i class="fa fa-heart"></i>
                                 </a>
                                 <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                     <i class="fa fa-envelope"></i>
                                 </a>
                              </div>
                           </div>

                        </div><!-- /.row -->
                     </div><!-- /.price-container -->

                     <div class="quantity-container info-container">
                        <div class="row">
                           
                           <div class="col-sm-2">
                              <span class="label">Quantité :</span>
                           </div>
                           
                           <div class="col-sm-2">
                              <div class="cart-quantity">
                                 <div class="quant-input">
                                        <input type="text" value="1" name="qty" id="qty">
                                   </div>
                                 </div>
                           </div>

                           <div class="col-sm-7">
                            <input type="hidden" id="rowid" name="rowid" value="<?php echo $single_product->pro_id; ?>">
                              <a href="javascript:addpanier(<?php echo $single_product->pro_id; ?>);" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> AJOUTER AU PANIER </a>
                           </div>
                          
                           
                        </div><!-- /.row -->
                        <div id="msg"></div>
                     </div><!-- /.quantity-container -->

                     

                     

                     
                  </div><!-- /.product-info -->
               </div><!-- /.col-sm-7 -->
            </div><!-- /.row -->
                </div>
            
            <div class="product-tabs inner-bottom-xs  wow fadeInUp">
               <div class="row">
                  <div class="col-sm-3">
                     <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                        <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                        <li><a data-toggle="tab" href="#review">Avis</a></li>
                     </ul><!-- /.nav-tabs #product-tabs -->
                  </div>
                  <div class="col-sm-9">

                     <div class="tab-content">
                        
                        <div id="description" class="tab-pane in active">
                           <div class="product-tab">
                              <p class="text"><?php echo $single_product->pro_description; ?>.</p>
                           </div>   
                        </div><!-- /.tab-pane -->

                        <div id="review" class="tab-pane">
                           <div class="product-tab">
                                                            
                              <div class="product-reviews">
                                 <h4 class="title">Avis des clients</h4>

                                 <div class="reviews">
                                    <div class="review">
                                       <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                       <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                                              </div>
                                 
                                 </div><!-- /.reviews -->
                              </div><!-- /.product-reviews -->
                              

                              
                              <div class="product-add-review">
                                 <h4 class="title">Write your own review</h4>
                                 <div class="review-table">
                                    <div class="table-responsive">
                                       <table class="table">   
                                          <thead>
                                             <tr>
                                                <th class="cell-label">&nbsp;</th>
                                                <th>1 star</th>
                                                <th>2 stars</th>
                                                <th>3 stars</th>
                                                <th>4 stars</th>
                                                <th>5 stars</th>
                                             </tr>
                                          </thead> 
                                          <tbody>
                                             <tr>
                                                <td class="cell-label">Quality</td>
                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                             </tr>
                                             <tr>
                                                <td class="cell-label">Price</td>
                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                             </tr>
                                             <tr>
                                                <td class="cell-label">Value</td>
                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                             </tr>
                                          </tbody>
                                       </table><!-- /.table .table-bordered -->
                                    </div><!-- /.table-responsive -->
                                 </div><!-- /.review-table -->
                                 
                                 <div class="review-form">
                                    <div class="form-container">
                                       <form role="form" class="cnt-form">
                                          
                                          <div class="row">
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                   <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                   <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                </div><!-- /.form-group -->
                                                <div class="form-group">
                                                   <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                   <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                </div><!-- /.form-group -->
                                             </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                   <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                </div><!-- /.form-group -->
                                             </div>
                                          </div><!-- /.row -->
                                          
                                          <div class="action text-right">
                                             <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                          </div><!-- /.action -->

                                       </form><!-- /.cnt-form -->
                                    </div><!-- /.form-container -->
                                 </div><!-- /.review-form -->

                              </div><!-- /.product-add-review -->                            
                              
                             </div><!-- /.product-tab -->
                        </div><!-- /.tab-pane -->


                     </div><!-- /.tab-content -->
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.product-tabs -->

            <!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
   <h3 class="section-title">Autres produits de même type</h3>
   <div class="owl-carousel homepage-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
        <?php foreach ($products as $product) { 
          if($product->pro_id!=$single_product->pro_id){?>
      <div class="item item-carousel">
         <div class="products">
            
             <div class="product">      
                <div class="product-image">
                   <div class="image">
                      <a href="<?php echo site_url('produit/details/'.$product->pro_slug) ?>"><img  src="<?php echo base_url();?>assets/uploads/<?php echo $product->pro_image; ?>" height="250"></a>
                   </div><!-- /.image -->        
                   
                </div><!-- /.product-image -->
                   
                
                <div class="product-info text-left">
                   <h3 class="name"><a href="<?php echo site_url('produit/details/'.$product->pro_slug) ?>"><?php echo $product->pro_name; ?></a></h3>
                   <div class="description"></div>

                   <div class="product-price">   
                      <span class="price"><?php echo number_format($product->pro_price,0," "," "); ?> FCFA </span>
                                     
                   </div><!-- /.product-price -->
                   
                </div><!-- /.product-info -->
               <div class="cart clearfix animate-effect">
            <div class="action">
               <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">
                     <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                        <i class="fa fa-shopping-cart"></i>                                     
                     </button>
                     <button class="btn btn-primary cart-btn" type="button">Ajouter au panier</button>
                                       
                  </li>
                      
                      <li class="lnk wishlist">
                     <a class="add-to-cart" href="<?php echo site_url('produit/details/'.$product->pro_slug) ?>" title="Wishlist">
                         <i class="icon fa fa-heart"></i>
                     </a>
                  </li>

                  <li class="lnk">
                     <a class="add-to-cart" href="<?php echo site_url('produit/details/'.$product->pro_slug) ?>" title="Compare">
                         <i class="fa fa-signal"></i>
                     </a>
                  </li>
               </ul>
            </div><!-- /.action -->
         </div><!-- /.cart -->
         </div><!-- /.product -->
      
         </div><!-- /.products -->
      </div><!-- /.item -->

    <?php } } ?>

         </div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
         
         </div><!-- /.col -->
         <div class="clearfix"></div>
      </div><!-- /.row -->
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

<!-- ============================================================= FOOTER ============================================================= -->
<?php $this->load->view('home/template/footer'); ?>
<!-- ============================================================= FOOTER : END============================================================= -->


   <!-- For demo purposes – can be removed on production -->
   
   
   <!-- For demo purposes – can be removed on production : End -->

   <!-- JavaScripts placed at the end of the document so the pages load faster -->
   <script src="<?=base_url()?>assets/js/jquery-1.11.1.min.js"></script>

   <script type="text/javascript">
     function addpanier(rowid) {
     var qty = $("#qty").val();
   
     $.ajax({
      url: "<?=base_url()?>index.php/panier/home/addpanier/"+rowid+"/"+qty,
      type : "POST",
      data: {},
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
