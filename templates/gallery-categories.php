<?php
/*
 * Template Name: Galleries category list
 *
 * Template used on the Galleries category list
 */

get_header();
$terms = get_terms( 'service_category', array(
  'hide_empty' => false,
) );
?>

<section class="gallery-categories">
  <div class="container">
    <div class="row row--justify-content-center">
      <?php foreach ($terms as $term) { 
        get_template_part('components/post-tile', null, array('term' => $term) );
      } ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>