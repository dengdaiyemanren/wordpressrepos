<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header();?>
<?php get_template_part( 'inc/functions/archives' ); ?>
<section id="content">
	<div class="container">
	  <div class="row">
	  <?php the_crumbs(); ?>
	  <ul class="col-md-2 col-sm-2 pagenav hidden-xs">
	 <?php wp_list_pages('title_li=&' ); ?> 
	 </ul>
        <div class="col-md-10 page-contents col-sm-10 col-xs-12">
	<div class="page-header">
		<div class="expand_collapse">展开收缩</div>
		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="single-meta">
				<?php echo $count_categories = wp_count_terms('category'); ?>个分类&nbsp;&nbsp;
				<?php echo $count_tags = wp_count_terms('post_tag'); ?>个标签&nbsp;&nbsp;
				<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?> 篇文章&nbsp;&nbsp;
				<?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?>条留言&nbsp;&nbsp;
				更新时间：<?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y年n月j日', strtotime($last[0]->MAX_m));echo $last; ?>
			</div>
		</div>
		  <div class="row">
		<div class="archives col-md-4"><?php archives_list_cx(); ?></div>
		<div class="archives col-md-4"><div id="inner-categories">
<?php wp_dropdown_categories('show_count=1&hide_empty=0&show_option_none=全部分类'); ?>
<script>
 var dropdown = document.getElementById("cat");
function onCatChange() {
if ( dropdown.options[dropdown.selectedIndex].value > 0 ) 
{location.href = "<?php echo get_option('home')?>/?cat="+dropdown.options[dropdown.selectedIndex].value;}
						}
dropdown.onchange = onCatChange;
</script>
</div></div>
		<div class="archives col-md-4"><div id="inner-tags">
<select name="tag-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
<option value="#">全部标签</option>
<?php dropdown_tag_cloud("number=0&order=asc"); ?>
</select>
</div></div>
		<?php endwhile; ?>
		</div>
		</div>
		</div>
 


		
		
	
		
</div>
</section>
	<!-- #content -->

<style type="text/css">
.expand_collapse {
	float: right;
	background: #b74f33;
	width: 80px;
	color: #fff;
	text-align: center;
	margin: 10px 0;
	padding: 4px 0;
	border: 1px solid #b74f33;
	border-radius: 2px;
}
.archives-yearmonth {
	line-height: 30px; 
	margin: 5px 0 5px 5px;
	padding: 0 0 0 8px;
	border-left: 8px solid #b74f33;
}
.archives-monthlisting li {
	margin: 5px 0 5px 5px;
	padding: 0 0 0 16px;
}
.archives select{width: 100%;margin-top:10px;}
</style>
<?php get_footer(); ?>