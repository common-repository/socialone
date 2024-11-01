<style type="text/css">
    #PluginLogo {
        background: url("http://www.jiathis.com/resource/default/images/logo2.gif") no-repeat;
        width: 90px;
        float: left;
        height: 24px;
        margin: 20px 6px 0 0;
    }
    .postbox{
		border:none;
		min-height:200px;
		height:100%;
		background:none;	
	}
    
    
    .wrap .plugin_title{
		font: 20px Georgia,"微软雅黑";
        color: #093E56;
        margin: 0;
        padding: 18px 15px 3px 0;
        clear: none;
		margin-bottom:15px;
	}
.plugin_left{
	float:left;	
	width:780px;
	border:1px solid #ddd;
	border-radius:8px;
	height:100%;
}
.plugin_right{
	margin-left:20px;
	float:left;
	height:100%;
	width:310px;
	border:1px solid #ddd;
	border-radius:8px;
}
.plugin_desc{
	height:30px;
	background:#eee;
	line-height:30px;
	padding-left:10px;
	font-size:14px;
	border-bottom:none;
	border-top-left-radius:8px;
	border-top-right-radius:8px;
}
.info{
	padding:4px;
	padding-left:8px;
	min-height:300px;
	height:100%;
	line-height:24px;
}
.info p{
	text-indent:2em;	
}
.supper{
	width:764px;
	height:30px;
	line-height:30px;
	padding-left:15px;
	font-size:14px;
	font-family:"微软雅黑";
	padding-top:15px;
}
.set{
	width:764px;
	min-height:50px;
	padding-top:10px;
	padding-bottom:15px;
	padding-left:15px;
	position:relative;
	overflow:hidden;
	border-bottom:1px solid #ddd;
}
#set_uyan{
	border:none;
}
#set_ujian{
	height:100px;
}
.save{
	position:absolute;
	right:100px;
	bottom:20px;	
	background:url(<?php echo plugin_dir_url(__FILE__);?>images/saveBTN.png);
	width:91px;
	height:37px;
	line-height:37px;
	text-align:center;
	color:#406A3B;
	font-weight:600;
	text-shadow:0 1px #EAF8C6;
	font-size:15px;
	cursor:pointer;
}
.import,.export{
	width:230px;
	float:left;
	margin-right:130px;
}
.imoportIntro{
	font-size:14px;
	color:#999;
	padding-bottom:15px;
	font-weight:bold;
	margin-top:20px;
}
.importBTN{
	background:url(<?php echo plugin_dir_url(__FILE__);?>images/importData.png) 0 0 no-repeat;
	padding-top:8px;
	width:114px;
	height:30px;
	color:#237fd4;
	font-size:14px;
	display:block;
	cursor:pointer;
	padding-left:65px;
	margin-bottom:15px;
}
.exportBTN{
	background:url(<?php echo plugin_dir_url(__FILE__);?>images/exportData.png) 0 0 no-repeat;
	padding-top:8px;
	width:114px;
	height:30px;
	color:#237fd4;
	font-size:14px;
	display:block;
	cursor:pointer;
	padding-left:65px;
}
.importNoti{
	float:left;
	font-size:13px;
	color:#666;
	padding: 9px 0 0 10px;
}
.clear{
	clear:both;	
}
.left{
	float:left;
}
.jiathis,.ujian,.uyan {
	margin-top:15px;
	font-size:18px;
	font-weight:bold;
	color:#333;	
	padding-bottom:4px;
}
.status_open,.status_close{
	font-size:13px;
	font-weight:normal;
	width:20px;
	height:20px;
	display:block;
	margin-top:7px;
	float:left;
	cursor:pointer;
}
.status_open {
	background:url(<?php echo plugin_dir_url(__FILE__);?>images/open.gif) #fff no-repeat;	
}
.status_close {
	background:url(<?php echo plugin_dir_url(__FILE__);?>images/close.gif) #fff no-repeat;	
}
.click_open{
	display:block;
	float:left;
	/*margin-top:10px;*/
	margin-right:5px;	
}
.type_name{
float:left;
display:block;
cursor:pointer;
}
a{
	text-decoration:none;	
	paddint:0;
	margin:0;
}
.active{
	font-weight:normal; 
	font-size:10px; 
	float:left; 
	display:block; 
	padding:6px 4px; 
}
.green{
	color:green;	
}
.red{
	color:red;	
}
.uid{
	height:30px; 
	line-height:30px;
	margin-bottom:10px;
	font-family:"微软雅黑"
}
.uid input {
	width:40px;
	margin-left:10px;	
}
* {
	font-family:"微软雅黑"
}
</style>
<script src="<?php echo plugin_dir_url(__FILE__);?>js/jquery-1.4.2.min.js" type="text/javascript" language="javascript"></script>
<?php
//是否开启了 友荐  友言 Jiathi
@$ujian_actived = jiathis_check_actived('ujian');
@$uyan_actived = jiathis_check_actived('youyan-social-comment-system');
@$jiathis_actived = jiathis_check_actived('jiathis');
	
