<?php /* Template Name: Homepage for Matchday */
get_header(); ?>
<div class="main-content column col9 col8-sm" role="main">
  <div class="main-content-inner">
    <?php get_template_part('content','slider');?>
    <!-- /.slider-section -->

    <div class="row">
      <?php
      $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 1,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => true
        );
      $categories = get_categories($args);
      if($categories):
      ?>
      <div class="category-list">
        <?php
        $j=1;
        foreach ( $categories as $category ) :
        if ($j<3){
          echo '<div class="category-block column col6">';
          $j++;}

          elseif ($j<6) {
          echo '<div class="category-block column col4 promo">';
          $j++;
           }
          else {
          echo '<div style="display:none;">';
          }
          ?>
          <h3 class="category-title fa fa-newspaper-o">
            <?php echo '<a rel="bookmark" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';?>
          </h3>
          <?php
          $sticky = get_option( 'sticky_posts' );
          $latest_args = array( 'posts_per_page' => 5, 'post__not_in' => $sticky, 'category' => $category->term_id );
          $latest_posts = get_posts( $latest_args );
          if($latest_posts):
          ?>
          <ul class="category-post-list">
            <?php
            $i = 1;
            foreach ( $latest_posts as $post ) :
            setup_postdata( $post ); ?>
            <li class="category-post-item">
              <?php if($i==1):?>
              <div class="entry-image">
                <a class="post-thumbnail" href="<?php the_permalink();?>">
                  <?php
                    the_post_thumbnail( 'archive-thumb-tavisha', array( 'alt' => get_the_title() ) );
                  ?>
                </a>
              </div>
              <?php endif;?>
            </li>
            <?php
            $i++;
            endforeach;
            wp_reset_postdata(); ?>
          </ul>
          <?php endif;?>
        </div><!-- .category-block -->
        <?php endforeach;?>

      </div><!-- .category-list -->
      <?php endif;?>
    </div><!-- .row -->
  </div><!-- .main-content-inner -->
<div class="how-it-works">
<h2>How it works</h2>
 <?php the_content();?>
</div>
<section class="Change-Language">
         <div class="container">
             <div class="row">
             <ul>
            	<li><span>Change Language</span> </li>
             	<li><a href="#">English</a></li>
             	<li><a href="#">Portugues</a></li>
            	<li><a href="#">Espanol</a></li>
             	<li><a href="#">Bahasa Indonesia</a></li>
             </ul>
             </div><!--row-->
         </div><!--container-->

</section>
</div><!-- .main-content -->

<?php get_sidebar();?>
<!-- .sidebar -->
<?php get_footer(); ?>