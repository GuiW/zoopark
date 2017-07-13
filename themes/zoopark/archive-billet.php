<?php get_header(); ?>
<!-- ARCHIVE-ANIMAL -->
  <div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <h3>
            Billeterie
          </h3>
        </div>
      </div>
    </div>
  </div>

  <!-- style provisoire -->
  <style>
    th,td {
      text-align : center;
    }

    th {
      text-transform: uppercase;
    }

    tr:not(:first-child) {
      background : #f9f9f9;
    }

    tr:not(:last-child) {
      border-bottom : 2px solid white;
    }

    th:not(:last-child),td:not(:last-child) {
      border-right : 2px solid white;
    }
  </style>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 center">

        <?php if(have_posts()) : ?>
          <table id="billeterie">
            <tr class="orange lighten-1">
              <th>Tarifs</th>
              <?php while(have_posts()) : the_post(); ?>
              <th><?php the_title(); ?></th>
              <?php endwhile; ?>
            </tr>
            <tr>
              <td>Enfant</td>
              <?php while(have_posts()) : the_post(); ?>
              <td><?php the_field('enfant_fld'); ?>€</td>
              <?php endwhile; ?>
            </tr>
            <tr>
              <td>Adulte</td>
              <?php while(have_posts()) : the_post(); ?>
              <td><?php the_field('adulte_fld'); ?>€</td>
              <?php endwhile; ?>
            </tr>
          </table>
        <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>