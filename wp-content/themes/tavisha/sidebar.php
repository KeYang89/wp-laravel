<?php
$userApp = getUserApp();
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <div id="widget-area" class="sidebar column col12" role="complementary">

      <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div><!-- .widget-area -->

<?php endif; ?>
<?php
// function getToken()
// {
//     $ch = curl_init();

//     curl_setopt($ch,CURLOPT_URL, 'http://matchday45.com/team/api/v1/getToken');
//     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// //  curl_setopt($ch,CURLOPT_HEADER, false);

//     $output=curl_exec($ch);

//     curl_close($ch);
//     unset($ch);
//     return $output;
// }
?>