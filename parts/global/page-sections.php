<?php
/*
 * Page Sections (Global)
 *
 * Template part used on various templates/views
 */

if( have_rows('page_sections') ) : while( have_rows('page_sections') ) : the_row();

  if( get_row_layout() == 'centered_text_block' ) :

    get_template_part('parts/global/centered-text-block');

  elseif( get_row_layout() == 'banner' ) :

    get_template_part('parts/global/banner');

  elseif( get_row_layout() == 'slider' ) :

    get_template_part('parts/global/slider');

  elseif( get_row_layout() == 'text_image_split' ) :

    get_template_part('parts/global/text-image-split');

  elseif( get_row_layout() == 'text_media_split' ) :

    get_template_part('parts/global/text-media-split');

  elseif( get_row_layout() == 'text_split' ) :

    get_template_part('parts/global/text-split');

  elseif( get_row_layout() == '3_column_grid' ) :

    get_template_part('parts/global/3-column-grid');

  elseif( get_row_layout() == 'newsletter_signup' ) :

    get_template_part('parts/global/newsletter-signup');

  elseif( get_row_layout() == 'testimonial_grid' ) :

    get_template_part('parts/global/testimonial-grid');

  elseif( get_row_layout() == 'testimonial_grid_custom' ) :

    get_template_part('parts/global/testimonial-grid-custom');

  elseif( get_row_layout() == 'card_slider' ) :

    get_template_part('parts/global/card-slider');

  elseif( get_row_layout() == 'staff_grid' ) :

    get_template_part('parts/global/staff-grid');

  elseif( get_row_layout() == 'text_video_split' ) :

    get_template_part('parts/global/text-video-split');

  endif;

endwhile; endif; ?>
