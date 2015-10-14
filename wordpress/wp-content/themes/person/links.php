<?php
/*
Template Name: 我的链接
*/
?>
<?php get_header(); ?>
   <section id="content">
<section class="container">
 <div class="row">
	  <?php the_crumbs(); ?>
	  <ul class="col-md-2 col-sm-2 pagenav hidden-xs">
	 <?php wp_list_pages('title_li=&' ); ?> 
	 </ul>
<ul class="linkpage  page-contents col-md-10 col-sm-10 col-xs-12">

<?php wp_list_bookmarks('title_before=<h2>&class=linkmain&before=<li class="col-md-6 col-sm-6">&show_name=true&show_description=true&between='); ?>

</ul>
</div >
</section>
</section>
<!-- #content -->
<?php get_footer(); ?>