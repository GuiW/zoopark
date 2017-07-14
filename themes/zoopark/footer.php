  <footer class="page-footer brown lighten-1">
    <div class="container">
      <div class="row">
        <?php 
          //SPECTACLES
          $args = array(
            'category_name'   => 'spectacles',
            'posts_per_page'  => 4
          );
          $requete = new WP_Query($args);

          if($requete->have_posts()) : ?>
          
            <div class="col l3 m6 s12">
              <h3 class="white-text">Spectacles</h3>
              <ul class="footer-links">
                <?php while($requete->have_posts()) : $requete->the_post(); ?>
                <li><a href="#!"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
              </ul>
            </div>
         <?php endif; 
          wp_reset_postdata(); ?>

        <?php
        // ACTIVITES
         $args = array(
           'category_name'   => 'activites',
           'posts_per_page'  => 4
         );
         $requete = new WP_Query($args);

         if($requete->have_posts()) : ?>

           <div class="col l3 m6 s12">
             <h3 class="white-text">Activités</h3>
             <ul class="footer-links">
               <?php while($requete->have_posts()) : $requete->the_post(); ?>
               <li><a href="#!"><?php the_title(); ?></a></li>
               <?php endwhile; ?>
             </ul>
           </div>
        <?php endif; 
         wp_reset_postdata(); ?>

         <?php
         //COORDONNEES + MAP
         $args = array(
           'pagename' => 'coordonnees',
         );

         $requete = new WP_Query($args);
         if($requete->have_posts()) : $requete->the_post() ?>
          <div class="gmap col l6 m12 s12">
            <?php the_field('map_fld')?>
          </div>
        <?php endif; ?>

      </div>
    </div>
    <div class="section white">
      <div class="access-map container">
        <div class="row">
          <div class="col s12 center">
            <h3 class="brown-text">Adresse</h3>

            
            <?php
            //COORDONNEES 
            $requete = new WP_Query($args);
            if($requete->have_posts()) : $requete->the_post() ?>
                <p>
                  <h4><em>Gosselies</em> 
                  <?php the_custom_logo(); ?>
                  </h4>
                  <span itemprop="streetAddress">Rue <?php the_field('rue_fld')?> -</span>
                  <span itemprop="addressLocality"><?php the_field('zip_fld')?> -</span>
                  (<span itemprop="addressRegion"><?php the_field('pays_fld')?></span>- <?php the_field('pays-iso_fld')?>)
                </p>
                <p><?php the_field('direction_fld')?></p>
            <?php endif; 
            wp_reset_postdata(); //Coordonnees + map ?>

          </div>
        </div>
      </div>
    </div>
    <div class="section version grey darken-3">
      <div class="row">
        <div class="col s6 center">
          <a class="waves-effect text waves-orange btn-flat">Français</a>
        </div>
        <div class="col s6 center">
          <a class="waves-effect waves-orange btn-flat">English</a>
        </div>
      </div>
    </div>
    <div class="footer-copyright center grey darken-4">
      <div class="container">
        ZooPark <a class="brown-text text-lighten-3" href="#">2016</a>
      </div>
    </div>
  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?php bloginfo('template_url');?>/js/materialize.js"></script>
  <script src="<?php bloginfo('template_url');?>/js/init.js"></script>

  <script>
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });
  </script>

  <script>   $(document).ready(function() {
    $('select').material_select();
  });</script>

  <?php wp_footer(); ?>
</body>
</html>