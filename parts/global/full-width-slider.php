<?php
/**
 * Full width slider (Global)
 *
 * Template part used on various templates/views
 *
 */

 $slider_class = get_sub_field('flex_full_slider_height') ? ' tall-slide' : '';
?>

<?php if( have_rows('full_width_slider') ): ?>
  <section class="full-width-slider <?php echo $slider_class; ?>">
  <?php while( have_rows('full_width_slider') ): the_row(); 
    $heightToggle = get_sub_field('full_width_slide_height_toggle');
    $bg = wp_get_attachment_image_src(get_sub_field('full_width_slide_background'), 'hero');
    $hAlign = get_sub_field('full_width_slide_background_horizontal_alignment'); // 0 - 100
    $vAlign = get_sub_field('full_width_slide_background_vertical_alignment'); // 0 - 100
    $overlay = get_sub_field('full_width_slide_overlay_toggle'); // T/F overlay
    $overlayType = get_sub_field('full_width_slide_overlay'); // light or dark
    $colSpan = get_sub_field('full_width_slide_column_span'); // 4 - 12
    $colAlign = get_sub_field('full_width_slide_column_alignment'); // start, center, or end
    $content = get_sub_field('full_width_slide_content');
    $btnAlign = get_sub_field('full_width_slide_button_alignment');
    // Conditional classes 
    $sectionClass = $heightToggle ? ' short' : ''; 
    $overlayClass = $colAlign == 'end' ? ' reverse' : ''; ?>
    <div class="full-width-slider__slide">

      <section class="single-slide<?php echo $sectionClass; ?>">

        <div class="single-slide__bg" style="background: url('<?php echo $bg[0]; ?>') <?php echo $hAlign; ?>% <?php echo $vAlign; ?>%/cover no-repeat"></div>
        
        <?php if( $overlay ) : ?>

          <div class="single-slide__overlay <?php echo $overlayType; ?><?php echo $overlayClass; ?>"></div>

        <?php endif; ?>

        <div class="container">
          <div class="row row--justify-content-<?php echo $colAlign; ?>">
            <div class="col-<?php echo $colSpan; ?>">

              <?php if( !$isWebinar ) : 
              
                echo $content; 

                if( have_rows('full_width_slide_buttons') ) : ?>

                  <div class="buttons text-<?php echo $btnAlign; ?>">

                    <?php while( have_rows('full_width_slide_buttons') ) : the_row();
                      $btnColor = get_sub_field('button_color');
                      $btn = get_sub_field('button'); ?>

                      <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnColor; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                        <?php echo $btn['title']; ?>
                      </a>

                    <?php endwhile; ?>

                  </div>

                <?php endif; 
              
              endif; ?>

            </div>
          </div>
        </div>
      </section>
      
    </div>
  <?php endwhile; ?>
  </section>
<?php endif; ?>