<?php
/*
 * Newsletter Signup (Global)
 *
 * Template part used on various templates/views
 */

// Newsletter Signup Custom Fields
$intro = get_sub_field('newsletter_intro');
$form = get_sub_field('newsletter_form');
$bg_color = get_sub_field('newsletter_background_color'); ?>

<section class="newsletter-signup" style="background-color: <?php echo $bg_color; ?>;">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <?php echo $intro; ?>

        <?php gravity_form($form['id'], false, false, false, false, true); ?>

      </div>
    </div>
  </div>
</section>
