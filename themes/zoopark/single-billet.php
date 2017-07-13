<?php get_header(); ?>
<!-- SINGLE-BILLET -->
  <div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <h3>
              Billet : <span><?php the_title(); ?></span>
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

    th, h3 span {
      text-transform: uppercase;
    }

    tr:first-child th:first-child {
      width : 30%;
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
        <div class="col s12">
          <a href="<?php echo get_post_type_archive_link( 'billet' ); ?>" class="btn waves-effect waves-light black">Voir tous les billets</a>
        </div>
      </div>

      <div class="row">
        <div class="col s12 center">

          <table id="billeterie">
            <tr class="orange lighten-1">
              <th>Tarifs</th>
              <th><?php the_title(); ?></th>
            </tr>
            <tr>
              <td>Enfant</td>
              <td><?php the_field('enfant_fld'); ?>€</td>
            </tr>
            <tr>
              <td>Adulte</td>
              <td><?php the_field('adulte_fld'); ?>€</td>
            </tr>
          </table>

        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>