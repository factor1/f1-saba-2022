<?php
/**
 * The single service gallery template.
 *
 * Used when a single service gallery is queried.
 */

get_header();

if( have_posts() ) : while( have_posts() ) : the_post(); ?>

  <section class="centered-text-block single-post">
    <div class="container">
      <div class="row">
        <div class="col-10 text-center col-centered">
          <h3>Gallery</h3>
        </div>
        <div class="col-10 col-centered">



          <?php the_content(); ?>

        </div>
      </div>
    </div>
  </section>

<?php endwhile; endif;

get_template_part('parts/single-service_gallery/related-galleries');

get_footer(); ?>