// 通过 超级工具包 启用的
$soialone_jiathis_actived = get_option('soialone_jiathis_actived');
$soialone_ujian_actived = get_option('soialone_ujian_actived');
$soialone_uyan_actived = get_option('soialone_uyan_actived');

// 各自的UId
$soialone_jiathis_uid = get_option('soialone_jiathis_uid');
$soialone_ujian_uid = get_option('soialone_ujian_uid');
$soialone_uyan_uid = get_option('soialone_uyan_uid');

// 友荐是 嵌入式 还是 侧栏式
$ujian_style = array('slide','widge');
$ujian_code_style = get_option('ujian_codestyle');
$arr = array_filter(explode(',',$ujian_code_style));
foreach($arr as $key=>$val){
	if(in_array($val,$arr)){
		$style[$val] = '1';
	}
}

$jiathis_type = get_option('soialone_jiathis_type');
$ujian_type = get_option('soialone_ujian_type');
?>


<div class="wrap" >
    <a href="http://www.jiathis.com" target="_blank"><div id="PluginLogo" class="icon32"></div></a>
    <h4 class="plugin_title">加网SMO工具包</h4>
    <div class="postbox">
<div class="plugin_left">
        <!--Jiathis-->
       
	<div class="jiathis supper" style="border-bottom:1px solid #ddd;" >
    <!--<span title='点击<?php echo $jiathis_actived?'关闭':'开启';?>插件' class="<?php echo $jiathis_actived?'status_open':'status_close';?>" onclick="<?php echo $jiathis_actived?'close(\'jiathis\')':'open(\'jiathis\')';?>"></span>
    -->
    <span class="click_open"><input type="checkbox" id="jiathis" name="jiathis"  <?php echo $jiathis_actived || $soialone_jiathis_actived?'checked':'';?>  <?php echo $jiathis_actived ?'disabled':'';?>  onclick="active('jiathis')"  /></span>
    <span class="active <?php if($jiathis_actived || $soialone_jiathis_actived) echo 'green'; else echo 'red';?>">( <?php if($jiathis_actived || $soialone_jiathis_actived) echo '已开启'; else echo '未开启';?> )</span> <span class="type_name" onclick="slide('jiathis')">分享工具</span></div>
    	<div class="set clear <?php if($jiathis_actived || $soialone_jiathis_actived) echo ''; else echo 'transparent';?>" id="set_jiathis" style="display:<?php if($jiathis_actived || $soialone_jiathis_actived) echo ''; else echo 'none';?>; "> 
        <?php if(!$jiathis_actived){?>
          <div class="clear uid">JiaThis官网UID:<input type="text" name="jiathis_uid" id="jiathis_uid" value="<?php echo $soialone_jiathis_uid;?>" /></div>
         <!-- JiaThis Button BEGIN -->
<table>
<tr height="30" id="ckepop" onclick="get_code('btn1')">
<td valign="middle" width="6%">工具式</td>
<td width="1%" valign="middle"><input type="radio" name="btn" id="btn1" value="tool" style="padding-top:10px;" onclick="get_code('btn1')" <?php echo $jiathis_type=='tool'?'checked':''?>></td>
<td width="100%" valign="top"><table>
  <tbody>
    <tr>
      <td valign="top"><span class="jtico jtico_qzone">QQ空间</span></td>
      <td valign="top"><span class="jtico jtico_tsina">新浪微博</span></td>
      <td valign="top"><span class="jtico jtico_tqq">腾讯微博</span></td>
      <td valign="top"><span class="jtico jtico_renren">人人网</span></td>
      <td valign="top"><span class="jtico jtico_kaixin001">开心网</span></td>
      <td valign="top"><span class="jtico jtico_jiathis"></span></td>
    </tr>
  </tbody>
</table></td>
</tr>
</table>

<table>
<tr height="30" id="jiathis_style_32x32" onclick="get_code('btn2')">
<td valign="middle" width="6%" style="font-family:'微软雅黑'">按钮式</td>
<td width="1%" valign="middle"><input type="radio" name="btn" id="btn2" value="button" style="padding-top:10px;" onclick="get_code('btn2')" <?php echo $jiathis_type == 'button'?'checked':''?>></td>
<td width="100%" valign="top"><table>
  <tbody>
    <tr onclick="get_code('btn2')">
  <td valign="top"><span class="jiathis_txt"><img border="0" src="http://v3.jiathis.com/code_mini/images/btn/v1/jiathis1.gif" style="cursor:pointer;" onclick="get_code('btn2')"></span></td>
    </tr>
  </tbody>
</table></td>
</tr>
</table>
<table>
<tr height="30" id="jiathis_style_32x32" onclick="get_code('btn3')">
<td valign="middle" width="6%"style="font-family:'微软雅黑'" >图标式</td>
<td width="1%" valign="middle"><input type="radio" name="btn" id="btn3" value="icon" style="padding-top:10px;" onclick="get_code('btn3')" <?php echo $jiathis_type == 'icon'?'checked':''?>></td>
<td width="100%" valign="top"><table>
  <tbody>
    <tr>
      <td valign="top"><span class="jtico jtico_qzone"></span></td>
      <td valign="top"><span class="jtico jtico_tsina"></span></td>
      <td valign="top"><span class="jtico jtico_tqq"></span></td>
      <td valign="top"><span class="jtico jtico_renren"></span></td>
      <td valign="top"><span class="jtico jtico_kaixin001"></span></td>
      <td valign="top"><span class="jtico jtico_jiathis"></span></td>
    </tr>
  </tbody>
</table></td>
</tr>
</table><br />
<span style="font-family:'微软雅黑';" >&nbsp;侧栏式</span>&nbsp;&nbsp; <input type="radio"  value="slide" onclick="get_code('btn4');" id="btn4" name="btn" <?php echo $jiathis_type == 'slide'?'checked':''?>>
<a href="javascript:get_code('btn4');"><img align="absmiddle" src="http://v3.jiathis.com/code/images/r.gif"></a>
<!-- JiaThis Button END -->
<div class="save" id="save_jiathis"  onclick="save_setting('jiathis')" >保存设置</div>
       <?php 
	   }else{ 
		?>
            您已经安装并启用了JiaThis分享插件，<a style="cursor:pointer;" href="<?php echo get_option('siteurl');?>/wp-admin/admin.php?page=jiathis-share.php">点击这里进行设置</a>

        <?php   
	   }
	   ?>
         </div>
        <!--UJian-->
       
	<div class="ujian supper clear" style="border-bottom:1px solid #ddd;">
  <!--  <span  title='点击<?php echo $ujian_actived?'关闭':'开启';?>插件'  class="<?php echo $ujian_actived?'status_open':'status_close';?>" onclick="<?php echo $ujian_actived?'close(\'ujian\')':'open(\'ujian\')';?>"></span>-->
    <span class="click_open"><input type="checkbox" id="ujian" name="ujian"  <?php echo $ujian_actived || $soialone_ujian_actived?'checked':'';?>  <?php echo $ujian_actived ?'disabled':'';?>  onclick="active('ujian')"  /></span>
    <span class="type_name" onclick="slide('ujian')"> <span class="active <?php if($ujian_actived || $soialone_ujian_actived) echo 'green'; else echo 'red';?>">( <?php echo $ujian_actived || $soialone_ujian_actived ?'已开启':'未开启';?> )</span> 推荐工具 </span> </div>
    	<div class="set clear <?php echo $ujian_actived || $soialone_ujian_actived ?'':'transparent';?>" style="padding-top:10px; display:<?php echo $ujian_actived || $soialone_ujian_actived ?'':'none';?>; " id="set_ujian" >
        <?php if(!$ujian_actived){?>
          
        <input type="checkbox" name="ujian_checkbox" id="widge" value="widge" <?php echo strstr($ujian_type,'widge')?'checked':''?> /> 嵌入式&nbsp;&nbsp;&nbsp;&nbsp; 
        <input type="checkbox" name="ujian_checkbox" id="slide" value="slide" <?php echo strstr($ujian_type,'slide')?'checked':''?>   /> 侧栏式&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">友荐官网UID：<input type="text" name="ujian_uid" id="ujian_uid" value="<?php echo $soialone_ujian_uid;?>" /></span>
 <div class="save"  id="save_ujian" onclick="save_setting('ujian')">保存设置</div>
 <?php }else{
	?>
        您已经安装并启用了友荐插件，<a style="cursor:pointer;" href="<?php echo get_option('siteurl');?>/wp-admin/admin.php?page=ujian.php">点击这里进行设置</a>

    <?php 
 }?>
        </div>
        <!--UYan-->
    <div class="uyan supper clear" style="border:none;">
    <!-- <span title='点击<?php echo $uyan_actived?'关闭':'开启';?>插件' onclick="<?php echo $uyan_actived?'close(\'uyan\')':'open(\'uyan\')';?>"  class="<?php echo $uyan_actived?'status_open':'status_close';?>"></span>
    -->
        <span class="click_open"><input type="checkbox" id="uyan" name="uyan"  <?php echo $uyan_actived || $soialone_uyan_actived?'checked ':'';?> <?php echo $uyan_actived ?'disabled':'';?> onclick="active('uyan')" /></span>
    <span class="type_name" onclick="slide('uyan')"> <span class="active <?php echo $uyan_actived || $soialone_uyan_actived?'green':'red';?> ">( <?php echo $uyan_actived || $soialone_uyan_actived?'已开启':'未开启';?> )</span> 评论工具</span></div>
    	<div class="set clear <?php echo $uyan_actived || $soialone_uyan_actived?'':'trnasparent';?>" id="set_uyan" style="display:<?php echo $uyan_actived || $soialone_uyan_actived?'':'none';?>;">
        <?php if(!$uyan_actived){?>
   <!--导入-->
  <div class="clear uid">友言官网UID:<input type="text" name="uyan_uid" id="uyan_uid" value="<?php echo $soialone_uyan_uid;?>" /></div>
        <div class="import ">
       <div class="imoportIntro">从Wordpress评论导入数据到友言</div>
        <div>
    	<div class="importBTNWrapper" style="width:200px;float:left;">
        	<a class='importBTN'  onclick="importComment(this)" >导入数据</a>
    	</div>
    	<span id="uyan_runtotal_id" style="width:550px;float:left;display:block;height: 30px;line-height: 36px;"></span>
    </div>
   </div>
   <!--导出-->
   <div class="export">
    <div class="imoportIntro">从友言导出数据到Wordpress</div>
        <div class="importBTNWrapper">
        <a class='exportBTN' onclick="exportComment(this)" style="float:left;">导出数据</a>
        <div id="uyan_export"><div style="width:80px; float:left; margin-left:15px; height:35px; line-height:35px;" class="uyan_export_text"></div></div></div>
        <div id="exportNoti"><div id="loading"></div></div>
</div>
<div class="save" id="save_uyan"  onclick="save_setting('uyan')" >保存设置</div>

<?php }else{
	?>
    您已经安装并启用了友言插件，<a style="cursor:pointer;" href="<?php echo get_option('siteurl');?>/wp-admin/admin.php?page=uyan">点击这里进行设置</a>
    <?php	
}?>
  </div>
