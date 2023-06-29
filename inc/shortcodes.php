<?php
/*-----------------------------------------------------------------------------
  Register Shortcodes
-----------------------------------------------------------------------------*/
function name_shortcode( $atts = array(), $content = null ) {
  $user_info = get_userdata(get_current_user_id());
  $first_name = $user_info->first_name;

  return $first_name;
}
add_shortcode('name', 'name_shortcode');


function testimonial_shortcode( $atts = array() ) {
  $a = shortcode_atts( array(
    'id' => 1
  ), $atts );

  $output = get_field('testimonial', $a['id']);

  return $output;
}
add_shortcode('testimonial', 'testimonial_shortcode');
