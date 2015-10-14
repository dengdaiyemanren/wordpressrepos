<div id="owl-demo">
		  <?php	  
			$args = array(	 
			  'post_type'=>'slider',   
			);	 
			query_posts($args); ?>	
		  <?php if ( have_posts() ) : ?>
		  <?php while ( have_posts() ) : the_post(); ?>
		  <div class="item">

	  <a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"> <?php the_post_thumbnail('slider' , array('alt' => get_the_title()));?> </a>
	  	<div class="slider-content">
		  <h2>
		   <a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"><?php the_title(); ?></a>
		  </h2>
			<div class="slidertext hidden-xs">
			<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"...");  ?> </div>
		</div>
	  
  </div>
<?php endwhile; ?>
<?php else : ?>
<div class="item">
	  <a href="#" rel="bookmark" title="详细阅读 女朋友长得非常漂亮是怎样一种体验？"> <img width="474" height="234" src="<?php bloginfo('template_url'); ?>/img/home.jpg" class="attachment-slider wp-post-image" alt="女朋友长得非常漂亮是怎样一种体验？"> </a>
	  	<div class="slider-content">
		  <h2>
		   <a href="#" rel="bookmark" title="详细阅读 女朋友长得非常漂亮是怎样一种体验？">女朋友长得非常漂亮是怎样一种体验？</a>
		  </h2>
			<div class="slidertext hidden-xs">
			女朋友是我大学里下一届的，她来学校时候就有好几个我同级的学长说要拿下她。无奈女孩不是那种很开朗的性格，也不太喜欢去社交场合，平时言语不多，所以摆蜡... </div>
		</div>
	  
  </div>
<?php endif; wp_reset_query(); ?>
  </div>
  
