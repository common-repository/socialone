<?php
/*
Plugin Name: 加网SMO工具包
Plugin URI: http://www.jiathis.com/help/html/wordpress-install-soialone
Description: <a href="http://www.jiathis.com/" target="_blank">加网SMO工具包</a>集合了是稳步提升网站流量和搜索引擎排名的WEB2.0工具！为方便广大站长一键使用JiaThis分享、友荐推荐及友言评论工具，特别推出的一键安装工具包，站长只需下载该插件包，即可同时安装分享、社会化推荐和社会化评论三大插件。<a href="options-general.php?page=soialone.php">启用插件后，可以点击这里进行配置</a>。
Version: 1.1
Author: jiathis Inc.
Author URI: http://www.jiathis.com
*/

load_plugin_textdomain('soialone');

add_action('the_content','soialone_cntent');
add_action('admin_head', 'soialone_menu_admin_head',10);

function soialone_cntent($content){
	$sybom = "\r\n";
	// 是否单独安装了 Jiathis Ujian Uyan 插件
	@$ujian_actived = jiathis_check_actived('ujian');
	@$uyan_actived = jiathis_check_actived('youyan-social-comment-system');
	@$jiathis_actived = jiathis_check_actived('jiathis');
		
	// 超级工具包里的 JiaThis 友荐  友言 插件是否开启
	$soialone_jiathis_actived = get_option('soialone_jiathis_actived');
	$soialone_ujian_actived = get_option('soialone_ujian_actived');
	$soialone_uyan_actived = get_option('soialone_uyan_actived');
	
	$jiathis_code = $soialone_jiathis_actived && !$jiathis_actived ?get_option('soialone_jiathis_code'):'';
	$ujian_code = $soialone_ujian_actived && !$ujian_actived ?get_option('soialone_ujian_code'):'';
	$uyan_code = $soialone_uyan_actived && !$uyan_actived ?get_option('soialone_uyan_code'):'';
	
	if(is_single() || is_page()){
		$content =  $content.$sybom.'<!--SOIALONE BEGIN-->'.$sybom.'<div style="clear:both; height:10px;"></div>'.$sybom.$jiathis_code.$ujian_code.$uyan_code.$sybom.'<div style="clear:both; margin-bottom:10px;"></div>'.$sybom.'<!--SOIALONE END-->'.$sybom;
	}
	return $content;
}
add_action('plugins_loaded', 'widget_sidebar_soialone');
function widget_sidebar_soialone() {
    function widget_soialone($args) {
        if(is_single() || is_page()) return;
        extract($args);
        echo $before_widget;
        echo $before_title . __('加网SMO工具包', 'soialone') . $after_title;
	    echo '<div style="margin:10px 0">';
	    echo htmlspecialchars_decode(get_option("soialone_code")) . '</div>';
        echo $after_widget;
    }
    register_sidebar_widget(__('加网SMO工具包', 'soialone'), 'widget_soialone');
}

add_action('admin_menu', 'soialone_menu');
function soialone_menu() {
    add_options_page(__('加网SMO工具包选项', 'soialone'), __('加网SMO工具包', 'soialone'), 8, basename(__FILE__), 'soialone_options');
}

add_filter('plugin_action_links_SoialOne/SoialOne.php','soialoneActionLinks', 10, 2);
function soialoneActionLinks($links, $file) {
		array_unshift($links, '<a href="options-general.php?page=SoialOne.php">'.__('Settings').'</a>');
	    return $links;
}

function soialone_options() {
	include_once 'setting.php';
}

add_filter('wp_footer','soial_footer');
function soial_footer(){
		echo '<style>#uyan_frame{padding-top:35px;} #ckepop table tr td {border:none;}#ckepop table {border:none;}</style>'.$sybo;
}
add_action('admin_menu', 'soialone_add_pages', 10);
function soialone_add_pages() {
	  add_submenu_page(
		'edit-comments.php',
		'',
		'',
		'moderate_comments',
		'uyan_comment_import',
		'uyan_comment_import'
	  );
	  add_submenu_page(
		'edit-comments.php',
		'',
		'',
		'moderate_comments',
		'uyan_comment_export',
		'uyan_comment_export'
	  );
}

// 留言导入
function uyan_comment_import() {
  include('uyan_comment_import.php');
}
// 留言导出
function uyan_comment_export() {
 include('uyan_comment_export.php');
}

function jiathis_check_actived($plugin){
	// 是否单独安装了 Jiathis Ujian Uyan 插件
	$active_plugin = get_option('active_plugins');
	$actived = array();
	$plugin_arr = array('jiathis','ujian','youyan-social-comment-system');
	foreach($active_plugin as $key=>$val){
		$val = explode('/',$val);
		if($val[0] == $plugin){
			$actived[$plugin] = 'open';
		}
	}
	return $actived[$plugin];
}
// 隐藏没必须要的两  导入 导出 选项
function soialone_menu_admin_head() {
?>
  <script type="text/javascript">
  jQuery(function($) {
    // fix menu
    var mc = $('#menu-comments');
		mc.find("li:gt(0)").hide();
	});
  </script>
<?php
}
