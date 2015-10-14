<?php
function the_crumbs() {
		if (!is_home()) {
			echo '<nav class="crumbs">现在位置： ';
			echo '<a title="返回首页" href="';
			echo get_settings('home');
			echo '">';
			echo '首页';
			echo "</a>";
		}
		if (is_category()) {
			echo ' &gt; ';
			echo get_category_parents( get_query_var('cat') , true , ' &gt; ' );
			echo ' 文章 ';
		}
		if (is_single()) {
			echo ' &gt; ';
			echo the_category(' &gt; ', 'multiple');
			echo ' &gt; ';
			echo ' 正文 ';
		}
		if (is_page()) {
			echo ' &gt; ';
			echo the_title();
		}
	   elseif (is_tag()) {echo ' &gt; ';single_tag_title();echo ' &gt; 文章 ';}
	   elseif (is_day()) {echo ' &gt; ';echo"发表于"; the_time('Y年m月d日'); echo'的文章';}
	   elseif (is_month()) {echo ' &gt; ';echo"发表于"; the_time('Y年m月'); echo'的文章';}
	   elseif (is_year()) {echo ' &gt; ';echo"发表于"; the_time('Y年'); echo'的文章';}
	   elseif (is_author()) {echo ' &gt; ';echo wp_title( ''); echo'发表的文章';}
	   elseif (is_search()) {echo ' &gt; ';echo"搜索结果"; echo'';}
	echo '</nav>';
}
?>