</div>
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
<script>
function slide(type){
	if(!$("#set_"+type).is(":animated")){
		$("#set_"+type).slideToggle(function (){
			if($("#set_"+type).is(":hidden") && type != 'uyan'){
				$('.'+type).css({"border-bottom":"1px solid #ddd"},1000)	
			}else{
				$('.'+type).css({"border-bottom":"none"},1000)		
			}
		});
	}
}
function get_code(btn){
	document.getElementById(btn).checked = true;
}
function save_setting(type){
	var value = '';
	var option = '';
	var uid = '';
	if($("#"+type+"_uid").val()){
		uid = '&'+type+'_uid='+$("#"+type+"_uid").val();	
	}
	 // 配置Jiathis传递的参数
	if(type == 'jiathis'){
		$.each($("input[type='radio']"),function (index,v){
			if(v.checked){
				value = v.value
			}
		});
		option = '?type=jiathis&button='+value;
	}else if(type == 'ujian'){
	// 配置 友荐 传递的参数 
		var c = '';
		$.each($("input[name='ujian_checkbox']"),function (index,v){
			if(v.checked){
				value += c+v.value
				c = ',';
			}
		});
		option = '?type=ujian&button='+value;
	}else if(type == 'uyan'){
	// 配置友言传递的参数
		option = '?type=uyan';
	}
		$("#save_"+type).html("已保存");
		$.get('<?php echo plugin_dir_url(__FILE__);?>save.php'+option+uid,function (){
				setTimeout('$("#save_'+type+'").html("保存设置")',2000);
		});
}


