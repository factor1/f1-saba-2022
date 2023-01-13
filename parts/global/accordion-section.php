<?php
/**
 * Accordion Section
 * 
 * @author Factor1 Studios
 */

// Accordion Section Custom Fields
$section = 'accordion_section_';
$colSpan = get_sub_field($section . 'column_span'); // 6 - 12
$bg = get_sub_field($section . 'background');
$intro = get_sub_field($section . 'intro');
$btnAlign = get_sub_field($section . 'button_alignment'); 

if( have_rows($section . 'accordions') ) : ?>

  <section class="accordion-section" style="background-color: <?php echo $bg; ?>">
    <div class="container">
      <div class="row row--justify-content-center">
        <div class="col-<?php echo $colSpan; ?>">

          <?php echo $intro; 

          while( have_rows($section . 'accordions') ) : the_row();
            $headline = get_sub_field('headline');
            $content = get_sub_field('content'); ?>

            <div class="accordion">
              <button class="accordion__heading" tab-index="0">
                <h3><?php echo $headline; ?> <i class="fas fa-plus"></i></h3>
              </button>

              <div class="accordion__body">
                <?php echo $content; ?>
              </div>
            </div>

          <?php endwhile; 

          // Optional buttons
          if( have_rows($section . 'buttons') ) : ?>

            <div class="buttons text-<?php echo $btnAlign; ?>">

              <?php while( have_rows($section . 'buttons') ) : the_row();
                $btnColor = get_sub_field('button_color'); 
                $btn = get_sub_field('button'); 
                
                if( $btn ) : ?>

                  <a href="<?php echo esc_url($btn['url']); ?>" class="button--<?php echo $btnColor; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                    <?php echo $btn['title']; ?>
                  </a>

                <?php endif;
              
              endwhile; ?>

            </div>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </section>

<?php endif; ?>