<?php
/*
 * Archive grid
 *
 */
?>

<section class="archive-grid">
  <div class="container">
    <div class="row row--justify-content-center">

      <div class="col-12 text-center">
        <h3>Gallery</h3>
        <h2><?php echo str_replace("Service Category: ", "", get_the_archive_title()); ?></h2>
      </div>

      <?php if( have_posts() ) :

        while( have_posts() ) : the_post();

          get_template_part('components/post-tile');

        endwhile; ?>

        <div class="col-12 col-centered text-center">
          <?php the_posts_pagination( array('mid_size' => 2) ); ?>
        </div>

      <?php else : ?>

        <div class="col-12">
          <h2>Sorry, no posts have been found.</h2>
        </div>

      <?php endif; ?>

    </div>
  </div>
</section>
