<?php
/*****Meta Box********/
$ashu_meta = array();
$meta_conf = array('title' => '文章设置', 'id'=>'seobox', 'page'=>array('page','post'), 'context'=>'normal', 'priority'=>'low', 'callback'=>'');

$ashu_meta[] = array(
  'name'    => '推荐设置',
  'id'      => '_id_radio',
  'desc'    => '显示在侧边栏位置',
  'std'     => 'thirdness',
  'buttons' => array(
    'jd'      => '焦点图文',
	'bj'    => '编辑推荐',
	'tw' => '图文推荐',
	'qx'      => '取消设置',
  ),
  'type'    => 'radio'
);
$new_box = new ashu_meta_box($ashu_meta, $meta_conf);
?>