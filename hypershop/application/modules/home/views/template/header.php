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
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="<?php echo base_url();?>"> <img src="<?=base_url()?>assets/images/logo.png" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
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
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
     <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"></div>
              <div class="basket-item-count"><span class="count"><?= $this->cart->total_items(); ?></span></div>
              <div class="total-price-basket" style="font-size: 14px;"> <span class="lbl"></span> <span class="total-price"> <span class="sign"><?php echo number_format($this->cart->total(),0," "," "); ?> </span><span class="value">CFA</span> </span> </div>
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
                    <div class="col-xs-1 action"> <a href="<?php echo site_url('panier/home/clear_one_item/'.$items['rowid']).'/1' ?>"><i class="fa fa-trash"></i></a> </div>
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
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
    
    <!-- /.container-class --> 
    

  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>