function active(type){
	var is_checked = $('#'+type).attr('checked');
	var active = 0;
	if(is_checked){
		active = 1
	}
	
	var option = '?plugin='+type+'&active='+active;
		if(active == 1){
			$('.'+type).find('.active').html('( 已开启 )').removeClass('red').addClass('green');
			$('#set_'+type).slideDown();
			if(type == 'jiathis'){
				$("#btn3").attr({"checked":true});
			}else if(type == 'ujian'){
				$("#widge").attr({"checked":true});
			}
		}else{
			$('.'+type).find('.active').html('( 未开启 )').removeClass('green').addClass('red');
			$('#set_'+type).slideUp();
		}
	$.get('<?php echo plugin_dir_url(__FILE__);?>save.php'+option,function (){
	});

}
function exportComment(node){
	$node = $(node);
	$node.removeAttr('onclick');
	$("#loading").html('<img style="margin-left:90px;float:left;margin-top:-25px;" src="../wp-content/plugins/youyan-social-comment-system/images/loading.gif" />');
	$node.css({'background-image':'url(../wp-content/plugins/youyan-social-comment-system/images/importDataPressed.png)','cursor':'default','float':'left'});$node.html('正在导出');
  $.post("edit-comments.php?page=uyan_comment_export", function(data){$node.attr("onclick",function(){return function(){exportComment(this)}}); $node.html('已导出'); setTimeout("$node.html('导出数据'); $node.css({'background-image':'url(../wp-content/plugins/youyan-social-comment-system/images/exportData.png)','cursor':'pointer'}); $node.after('<div class=\"importNoti\" id=\"exportNoti\">已成功导出</div>');",'1000');
  $("#loading").hide();
  setTimeout("$('#exportNoti').hide()",4000);
  });
}

