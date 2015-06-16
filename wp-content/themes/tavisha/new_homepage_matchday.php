<?php /* Template Name: New Homepage for Matchday */
get_header();
?>
<style>
.b-back-to-top-dark a {
  background-image: url("/wp-content/uploads/2015/06/b-back-to-top-dark.png");
  background-repeat: no-repeat;
  display: block;
  height: 66px;
  margin: 0 auto;
  width: 131px;
}
.col6
{
  float:left;
}
</style>
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner" id="top">
    <?php get_template_part('content','slider');?>
    <!-- /.slider-section -->
    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content();
        ?>

         </div><!-- .entry-content -->

</div>
</div><!-- .main-content -->
<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer(); ?>