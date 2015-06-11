<?php /* Template Name: Register page for Matchday */  get_header();?>
        
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner">
    <?php while ( have_posts() ) : the_post();?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry-post'); ?>>
      <?php the_title( '<h1 class="entry-title">', '</h1>' );?>
      <?php edit_post_link( __( 'Edit', 'tavisha' ), '<span class="edit-link">', '</span>' ); ?>
      <?php if ( has_post_thumbnail() ) :?>
      <div class="entry-image">
        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );?>
      </div>
      <?php endif;?>

      <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content();
        ?>
        <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form role="form" method="POST" action="http://matchday45.com/team/auth/register">
            <input type="hidden" name="_token" value="O46Epk22mQkFO1lKoPIajmZoDwKaTPbeh174hDvE">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Full name" name="name" value="" style="cursor: auto; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" style="cursor: auto; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" style="cursor: auto; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABMUlEQVQ4T32SgVHDMAxF6QZ0AswELRuECcoGhAloJwAmACZomAA6QbMBZYKaDRih/+UkTvHF1d0/x/L317eU2cX5WNrxoUabTRwk5Z6EtjjrtH8RcsyXAlx6FS6FneCVcbIS/oSNgNgQUQDSt/Bj1UvbnHNxIdy4eBTolYQEsOkXKIQzBL0I3NvoIGlzFN6Ftbl71gqRaAT2xJvwKFwL2R1A2Jsql6hEL7JdSlp5Oy7uhE/nukCrxDYIUI1JxGAC5L3Yg7670sGQNGJNwMXpQR+byIjoAx3mCViN8aVNFpjUXGDUozG6srvgPJkYlwnc3Qv+nJEAhNZIfDcCzfoVeA4FcPZhvEFx6ld2IZpaxn9lP6gJUAnbV+aA6uzp0yhqApBoUmdrM+Hm7BMiP2mTawInofVEEf5J2pUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                              <input type="checkbox">
                              <ins class="iCheck-helper"></ins></div> I agree to the <a href="#" class="darkblue">terms</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="registerpage-btn">Register</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="http://matchday45.com/team/auth/login" class="registerpage-btn">I already have a membership</a><br>
        <a href="http://matchday45.com/" class="registerpage-btn">MatchDayHero Home</a>
    </div>
        <?php

        wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tavisha' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
          'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tavisha' ) . ' </span>%',
          'separator'   => '<span class="screen-reader-text">, </span>',
        ) );
        ?>
      </div><!-- .entry-content -->
    </article>
    <!-- /.entry-post -->
    
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
    ?>
    <!-- #comments -->
    <?php endwhile;?>

  </div><!-- .main-content-inner -->
  <div class="content-overflow"></div>
</div><!-- .main-content -->

<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer();?>