<?php
/**** Déclaration des menus ****/
    register_nav_menu('main_nav','Navigation principale');

/**** Autoriser les fichiers SVG ****/
    function wpc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter('upload_mimes', 'wpc_mime_types');

/**** Logo ****/
    function theme_prefix_setup() {
      
      add_theme_support( 'custom-logo', array(
        'flex-width' => true,
      ) );

    }
    add_action( 'after_setup_theme', 'theme_prefix_setup' );
?>