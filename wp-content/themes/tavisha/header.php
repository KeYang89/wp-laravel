<?php
$userApp = getUserApp();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 ie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="main-wrapper">
    
  <header class="header-section container">
    <div class="row">
      <div class="column col3  col8-sm logo-wrapper">
        <h1 class="logo" role="banner">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img style="width: 140px;height: 66px;float: left;margin-top: -12px;" src="http://matchday45.com/wp-content/uploads/2015/06/logo.jpg"></a>
        </h1>
       
          
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <a href="#mobile-menu-target" class="btn-nav">
          <span></span>
          <span></span>
          <span></span>
        </a>
        <?php endif;?>

      </div><!-- .logo-wrapper -->


      <div class="column col6  col8-sm slogan-wrapper">
         <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
          <div class="site-description"><?php echo $description; ?></div>
        <?php endif;?>
      </div><!-- .search-wrapper -->
      <div class="column col3  col8-sm login-wrapper">
            <?php
            if($userApp['auth']->check()){
                ?>
                <span>Hi, <strong><?php echo $userApp['auth']->user()->name; ?></strong></span>
                <div class="Top-Logout">
                    <a href="/team/auth/logout">Logout</a>
                </div><!--Top-Logout-->
                <?php
            }
            else
            {
                ?>
                <div class="Top-Register">
                    <a href="/team/auth/register">Register</a>
                </div><!--Top-Register-->
                <div class="Top-Login">
                    <a href="/team/auth/login">Login</a>
                </div><!--Top-Login-->
                <?php
            }
            ?>
      </div><!-- .search-wrapper -->
    </div>
  </header>
  <!-- .header-section -->
  

  <div class="section main-section container">
    <div class="row">