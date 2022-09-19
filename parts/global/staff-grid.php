<?php
/*
 * Staff grid (global)
 *
 * Template part used on the about template
 *
 */

// Staff grid Custom Fields
$intro = get_sub_field('flex_staff_section_intro');

// WP Query arguments 
$args = array(
  'post_type' => 'f1_staffgrid_cpt',
  'posts_per_page' => -1,
  'orderby' => 'ID',
  'order' => 'ASC'
);

// WP Query
$staff = new WP_Query( $args );

if( $staff->have_posts() ) : ?>

  <section class="staff-grid">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2><?php echo $intro; ?></h2>

          <div class="block-grid-3 md-block-grid-3 sm-block-grid-2" id="members">

            <?php while( $staff->have_posts() ) : $staff->the_post();
              // Staff Custom Fields
              $first = get_field('first_name');
              $last = get_field('last_name');
              $title = get_field('title');
              $id = get_the_ID();
              $bio = get_field('staff_bio');?>

              <div class="col stretch text-center"<?php echo $modal; ?> id="<?=$first . "_". $last?>">
                <div class="staff-grid__img" style="background: url('<?php echo featuredURL('staff'); ?>') center/cover no-repeat"></div>

                <h3 class="staff-grid__name"><?php echo $first . ' ' . $last; ?></h3>

                <p><?php echo $title; ?></p>
              </div>

            <?php endwhile; ?>

          </div>

        </div>
      </div>
    </div>
  </section>

<?php endif; wp_reset_postdata(); ?>