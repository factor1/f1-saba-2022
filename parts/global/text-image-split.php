<?php
/*
 * Text/Image Split (Global)
 *
 * Template part used on various templates/views
 */

// Text/Image Split Custom Fields
$layoutOption = get_sub_field('text_image_split_layout_option'); // img on left or right
$widthOption = get_sub_field('text_image_split_width_option'); // T/F full-width section
$marginOption = get_sub_field('text_image_split_margin_option'); // margin above & below section
$bgColor = get_sub_field('text_image_split_background_color');
$image = get_sub_field('text_image_split_image');
$img = wp_get_attachment_image_src($image, 'full');
$alt = get_post_meta($image, '_wp_attachment_image_alt', true);
$imgSrc = f1_acf_responsive_image($image, 'full', '1920px');
$image_srcset = wp_get_attachment_image_srcset( $image, 'full' );
$content = get_sub_field('text_image_split_content');
$btnToggle = get_sub_field('text_image_split_button_toggle');
$btnAlign = get_sub_field('text_image_split_button_alignment');
$btnClass = get_sub_field('text_image_split_button_class');
$btn = get_sub_field('text_image_split_button');
$video_toggle = get_sub_field('text_image_split_video_toggle');
$video = get_sub_field('text_image_split_video');
$steps_toggle = get_sub_field('text_image_split_steps_toggle');
$steps_content = get_sub_field('text_image_split_after_steps_content');
$row_custom_id = get_sub_field('anchor_name');


// Conditional classes
$sectionClass = $marginOption ? ' with-margin' : '';
$rowClass = $layoutOption == 'right' ? ' row--reverse' : '';
$rowClass2 = $widthOption ? ' row--full-width' : ''; ?>

<section class="text-image-split<?php echo $sectionClass; ?>" style="background-color: <?php echo $bgColor; ?>;" id="<?php echo slugify($row_custom_id); ?>">
  <div class="container">
    <div class="row row--justify-content-end<?php echo $rowClass . $rowClass2; ?>">

      <?php $row_id = wp_unique_id(); ?>
      <?php if($video_toggle): ?>
        <div class="col-6 stretch text-image-split__image" data-micromodal-trigger="modal-<?php echo $row_id; ?>">
      <?php else: ?>
        <div class="col-6 stretch text-image-split__image">
      <?php endif; ?>
        <?php if($video_toggle): ?>
          <i class="fa fa-solid fa-play float-icon"></i>
        <?php endif; ?>
        <img class="text-image-split__image-file" <?php echo $imgSrc; ?> alt="<?php echo $alt; ?>">
      </div>

      <?php // Text ?>
      <div class="col-6 stretch text-image-split__text">
        <div>

          <?php echo $content;

          if($steps_toggle && have_rows('text_image_split_steps_section')): ?>

            <div class="text-image-split__steps">
            <?php while( have_rows('text_image_split_steps_section') ): the_row(); 
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

          // Optional button
          if( $btnToggle && $btn ) : ?>

            <div class="text-<?php echo $btnAlign; ?> sm-text-center">
              <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnClass; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                <?php echo $btn['title']; ?>
              </a>
            </div>

          <?php endif; ?>

        </div>
      </div>

    </div>
  </div>
</section>

<?php if($video_toggle): ?>
  <div class="modal micromodal-slide" id="modal-<?php echo $row_id; ?>" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-<?php echo $row_id; ?>-title">
        <header class="modal__header text-right">
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-<?php echo $row_id; ?>-content">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <video controls>
                  <source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
<?php endif; ?>
