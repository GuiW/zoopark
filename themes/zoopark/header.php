<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Zoopark</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php bloginfo('template_url');?>/css/styles.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <?php 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  ?>
  <style>
   .brand-logo {
     background-image: url(<?php echo esc_url($image[0]); ?>);
   }
  </style>

  <?php wp_head(); ?>
  
</head>
<body>
  <nav class=" ">
    <div class="search-bar nav-wrapper lighten-1 container">
      <?php get_search_form(); ?>
    </div>
  </nav>
  <nav class="white nav-princip" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="<?php echo home_url(); ?>" class="brand-logo"><h1 class="brand">ZooPark/<em>adventure</em></h1></a>

      <?php 
        //main menu desktop
          wp_nav_menu(array(
            'container'       => '',
            'menu_class'      => 'right hide-on-med-and-down',
            'theme_location'  => 'main_nav',
            'fallback_cb'     => false
          ));
      ?>
        <!--<li><a href="#">Horaires <span>été 2016</span></a></li>
        <li><a href="mapzoo.html">Ou suis-je ? <span>plan du parc</span></a></li>
        <li><a href="#">Les animaux </a></li>
        <li><a href="contact.html">Contact <span>réservation</span></a></li>
        <li><a href="#" class="material-icons">search</a><li>-->

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Horaires</a></li>
        <li><a href="#">Ou suis-je ? </a></li>
        <li><a href="#">Les animaux </a></li>
        <li><a href="#">Infos pratiques </a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>