<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo G_WEB_PATH; ?>/statics/background/js/roby.js" type="text/javascript"></script>  
<script src="<?php echo G_PLUGIN_PATH; ?>/uploadify/jquery.uploadify.js" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo G_PLUGIN_PATH; ?>/uploadify/uploadify.css">

<style>
	.show_unit_pic{float:left;padding-right:10px;}
	.uploadify{float:left;margin-top:10px;}
	.uploadify-queue{margin-top:40px;}
</style>
</head>
<body>
<div class="header lr10">
	<h3 class="nav_icon">友情链接</h3>
	<span class="span_fenge lr10"></span>
	<a href="/admin/link/lists">友情链接</a>
	<span class="span_fenge lr5">|</span>
	<a href="/admin/link/addlink">添加链接</a>
</div>

<style>
iframe{ font-size:36px;}
.con-tab{ margin:10px; color:#444}
.con-tab #tab-i{ margin-left:20px; overflow:hidden; height:27px; _height:28px; }
.con-tab #tab-i li{
	float:left;background:#eaeef4;
	padding:0 8px;border:1px solid #dce3ed;
	height:25px;_height:26px;line-height:26px;
	margin-right:5px;cursor: pointer; position:relative;z-index:0;
}
.con-tab div.con-tabv{
	clear:both; border:1px solid #dce3ed;
	width:100%;
	margin-top:-1px; padding-top:30px;
	background-color:#fff; position:relative; z-index:1;}

#tab-i li.on{ background-color:#fff;color:#444; font-weight:bold; border-bottom:1px solid #fff;  position:relative;z-index:2;}

table th{ border-bottom:1px solid #eee; font-size:12px; font-weight:100; text-align:right; width:200px;}
table td{ padding-left:10px;}
.con-tabv tr{ text-align:left}
input.button{ display:inline-block}
</style>
<script>
<?php $timestamp = time();?>
$(function() {
	$('#file_upload').uploadify({
		'formData'     : {
			'timestamp' : '<?php echo $timestamp;?>',
			'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
			'dir'		: 'link',
		},
		'swf'      : '<?php echo G_PLUGIN_PATH; ?>/uploadify/uploadify.swf',
		'buttonText': '上传图片',
		'uploader' : '<?php echo G_WEB_PATH; ?>/admin/api/uploadify',
		'multi': false,
		'onInit': function () {                        //载入时触发，将flash设置到最小
        	$("#file_upload-queue").hide();
        },			
		'onUploadSuccess' : function(file, data, response) {
	        $('#thumg').attr('src',data);
	        $('.jq_thumg').val(data);
	    }			
	});
})	

</script>


</head>
<body>

<div class="bk10"></div>
<div class="table-list con-tab lr10" id="con-tab">
 <form action="" id="form" method="post" enctype="multipart/form-data">	
<div name='con-tabv' class="con-tabv">
 <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : '';?>" />
 <table width="100%" class="table_form">
 <tbody>
      <tr>
        <th width="200">所属分类：</th>
        <td>
		<select name="info[cateid]" class="wid150">
        <option value="0">≡ 作为一级分类 ≡</option>
        <?php 
        foreach($list as $item){
        	if(isset($row['cateid'])){
        	?>
        	<option <?php echo ($item['cateid'] == $row['cateid']) ? "selected" : "";?> value="<?php echo $item['cateid']?>"><?php echo $item['name']?></option>
        	<?php	
        	}else{
        	?>
        	<option value="<?php echo $item['cateid']?>"><?php echo $item['name']?></option>
        	<?php	
        	}
        ?>
        		
        <?php
        }
        ?>
        </select>
        </td>
      </tr>       
      <tr>
        <th>链接名称：</th>
        <td>
        	<input type="text" name="info[name]" value="<?php echo isset($row['name']) ? $row['name'] : '';?>" class="input-text" >
		</td>
      </tr>
	<tr>
      <th>链接地址：</th>
        <td>
        	<input type="text" name="info[url]" value="<?php echo isset($row['url']) ? $row['url'] : '';?>"  class="input-text">
        </td>	
    </tr>     
	<tr>
      <th>链接图片：</th>
        <td>           
        	<div class="show_unit_pic">
        	<input type="hidden" name="info[pic]" class="input-text jq_thumg" />
        	<?php
        	if(!empty($row['logo'])){
        	?>
        	<img id="thumg" src="<?php echo $row['logo'];?>" style="border:1px solid #eee; padding:1px;left:0; width:50px; height:50px;">
        	<?php	
        	}else{
        	?>
        	<img id="thumg" src="<?php echo G_UPLOAD_PATH;?>/photo/goods.jpg" style="border:1px solid #eee; padding:1px;left:0; width:50px; height:50px;">
        	<?php	
        	}
        	?>
			</div>
			<input type="button" id="file_upload" class="button" value="上传图片"/>
        </td>
      </tr>
</tbody>
</table>
  </div>



</div>
<!--table-list end-->
	<div class="table-button lr10">
	<input type="button" value=" 提交 " onClick="checkform();" class="button">
	</form>
   </div>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/GgTab.js"></script>
<script type="text/javascript">

function checkform(){
	var form=document.getElementById('form');
	var error=null;	
	if(form.elements[1].value==''){error='请选择上级栏目!';}
	if(form.elements[2].value==''){error='请输入链接名称!';}
	if(form.elements[3].value==''){error='请输入链接地址!';}
	if(error!=null){window.parent.message(error,8,2);return false;}
	form.submit();	
}

</script>

</body>
</html> 