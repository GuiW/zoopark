<?php get_header(); ?>
 <div class="input-field col s12">
   <select id="select-icons" class="icons">
     <option value="" disabled selected>Choisissez un animal</option>

     <?php
     //Liste d'animaux'
      $args = array(
        'post_type' => 'animal',
      );
      $requete = new WP_Query($args);

      if($requete->have_posts()) :
      while($requete->have_posts()) : $requete->the_post(); 
    ?>

    <?php if(get_field('long_fld') && get_field('lat_fld') && get_field('mapIcon_fld')) : ?>
      <option value="<?php the_title() ?>"

        <?php $image = get_field('mapIcon_fld');
          if( !empty($image)) : ?>
          data-icon="<?php echo $image['url']; ?>"
        <?php endif; ?>

      class="left circle"><?php the_title(); ?></option>
     <?php endif; //all fields?>

     <?php endwhile; endif; 
     wp_reset_postdata();?>

   </select>
   <label>Images in select</label>
 </div>

 <!-- MAP -->
 <div class="mini-map section">
   <div class="container">
     <div class="row">
       <div id="mapCont" class="col s12">

         <?php 
         //Creation de la map + pointer
         if(have_posts()) : the_post(); ?>
          <img src="<?php the_field('map_fld'); ?>" alt="map">
          <div id="pointer"></div>
         <?php endif; ?>

        <!-- ICONES D'ANIMAUX SUR LA MAP -->
         <?php 
         //Icones d'animaux
          $args = array(
             'post_type' => 'animal',
          );
           $requete = new WP_Query($args);

           if($requete->have_posts()) :
           while($requete->have_posts()) : $requete->the_post(); ?>

           <?php if(get_field('long_fld') && get_field('lat_fld') && get_field('mapIcon_fld')) : ?>

           <div class="animal-icon" data-long="<?php the_field('long_fld'); ?>" data-lat="<?php the_field('lat_fld'); ?>" data-animal="<?php the_title(); ?>"> 

            <?php $image = get_field('mapIcon_fld');
              if( !empty($image)) : ?>
                <img src="<?php echo $image['url']?>" alt="<?php the_title(); ?>">
            <?php endif; //mapIcon_fld ?>

           </div>
           <?php endif; //all fields ?>
          
          <?php endwhile; endif; 
          wp_reset_postdata();?>

       </div>
     </div>
   </div>
 </div>
<?php get_footer(); ?>
