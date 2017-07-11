<?php get_header(); ?>
<!-- FRONT-PAGE -->
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="slogan container">

        <div class="row center">
          <h2 class="header col s12 light"><?php the_field('accroche01')?></h2>
        </div>

        <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light brown lighten-1">Billeterie</a>
        </div>

      </div>
    </div>
    <?php 
      $image = get_field('paralax01');
      if( !empty($image)) : ?>
        <div class="parallax"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
    <?php endif; ?>
  </div>

  <!-- animaux promote-->

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">

        <?php
        //Requête pour les posts sur les animaux
            $args = array(
                'post_type' => 'animal',
                'post_status' => 'publish',
                'posts_per_page' => 3
            );
            $requete = new WP_Query($args);

            if($requete->have_posts()) :
              while($requete->have_posts()): $requete->the_post(); 

              $flaticon = get_field_object('flaticon_fld');
              $fiValue = $flaticon['value'];
              $fiLabel = $flaticon['choices'][$fiValue]; ?>

                <div class="col s12 m4">
                  <div class="icon-block">
                    <h2 class="center brown-text"><i class="<?php echo $fiValue?>"><?php echo $fiLabel ?></i></h2>
                    <h3 class="center"><?php the_title(); ?><em>-<?php the_field('lieu_fld'); ?></em></h3>
                    <p class="light"><?php the_excerpt(); ?></p>
                  </div>
                </div>
            <?php endwhile; endif; 
            wp_reset_postdata(); ?>

      </div>

    </div>
  </div>

  <!-- Call-->
  <div class="call orange lighten-1">
    <div class="container">
      <div class="section">
        <div class="row">
          <div class="col s12 center">

              <p>Achetez votre ZOOPASS et accéder à notre Parc toute l'année !</p>
              <a href="#" id="download-button" class="call-btn btn-large waves-effect waves-light brown lighten-1">ZooPass<strong> 1jours </strong><span>28€*</span></a>
              <a href="#" id="download-button" class="call-btn btn-large waves-effect waves-light brown lighten-1">ZooPass<strong> 1ans </strong> <span>45€*</span></a>
              <p>*<small>Pass individuel</small></p>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h3 class="header col s12 light"><?php the_field('accroche02')?></h3>
        </div>
      </div>
    </div>
    <?php 
      $image = get_field('paralax02');
      if( !empty($image)) : ?>
        <div class="parallax"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
    <?php endif; ?>
  </div>

  <div id="horaires" class="opening container">
    <div class="section">
      <div class="row">
        <?php
        //Requête pour les posts horaires
          $args = array(
            'post_type' => 'horaire',
            'post_status' => 'publish',
            'posts_per_page' => 3
          );
          $requete = new WP_Query($args);

        if($requete->have_posts()) : ?>

          <div class="col s12 center">
            <h3 class="orange-text">Horaires</h3>
            <h4>Jours d'ouverture et heures d'ouverture</h4>
            <ul class="tabs">
              
            <?php while($requete->have_posts()): $requete->the_post(); ?>
              <li class="tab col s3"><a href="#<?php the_field('saisonId_fld'); ?>"><?php the_title(); ?></a> <?php the_field('date-start_fld'); ?> au <?php the_field('date-end_fld'); ?></li>
            <?php endwhile; ?>

            </ul>
          </div>

        <?php while($requete->have_posts()): $requete->the_post(); ?>
          <div id="<?php the_field('saisonId_fld')?>" class="col s12"><?php the_content(); ?></div>
        <?php endwhile;

        endif; 
        wp_reset_postdata(); ?>
      </div>
    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h3 class="header col s12 light"><?php the_field('accroche03')?></h3>
        </div>
      </div>
    </div>
    <?php 
      $image = get_field('paralax03');
      if( !empty($image)) : ?>
        <div class="parallax"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
    <?php endif; ?>
  </div>
<?php  get_footer(); ?>

