<?php
/**** Déclaration des menus ****/
    register_nav_menu('main_nav','Navigation principale');


/**** Ajouter la recherche au menu ****/
  function add_last_nav_item($items, $args) {
    if ($args->menu == 'main_nav') {
          $homelink = get_search_form();
          $items = $items;
          $items .= '<li>'.$homelink.'</li>';
          return $items;
    }
    return $items;
  }
  add_filter( 'wp_nav_menu_items', 'add_last_nav_item', 10, 2 );


/**** Déclaration des zones de widgets ****/
  register_sidebar(array(
      'id'    =>  'zone_sidebar',
      'name'  =>  'Barre latérale',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>'
  ));


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


/**** Titre des archives ****/
    function my_theme_archive_title( $title ) {
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>';
        } elseif ( is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $title = single_term_title( '', false );
        }

        return $title;
    }

    add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

    add_filter( 'get_the_archive_title', 'modify_archive_title', 10, 1 );

    function modify_archive_title( $title ) {

        $var = "Les ";

        return $var . $title;

    }
?>