<?php
//按时间获得最受欢迎文章
function get_timespan_most_viewed($mode = '', $limit = 10, $days = 7, $display = true) {
	global $wpdb, $post;
	$limit_date = current_time('timestamp') - ($days*26400);
	$limit_date = date("Y-m-d H:i:s",$limit_date);	
	$where = '';
	$temp = '';
	if(!empty($mode) && $mode != 'both') {
		$where = "post_type = '$mode'";
	} else {
		$where = '1=1';
	}
	$most_viewed = $wpdb->get_results("SELECT $wpdb->posts.*, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE post_date < '".current_time('mysql')."' AND post_date > '".$limit_date."' AND $where AND post_status = 'publish' AND meta_key = 'views' AND post_password = '' ORDER  BY views DESC LIMIT $limit");
	if($most_viewed) {
		foreach ($most_viewed as $post) {
			$post_title = mb_strimwidth(get_the_title(), 0, 35, '...');
			$post_views = intval($post->views);
			$post_views = number_format($post_views);
			$temp .= "<li><i class=\"fa fa-angle-right fa-1\"></i><a href=\"".get_permalink()."\">$post_title</a><span class=\"right\"><i class=\"fa fa-eye fa-1\"></i>$post_views</span>".__('', 'wp-postviews')."</li>";
		}
	} else {
		$temp = '<li>'.__('N/A', 'wp-postviews').'</li>'."\n";
	}
	if($display) {
		echo $temp;
	} else {
		return $temp;
	}
}