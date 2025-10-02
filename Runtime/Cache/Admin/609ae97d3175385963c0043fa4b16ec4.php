<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>后台 - 竞猜管理</title>
		<meta name="keywords" content="">
		<meta name="description" content="">

		
		<link href="/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
		<link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
		<link href="/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
		<link href="/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">

	</head>
	<style>
		/*分页样式*/
		.pages a,.pages span {
		    display:inline-block;
		    padding:4px 7px;
		    margin:0 2px;
		    border:1px solid #D5D4D4;
		    -webkit-border-radius:1px;
		    -moz-border-radius:1px;
		    border-radius:1px;
		}
		.pages a,.pages li {
		    display:inline-block;
		    list-style: none;
		    text-decoration:none; color:#3399ff;
		}
		
		.pages a:hover{
		    border-color:#3399ff;
		}
		.pages span.current{
		    background:#3399ff;
		    color:#FFF;
		    font-weight:700;
		    border-color:#3399ff;
		}
		.pages{
			text-align: center;
		}
		/*分页样式*/
	</style>
	<body class="gray-bg">
		<div class="wrapper wrapper-content animated fadeInRight">	
			<div class="row">
				<div class="col-sm-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>竞猜管理</h5>
							<a class="input-group-btn" href="<?php echo U('Admin/Order/del_order');?>"><span class="btn btn-sm btn-warning" style="margin-left:20px;">删除订单</span></a>
						</div>
						<div class="ibox-content">
							<div class="row">
								<form method="get" action="<?php echo U('Admin/Order/index');?>">
									<div class="col-sm-2">
										<select class="form-control" name="game">
											<option value="">全部</option>
											<!--option value="pk10"  <?php if($game == 'pk10'): ?>selected<?php endif; ?> >北京赛车</option>
											<option value="er75sc"  <?php if($game == 'er75sc'): ?>selected<?php endif; ?> >极速赛车</option>
											<option value="ssc"  <?php if($game == 'ssc'): ?>selected<?php endif; ?> >重庆时时彩</option>
											<option value="xyft"  <?php if($game == 'xyft'): ?>selected<?php endif; ?> >幸运飞艇</option-->
											<option value="bj28"  <?php if($game == 'bj28'): ?>selected<?php endif; ?> >长期宝</option>
											<option value="jnd28"  <?php if($game == 'jnd28'): ?>selected<?php endif; ?> >短期宝</option>
											<!--option value="lhc"  <?php if($game == 'lhc'): ?>selected<?php endif; ?> >六合彩</option-->
										</select>
									</div>
									<div class="col-sm-2">
										<input type="text" placeholder="开始时间" id="starttime" name="starttime" value='<?php echo ($starttime); ?>' class="form-control">
									</div>
									<div class="col-sm-2">
										<input type="text" placeholder="结束时间" id="endtime" name="endtime" value='<?php echo ($endtime); ?>' class="form-control">
									</div>
									<div class="col-sm-2">
										<input type="text"  placeholder="请输入UID" name="uid" value="<?php echo ($uid); ?>" class="input-sm form-control"> <span class="input-group-btn">
									</div>
									<div class="col-sm-2">
										<input type="text"  placeholder="请输入用户号或昵称" name="nickname" value="<?php echo ($nickname); ?>" class="input-sm form-control"> <span class="input-group-btn">
									</div>
									<button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
								</form>
							</div>
							<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<th>UID</th>
											<th>类型</th>
											<th>期号</th>
											<th>下注时间</th>
											<th>头像</th>
											<th>昵称</th>
											<th>用户号</th>
											<th>竞猜内容</th>
											<th>进项</th>
											<th>出项</th>
											<th>输赢</th>
											<th>余额</th>
											<?php if(C('is_del_order') == 1): ?><th>操作</th><?php endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
												<td width="50"><?php echo ($vo["userid"]); ?></td>
												<td width="120" style="text-align: center;">
												
													<?php if($vo["game"] == 'bj28'): ?>长期宝<?php endif; ?>
													
													<?php if($vo["game"] == 'jnd28'): ?>短期宝<?php endif; ?>
													<?php if($vo["fangjian"] == 'a'): ?>(普通厅)<?php endif; ?>
													<?php if($vo["fangjian"] == 'b'): ?>(贵宾厅)<?php endif; ?>
													<?php if($vo["fangjian"] == 'c'): ?>(VIP厅)<?php endif; ?>
												
												</td>
												<td width="30" oid="<?php echo ($vo["id"]); ?>" style="display: none"><?php echo ($vo["id"]); ?></td>
												<td width="100"><?php echo ($vo["number"]); ?></td>
												<td width="100"><?php echo (date("Y-m-d H:i:s",$vo["time"])); ?></td>
												<td width="40"><img style="width: 40px;" src="<?php echo ($vo["user"]["headimgurl"]); ?>"/></td>
												<td width="100"><?php echo ($vo["user"]["nickname"]); ?></td>
												<td width="100"><?php echo ($vo["user"]["username"]); ?></td>
												<td width="100"><?php echo ($vo["jincai"]); ?></td>
												<td width="100">
													<?php if(empty($vo['uid'])): echo ($vo["add_points"]); ?>
														<?php else: ?>
															<?php if($vo['type'] == 1): ?><span style="color: red;">上分&nbsp;&nbsp;<?php echo ($vo["points"]); ?></span><?php endif; endif; ?>
												</td>
												<td width="100">
													<?php if(empty($vo['uid'])): if($vo['state'] == 1): echo ($vo["del_points"]); ?>
																<?php else: ?>
																0.0<?php endif; ?>
														<?php else: ?>
															<?php if($vo['type'] == 0): ?><span style="color: blue;">下分&nbsp;&nbsp;<?php echo ($vo["points"]); ?></span><?php endif; endif; ?>
												</td>
												<td width="100">
												<?php if($vo['state'] == 1): if($vo['is_add'] == 1): if($vo['add_points'] - $vo['del_points'] > 0): echo ($vo['add_points']-$vo['del_points']); ?>
															<?php else: ?>
															<span style="color: red;"><?php echo ($vo['add_points']-$vo['del_points']); ?></span><?php endif; ?>
														<?php else: ?>
														<span style="color: red;">-<?php echo ($vo["del_points"]); ?></span><?php endif; endif; ?>
												</td>
												<td width="100"><?php if($vo['state'] == 1 || $vo['uid']): echo ($vo["balance"]); else: echo ($vo['balance']+$vo['del_points']); ?><span style="color:red;">（已取消）</span><?php endif; ?></td>
												<?php if(C('is_del_order') == 1): ?><td width="100"><a onclick="del('<?php echo ($vo["id"]); ?>')" class="btn btn-warning">删除</a></td><?php endif; ?>
												
												
												<!-- <td width="100"><a onclick="admin_cancel('<?php echo ($vo["id"]); ?>')" class="btn btn-warning">取消</a></td> -->
											
												
											</tr><?php endforeach; endif; else: echo "" ;endif; ?>
									</tbody>
								</table>
							</div>
							<div class="pages">
								<?php echo ($show); ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
		<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
		<script src="/Public/Admin/js/plugins/iCheck/icheck.min.js"></script>
		<script src="/Public/Admin/js/plugins/layer/laydate/laydate.js"></script>
		<script src="/Public/Common/layer/layer.js"></script>
		<script>
			laydate({
			  elem: '#starttime',
			  istime: true,
			  format: 'YYYY-MM-DD hh:mm:ss', //日期格式
			  max: laydate.now(), //+1代表明天，+2代表后天，以此类推
			});
			laydate({
			  elem: '#endtime',
			  istime: true,
			  format: 'YYYY-MM-DD hh:mm:ss', //日期格式
			  max: laydate.now(), //+1代表明天，+2代表后天，以此类推
			});
		</script>
		<script>
			$(document).ready(function() {
				$(".i-checks").iCheck({
					checkboxClass: "icheckbox_square-green",
					radioClass: "iradio_square-green",
				})
			});
		</script>
		<script>
			function del(id){
				layer.confirm('确定要删除吗？', {
				  	btn: ['确定','取消'] //按钮
				}, function(){
				  	window.location.href="/Admin/Order/del/id/" + id + ""
				});
			}

			function admin_cancel(id){
				layer.confirm('确定要取消吗？', {
				  	btn: ['确定','取消'] //按钮
				}, function(){
				  	window.location.href="/Admin/Order/admin_cancel/id/" + id + ""
				});
			}
		</script>
	</body>

	
</html>