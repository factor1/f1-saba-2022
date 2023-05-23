<?php
/*
 * Site Footer
 */

// Site Footer Custom Fields
$logo = wp_get_attachment_image_src(get_field('footer_logo', 'option'), 'logo');
$content = get_field('footer_content', 'option');
?>

<footer class="site-footer">
  <div class="site-footer__main">
    <div class="container">
      <div class="row">

        <div class="col-4 sm-col-12 sm-mid text-right sm-text-left">
          <h6>FOLLOW US ON SOCIAL</h6>
          <?php // Social menu
            prelude_social_menu(); ?>
        </div>

        <div class="col-4 sm-col-12">
          <?php // Logo ?>
          <div class="site-footer__logo">
            <a href="<?php echo esc_url(home_url()); ?>">
              <img src="<?php echo $logo[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>">
            </a>
          </div>
        </div>
        
        <div class="col-4 sm-col-12">
          <?php echo $content; ?>
          <?php wp_nav_menu(
            array(
              'theme_location' => 'footer',
              'container' => 'nav',
              'container_class' => 'nav--footer'
            )
          ); ?>
        </div>

      </div>
    </div>
  </div>

  <div class="site-footer__bottom">
    <div class="container">
      <div class="row">
        <div class="col-12 sm-text-center">

          <p>©<?php echo date('Y'); ?> All right reserved.</p>

          <?php wp_nav_menu(
            array(
              'theme_location' => 'footer_bottom',
              'container' => 'nav',
              'container_class' => 'nav--footer--bottom',
            )
          ); ?>
        </div>
      </div>
    </div>
  </div>
</footer>
