<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title><?php echo C('sitename');?></title>

	<!-- 引入样式 -->
	<link rel="stylesheet" type="text/css" href="/Public/Home/new/css/index.css"/>
	<link rel="stylesheet" href="/images/css/common.css"/>
	<script src="/images/js/jquery-1.11.2.min.js"></script>
	<script src="/images/js/sizeChange.js"></script>
	<script src="/Public/Common/js/ajaxForm.js"></script>

	<style>

		.pay_main {
			padding: .2rem 0;
		}
		.pay_nav_box {
			background: #fdfbfa;
			margin-bottom: .2rem;
		}
		.pay_t1, .pay_t2, .pay_t3, .pay_t4, .pay_t5 {
			height: .80rem;
			border-bottom: 1px #e6e1df solid;
			line-height: .80rem;
			font-size: .26rem;
			padding-left: .8rem;
			color: #333;
			background: url(/images/pay_t1.png) .3rem center no-repeat;
			background-size: auto;
			background-size: .30rem .30rem;
		}
		.pay_t5 {
			background: url(/images/pay_t5.png) .3rem center no-repeat;
			background-size: auto;
			background-size: .36rem .36rem;
		}
		.pay_form {
			background: #f9f3f1;
			border-bottom: 1px #e6e1df solid;
		}
		.pay_form .item {
			border-bottom: 1px #efeae8 solid;
			position: relative;
			min-height: .86rem;
			line-height: .86rem;
			font-size: .22rem;
			padding: 0 .3rem;
		}
		.pay_form .item .t {
			position: absolute;
			left: .3rem;
			top: 0;
		}
		.pay_form .item .m {
			text-align: right;
		}
		::placeholder {
			color: #ad978e;
		}
		.pay_form .item .m .input2 {
			width: 92%;
			padding-right: 8%;
		}
		.pay_form .item .m .input {
			border: 0;
			background: 0;
			height: .86rem;
			font-size: .22rem;
			text-align: right;
			color: #4c4743;
			width: 100%;
		}
		.pay_form .item .r {
			position: absolute;
			right: .3rem;
			top: 0;
		}
		.btnbox_wrap {
			padding: .4rem .2rem;
		}
		.btnbox .btn {
			margin-bottom: .2rem;
			display: block;
			height: .78rem;
			line-height: .78rem;
			font-size: .30rem;
			color: #fff;
			text-align: center;
			background: #d53434;
			background-image: none;
			background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#e54d4d),to(#cf2c2c));
			border-radius: .06rem;
			border: 0;
			cursor: pointer;
			border: 0;
			width: 100%;
			box-shadow: 0 .05rem .1rem rgba(0,0,0,0.1);
		}
	</style>


</head>

<body style="background: #efeae8;">
<div class="nav">
	<h3>支付宝支付</h3>
	<i class="iconfont icon-40" onclick="back()"></i>
</div>

<div class="pay_main" style="margin-top: 0.8rem;">
	<form method="post" action="<?php echo U('Home/Fen/addpage1');?>" id="submitForm">
	<div class="pay_nav_box">
		<div class="pay_t5 ng-binding">存款信息</div>
		<div class="pay_form">
			<div class="item">
				<div class="t ng-binding">存款金额</div>
				<div class="m"><input type="number" name="money" maxlength="9" class="input input2 ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" placeholder="请填写此次转账的金额（100-5000000）"></div>
				<div class="r ng-binding">元</div>
			</div>
			<!--div class="item">
				<div class="t ng-binding">存款人</div>
				<div class="m"><input type="text" name="username" class="input ng-pristine ng-untouched ng-valid ng-empty" placeholder="请填写您此次转账使用的支付宝户名"></div>
			</div>
			<div class="item">
				<div class="t ng-binding">存款人账号</div>
				<div class="m"><input type="text" name="userpay" class="input ng-pristine ng-untouched ng-valid ng-empty" placeholder="请填写您此次转账使用的支付宝账号"></div>
			</div-->
		</div>
	</div>

	<div class="btnbox_wrap">
		<div class="btnbox"><input type="submit" class="btn" value="提交申请"></div>
	</div>
	</form>

