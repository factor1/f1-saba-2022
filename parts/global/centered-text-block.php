<?php
/*
 * Centered Text Block (Global)
 *
 * Template part used on various templates/views
 */

// Check if 404
$is404 = is_404();

// Centered Text Block Custom Fields
if( $is404 ) :
  $colSpan = 10;
  $content = get_field('404_content', 'option');
  $bg_color = '#fff';
  $sectionID = '';
  $hasMargin = false;
  $steps_toggle = false;
  $steps_content = '';
else :
  $colSpan = get_sub_field('centered_text_block_column_span');
  $content = get_sub_field('centered_text_block_content');
  $btnAlign = get_sub_field('centered_text_block_button_alignment');
  $btnAlign = get_sub_field('centered_text_block_button_alignment');
  $bg_color = get_sub_field('centered_text_block_background_color');
  $sectionID = get_sub_field('centered_text_block_id');
  $hasMargin = get_sub_field('centered_text_block_margin_option');
  $hasMarginClass = $hasMargin ? ' has-margin' : '';
  $steps_toggle = get_sub_field('centered_text_block_steps_toggle');
  $steps_content = get_sub_field('centered_text_block_after_steps_content');
endif; ?>

<section class="centered-text-block <?php echo $hasMarginClass; ?>" style="background-color: <?php echo $bg_color; ?>;" id="<?php echo $sectionID; ?>">
  <div class="container">
    <div class="row">
      <div class="col-<?php echo $colSpan; ?> col-centered">

        <?php echo $content;

          if($steps_toggle && have_rows('centered_text_block_steps_section')): ?>

            <div class="centered-text-block__steps">
            <?php while( have_rows('centered_text_block_steps_section') ): the_row(); 
              $title = get_sub_field('title');
              $sub_title = get_sub_field('sub_title');
              ?>
              <div class="single-steps">
                <div class="steps-numbers">
                  <span><?php echo get_row_index(); ?></span>
                </div>
                <div class="steps-content">
                  <h3><?php echo $title; ?></h3>
                  <h5><?php echo $sub_title; ?></h5>
                </div>
              </div>
            <?php endwhile; ?>
            </div>
            
            <?php echo $steps_content; ?>
          <?php endif; 

        // Optional buttons
        if( have_rows('centered_text_block_buttons') ) : ?>

          <div class="buttons text-<?php echo $btnAlign; ?>">

            <?php while( have_rows('centered_text_block_buttons') ) : the_row();
              $btnClass = get_sub_field('button_class');
              $btn = get_sub_field('button'); ?>

              <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnClass; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                <?php echo $btn['title']; ?>
              </a>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
