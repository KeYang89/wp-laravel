<?php /* Template Name: New Homepage for Matchday */
get_header();
?>
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner">
    <?php get_template_part('content','slider');?>
    <!-- /.slider-section -->
  </div><!-- .main-content-inner -->
<div class="how-it-works">
 <?php the_content();?>
</div>
</div><!-- .main-content -->

<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer(); ?>