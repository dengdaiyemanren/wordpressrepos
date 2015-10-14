<?php
// 幻灯片
add_action( 'init', 'post_type_slider' );
function post_type_slider() {
	$labels = array(
		'name'               => _x( '幻灯片', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( '幻灯片', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( '幻灯片', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( '幻灯片', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( '发布幻灯片', 'slider', 'your-plugin-textdomain' ),
		'add_new_item'       => __( '发布新幻灯片', 'your-plugin-textdomain' ),
		'new_item'           => __( '新幻灯片', 'your-plugin-textdomain' ),
		'edit_item'          => __( '编辑幻灯片', 'your-plugin-textdomain' ),
		'view_item'          => __( '查看幻灯片', 'your-plugin-textdomain' ),
		'all_items'          => __( '所有幻灯片', 'your-plugin-textdomain' ),
		'search_items'       => __( '搜索幻灯片', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent 幻灯片:', 'your-plugin-textdomain' ),
		'not_found'          => __( '你还没有发布幻灯片。', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( '回收站中没有幻灯片。', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
			'taxonomies'=> array('category','post_tag'),
		 'supports' => array('title','editor','author','thumbnail','excerpt','comments')  
	);

	register_post_type( 'slider', $args );
}

/* 幻灯片分类
add_action( 'init', 'create_slider_taxonomies', 0 );
function create_slider_taxonomies() {
	$labels = array(
		'name'              => _x( '幻灯片分类目录', 'taxonomy general name' ),
		'singular_name'     => _x( '幻灯片分类', 'taxonomy singular name' ),
		'search_items'      => __( '搜索幻灯片目录' ),
		'all_items'         => __( '所有幻灯片目录' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( '编辑幻灯片目录' ),
		'update_item'       => __( '更新幻灯片目录' ),
		'add_new_item'      => __( '添加新幻灯片目录' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( '幻灯片分类' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'notice' ),
	);

	register_taxonomy( 'notice', array( 'slider' ), $args );
}*/
?>