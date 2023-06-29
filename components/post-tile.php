<?php
/*
 * Post Tile
 *
 * Component part used on various templates/views
 */

$is_template = is_page_template('templates/gallery-categories.php');
$is_tax = is_tax();
$link = $is_template ? get_term_link($args['term']->term_id) : get_the_permalink();
$image = $is_template ? wp_get_attachment_image_src(get_field('service_category_image', 'term_' .$args['term']->term_id), 'large')[0] : featuredURL('text_image_split');
$title = $is_template ? $args['term']->name : get_the_title();
?>
  
<div class="col-4 text-center">
  <div class="post-tile">

    <a href="<?php echo $link; ?>">
      <div class="post-tile__image" style="background: url(<?php echo $image; ?>) center/cover;"></div>
      <?php if(!$is_template && !$is_tax): ?>
        <div class="post-tile__content">
          <h4><?php echo $title; ?> </h4>
        </div>
      <?php endif; ?>
    </a>
    
  </div>
</div>