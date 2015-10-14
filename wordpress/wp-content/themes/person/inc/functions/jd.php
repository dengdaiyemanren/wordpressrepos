<aside id="jd_post-3" class="widget-container widget_jd_post"><div class="si-title"><h2>焦点图文</h2></div>
<?php $args = array(
    'posts_per_page' => 1,      // 显示多少条
    'paged' => $paged,           // 当前页面
    'orderby' => 'date',         // 时间排序
    'order' => 'desc',           // 降序（递减，由大到小）    
    'ignore_sticky_posts' => 1	,
	'post__not_in' => array($post->ID) ,
    'meta_query' => array(
        array(
            'key' => '_id_radio',     // 你的使用的自定义字段1
            'value' => 'jd'  // 自定义字段1对应的值
        )
    )
);
query_posts($args);
while (have_posts()) : the_post();?>
<div class="jd">
 <a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"> <?php if (has_post_thumbnail()) { the_post_thumbnail('jd-thumb', array('alt' => get_the_title()));
} else { ?>
<img  src="<?php echo catch_image() ?>"  alt="<?php the_title(); ?>" />
<?php } ?><p><?php the_title(); ?></p></a>
 </div>
 <?php endwhile;?>
 </aside>
   <?php wp_reset_query(); ?>