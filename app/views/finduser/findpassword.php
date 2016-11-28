<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <title>找回密码</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
	<link rel="stylesheet" href="<?php echo ASSET_FONT;?>/css/mobile/top.css">
	<link href="<?php echo ASSET_FONT;?>/css/mobile/login.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSET_FONT;?>/css/mobile/comm.css?v=130715" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSET_FONT;?>/css/mobile/member.css?v=130726" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSET_FONT;?>/css/mobile/new.css?v=130726" rel="stylesheet" type="text/css" />
    <script src="<?php echo ASSET_FONT;?>/jquery190.js" language="javascript" type="text/javascript"></script>
    <script src="<?php echo ASSET_FONT;?>/js/mobile/pageDialog.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v11">
    
<!-- 栏目页面顶部 -->

<!-- 内页顶部 -->
<header class="header">
<div class="n-header-wrap">
<div class="backbtn">
<a href="javascript:;" onclick="history.go(-1)" class="h-count white">
</a>
</div>

<div class="n-h-tit"><h1 class="header-logo">找回密码</h1></div>
</div>

	
   <section>
		<form method="post" action="" enctype="application/x-www-form-urlencoded" onsubmit="return checkform();">
		<div class="registerCon">
			<ul>
				<li><input name="name" id="userMobile" type="tel" placeholder="请输入您的手机号" class="rText" required><s class="rs1"></s>
				</li>
				<li><input name="txtRegSN" type="text" id="txtCode" placeholder="验证码" class="rText" maxlength="4" pattern="[A-z0-9]{4}" required><s class="rs2"></s><img style="border: none;height: 34px;width: 80px;background-position: 0 -25px;position: absolute;top: 5px;right: 5px;" id="yzm_refresh" src=""/>
				</li>
				<li><input type="submit" name="submit" id="btnNext" class="nextBtn orgBtn"  value="下一步"/></li>
				<div class="expansion">
					<p>1.您若忘记注册时所用的手机号建议您重新注册账号， <a href="<?php echo G_WEB_PATH;?>/user/register">立即注册</a></p>
					<p>2.如果您注册时使用的是邮箱注册，请使用电脑版找回密码</p>
					<p>3.若有任何疑问或需要帮助请您进入帮助中心，也可以点击在线客服进行咨询或拨打服务热线 <span style="color:#F5484C"><a href="tel:400-805-0095">400-805-0095</a></span></p>
				</div>
			</ul>
		</div>
		</form>
	</section>

	<script>
	function checkform(){
		var userMobile = $('#userMobile').val();
		var txtCode = $('#txtCode').val();
        var w = /^1\d{10}$/;
		if (!w.test(userMobile)) {
			$.PageDialog.fail('请正确填写手机号');
			return false;
		} else if(!txtCode || /^[a-zA-Z0-9]{4}$/.test(txtCode) == false){
			$.PageDialog.fail('请正确填写验证码');
			return false;
		}
		$(this).addClass("noCheck").addClass("grayBtn").unbind("click")
		return true;
	}
	$('#yzm_refresh').click(function(){
		$(this).attr('src',"<?php echo G_WEB_PATH;?>/finduser/image/60_25_0_0_4/"+(new Date).getTime());
		$('#txtCode').val('');
	}).click();


	</script>
    

<script language="javascript" type="text/javascript">
var Path = new Object();
Path.Skin="<?php echo ASSET_FONT;?>";
Path.Webpath = "<?php echo G_WEB_PATH;?>";
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo ASSET_FONT;?>/js/mobile/Bottom.js?v=' + GetVerNum());
</script>
 
</div>
</body>
</html>
