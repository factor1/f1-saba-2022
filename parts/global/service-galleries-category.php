<?php
/*
 * Service Gallery
 *
 * Template part used on various templates/views
 */

// Service Gallery Custom Fields
$intro = get_sub_field('service_gallery_category_intro');
$bg_color = get_sub_field('service_gallery_category_background_color');
$service_cat = get_sub_field('service_gallery_category_posts');

// WP_Query arguments
$args = array(
	'post_type'              => array( 'service_gallery' ),
	'post_status'            => array( 'publish' ),
	'tax_query'              => array(
		array(
			'taxonomy'         => 'service_category',
			'terms'            => $service_cat,
		),
	),
);

// The Query
$query = new WP_Query( $args );

if( $query ) : ?>

  <section class="three-column-grid" style="background-color: <?php echo $bg_color; ?>;">
    <div class="container">
      <div class="row row--justify-content-center">
        <div class="col-12">
          <?php echo $intro; ?>
        </div>

        <?php if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post(); ?>

              <div class="col-4 md-col-5 sm-col-10 stretch">
                <div class="three-column-grid__column">
                  <div>
                    <div class="three-column-grid__text">
                      <?php the_content(); ?>
                    </div>

                  </div>

                </div>
              </div>
              
            <?php }
          } else {
            echo '<div class="col-4 md-col-5 sm-col-10 stretch">
              <div class="three-column-grid__column">
                <div>
                  <div class="three-column-grid__text">
                    <h2>No Galleries Found.</h2>
                  </div>

                </div>

              </div>
            </div>';
          }

        // Restore original Post Data
        wp_reset_postdata(); ?>

      </div>
    </div>
  </section>

<?php endif; ?>
