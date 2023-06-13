<?php
/**
 * The single service gallery template.
 *
 * Used when a single service gallery is queried.
 */

get_header();

$is_gallery = is_singular('service_gallery');

if( have_posts() ) : while( have_posts() ) : the_post(); ?>

  <section class="centered-text-block single-post">
    <div class="container">
      <div class="row">
        <div class="col-10 col-centered">

          <?php // Featured image
          if( has_post_thumbnail() && !$is_gallery) : ?>

            <img src="<?php echo featuredURL('blog_hero'); ?>" class="centered-text-block__featured-image" alt="<?php the_title(); ?> featured image">

          <?php endif; ?>

          <?php the_content(); ?>

        </div>
      </div>
    </div>
  </section>

<?php endwhile; endif;

get_template_part('parts/single-service_gallery/related-galleries');

get_footer(); ?>
