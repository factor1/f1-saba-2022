<?php
/*
 * Text/Video Split (Global)
 *
 * Template part used on various templates/views
 */

// Text/Video Split Custom Fields
$layoutOption = get_sub_field('text_video_split_layout_option'); // img on left or right
$widthOption = get_sub_field('text_video_split_width_option'); // T/F full-width section
$marginOption = get_sub_field('text_video_split_margin_option'); // margin above & below section
$bgColor = get_sub_field('text_video_split_background_color');
$img = wp_get_attachment_image_src(get_sub_field('text_video_split_image'), 'text_image_split');
$content = get_sub_field('text_video_split_content');
$btnToggle = get_sub_field('text_video_split_button_toggle');
$btnAlign = get_sub_field('text_video_split_button_alignment');
$btnClass = get_sub_field('text_video_split_button_class');
$btn = get_sub_field('text_video_split_button');
$video = get_sub_field('text_video_split_video');
$video_external = get_sub_field('text_video_split_video_external');
$video_source = get_sub_field('text_video_split_video_source_select');

// Conditional classes
$sectionClass = $marginOption ? ' with-margin' : '';
$rowClass = $layoutOption == 'right' ? ' row--reverse' : '';
$rowClass2 = $widthOption ? ' row--full-width' : ''; ?>

<section class="text-image-split<?php echo $sectionClass; ?>" style="background-color: <?php echo $bgColor; ?>;">
  <div class="container">
    <div class="row row--justify-content-end<?php echo $rowClass . $rowClass2; ?>">

      <?php $row_id = wp_unique_id(); ?>
      <?php if($video): ?>
        <div class="col-6 stretch text-image-split__image" data-micromodal-trigger="modal-<?php echo $row_id; ?>">
          <i class="fa fa-solid fa-play float-icon"></i>
      <?php else: ?>
        <div class="col-6 stretch text-image-split__image">
      <?php endif; ?>
        <div style="background: url('<?php echo $img[0]; ?>') center/cover no-repeat"></div>
      </div>

      <?php // Text ?>
      <div class="col-6 text-image-split__text">
        <div>

          <?php echo $content;

          // Optional button
          if( $btnToggle && $btn ) : ?>

            <div class="text-<?php echo $btnAlign; ?>">
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

<?php if($video): ?>
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

              <?php if($video_source=='internal'): ?>
                <video controls>
                  <source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
                  Your browser does not support the video tag.
                </video>

              <?php else: ?>
                
                <?php echo $video_external; ?>

              <?php endif; ?>

              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
<?php endif; ?>
