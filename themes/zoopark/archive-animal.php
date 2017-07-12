<?php get_header(); ?>
<!-- ARCHIVE-ANIMAL -->
  <div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <h3>
            <?php print_r(get_the_archive_title()); ?>
          </h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <?php if(have_posts()) : 
      while(have_posts()) : the_post(); ?>
    <div class="row">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p><?php the_excerpt(); ?></p>
    </div>
    <?php endwhile;
    endif; ?>
  </div>
<?php get_footer(); ?>