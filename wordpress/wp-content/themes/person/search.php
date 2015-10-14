<?php get_header();?>
  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
		<div class="cat-title">
		    <h1><?php printf( __( '搜索关键词为: %s', 'xiaoshou' ), get_search_query() ); ?> </h1>
		    <p class="des">
			  <b><?php global $wp_query; echo $wp_query->found_posts; ?></b>条结果
		    </p>
	    </div>
       <div class="content-ajax">
		<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>
<?php else : ?>
<section class="content">
<p>目前还没有文章！</p>
</section>
<?php endif; ?>
</div>
<nav class="page-nav"><?php next_posts_link(__('点击更多')); ?></nav>
</div>
</div>
    </div>
  </section>
  <?php get_footer();?>