<?php
$userApp = getUserApp();
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <div id="widget-area" class="col12" role="complementary">
      <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div><!-- .widget-area -->

<?php endif; ?>