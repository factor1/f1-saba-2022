<?php
/**
 * The single post template.
 *
 * Used when a single post is queried.
 */

get_header();

if( have_posts() ) : while( have_posts() ) : the_post(); ?>

  <section class="centered-text-block single-post">
    <div class="container">
      <div class="row">
        <div class="col-10 col-centered">

          <?php // Featured image
          if( has_post_thumbnail() ) : ?>

            <img src="<?php echo featuredURL('blog_hero'); ?>" class="centered-text-block__featured-image" alt="<?php the_title(); ?> featured image">

          <?php endif; ?>

          <?php // Meta data
          echo '<h1>'.get_the_title().'</h1>';
          get_template_part('parts/meta');

          the_content(); ?>

        </div>
      </div>
    </div>
  </section>

<?php endwhile; endif;

get_footer(); ?>
