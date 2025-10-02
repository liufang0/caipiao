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
		.mainer_main {
			padding: .2rem;
		}
		.card_list {
			padding-bottom: .1rem;
		}
		.card_list .item {
			margin-bottom: .1rem;
			border: 1px #e5e1df solid;
			line-height: .60rem;
			font-size: .22rem;
			background: #fdfbfa;
			border-radius: .08rem;
			position: relative;
			padding: .08rem 0;
		}
		.card_list .item::after {
			content: "";
			display: block;
			background: url(/images/r.png) right center no-repeat;
			background-size: auto;
			background-size: .15rem .28rem;
			width: .15rem;
			height: .28rem;
			position: absolute;
			right: .28rem;
			top: 50%;
			margin-top: -0.14rem;
		}
		.card_list .item .del {
			display: block;
			position: absolute;
			right: 0;
			top: 0;
			width: 1.04rem;
			height: 1.04rem;
			background: url(/images/clo.png) center center no-repeat;
			background-size: auto;
			background-size: .44rem .44rem;
			cursor: pointer;
		}
		.card_list .item ul li {
			padding: 0 .3rem 0 1.6rem;
			position: relative;
		}
		.card_list .item ul li span {
			position: absolute;
			left: .3rem;
			top: 0;
			color: #918580;
		}
		.card_add_btn {
			text-align: center;
			display: block;
			font-size: .28rem;
			color: #917f77 !important;
			background: #f7f4f2;
			line-height: .9rem;
			border-radius: .08rem;
			border: 1px #dedad8 dashed;
		}
		.card_add_btn::before {
			content: "";
			display: inline-block;
			vertical-align: middle;
			background: url(/images/add.png) no-repeat;
			background-size: auto;
			background-size: .28rem .26rem;
			width: .28rem;
			height: .26rem;
			margin-right: .1rem;
		}


	</style>


</head>

<body style="background: #efeae8;">
<div class="nav">
	<h3>提现</h3>
	<i class="iconfont icon-40" onclick="back()"></i>
</div>
<style>
.main_form {
    padding-bottom: .2rem;
	margin-top: 50px;
}
.main_form .item {
    margin-bottom: .1rem;
    min-height: .86rem;
    border: 1px #e5e1df solid;
    line-height: .86rem;
    font-size: .32rem;
    background: #fdfbfa;
    border-radius: .08rem;
    position: relative;
}
.main_form .item .t {
    position: absolute;
    left: .3rem;
    top: 0;
    font-style: normal;
}
.main_form .item .m .select {
    border: 0;
    background: 0;
    height: .86rem;
    font-size: .32rem;
    text-align: right;
    direction: rtl;
    color: #4c4743;
    width: 100%;
    padding-right: 9%;
    background-size: .64rem .86rem;
}
.main_form .item .t {
    position: absolute;
    left: .3rem;
    top: 0;
    font-style: normal;
}
.main_form .item .m2 {
    padding: .66rem .28rem 0 .6rem;
    position: relative;
}
.main_form .item .m2 span {
    line-height: 1.26rem;
    font-size: .56rem;
    color: #333;
    position: absolute;
    left: .2rem;
    top: .66rem;
}
.main_form .item .m2 .with_input {
    height: 1.26rem;
    border: 0;
    width: 100%;
    border-bottom: 1px #e5e1df solid;
    background: 0;
    text-align: center;
    font-size: .46rem;
}
.main_form .item .f {
    line-height: .94rem;
    font-size: .28rem;
    color: #ad978e;
    padding-left: .6rem;
}
.main_form .item .f b {
    font-weight: normal;
    color: #4c4743;
}
.main_form .item .t {
    position: absolute;
    left: .3rem;
    top: 0;
    font-style: normal;
}
.main_form .item .m .input {
    display: block;
    border: 0;
    background: 0;
    height: .86rem;
    font-size: .32rem;
    text-align: right;
    color: #4c4743;
    width: 91%;
    padding-right: 9%;
}
.btnbox .btn {
    margin-bottom: .2rem;
    display: block;
    height: .88rem;
    line-height: .88rem;
    font-size: .36rem;
    color: #fff;
    text-align: center;
    background: #d53434;
    background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#e54d4d),to(#cf2c2c));
    border-radius: .06rem;
    border: 0;
    cursor: pointer;
    border: 0;
    width: 100%;
    box-shadow: 0 0.05rem 0.1rem rgba(0,0,0,0.1);
}
</style>
<form method="post" action="<?php echo U('Home/Fen/xia');?>" id="submitForm">
<input type="hidden" name="bank_account" value="<?php echo $banklist[0]["bankid"];?>">
<input type="hidden" name="back_address" value="<?php echo $banklist[0]["bankzh"];?>">
<input type="hidden" name="back_name" value="<?php echo $banklist[0]["bankrealname"];?>">
<div class="mainer_main">
						<div class="main_form">
						
						<div class="item">
								<div class="t ng-binding">提现方式</div>
								<div class="m"> 
								<!--                                <a class="input input_select ng-binding">银行卡</a>-->
								<select id="UnionPayId" class="select">
								<?php if(is_array($banklist)): foreach($banklist as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["bankname"]); ?></option><?php endforeach; endif; ?>
									</select>
							</div>
							</div>
						<!--div class="item">
								<div class="t ng-binding">姓名</div>
								<div class="m"> <a class="input input_select ng-binding">
									2*2									</a> </div>
							</div>
						<div class="item">
								<div class="t ng-binding">卡号</div>
								<div class="m"> <a class="input input_select ng-binding">
									2342*4234									</a> </div>
							</div-->
						<div class="item">
								<div class="t ng-binding">提现金额</div>
								<div class="m2"><span class="ng-binding">￥</span>
								<input type="number" id="Money" name="money" class="with_input ng-pristine ng-untouched ng-valid ng-empty" placeholder="最低提现：100" autofocus="autofocus">
							</div>
								<div class="f ng-binding">您当前账户余额：<b class="ng-binding">￥<?php echo ($userinfo["points"]); ?></b></div>
							</div>
						<!--div class="item">
								<div class="t ng-binding">提现密码</div>
								<div class="m">
								<input type="password" id="Pwd" class="input" name="password" placeholder="请输入提现密码" autofocus="autofocus">
							</div>
							</div-->
					</div>
						<div class="btnbox">
						<input type="submit" class="btn" value="提 现">
					</div>
					</div>
					</form>
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
			if ($.trim($('input[name="money"]').val())<100) {
				layer.alert('提现金额不能小于100', {icon: 5}, function (index) {
					layer.close(index);
					$('input[name="money"]').focus();
				});
				return false;
			}
			/*if ('' == $.trim($('input[name="password"]').val())) {
				layer.alert('提现密码不能为空', {icon: 5}, function (index) {
					layer.close(index);
					$('input[name="password"]').focus();
				});
				return false;
			}*/

			 
		}
		function complete(data){
			if(data.status==1){
				$('.btn').attr('disabled','disabled');
				alert('申请成功');
				setTimeout(function(){
					window.location.href='<?php echo U("Home/User/index");?>';
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