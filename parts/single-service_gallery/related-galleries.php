<?php
/*
 * Related Service Gallery (single)
 *
 */

$current_cat = get_the_terms(get_the_ID(), 'service_category');

// WP_Query arguments
$args = array(
  'post__not_in' => array(get_the_ID()),
	'post_type' => array( 'service_gallery' ),
	'post_status' => array( 'publish' ),
  	'tax_query' => array(
		array(
			'taxonomy' => 'service_category',
			'terms' => $current_cat[0]->term_taxonomy_id,
		),
	),
);

// The Query
$query = new WP_Query( $args );

if( $query ) : ?>

  <section class="slider-section" style="background-color: <?php echo $bg_color; ?>;">
    <div class="container">

      <div class="row">
        <div class="col-12 text-center">
          <h3>View Other Cases</h3>
        </div>
      </div>

      <div class="row row--justify-content-center">

        <div class="col-12 sm-col-12 col-centered slider-section-related__slider">

          <?php if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post(); ?>
  
                <div class="slider-section-related__slide">
                  <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                  </a>
                </div>
                
              <?php }
            }

          // Restore original Post Data
          wp_reset_postdata(); ?>
  
        </div>
      </div>
    </div>
  </section>
  
  <?php endif; ?>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-left">
          <a href="<?php echo get_term_link($current_cat[0]->term_taxonomy_id,$current_cat[0]->taxonomy); ?>" class="button button--secondary" role="link" title="Go back" target="">Go Back to Main Gallery</a>
        </div>
      </div>
    </div>
  </div>