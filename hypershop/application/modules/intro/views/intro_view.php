<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="robots" content="all">
        <title>Intro - Bienvenue à African Village</title>

        <!--[if lt IE 9]>
            <script>
            document.createElement('video');
            </script>
        <![endif]-->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/intro.css">


        <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,700' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <video autoplay loop poster="polina.jpg" id="bgvid">
          <source src="<?php echo base_url();?>assets/videointro/video.mp4" type="video/mp4">
          <source src="<?php echo base_url();?>assets/videointro/video.webm" type="video/webm">
        </video>

        <div class="body-cover">
            <div class="logo">
               <div class="africanlogo pull-left"><img src="<?php echo base_url();?>assets/images/logo.png"  class="img-responsive" alt=""></div>
               <div class="fifalogo pull-right"><img src="<?php echo base_url();?>assets/images/fifa2018.png" class="img-responsive" alt=""></div>
           </div>

           <div class="site-access">
               <div class="access"><a style="color:white;" href="<?php echo site_url('home');?>">Accéder au site</a></div>
               <ul class="langue">
                   <!-- <li><a href="<?php echo site_url('home');?>"><img src="<?php echo base_url();?>assets/images/fr.png" width="15" height="15" alt=""> Français/French</a></li> -->
                   <!-- <li><a href="<?php echo site_url('home');?>"><img src="<?php echo base_url();?>assets/images/uk.png" width="15" height="15" alt=""> English</a></li> -->
               </ul>
           </div>

        </div>

       

        <!-- jQuery -->
        <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script> 
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
        
    </body>
</html>