<?php
$themename = "lfw";
$shortname = "cx";
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$options = array ( 
array( "name" => $themename." Options",
       "type" => "title"),

// 常规设置

    array( "name" => "常规设置",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "站点标题",
			"desc" => "说明：默认文字标题",
            "id" => $shortname."_title",
            "type" => "select",
            "std" => "文字标题",
            "options" => array("文字", "logo"),
			"section" => '<div class="part"></div>'),
			
    array(	"name" => "首页侧边栏时间轴分类名称",
            "desc" => "请填写名称",
            "id" => $shortname."_mc",
            "type" => "text",
            "std" => "快速阅读",
			"section" => '<div class="part"></div>'),
			
	array(	"name" => "首页侧边栏时间轴分类ID",
            "desc" => "请填写分类ID",
            "id" => $shortname."_date",
            "type" => "text",
            "std" => "1",
			"section" => '<div class="part"></div>'),

// 社交功能

    array( "type" => "close"),
	array( "name" => "社交功能",
       "type" => "section"),
	array( "type" => "open"),
    array("name" => "QQ号",
            "desc" => "",
            "id" => $shortname."_qq",
            "type" => "text",
            "std" => ""),
	array("name" => "QQ群",
            "desc" => "",
            "id" => $shortname."_qqq",
            "type" => "text",
            "std" => ""),
	array("name" => "新浪微博",
            "desc" => "",
            "id" => $shortname."_weibo",
            "type" => "text",
            "std" => ""),
			array("name" => "QQ二维码图",
            "desc" => "",
            "id" => $shortname."_qq2",
            "type" => "text",
            "std" => ""),	
		array("name" => "微信图",
            "desc" => "",
            "id" => $shortname."_weixin",
            "type" => "text",
            "std" => ""),		
	array("name" => "联系电话",
            "desc" => "",
            "id" => $shortname."_Phone",
            "type" => "text",
            "std" => ""),

	array(  "name" => "显示百度分享",
            "id" => $shortname."_share",
            "type" => "checkbox",
			"std" => "false",
			"section" => '<div class="part"></div>'),


// SEO设置

    array( "type" => "close"),
	array( "name" => "SEO设置",
       "type" => "section"),
	array( "type" => "open"),
	array(	"name" => "首页标题（title）",
			"desc" => "",
			"id" => $shortname."_seotitle",
			"type" => "textarea",
            "std" => "说明：输入你的网站标题，一般不超过30个字符"),

	array(	"name" => "首页描述（Description）",
			"desc" => "",
			"id" => $shortname."_description",
			"type" => "textarea",
            "std" => "说明：输入你的网站描述，一般不超过200个字符"),

	array(	"name" => "首页关键词（KeyWords）",
            "desc" => "",
            "id" => $shortname."_keywords",
            "type" => "textarea",
            "std" => "说明：输入你的网站关键字，一般不超过100个字符"),

	array("name" => "流量统计代码",
            "desc" => "",
            "id" => $shortname."_track",
            "type" => "textarea",
            "std" => ""),

	array("name" => "ICP备案号",
            "desc" => "",
            "id" => $shortname."_icp",
            "type" => "text",
            "std" => ""),

	array(	"type" => "close")
);
// 定义管理面板
function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=theme-options.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=theme-options.php&reset=true");
die;
}
} 
add_theme_page($themename."主题选项", "主题选项", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/inc/options/options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/inc/options/rm_script.js", false, "1.0");
}
function mytheme_admin() { 
global $themename, $shortname, $options;
$i=0; 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?>主题选项</h2>
<p>
	<font style="font-size:20px;"color=#ff0000><strong> &hearts; </strong></font>支持主题设计者：<a href="http://www.seo628.com" target="_blank">小兽</a>，支付宝：675697867@qq.com
	&nbsp;<span class="switch" onclick="openShutManager(this,'box',false,'关闭分类ID','显示分类ID')">显示分类ID</span>
	&nbsp;<a href="http://www.seo628.com/1333.html" target="_blank">点击获取主题完整版</a>
	<div class="open">
		<div class="odiv" id="box" style="display:none">
			<b>分类ID</b>
			<ul class="catid">
				<?php
				$category_ids = get_all_category_ids();
				foreach($category_ids as $cat_id) {
				  $cat_name = get_cat_name($cat_id);
				  echo  '<li>'. $cat_name . '：' . $cat_id .'</li>';
				}
				?>
				<div class="clear"></div>
			</ul>
		</div>
	</div>

</p>
<div class="rm_opts">
<form method="post">
  <?php foreach ($options as $value) { switch ( $value['type'] ) { case "open": ?>
  <?php break; case "close": ?>
</div>
</div>

<?php break; case "title": ?>
<?php break; case 'text': ?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case 'textarea': ?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
 	 <div class="clearfix"></div> 
</div>
  
<?php break; case 'select': ?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
	</select>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "checkbox": ?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "section": $i++ ?>

<div class="rm_section">
	<div class="rm_title">
		<h3><?php echo $value['name']; ?></h3>
		<span class="submit"><input type="submit" value="保存设置" class="button-primary" id="newmeta-submit" name="save<?php echo $i; ?>"></span>
		<div class="clearfix"></div>
	</div>
<div class="rm_options">
<?php break;
}
}
?>

<span class="submit"><input type="submit" value="保存设置" class="button-primary" id="newmeta-submit" name="save<?php echo $i; ?>"></span>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
	<p class="submit">
		<input type="submit" class="button" name="reset" value="恢复默认设置" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
</div>
<?php }?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>