<?php get_header(); ?>
<!-- SINGLE -->
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

    <div class="row">
      <div class="col s12">
        <?php
            $category = get_the_category();
            // Get the URL of this category
            $category_link = get_category_link( $category[0]->cat_ID );
        ?>

        <!-- Print a link to this category -->
        <a class="btn waves-effect waves-light orange" href="<?php echo esc_url( $category_link ); ?>">Voir <?php echo ($category[0]->cat_ID == 3) ? "tous" : "toutes"; ?> les <?php echo $category[0]->name ?></a>

      </div>
    </div>

    <?php if(have_posts()) : ?>
    <div class="row">
    <?php while(have_posts()) : the_post(); ?>
      <div class="col">
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
      </div>
    <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
<?php get_footer(); ?>