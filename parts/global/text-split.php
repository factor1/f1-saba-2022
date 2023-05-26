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
?>

<section class="text-split" style="background-color: <?php echo $bg_color; ?>;" id="<?php echo slugify($sectionID); ?>">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <?php echo $left_content; ?>
      </div>
      <div class="col-6">
        <?php echo $right_content; ?>
      </div>
    </div>
  </div>
</div>