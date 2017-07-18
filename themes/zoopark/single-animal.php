<?php get_header(); ?>
<!-- SINGLE-ANIMAL -->
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
    <?php if(have_posts()) : ?>
    <div class="row">
    <?php while(have_posts()) : the_post(); ?>
      <?php $image = get_field('imgAnimal_fld');
      if( !empty($image)) : ?>
      <div class="col l8 offset-l2">
        <img class="responsive-img" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
      </div>
      <?php endif; ?>
      <div class="col">
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
      </div>
    <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
<?php get_footer(); ?>