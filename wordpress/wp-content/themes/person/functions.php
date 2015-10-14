<?php
// 小工具
if (function_exists('register_sidebar')){
	register_sidebar( array(
		'name'          => '首页侧边栏',
		'id'            => 'sidebar-1',
		'description'   => '显示在首页侧边栏',
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="si-title"><h2>',
		'after_title'   => '</h2></div>',
	) );
}

if (function_exists('register_sidebar')){
	register_sidebar( array(
		'name'          => '文章页侧边栏',
		'id'            => 'sidebar-3',
		'description'   => '文章页侧边栏',
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="si-title"><h2>',
		'after_title'   => '</h2></div>',
	) );
}
if (function_exists('register_sidebar')){
	register_sidebar( array(
		'name'          => '正文底部',
		'id'            => 'sidebar-4',
		'description'   => '正文底部',
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

if (function_exists('register_sidebar')){
	register_sidebar( array(
		'name'          => '友情链接',
		'id'            => 'sidebar-6',
		'description'   => '显示在底部内容',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s friendLink container">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
// 自定义菜单
register_nav_menus(
   array(
      'top-nav' => __( '顶部菜单' ),
      'header-nav' => __( '主导航菜单' ),
	   'footer-nav' => __( '底部菜单' ),
      'mini-nav' => __( '移动版菜单' )
   )
);

// 加载前端脚本及样式
function ality_scripts() {
wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2014.9.21' );
wp_enqueue_style( 'bootstrap',get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0' );
wp_enqueue_style( 'jquery.fancybox',get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '1.0' );
if ( is_home() ) {
wp_enqueue_style( 'owl.carousel',get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0' );
wp_enqueue_style( 'owl.theme',get_template_directory_uri() . '/css/owl.theme.css', array(), '1.0' );
}
wp_enqueue_script( 'jquery.fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array(), '2.15', false);
wp_enqueue_script( 'fancybox-buttons', get_template_directory_uri() . '/js/helpers/jquery.fancybox-buttons.js', array(), '2.15', false);
wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel-3.0.6.pack.js', array(), '1.0', false );
wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0', false );
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0' );
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/custom.js', array(), '1.0', false );
       
	if ( is_singular() ) {
		 wp_enqueue_script( 'comments-ajax', get_template_directory_uri() . '/js/comments-ajax.js', array(), '1.3', false);
	
	}

}
add_action( 'wp_enqueue_scripts', 'ality_scripts' );



// 背景
add_theme_support( 'custom-background' );

// 文章形式
add_theme_support( 'post-formats', array(
	'aside', 'image',
) );
//使WordPress支持post thumbnail
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
	add_image_size( 'slider', 474, 234, true ); // Set thumbnail size 
    add_image_size( 'tw-thumb', 140, 100, true ); // Set thumbnail size 
	add_image_size( 'home-thumb', 210, 140, true ); // Set thumbnail size 
	add_image_size( 'jd-thumb', 290, 290, true ); // Set thumbnail size 
		
}

// 自动缩略图
function catch_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/img/default.jpg';
  }
  return $first_img;
}
/* comment_mail_notify v1.0 by willin kan. (所有回复都发邮件) */
function comment_mail_notify($comment_id) {
  $comment = get_comment($comment_id);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  $spam_confirmed = $comment->comment_approved;
  if (($parent_id != '') && ($spam_confirmed != 'spam')) {
    $wp_email = 'no-reply@' . preg_replace('#^www.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
       . trim(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复:<br />'
       . trim($comment->comment_content) . '<br /></p>
      <p>您可以点击<a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">查看回应完整内容</a></p>
      <p>欢迎再度光临 ' . get_option('blogname') . ',祝你生活愉快、全家幸福！</p>
      <p>(此邮件由系统自动发送，请勿回复.)</p>
    </div>';
      $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
      $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
      wp_mail( $to, $subject, $message, $headers );
  }
}
add_action('comment_post', 'comment_mail_notify');
// -- END ----------------------------------------

// 评论添加@，by Ludou
function ludou_comment_add_at( $comment_text, $comment = '') {
  if( $comment->comment_parent > 0) {
    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }

  return $comment_text;
}
add_filter( 'comment_text' , 'ludou_comment_add_at', 20, 2);

// 垃圾评论拦截
class anti_spam {
	function anti_spam() {
		if ( !current_user_can('level_0') ) {
			add_action('template_redirect', array($this, 'w_tb'), 1);
			add_action('init', array($this, 'gate'), 1);
			add_action('preprocess_comment', array($this, 'sink'), 1);
		}
	}
	function w_tb() {
		if ( is_singular() ) {
			ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
				"textarea$1name=$2w$3$4/textarea><textarea name=\"comment\" cols=\"100%\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
		}
	}
	function gate() {
		if ( !empty($_POST['w']) && empty($_POST['comment']) ) {
			$_POST['comment'] = $_POST['w'];
		} else {
			$request = $_SERVER['REQUEST_URI'];
			$referer = isset($_SERVER['HTTP_REFERER'])         ? $_SERVER['HTTP_REFERER']         : '隐瞒';
			$IP      = isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] . ' (透过代理)' : $_SERVER["REMOTE_ADDR"];
			$way     = isset($_POST['w'])                      ? '手动操作'                       : '未经评论表格';
			$spamcom = isset($_POST['comment'])                ? $_POST['comment']                : null;
			$_POST['spam_confirmed'] = "请求: ". $request. "\n来路: ". $referer. "\nIP: ". $IP. "\n方式: ". $way. "\n內容: ". $spamcom. "\n -- 记录成功 --";
		}
	}
	function sink( $comment ) {
		if ( !empty($_POST['spam_confirmed']) ) {
			if ( in_array( $comment['comment_type'], array('pingback', 'trackback') ) ) return $comment;
			//方法一: 直接挡掉, 將 die(); 前面两斜线刪除即可.
			die();
			//方法二: 标记为 spam, 留在资料库检查是否误判.
			//add_filter('pre_comment_approved', create_function('', 'return "spam";'));
			//$comment['comment_content'] = "[ 小墙判断这是 Spam! ]\n". $_POST['spam_confirmed'];
		}
		return $comment;
	}
}
$anti_spam = new anti_spam();

// 评论链接新窗口
function commentauthor($comment_ID = 0) {
    $url    = get_comment_author_url( $comment_ID );
    $author = get_comment_author( $comment_ID );
    if ( empty( $url ) || 'http://' == $url )
		echo $author;
    else
		echo "<a href='$url' rel='external nofollow' target='_blank' class='url'>$author</a>";
}

//文章meta
require get_template_directory() . '/inc/metaboxclass.php';
require get_template_directory() . '/inc/config.php';

// 主题设置
require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/guide.php';


// 评论模板
require get_template_directory() . '/inc/functions/comment-template.php';

// 热门文章
require get_template_directory() . '/inc/functions/hot-post.php';

// 分页
require get_template_directory() . '/inc/functions/pagenavi.php';

// 面包屑导航
require get_template_directory() . '/inc/functions/breadcrumb.php';

// 文章类型
require get_template_directory() . '/inc/functions/post-type.php';


// 禁止代码标点转换
remove_filter( 'the_content', 'wptexturize' );

// 友情链接
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// 默认菜单
function default_menu() {
require get_template_directory() . '/inc/default-menu.php';
}
function top_menu() {
require get_template_directory() . '/inc/top-menu.php';
}
function footer_menu() {
require get_template_directory() . '/inc/footer-menu.php';
}
function mini_menu() {
require get_template_directory() . '/inc/mini-menu.php';
}
// 去掉描述P标签
function deletehtml($description) {
	$description = trim($description);
	$description = strip_tags($description,"");
	return ($description);
}
add_filter('category_description', 'deletehtml');

// 禁止后台加载谷歌字体
function wp_remove_open_sans_from_wp_core() {
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );
	wp_enqueue_style('open-sans','');
}
add_action( 'init', 'wp_remove_open_sans_from_wp_core' );


//多说头像
function mytheme_get_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );

// 后台预览
add_editor_style( '/css/editor-style.css' );

// 禁用工具栏
show_admin_bar(false);

// 跳转到设置
if (is_admin() && $_GET['activated'] == 'true') {
header("Location: themes.php?page=theme-options.php");
}

// taxonomy标题
function setTitle(){
    $term = get_term_by('slug',get_query_var('term'),get_query_var('taxonomy'));
    echo $title = $term->name;
}

// 移除头部冗余代码
remove_action( 'wp_head', 'wp_generator' );// WP版本信息
remove_action( 'wp_head', 'rsd_link' );// 离线编辑器接口
remove_action( 'wp_head', 'wlwmanifest_link' );// 同上
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );// 上下文章的url
remove_action( 'wp_head', 'feed_links', 2 );// 文章和评论feed
remove_action( 'wp_head', 'feed_links_extra', 3 );// 去除评论feed
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );// 短链接

//摘要支持HTML
function get_excerpt($excerpt){
$content = get_the_content();
$content = strip_tags($content,'<img><h2><ul><ol><li><strong><h3><blockquote><strong>');
$content = mb_strimwidth($content,0,400,'...');
return wpautop($content);
}
add_filter('the_excerpt','get_excerpt');
//高亮显示搜索词
function search_word_replace($buffer){
    if(is_search()){
        $arr = explode(" ", get_search_query());
        $arr = array_unique($arr);
        foreach($arr as $v)
            if($v)
                $buffer = preg_replace("/(".$v.")/i", "<span style=\"color: #ff8598;;\"><strong>$1</strong></span>", $buffer);
    }
    return $buffer;
}
add_filter("the_excerpt", "search_word_replace", 200);
add_filter("the_content", "search_word_replace", 200);
add_filter('pre_get_posts','wpjam_exclude_page_from_search');
function wpjam_exclude_page_from_search($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
//标签下拉
function dropdown_tag_cloud( $args = '' ) {
    $defaults = array(
        'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
        'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC',
        'exclude' => '', 'include' => ''
    );
    $args = wp_parse_args( $args, $defaults );
    $tags = get_tags( array_merge($args,
array('orderby' => 'count', 'order' => 'DESC')) ); // Always query top tags
    if ( empty($tags) )
        return;
    $return = dropdown_generate_tag_cloud( $tags, $args );
// Here's where those top tags get sorted according to $args
    if ( is_wp_error( $return ) )
        return false;
    else
        echo apply_filters( 'dropdown_tag_cloud', $return, $args );
}
function dropdown_generate_tag_cloud( $tags, $args = '' ) {
    global $wp_rewrite;
    $defaults = array(
        'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
        'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC'
    );
    $args = wp_parse_args( $args, $defaults );
    extract($args);
    if ( !$tags )
        return;
    $counts = $tag_links = array();
    foreach ( (array) $tags as $tag ) {
        $counts[$tag->name] = $tag->count;
        $tag_links[$tag->name] = get_tag_link( $tag->term_id );
        if ( is_wp_error( $tag_links[$tag->name] ) )
            return $tag_links[$tag->name];
        $tag_ids[$tag->name] = $tag->term_id;
    }
    $min_count = min($counts);
    $spread = max($counts) - $min_count;
    if ( $spread <= 0 )
        $spread = 1;
    $font_spread = $largest - $smallest;
    if ( $font_spread <= 0 )
        $font_spread = 1;
    $font_step = $font_spread / $spread;
    if ( 'name' == $orderby )
        uksort($counts, 'strnatcasecmp');
    else
        asort($counts);
    if ( 'DESC' == $order )
        $counts = array_reverse( $counts, true );
    $a = array();
    $rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? ' rel="tag"' : '';
    foreach ( $counts as $tag => $count ) {
        $tag_id = $tag_ids[$tag];
        $tag_link = clean_url($tag_links[$tag]);
        $tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
        $a[] = "\t<option value='$tag_link'>$tag ($count)</option>";
    }
    switch ( $format ) :
    case 'array' :
        $return =& $a;
        break;
    case 'list' :
        $return = "<ul class='wp-tag-cloud'>\n\t<li>";
        $return .= join("</li>\n\t<li>", $a);
        $return .= "</li>\n</ul>\n";
        break;
    default :
        $return = join("\n", $a);
        break;
    endswitch;
    return apply_filters( 'dropdown_generate_tag_cloud', $return,
$tags, $args );
};
function ludou_get_category_tags($args) {
    global $wpdb;
    $tags = $wpdb->get_results
    ("
        SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name
        FROM
            $wpdb->posts as p1
            LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id,

            $wpdb->posts as p2
            LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id
        WHERE
            t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (".$args['categories'].") AND
            t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
            AND p1.ID = p2.ID
        ORDER by tag_name
    ");
    $count = 0;
    
    if($tags) {
      foreach ($tags as $tag) {
        $mytag[$count] = get_term_by('id', $tag->tag_id, 'post_tag');
        $count++;
      }
    }
    else {
      $mytag = NULL;
    }
    
    return $mytag;
};
function disableAutoSave(){
    wp_deregister_script('autosave');
}
add_action( 'wp_print_scripts', 'disableAutoSave' );
//custom widget tag cloud
add_filter( 'widget_tag_cloud_args', 'theme_tag_cloud_args' );
function theme_tag_cloud_args( $args ){
	$newargs = array(
		'smallest'    => 14,  //最小字号
		'largest'     => 14, //最大字号
		'unit'        => 'px',   //字号单位，可以是pt、px、em或%
		'number'      => 20,     //显示个数
		'format'      => 'flat',//列表格式，可以是flat、list或array
		'separator'   => "\n",   //分隔每一项的分隔符
		'orderby'     => 'count',//排序字段，可以是name或count
		'order'       => 'ASC', //升序或降序，ASC或DESC
		'exclude'     => null,   //结果中排除某些标签
		'include'     => null,  //结果中只包含这些标签
		'link'        => 'view' //taxonomy链接，view或edit
		
	);
	$return = array_merge( $args, $newargs);
	return $return;
}
// 全部结束
?>