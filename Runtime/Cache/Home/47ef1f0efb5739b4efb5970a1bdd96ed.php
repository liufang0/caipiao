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
		.pay_t2 {
			background: url(/images/pay_t2.png) .3rem center no-repeat;
			background-size: auto;
			background-size: .30rem .30rem;
		}
		.pay_nav {
			background: #f9f3f1;
		}
		.pay_nav ul li {
			border-bottom: 1px #efeae8 solid;
		}
		.pay_nav ul li:last-child {
			border-bottom: 0;
		}
		.pay_nav ul li a {
			display: block;
			height: 1.1rem;
			line-height: 1.1rem;
			font-size: .26rem;
			color: #4c4743;
			padding-left: 1.1rem;
			background: url(/images/pay_ico.png) .3rem top no-repeat;
			background-position-x: 0.3rem;
			background-position-y: top;
			background-size: auto;
			background-size: .68rem 12rem;
			position: relative;
		}
		.pay_nav ul li a.alipay {
			background-position: .3rem -2.4rem;
		}
		.pay_nav ul li a.weixin {
			background-position: .3rem -1.2rem;
		}
		.pay_nav ul li a.bank {
			background-position: .3rem -4.8rem;
		}
		.pay_nav ul li a::after {
			display: block;
			content: "";
			position: absolute;
			right: .3rem;
			top: 50%;
			background: url(/images/r.png) no-repeat;
			background-size: auto;
			background-size: .15rem .28rem;
			width: .16rem;
			height: .28rem;
			margin-top: -0.14rem;
		}


	</style>


</head>

<body style="background: #efeae8;">
<div class="nav">
	<h3>银行卡</h3>
	<i class="iconfont icon-40" onclick="back()"></i>
</div>

<div class="pay_main" style="margin-top: 0.8rem;">
	<div class="pay_nav_box">
		<div class="pay_t1 ng-binding">线上充值</div>
		<div class="pay_nav">
			<ul>
				<li style="right: 1rem; line-height: 0.4rem; font-size: 0.26rem; padding-left: 0.3rem;" class="">近期线上充值通道在维护，充值请联系在线客服索要充值方式！
				</li>
			</ul>
		</div>
	</div>

	<div class="pay_nav_box">
		<div class="pay_t2 ng-binding">线下充值</div>
		<div class="pay_nav">
			<ul>
				<li class="" style=""><a href="<?php echo U('/Home/Fen/addpage1');?>" class="alipay">支付宝转账</a></li>
				<li class="" style=""><a href="<?php echo U('/Home/Fen/addpage2');?>" class="weixin">微信转账</a></li>
				<li class="" style=""><a href="<?php echo U('/Home/Fen/addpage3');?>" class="bank">银行卡支付</a></li>
			</ul>
		</div>
	</div>

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
</body>

</html>