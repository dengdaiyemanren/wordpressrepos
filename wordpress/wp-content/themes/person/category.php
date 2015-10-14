<?php get_header();?>
  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
		   <div class="cat-title">
		    <h1><?php single_cat_title(); ?> </h1>
		    <p class="des">
			   <?php echo category_description( $categoryID ); ?>
		    </p>
	    </div>
       <div class="content-ajax">
	
	
		<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>
<?php else : ?>
<article>
<h2 class="entry-title">目前还没有文章！</h2>
<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/post-new.php">点击这里发布您的第一篇文章</a></p>
</article>
<?php endif; ?>
</div>
<nav class="pagenav"><?php next_posts_link(__('点击更多')); ?></nav>
</div>
<div class="col-md-4 sidebar hidden-xs hidden-sm">
<?php get_sidebar();?>
</div>
</div>
    </div>
  </section>
  <?php get_footer();?>