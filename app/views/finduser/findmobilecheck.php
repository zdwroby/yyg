
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <title>找回密码</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
		<link href="<?php echo ASSET_FONT;?>/css/mobile/login.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo ASSET_FONT;?>/css/mobile/top.css">
    <link href="<?php echo ASSET_FONT;?>/css/mobile/comm.css?v=130715" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSET_FONT;?>/css/mobile/member.css?v=130726" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSET_FONT;?>/css/mobile/new.css?v=130726" rel="stylesheet" type="text/css" />    
    <script	src="<?php echo ASSET_FONT;?>/jquery190.js" language="javascript" type="text/javascript"></script>
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
<div class="h-top-right ">
<a href="<?php echo G_WEB_PATH;?>/home" class="h-search white"></a>
</div>
<div class="n-h-tit"><h1 class="header-logo">找回密码</h1></div>
</div>


<style>
.login_SendoutbutClick {
	background: #f60;
	border: 1px solid #F60;
	color: #fff;
	font-size: 12px;
	height: 25px;
	padding: 0 15px;
	border-radius: 2px;
}
</style>
        <section>
		
        <div class="registerCon">
	        <ul>
				<li>
					<p>商城已向您的手机 <span class="orange"><?php echo $enname;?></span> 免费发送了一条验证短信，请查看您的手机短信！</p>
				</li>
				<form action="" enctype="application/x-www-form-urlencoded" method="post">
				<li><input id="mobileCode" name="checkcode" type="text" placeholder="短信验证码" class="rText" ><s class="rs2"></s></li>
                <li><input type="submit" name="submit"  style="background:#EF6000;color:#FFFFFF" id="btnSubmitRegister" class="login_Email_but" value="提交验证" /></li>
				

				</form>
				<li class="login_Explain">
					<h2>没收到验证短信？</h2>
					<p>1.请查看手机的垃圾短信，信息有可能被误认为是垃圾信息。</p>
					<p>2.如果在2分钟后仍未收到验证短信，请点击 <button id="retrySend" onclick="javascript:sendmobile();" disabled=1 class="login_SendoutbutClick">重新发送<?php echo $time;?></button> </p>
					<p>3.如果手机号码不小心输错了或者想换个号码？请点击 <a id="hylinkRegisterPageA" class="blue Fb" href="<?php echo G_WEB_PATH;?>/user/register">重新注册</a></p>
				</li>
			</ul>
        </div>
		
        </section>

<script>
	var i = <?php echo $time;?>;
	var senda=document.getElementById('retrySend');
	setInterval(function(){if(i>0){
		senda.innerHTML = '重新发送'+i;i--;}else{senda.innerHTML = '重新发送';senda.disabled=0;}
	},1000);
	
	function sendmobile(){
		window.location.href="<?php echo G_WEB_PATH;?>/mobile/finduser/findsendmobile/{wc:$namestr}"
	}
</script>
</div>
</body>
</html>
