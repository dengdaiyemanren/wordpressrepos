<?php
/**
*Author:treework.cn
*Version: 1.1
**/

class ashu_meta_box {
  
  var $ashu_meta;
  var $meta_conf;
  
  function ashu_meta_box($ashu_meta, $meta_conf) {
    $this->ashu_meta = $ashu_meta;
	$this->meta_conf = $meta_conf;
	
	add_action('admin_menu', array(&$this, 'init_boxes'));
	add_action('save_post', array(&$this, 'save_postdata'));
  }
  
  function init_boxes() {
    $this->add_script_and_styles();
	$this->create_meta_box();
  }
  
  function add_script_and_styles() {
    if(did_action( 'wp_enqueue_media' )){
	  wp_enqueue_media();
	}
	wp_enqueue_style('metabox_fields_css', get_template_directory_uri(). '/css/metabox_fields.css');
	wp_enqueue_script('metabox_fields_js', get_template_directory_uri(). '/js/metabox_fields.js');
  }
  
  function create_meta_box(){
    if ( function_exists('add_meta_box') && is_array($this->meta_conf['page']) ) {
	  foreach ($this->meta_conf['page'] as $area) {
	    if ($this->meta_conf['callback'] == '')
		  $this->meta_conf['callback'] = 'new_meta_boxes';
		
		add_meta_box(
		  $this->meta_conf['id'],
		  $this->meta_conf['title'],
		  array(&$this, $this->meta_conf['callback']), $area, $this->meta_conf['context'],
		  $this->meta_conf['priority']
		);
	  }
	}  
  }
  
  function new_meta_boxes(){
    global $post;
	foreach($this->ashu_meta as $ashu_meta){
	  if( method_exists($this, $ashu_meta['type']) ) {
	    $meta_box_value = get_post_meta($post->ID, $ashu_meta['id'], true);
		
		if($meta_box_value != "")
		  $ashu_meta['std'] = $meta_box_value;

		echo '<div class="ashu_metabox ashu_metabox_'.$ashu_meta['type'].' ashu_metabox_'.$this->meta_conf['context'].'">';
		$this->$ashu_meta['type']($ashu_meta);
		echo '</div>';
	  }
	}
	wp_nonce_field( 'ashumetabox','ashu_meta_noce' );
	
  }
  
