<header class="header-style-1">

   <!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
   <div class="container">
      <div class="header-top-inner">
         <div class="cnt-account">
            <ul class="list-unstyled">
            <li><a href="#"><i class="icon fa fa-user"></i>Mon compte</a></li>
            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>Mon panier</a></li>
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

   <div class="dropdown dropdown-cart">
      <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
         <div class="items-cart-inner">
              <div class="basket"></div>
              <div class="basket-item-count"><span class="count">2</span></div>
              <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"> <span class="sign">$</span><span class="value">600.00</span> </span> </div>
            </div>
      </a>
      <ul class="dropdown-menu">
         <li>
            <div class="cart-item product-summary">
               <div class="row">
                  <div class="col-xs-4">
                     <div class="image">
                        <a href="detail.html"><img src="<?=base_url()?>assets/images/cart.jpg" alt=""></a>
                     </div>
                  </div>
                  <div class="col-xs-7">
                     
                     <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                     <div class="price">$600.00</div>
                  </div>
                  <div class="col-xs-1 action">
                     <a href="#"><i class="fa fa-trash"></i></a>
                  </div>
               </div>
            </div><!-- /.cart-item -->
            <div class="clearfix"></div>
         <hr>
      
         <div class="clearfix cart-total">
            <div class="pull-right">
               
                  <span class="text">Sub Total :</span><span class='price'>$600.00</span>
                  
            </div>
            <div class="clearfix"></div>
               
            <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>   
         </div><!-- /.cart-total-->
               
            
      </li>
      </ul><!-- /.dropdown-menu-->
   </div><!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->           </div><!-- /.top-cart-row -->
         </div><!-- /.row -->

      </div><!-- /.container -->

   </div><!-- /.main-header -->

   <!-- ============================================== NAVBAR ============================================== -->

<!-- ============================================== NAVBAR : END ============================================== -->

</header>