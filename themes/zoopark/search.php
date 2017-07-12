<?php get_header(); ?>
<!-- SEARCH -->
  <div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <h3>
            Résultat de votre recherche
          </h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <?php if(have_posts()) : ?>

    <h4><?php echo $wp_query->found_posts ?> <?php echo ($wp_query->found_posts > 1) ? "résultats trouvés" : "résultat trouvé"?> pour "<?php the_search_query(); ?>"</h4>

    <?php while(have_posts()) : the_post(); ?>
    <div class="row">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p><?php the_excerpt(); ?></p>
    </div>
    <?php endwhile; else :?>
    <div class="row">
      <p>Désolé, la recherche de "<?php the_search_query(); ?>" n'a rien donné...</p>
    </div>
    <?php endif; ?>

  </div>
<?php get_footer(); ?>