  function save_postdata() {
    if( isset( $_POST['post_type'] ) && in_array($_POST['post_type'],$this->meta_conf['page'] ) && (isset($_POST['save']) || isset($_POST['publish']) ) ){
	  
	  $post_id = $_POST['post_ID'];
	  if (!wp_verify_nonce($_REQUEST['ashu_meta_noce'], 'ashumetabox')) {
	    return 0;
	  }
	  
	  if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id  ) )
		  return 0;
	  }else{
	    if ( !current_user_can( 'edit_post', $post_id  ) )
		  return 0;
	  }
		
		
	  foreach ($this->ashu_meta as $ashu_meta) {
		
		if( $ashu_meta['type'] == 'tinymce' ){
		  $data =  stripslashes( $_POST[$ashu_meta['id']] );
		}elseif( $ashu_meta['type'] == 'checkbox' ){
		  $data =  $_POST[$ashu_meta['id']];
		}elseif( $ashu_meta['type'] == 'numbers_array' ){
		  $data = explode( ',', $_POST[$ashu_meta['id']] );
		}else{
		  $data = htmlspecialchars($_POST[$ashu_meta['id']], ENT_QUOTES,"UTF-8");
		}
		
		if(get_post_meta($post_id , $ashu_meta['id']) == "")
		  add_post_meta($post_id , $ashu_meta['id'], $data, true);
		elseif($data != get_post_meta($post_id , $ashu_meta['id'], true))
		  update_post_meta($post_id , $ashu_meta['id'], $data);
		elseif($data == "")
		  delete_post_meta($post_id , $ashu_meta['id'], get_post_meta($post_id , $ashu_meta['id'], true));
	  }
	}
  }
  
  function title($ashu_meta) {
    echo '<h2>'.$ashu_meta['name'].'</h2>';
  }
  
  function text($ashu_meta) {
	echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	  
	echo '<p><input type="text" size="'.$ashu_meta['size'].'" value="'.$ashu_meta['std'].'" id="'.$ashu_meta['id'].'" name="'.$ashu_meta['id'].'"/></p>';
  }
  
  function textarea($ashu_meta) {
	echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	  
	echo '<p><textarea class="ashu_textarea" cols="'.$ashu_meta['size'][0].'" rows="'.$ashu_meta['size'][1].'" id="'.$ashu_meta['id'].'" name="'.$ashu_meta['id'].'">'.$ashu_meta['std'].'</textarea></p>';
  }
  
  function upload($ashu_meta) {
	  
	$button_text = (isset($ashu_meta['button_text'])) ? $ashu_meta['button_text'] : 'Upload';
	
	$image = '';
	
	if($ashu_meta['std'] != '')
	  $image = '<img src="'.$ashu_meta['std'].'" />';
	  
	echo '<div id="'.$ashu_meta['id'].'_div" class="ashu_img_preview">'.$image .'</div>';
	
	echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	  
	echo '<input class="ashuwp_url_input" type="text" id="'.$ashu_meta['id'].'_input" size="'.$ashu_meta['size'].'" value="'.$ashu_meta['std'].'" name="'.$ashu_meta['id'].'"/><a href="#" id="'.$ashu_meta['id'].'" class="ashu_upload_button button">'.$button_text.'</a>';
  }
  
  function radio( $ashu_meta ) {
  
	echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	  
	foreach( $ashu_meta['buttons'] as $key=>$value ) {
	  $checked ="";
	  
	  if($ashu_meta['std'] == $key) {
	    $checked = 'checked = "checked"';
	  }
	
	  echo '<input '.$checked.' type="radio" class="ashu_radio" value="'.$key.'" name="'.$ashu_meta['id'].'"/>'.$value;
	}
  }
  
  function checkbox($ashu_meta) {
    echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	  
	//$values = implode( ',', $ashu_meta['std'] );
	
	foreach( $ashu_meta['buttons'] as $key=>$value ) {
	  $checked ="";
	  
	  if( is_array($ashu_meta['std']) && in_array($key,$ashu_meta['std'])) {
	    $checked = 'checked = "checked"';
	  }
	  
	  echo '<input '.$checked.' type="checkbox" class="ashu_checkbox" value="'.$key.'" name="'.$ashu_meta['id'].'[]"/>'.$value;
	}
  }
  
  function dropdown($ashu_meta) {
    echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	  
	if($ashu_meta['subtype'] == 'page'){
	  $select = 'Select page';
	  $entries = get_pages('title_li=&orderby=name');
	}elseif($ashu_meta['subtype'] == 'category'){
	  $select = 'Select category';
	  $entries = get_categories('title_li=&orderby=name&hide_empty=0');
	}elseif($ashu_meta['subtype'] == 'menu'){
	  $select = 'Select...';
	  $entries = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	}elseif($ashu_meta['subtype'] == 'sidebar'){
	  global $wp_registered_sidebars;
	  $select = '选择侧边栏';
	  $entries = $wp_registered_sidebars;
	}else{
	  $select = 'Select...';
	  $entries = $ashu_meta['subtype'];
	}
	
	echo '<p><select class="postform" id="'. $ashu_meta['id'] .'" name="'. $ashu_meta['id'] .'"> ';
	echo '<option value="">'.$select .'</option>  ';
	
	foreach ($entries as $key => $entry){
	  if($ashu_meta['subtype'] == 'page'){
	    $id = $entry->ID;
		$title = $entry->post_title;
	  }elseif($ashu_meta['subtype'] == 'category'){
	    $id = $entry->term_id;
		$title = $entry->name;
	  }elseif($ashu_meta['subtype'] == 'menu'){
	    $id = $entry->term_id;
		$title = $entry->name;
	  }elseif($ashu_meta['subtype'] == 'sidebar'){
	    $id = $entry['id'];
		$title = $entry['name'];
	  }else{
	    $id = $key;
		$title = $entry;
	  }
	  
	  if ($ashu_meta['std'] == $id ){
	    $selected = 'selected="selected"';
	  }else{
	    $selected = "";
	  }
	  
	  echo "<option $selected value='". $id."'>". $title."</option>";
	}
	
	echo '</select></p>';
  }
  
  function numbers_array($ashu_meta){
	if($ashu_meta['std']!='')
	  $nums = implode( ',', $ashu_meta['std'] );
	
	echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	echo '<input type="text" size="'.$ashu_meta['size'].'" value="'.$nums.'" id="'.$ashu_meta['id'].'" name="'.$ashu_meta['id'].'"/>';
  }
  
  function tinymce($ashu_meta){
    echo '<h3>'.$ashu_meta['name'].'</h3>';
	if($ashu_meta['desc'] != "")
	  echo '<p>'.$ashu_meta['desc'].'</p>';
	  
	$tinymce_args = array(
	  'content_css' => get_stylesheet_directory_uri() . '/css/editor-'.$ashu_meta['id'].'.css'
	);
	
	if( isset($ashu_meta['media']) && !$ashu_meta['media'] )
	  $ashu_meta['media'] = 0;
	else
	  $ashu_meta['media'] = 1;
	  
	wp_editor( $ashu_meta['std'],$ashu_meta['id'],$settings=array('tinymce'=>$ashu_meta['media'],'media_buttons'=>1,'tinymce'=>$tinymce_args) );
  }
}
?>