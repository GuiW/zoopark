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
    <?php if(have_posts()) : ?>
    <div class="row">
    <?php while(have_posts()) : the_post(); ?>
      <div class="col s12 m6 l4">
        <div class="card card-panel hoverable">
          <div class="card-image">
            <?php $image = get_field('imgAnimal_fld');
            if( !empty($image)) : ?>
            <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
            <?php endif; ?>
            <span class="card-title"><?php the_title(); ?></span>
          </div>
          <div class="card-content">
            <p><?php the_excerpt(); ?></p>
          </div>
          <div class="card-action">
            <a class="orange-text" href="<?php the_permalink(); ?>">En savoir plus</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
<?php get_footer(); ?>