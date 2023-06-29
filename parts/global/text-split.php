<?php
/*
 * Text/Split (global)
 *
 * component used on various templates/views
 */

// Custom fields
$left_content = get_sub_field('text_split_left_content');
$right_content = get_sub_field('text_split_right_content');
$bg_color = get_sub_field('text_split_background_color');
$sectionID = get_sub_field('text_split_id');
$steps_side = get_sub_field('text_split_steps_side');
$steps_toggle = get_sub_field('text_split_steps_toggle');
?>

<section class="text-split" style="background-color: <?php echo $bg_color; ?>;" id="<?php echo slugify($sectionID); ?>">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <?php echo $left_content; ?>
        <?php if($steps_toggle && $steps_side == 'left'): ?>
          <div class="text-split__steps">
            <?php while( have_rows('text_split_steps_section') ): the_row(); 
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
        <?php endif; ?>
      </div>
      <div class="col-6">
        <?php echo $right_content; ?>
        <?php if($steps_toggle && $steps_side == 'right'): ?>
          <div class="text-split__steps">
            <?php while( have_rows('text_split_steps_section') ): the_row(); 
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
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>