function importComment(node, nowpage, alltotal, lowertotal, runtotal){

	if(typeof(nowpage) == "undefined") nowpage = 0;
	if(typeof(alltotal) == "undefined") alltotal = 0;
	if(typeof(lowertotal) == "undefined") lowertotal = 0;
	if(typeof(runtotal) == "undefined") runtotal = 0;
	$node = $(node);
	$node.removeAttr('onclick');
	$("#importNoti").remove();
	$node.css({'background-image':'url(../wp-content/plugins/youyan-social-comment-system/images/importDataPressed.png)','cursor':'default'});
	$node.html('正在导入');

	$.ajax({
		type : 'POST',
		url : 'edit-comments.php?page=uyan_comment_import',
		data : 'action=uyan_import&nowpage='+nowpage+'&alltotal='+alltotal+'&runtotal='+runtotal,
		success : function(msg) {
			var res = msg.split('_FINISH_STATUS_');
			var resArr = res[1].split('_');
			nowpage = parseInt(resArr[0]);
			alltotal = parseInt(resArr[1]);
			runtotal = parseInt(resArr[2]);
			pagesize = parseInt(resArr[3]);
			if(nowpage < alltotal/pagesize) {
				nowpage ++;
				$('#uyan_runtotal_id').html('<img src="../wp-content/plugins/youyan-social-comment-system/images/loading.gif" />&nbsp;导入成功'+runtotal+'条评论，还有'+(alltotal-runtotal)+'条记录没有分析');
				importComment(this, nowpage, alltotal, lowertotal, runtotal);
			} else {
				if(runtotal != 2) {
					$('#uyan_runtotal_id').html('完成导入'+runtotal+'条评论');
				} else {
					$('#uyan_runtotal_id').html('导入完成');
				}
				$('.importBTN').attr('style', '');
				$('.importBTN').html('完成导入');
				setTimeout("$('#uyan_runtotal_id').hide()",4000);
			}
		}
	});

}

</script>
<div class="plugin_right">
	<div class="plugin_desc">插件介绍</div>
   <div class="info"><strong>加网SMO工具包是什么？<a href="http://www.jiathis.com" target="_blank">官网网站</a></strong>
   <p >
加网SMO工具包是稳步提升网站流量和搜索引擎排名的WEB2.0工具！为方便广大站长一键使用JiaThis分享、友荐推荐及友言评论工具，特别推出的一键安装工具包，站长只需下载该插件包，即可同时安装分享、推荐和评论三大插件。</p>
<p>超过80万网站正在使用JiaThis分享工具，20万网站正在使用友荐推荐工具，3万网站正在使用友言评论工具，国内几乎所有的大网站在使用社会化工具。到三大工具的官网看看谁在使用吧！</p>
<p>如果您想更换其他按钮风格或希望对网站的数据进行追踪与分析，只需要在某一产品免费注册会员，就可以实现三站点同时登陆，并在登录状态下获取新代码。然后在Wordpress后台的 “设置->加网SMO工具包” 中将您的UID填入文本框中并保存设置即可。</p>
<p><strong>提示：</strong>加网SMO工具包插件安装完成后，如果在安装这个插件前，网站中已经安装并启用了分享、推荐、评论，请不要担心，插件会提示你<span style="color:red">“您已经安装并启用了xx插件，点击这里进行设置”</span>。</p>
</div>

</div>
</div>