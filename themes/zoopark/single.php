<?php get_header(); ?>
<!-- ARCHIVE-ANIMAL -->
  <div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <h3>
            <?php the_title(); ?>
          </h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <?php if(have_posts()) : 
      while(have_posts()) : the_post(); ?>
    <div class="row">
      <h2><?php the_title(); ?></h2>
      <p><?php the_content(); ?></p>
    </div>
    <?php endwhile;
    endif; ?>
  </div>
<?php get_footer(); ?>