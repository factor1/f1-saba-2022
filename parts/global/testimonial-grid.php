<?php
/*
 * Testimonial Grid
 *
 * component used on various templates/views
 */

$intro = get_sub_field('testimonial_intro');
$btn = get_sub_field('testimonial_button');
$args = array(
	'post_type' => array( 'simple_testimonials' ),
);
$query = new WP_Query( $args );

if( $query->have_posts() ) : ?>

  <section class="testimonial-grid">
    <div class="container">
      <div class="row">
        <div class="col-10 col-centered">
          <?php echo $intro; ?>
        </div>
      </div>
      <div class="row">
        <?php if( $query->have_posts() ): ?>
          <?php while( $query->have_posts() ): $query->the_post();
            // Testimonials Fields
            $image = get_post_thumbnail_id();
            $img = wp_get_attachment_image_src($image, 'testimonial_grid');
            $content = get_field('testimonial');
            $citation = get_field('citation');
            $alt = get_post_meta($image, '_wp_attachment_image_alt', true);?>

            <div class="col-4 sm-col-12">
              <div class="testimonial-grid__single">
                <div class="single-top">
                  <div>
                    <img src="<?php echo $img[0]; ?>" alt="<?php echo $alt; ?>">
                  </div>
                  <div class="name">
                    <?php echo '<h5>'.get_the_title().'</h5>'; ?>
                    <?php echo '<p>'.$citation.'</p>'; ?>
                  </div>
                </div>
                <?php echo $content; ?> <br>
              </div>
            </div>

          <?php endwhile; ?>

          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <?php if($btn): ?>
            <a href="<?php echo $btn['url']; ?>" class="button button--primary"><?php echo $btn['title']; ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>