    </div>
  </div>
  <!-- .main-section -->

  
  <footer class="footer-section container">
    <div class="row">
      <div class="column col7 col6-xs">
        <div class="footer-logo logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </div>
        <div class="copyrights">
        <p>2013-2015 MatchDayHero. All Rights Reserved.
        <a href="/terms/" style="margin-right:10px;">Terms of Use</a><a href="/privacy/">Privacy Policy</a></p>
        </div>
      </div>

     <?php if ( has_nav_menu( 'social' ) ) :
          // Social links navigation menu.
          wp_nav_menu( array(
            'theme_location'  => 'social',
            'depth'           => 1,
            'container'       => 'div',
            'container_class' => 'column col5 col6-xs',
            'container_id'    => '',
            'menu_class'      => 'social-links text-right',
          ) );
      endif;?>

   <div class="column col5 col6-xs"><img width="250" height="40" style="float:right;margin-top:10px;" src="/wp-content/uploads/2015/06/so.jpg"></div>
    </div>
  </footer>
  <!-- .footer-section -->
    
  <?php if ( has_nav_menu( 'primary' ) ) : ?>
  <div class="mobile-menu-wrapper" id="mobile-menu-target">
    <div class="mm-inner">
    
      <a href="#page" class="hide-menu"><i class="fa fa-times"></i> <?php echo __('Hide Navigation','tavisha');?></a>
      
      <?php
      // Primary navigation menu.
      wp_nav_menu( array(
        'container_class' => 'mobile-menu',
        'menu_class'      => '',
        'theme_location'  => 'primary',
      ) );
      ?>

    </div>
  </div>
  <!-- .mobile-menu -->
  <?php endif;?>

</div>
<!-- /.main-wrapper -->
<?php wp_footer(); ?>
</body>
</html>