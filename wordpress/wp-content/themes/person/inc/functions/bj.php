<aside id="jd_post-3" class="widget-container widget_jd_post"><div class="si-title"><h2>编辑推荐</h2></div>
<div class="bj">
	<ul>
	<?php $args = array(
    'posts_per_page' => 10,      // 显示多少条
    'paged' => $paged,           // 当前页面
    'orderby' => 'date',         // 时间排序
    'order' => 'desc',           // 降序（递减，由大到小）    
    'ignore_sticky_posts' => 1	,
	'post__not_in' => array($post->ID) ,
    'meta_query' => array(
        array(
            'key' => '_id_radio',     // 你的使用的自定义字段1
            'value' => 'bj'  // 自定义字段1对应的值
        )
    )
);
query_posts($args);
while (have_posts()) : the_post();?>
<li> <i class="fa fa-angle-right fa-1"></i><a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"><?php the_title(); ?></a></li>
  <?php endwhile;?>
  </ul>
 </div>
 </aside>
   <?php wp_reset_query(); ?>