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
	<h3>银行卡</h3>
	<i class="iconfont icon-40" onclick="back()"></i>
</div>

<div class="mainer_main" style="margin-top: 0.8rem;">

	<div class="card_list">
		<?php if(is_array($banklist)): foreach($banklist as $key=>$vo): ?><div class="item"><a href="/Home/Fen/yhkxg.html">
			<ul>
				<li><span>开户姓名</span><?php echo ($vo["bankrealname"]); ?></li>
				<li><span>开户账号</span><?php echo ($vo["bankid"]); ?></li>
				<li><span>开户网点</span><?php echo ($vo["bankname"]); ?></li>
			</ul></a>
			<!--<a href="#" class="del"></a>-->
		</div><?php endforeach; endif; ?>
	</div>
	<?php if(!$banklist){?>
	<a href="/Home/Fen/xiapage1.html" class="card_add_btn ng-binding" style="">
		添加银行卡
	</a>
	<?php }?>
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