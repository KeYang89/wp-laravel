<?php /* Template Name: New Homepage for Matchday */
get_header();
?>
<div class="main-content column col12" role="main">
  <div class="main-content-inner">
    <?php get_template_part('content','slider');?>
    <!-- /.slider-section -->
  </div><!-- .main-content-inner -->
<div class="homepage-blog-section">
    <?php while ( have_posts() ) : the_post();?>
    <article id="post-<?php the_ID(); ?>">
      <?php if ( has_post_thumbnail() ) :?>
      <div class="entry-image">
        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );?>
      </div>
      <?php endif;?>

      <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content();

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
    <?php endwhile;?>
</div>
</div><!-- .main-content -->


<!-- .sidebar -->
<?php get_footer(); ?>