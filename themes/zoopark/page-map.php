<?php get_header(); ?>
  <div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <h3>
            Carte du zoo
          </h3>
        </div>
      </div>
    </div>
  </div>

<!-- Style provisoire -->
  <style>
    #map {
      position : relative;

    }

    #map img {
      position : relative;
      display : block;
      width : 100%;
      height : auto;
    }

    #pointer {
      position : absolute;
      transform : translate(-50%, -50%);
      z-index : 1;
      width : 10px; height : 10px;
      border-radius : 50%;
      background : red;
    }
  </style>


<!-- MAP -->
  <div class="container">
    <div class="row center">
      <div id="map">
        <?php if(have_posts()) : the_post(); ?>
          <img src="<?php the_field('map_fld'); ?>" alt="">
        <?php endif; ?>
        <div id="pointer"></div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
