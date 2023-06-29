<?php
/*
 * Service Gallery
 *
 * Template part used on various templates/views
 */

// Service Gallery Custom Fields
$intro = get_sub_field('service_gallery_intro');
$bg_color = get_sub_field('service_gallery_background_color');
$service_posts = get_sub_field('service_gallery_posts');

if( $service_posts ) : ?>

  <section class="three-column-grid" style="background-color: <?php echo $bg_color; ?>;">
    <div class="container">
      <div class="row row--justify-content-center">
        <div class="col-12">
          <?php echo $intro; ?>
        </div>
        
        <?php if( $service_posts ): ?>
          <?php foreach( $service_posts as $post ): 
            setup_postdata($post); ?>
            <div class="col-4 md-col-5 sm-col-10 stretch">
              <div class="three-column-grid__column">
                <div>
                  <div class="three-column-grid__text">
                    <?php the_content(); ?>
                  </div>

                </div>

              </div>
            </div>
          <?php endforeach; wp_reset_postdata(); ?>
        <?php endif; ?>

      </div>
    </div>
  </section>

<?php endif; ?>
