  <header class="main-nav clearfix">

    <!-- Searchbar -->
    <div class="top-search-bar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="search-input-addon">
              <span class="addon-icon"><i class="icon-search4"></i></span>
              <input type="text" class="form-control top-search-input" placeholder="Enter your keyword...">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Searchbar -->

    <!-- Branding -->
    <div class="navbar-left pull-left">
      <div class="clearfix">
        <ul class="left-branding pull-left">
          <li class="visible-handheld"><span class="left-toggle-switch"><i class="icon-menu7"></i></span></li>
          <li>
            <a href="index.html"><div class="logo"></div></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /Branding -->

    <!-- Search & Languages -->
    <div class="navbar pull-left">
      <div class="">
        <h1 style="text-align: center;font-weight: bold;"><?php if($admin_magasin!=NULL){echo $admin_magasin->label_magasin." -  Ville : ".$admin_magasin->label_ville." / Region : ".$admin_magasin->region_ville;}
        if($admin_magasin==NULL){echo "Magasin Général";}?></h1>
      </div>
    </div>
    <!-- /Search & Languages -->

    <!-- Navbar icons -->
    <div class="navbar pull-right">
      <div class="clearfix">
        <ul class="pull-right top-icons">
          <li><a href="#" class="btn-top-search visible-xs"><i class="icon-search4"></i></a></li>

          <!-- /Rightbar -->

          <!-- User dropdown -->
          <li class="dropdown user-dropdown">
            <a class="user-name hidden-xs" data-toggle="dropdown"><?php echo $user_connected->usr_surname." ".$user_connected->usr_name; ?> <i class="icon-more2"></i><small>
              <?php 
            if($user_connected->usr_group==1){echo "Administrateur";} ?></small></a>
            <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="<?php echo base_url(); ?>uploads/utilisateur/<?php echo $user_connected->usr_photo; ?>" class="img-circle user" alt=""/></a>
            <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
            <div class="dropdown-menu no-padding">
              <!-- <div class="user-icon text-center p-t-15">
                  <img src="<?php echo base_url();?>assets/dashboard/img/demo/img1.jpg" class="img-circle" alt=""/>
                  <h5 class="text-center p-b-15 text-semibold">Hi! Jane Elliott</h5>
              </div> -->
              <ul class="user-links">
                  <li><a href="<?php echo site_url('dashboard/monCompte');?>"><i class="icon-profile"></i> Mon compte</a></li>
              </ul>
              <div class="text-center p-10"><a href="<?php echo site_url('dashboard/seDeconnecter');?>" class="btn btn-block"><i class="icon-exit3 i-16 position-left"></i> Se déconnecter</a></div>
            </div>
          </li>
          <!-- /User dropdown -->

        </ul>
      </div>
    </div>
    <!-- /Navbar icons -->

  </header>