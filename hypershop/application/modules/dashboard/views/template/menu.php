
<aside class="menu">
  <style type="text/css" media="screen">
  .main-nav .navbar-left .logo {
    width: 180px;
    height: 32px;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
    <div class="left-aside-container">

      <!-- User profile -->
      <div class="user-profile"></div>
      <!-- /User profile -->

      <!-- Main menu -->
      <div class="menu-container handheld">
        <ul class="sidebar-accordion">

    <li><a href="<?php echo site_url('dashboard');?>"><i class="icon-display4"></i><span class="list-label"> BackOffice</span></a></li>
    
    <li class="list-title">Gestion</li>
    <li><a href="#"><i class="icon-cart2"></i> <span>Ventes</span></a>
        <ul>
            <li><a href="<?php echo site_url('dashboard/client') ?>">Clients</a></li>
            <li><a href="<?php echo site_url('dashboard/Gproduit') ?>">Produits</a></li>
            <li><a href="<?php echo site_url('dashboard/stock') ?>">Stocks</a></li>
            <li><a href="<?php echo site_url('dashboard/categorieProduit') ?>">Catégories</a></li>
            <li><a href="<?php echo site_url('dashboard/commande') ?>">Commandes</a></li>
            <li><a href="<?php echo site_url('dashboard/paiement') ?>">Paiements</a></li>
        </ul>
    </li>
    <li><a href="#"><i class="icon-image3"></i> <span>Slides</span></a>
     <ul>
            <li><a href="<?php echo site_url('dashboard/slide') ?>">Slide principal/Sécondaire</a></li>
            <li><a href="ecom_productsa18a.html?t=">Photo</a></li>
            <li><a href="ecom_producta18a.html?t=">Vidéos</a></li>
            <li><a href="ecom_ordersa18a.html?t=">Liens</a></li>
            <li><a href="ecom_checkouta18a.html?t=">Actualités</a></li>
            <li><a href="ecom_checkouta18a.html?t=">Catégorie d'actualités</a></li>
            <li><a href="ecom_checkouta18a.html?t=">Flash Infos</a></li>
        </ul></li>
    <li><a href="messagesa18a.html?t="><i class="icon-comment-discussion"></i> <span>E-mail</span></a></li>
    <li class="list-title">Paramètres</li>    
    <li><a href="peoplea18a.html?t="><i class="icon-user"></i> <span>Utilisateurs</span></a></li>
    <li>

        <a href="#"><i class="icon-puzzle"></i><span> Ouils</span></a>
        <ul>
            <li><a href="widgets_dashboarda18a.html?t=">Dashboard Widgets</a></li>
            <li><a href="widgets_testimonialsa18a.html?t=">Testimonials</a></li>
            <li><a href="widgets_hover_effectsa18a.html?t=">Hover Effects</a></li>
            <li><a href="widgets_teama18a.html?t=">Team Showcase</a></li>
            <li><a href="widgets_news_slidersa18a.html?t=">News Sliders</a></li>
        </ul>
    </li>
</ul>
      </div>

      <div class="menu-container screen">
        <ul class="sidebar-accordion">

    <li><a href="<?php echo site_url('dashboard');?>"><i class="icon-display4"></i><span class="list-label"> Tableau de bord</span></a></li>
    <?php 
        $current_url = current_url();       
        $lenght_current_url=strlen($current_url);
        $base_url=base_url();
        $length_base_url=strlen($base_url);
        $controller_name=substr($current_url, $length_base_url);        
        $base=base_url()."".$controller_name;  
        //echo $controller_name;
        //echo $this->uri->segment(3);
   ?>
    <li class="list-title">E-commerce</li>
    <li><a href="#" class="acc-parent <?php
             $active_menu="active";
             if ($controller_name=="dashboard/client" or $controller_name=="dashboard/Gproduit" or $controller_name=="dashboard/stock" or $controller_name=="dashboard/categorieProduit" or $controller_name=="dashboard/varianteProduit") { echo $active_menu; } else { $active_menu=""; } ?>"><i class="icon-cart2"></i> <span>Ventes</span></a>
        <ul>
           <li><a href="<?php echo site_url('dashboard/client') ?>">Clients</a></li>
            <li><a href="<?php echo site_url('dashboard/Gproduit') ?>">Produits</a></li>
            <li><a href="<?php echo site_url('dashboard/stock') ?>">Stocks</a></li>
            <li><a href="<?php echo site_url('dashboard/categorieProduit') ?>">Catégories</a></li>
           <!--  <li><a href="<?php echo site_url('dashboard/varianteProduit') ?>">Variantes</a></li> -->
           
        </ul>
    </li>
    <li class="acc-parent">
        <a href="#"  class="acc-parent <?php
             $active_menu="active";
             if($controller_name=="dashboard/commande"  or $controller_name=="dashboard/paiement") { echo $active_menu; } else { $active_menu=""; } ?>"><i class="icon-cash3"></i> <span>Factures</span><span class="acc-icon"></span><span class="acc-icon"></span></a>
        <ul style="display: block;">
        <li><a href="<?php echo site_url('dashboard/commande') ?>">Commandes</a></li>
            <li><a href="<?php echo site_url('dashboard/paiement') ?>">Paiements</a></li>
        </ul>
    </li>
     <li class="list-title">Animation</li>
    <li><a href="#"><i class="icon-image3"></i> <span>Slides</span></a>
     <ul>
            <li><a href="<?php echo site_url('dashboard/slide') ?>">Slide principal/Sécondaire</a></li><!-- 
            <li><a href="<?php echo site_url('dashboard/galerie') ?>">Photo</a></li>
            <li><a href="<?php echo site_url('dashboard/video') ?>">Vidéos</a></li>
             <li><a href="<?php echo site_url('dashboard/partenaire') ?>">Partenaires</a></li>
            <li><a href="<?php echo site_url('dashboard/actualite') ?>">Actualités</a></li>
            <li><a href="<?php echo site_url('dashboard/categorie') ?>">Catégorie d'actualités</a></li>
            <li><a href="<?php echo site_url('dashboard/flash') ?>">Flash Infos</a></li>
            <li><a href="<?php echo site_url('dashboard/fichier') ?>">PDF</a></li> -->
        </ul></li>
    
    <li class="list-title">Administration</li>    
    <li><a href="#"><i class="icon-user"></i> <span>Utilisateurs</span></a>
     <ul>
            <li><a href="<?php echo site_url('dashboard/magasin') ?>">Magasin</a></li>
            <li><a href="<?php echo site_url('dashboard/utilisateur');?>">Utilisateur</a></li>
            
          
        </ul>
      </li>
    <li><a href="<?php echo site_url('dashboard/statistique');?>"><i class="icon-chart"></i><span class="list-label"> Statistique</span></a></li>
  
</ul>
      </div>
      <!-- /Main menu -->
      <style>
      @media screen and (min-width: 1024px){
        .menu-container.screen{
          display: inherit;
        }
        .menu-container.handheld{
          display: none;
        }
      }
      @media screen and (max-width: 1023px){
        .menu-container.screen{
          display: none;
        }
        .menu-container.handheld{
          display: inherit;
        }
      }
      </style>
    </div>
  </aside>