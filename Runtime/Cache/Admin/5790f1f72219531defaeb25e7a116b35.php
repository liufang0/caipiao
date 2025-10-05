<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>后台 - 会员上分</title>
		<meta name="keywords" content="">
		<meta name="description" content="">

		
		<link href="/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
		<link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
		<link href="/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
		<link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
		<link href="/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">

	</head>

	<body class="gray-bg">
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="col-sm-12">
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							<form id="signform" method="post" action="<?php echo U('Admin/Integral/index');?>" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">会员名：<span style="color: red;"><?php echo ($userinfo["nickname"]); ?></span></label>
									<input type="hidden" name="userid" value="<?php echo ($userinfo["id"]); ?>"/>
									<input type="hidden" name="fid" value="<?php echo ($fid); ?>"/>
									<input type="hidden" name="type" value="<?php echo ($type); ?>"/>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">充值点数</label>
									<div class="col-sm-10">
										<input type="text" id="points" name="points" value="<?php echo ($points); ?>" class="form-control"><span class="help-block m-b-none">积分充值为整数</span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<button class="btn btn-primary" type="submit">确认</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
		<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
		<script src="/Public/Admin/js/content.min.js?v=1.0.0"></script>
		<script src="/Public/Common/js/ajaxForm.js"></script>
		<script src="/Public/Common/layer/layer.js"></script>
		<script>
			$(function(){
				$('#signform').ajaxForm({
					beforeSubmit: checkForm,
					success: complete, 
					dataType: 'json'
				});
				function checkForm(){
					if( '' == $.trim($('#points').val())){
						layer.alert('输入充值点数', {icon: 5}, function(index){
			 			layer.close(index);
						$('#points').focus(); 
						});
						return false;
					}
					$('.btn-primary').attr('disabled','disabled');
				}
				function complete(data){
					if(data.status==1){
						$('.btn-primary').attr('disabled','disabled');
						layer.msg(data.info, function(index){
			 				layer.close(index);
							window.parent.location.href=data.url;
						});
					}else{
						layer.msg(data.info);
						return false;	
					}
				}
			});
		</script>
	</body>

</html>