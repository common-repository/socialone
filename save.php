<?php
require '../../../wp-load.php';
require '../../../wp-admin/includes/admin.php';
do_action('admin_init');
$tab = "\r\t";
$symbol = "\n";
if($_GET['type']){
	update_code($_GET['type'],$_GET['button']);
}
if($_GET['plugin']){
	update_option('soialone_'.$_GET['plugin'].'_actived',$_GET['active']);
	switch($_GET['plugin']){
		case 'jiathis':
			$button = 'icon';
			break;
		case 'ujian':
			$button = 'widge';
			break;
	}
	if(!get_option('soialone_'.$_GET['plugin'].'_code')){
		update_code($_GET['plugin'],$button);	
	}
	unset($_GET['plugin']);
}


function update_code($type,$button){
	global $tab,$symbol;
	$uid = '';
	$c = '?';
	if($_GET[$_GET['type'].'_uid']){
		$uid .= '?uid='.$_GET[$_GET['type'].'_uid'];
		$c = '&';
		update_option('soialone_'.$_GET['type'].'_uid',$_GET[$_GET['type'].'_uid']);
	}

	if($type == 'jiathis'){
	// 更新Jiathis代码 
	update_option('soialone_jiathis_type',$button);
		switch($button){
			case 'tool':
			$code = '<!-- JiaThis Button BEGIN -->
		<div id="ckepop">
			<span class="jiathis_txt">分享到：</span>
			<a class="jiathis_button_tools_1"></a>
			<a class="jiathis_button_tools_2"></a>
			<a class="jiathis_button_tools_3"></a>
			<a class="jiathis_button_tools_4"></a>
			<a href="http://www.jiathis.com/share'.$uid.'" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
			<a class="jiathis_counter_style"></a>
		</div>
		<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js'.$uid.'" charset="utf-8"></script>
		<!-- JiaThis Button END -->'.$symbol;
			break;
			case 'button':
			$code = '<!-- JiaThis Button BEGIN -->
		<div id="ckepop">
			<a href="http://www.jiathis.com/share'.$uid.'" class="jiathis jiathis_txt" target="_blank"><img src="http://v3.jiathis.com/code_mini/images/btn/v1/jiathis1.gif" border="0" /></a>
			<a class="jiathis_counter_style_margin:3px 0 0 2px"></a>
		</div>
		<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js'.$uid.'" charset="utf-8"></script>
		<!-- JiaThis Button END -->';
			break;
			case 'slide':
			$code = '<!-- JiaThis Button BEGIN -->
		<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js'.$uid.$c.'move=0" charset="utf-8"></script>
		<!-- JiaThis Button END -->'.$symbol;
			break;
			case 'icon':
			$code = '<!-- JiaThis Button BEGIN -->
		<div id="jiathis_style_32x32">
			<a class="jiathis_button_qzone"></a>
			<a class="jiathis_button_tsina"></a>
			<a class="jiathis_button_tqq"></a>
			<a class="jiathis_button_renren"></a>
			<a class="jiathis_button_kaixin001"></a>
			<a href="http://www.jiathis.com/share'.$uid.'" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
			<a class="jiathis_counter_style"></a>
		</div>
		<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js'.$uid.'" charset="utf-8"></script>
		<!-- JiaThis Button END -->'.$symbol;
			break;
		}
	}else if($type == 'ujian'){
		 // 更新友荐代码
		update_option('soialone_ujian_type',$button);
		$str = $button;
		$button_arr = explode(',',$str);
		foreach($button_arr as $key=>$val){
			$ujian[$val] = $val;
		}
		print_r($ujian);
		$ujian_code = '<!-- UJIAN BEGIN -->'.$symbol;
		$js_code = '';
		if($ujian['widge']){
			$ujian_code .= '<div class="ujian-hook"></div>'.$symbol;
			$js_code .= '<script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js'.$uid.'"></script>'.$symbol;
		}
		if($ujian['slide']){
			$ujian_code .= '<span id="ujian-slide-pos"></span>'.$symbol;
			$js_code = '<script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js'.$uid.$c.'type=slide"></script>'.$symbol;
		}
		$code = $ujian_code.$js_code;
		$code .= '<!-- UJIAN END -->'.$symbol;
	}else if($type == 'uyan'){
		// 更新友言代码
		$uid = $uid?str_replace('uid','UYUserId',$uid):'';
		$code = '<!-- UY BEGIN -->
<div id="uyan_frame"></div>
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js'.$uid.'" async=""></script>
<!-- UY END -->'.$symbol;
	}
	update_option('soialone_'.$type.'_code',$symbol.$code.$symbol);
	unset($_GET['type']);
}

?>