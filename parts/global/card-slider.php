<?php
/*
 * Card Slider (global)
 * 
 * Template part used on various templates/views
 *
 */

$intro = get_sub_field('card_slider_intro');
$full_btn = get_sub_field('card_slider_button');
$bg_color = get_sub_field('card_slider_background_color');?>

<section class="card_slider" style="background-color: <?php echo $bg_color; ?>;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php echo $intro; ?>
      </div>
      <div class="col-12 text-center col-no-pad">

        <div class="card_slider__slider">

          <?php if( have_rows('cards_slides') ): ?>
              <?php while( have_rows('cards_slides') ): the_row(); 
                $img = wp_get_attachment_image_src(get_sub_field('image'), 'large');
                $content = get_sub_field('content');
                $link = get_sub_field('link') ?>
                <div>
                  <div class="single-card">
                    <div class="card-image" style="background: url(<?php echo $img[0] ?>) center/cover;"></div>
                    <div class="card-content">
                      <?php echo $content; ?>
                      <?php if($link): ?>
                        <a href="<?php echo $link['url']; ?>" class="button button--primary"><?php echo $link['title']; ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>
      <div class="col-12 text-center">
        <?php if($full_btn): ?>
          <a href="<?php echo $full_btn['url']; ?>" class="button button--primary"><?php echo $full_btn['title']; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>