</div>
<?php $a=5;?>
<!--底部菜单-->

<ul class="tabBox">
    <li>
        <a href="/index.php/Home/index">
            <img src="/images/menu1<?php echo ($a==1?'':'_hui'); ?>.png">
            <p>首页</p>
        </a>
    </li>
    <li>

        <a href="<?php echo U('Home/Run/trend');?>">
            <img src="/images/menu2<?php echo ($a==2?'_red':''); ?>.png">
            <p>走势</p>
        </a>
    </li>
    <li>
        <div class="circle"></div>
        <div class="pic_content"></div>
        <a class="circle1" href="<?php echo C('zxkf');?>">
            <img src="/images/menu3.png" style="width: .50rem;height: .50rem;">

            <p style="margin-top:0;">客服</p>
        </a>
    </li>
    <li>
        <a href="<?php echo U('Home/Run/history');?>">
            <img src="/images/menu4<?php echo ($a==4?'_red':''); ?>.png">

            <p>购买</p>
        </a>
    </li>
    <li>
        <a href="<?php echo U('Home/User/index');?>">
            <img src="/images/menu5<?php echo ($a==5?'_red':''); ?>.png">

            <p>我的</p>
        </a>
    </li>
</ul>


<style>
    body {
        padding-bottom: 1.2rem;
    }

    ul.tabBox {
        position: fixed;
        width: 100%;
        bottom: 0;
        left: 0;
        background: #fff;
        z-index: 1000;
        border-top: 1px solid #ececec;
        display: flex;
        display: -webkit-flex;
        height: .86rem;
        align-items: center;
    }

    ul.tabBox li {
        width: 25%;
        position: relative;
    }

    ul.tabBox li .circle {
        position: absolute;
        width: 1.2rem;
        height: .6rem;
        background: #fff;
        border: 1px solid #ececec;
        border-radius: .6rem .6rem 0 0;
        top: -.28rem;
        left: 0.07rem; z-index: 1;
    }

    ul.tabBox li .pic_content { position: absolute;
        width: 100%;
        height: .5rem;
        background: #fff;
        /*top: -.04rem;*/
        left: 0; right: 0; z-index: 2; }

    ul.tabBox li .circle1 { position: relative; z-index: 3; }

    ul.tabBox li a {
        display: block;
        text-align: center;
        color: #666;
    }

    ul.tabBox li a img {
        width: .36rem;
        margin: auto;
    }

    ul.tabBox li a p {
        color: #757575;
        font-size: .20rem;
        display: block;
        margin-top: .06rem;
    }

    .tips {
        display: flex;
        width: 100%;
        background: #3f3c3c;
        align-items: center;
        justify-content: space-between;
    }

    .tips .leftBox {
        width: 28%;
    }

    .tips .rightBox {
        width: 65%;
        color: #ffffff;
    }

    .tips .rightBox p {
        border: 0;
    }
</style>
<script src="/Public/Common/layer/layer.js"></script>
<script>
	$(function(){
		$('#submitForm').ajaxForm({
			beforeSubmit: checkForm,
			success: complete,
			dataType: 'json'
		});
		function checkForm(){
			if ('' == $.trim($('input[name="money"]').val())) {
				layer.alert('存款金额不能为空', {icon: 5}, function (index) {
					layer.close(index);
					$('input[name="money"]').focus();
				});
				return false;
			}
			/*if ('' == $.trim($('input[name="username"]').val())) {
				layer.alert('存款人不能为空', {icon: 5}, function (index) {
					layer.close(index);
					$('input[name="username"]').focus();
				});
				return false;
			}

			if ('' == $.trim($('input[name="userpay"]').val())) {
				layer.alert('存款人账号不能为空', {icon: 5}, function (index) {
					layer.close(index);
					$('input[name="userpay"]').focus();
				});
				return false;
			}*/
		}
		function complete(data){
			if(data.status==1){
				$('.btn').attr('disabled','disabled');
				alert('申请成功');
				setTimeout(function(){
					window.location.href='<?php echo U("Home/Fen/addpage");?>';
				},1000);

			}else{
				alert(data.info);
				return false;
			}
		}
	});
</script>
</body>

</html>