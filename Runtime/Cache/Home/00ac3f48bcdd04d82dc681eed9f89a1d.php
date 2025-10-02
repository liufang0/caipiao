<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="no" name="apple-touch-fullscreen" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>个人中心</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/new/css/index.css"/>
	<link href="/Public/Home//statics/web/css/red.css" rel="stylesheet" type="text/css">
    <script src="/Public/Home//statics/web/js/jquery.1.8.2.min.js"></script>
    <script src="/images/js/sizeChange.js"></script>

</head>
<body style="background: #f6f6f6;">
<style>
    .flex {
        display: -ms-flexbox;
        display: flex;
    }
    .flex1 {
        -ms-flex: 1;
        flex: 1;
    }
    .fixed-content {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
    }

    .flexAliTem {
        -ms-flex-align: center;
        align-items: center;
    }
    .flexJustCen {
        -ms-flex-pack: center;
        justify-content: center;
    }

    .header{
        display: -ms-flexbox;
        display: flex;
        background: #ff4c30;
        background-color: rgb(255, 76, 48);
        text-align: center;
        color: #fff0ee;
        font-size: .36rem;
        box-sizing: border-box;
    }
    .header .pic {
        width: .86rem;
        height: .86rem;
        margin: .40rem .24rem .40rem .2rem;
    }
    .header .pic img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
    .header .info {
        padding-top: .45rem;
        width: calc(100% - 2rem);
    }
    .header .info h2 {
        font-size: .26rem;
        font-weight: 700;
        text-align: left;
    }
    .header .info p {
        font-size: .24rem;
        margin-top: .06rem;
        overflow: hidden;
        text-align: left;
    }
    .balance {
        background: #ff686b;
        background-color: rgb(255, 104, 107);
        text-align: center;
    }
    .balance .balance_content {
        background: hsla(0, 0%, 100%, .1);
        padding: .2rem 0;
        box-sizing: border-box;
    }
    .balance p {
        font-size: .23rem;
        color: #fff;
        padding-left: .25rem;
        line-height: .32rem;
    }
    .balance p span {
        font-size: .23rem;
        font-weight: 600;
    }

    .cztx {
        width: 100%;
        padding: .25rem .4rem;
        display: -ms-flexbox;
        display: flex;
        font-size: .26rem;
        color: #fff;
    }
    .cztx .cz,.cztx .tx {
        width: calc((100% - 1.6rem)/2);
        height: .77rem;
        background: #ff655d;
        border-radius: .12rem;
        line-height: .77rem;
        font-size: .24rem;
    }
    .cztx .tx {
        background: #feaf2e;
        margin-left: .7rem;
    }
    
    .cztx .cz img,.cztx .tx img {
        width: .30rem;
        height: .30rem;
    }
    .cztx a {color: #fff;}
    .cztx p {
        display: inline-block;
        margin-left: .1rem;
    }

    .operation-content {
        position: absolute;
        top: 4.2rem;
        left: 0;
        right: 0;
        bottom: 0;
        overflow-x: hidden;
        overflow-y: scroll;
        -webkit-overflow-scrolling: touch;
    }
    .operation {
        width: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding: 0 .2rem 1.2rem;
    }
    .operation .operation_item {
        width: 2.37rem;
        height: 1.8rem;
        font-size: .32rem;
        color: #333;
        width: calc((100% - .42rem)/3);
        background: #fff;
        text-align: center;
        border-bottom: 1px solid #f5f5f5;
        border-right: 1px solid #f5f5f5;
    }
    .operation .operation_item img {
        width: .5rem;
        height: .38rem;
        margin: .4rem 0 .1rem;
    }
    .operation .operation_item p {
        font-size: .21rem;
    }
</style>

<div class="fixed-content">
    <div class="header" style="background-color: rgb(255, 59, 48);">
        <div class="pic">
            <?php if($user['headimgurl']): ?><img src="<?php echo ($user["headimgurl"]); ?>">
            <?php else: ?>
                <img src="/images/default.png"><?php endif; ?>
        </div>
        <div class="info">
            <h2><span>用户名: <?php echo ($user["nickname"]); ?></span>
            </h2>
            <p><span>ID: <?php echo ($user["id"]); ?></span>
            </p>
        </div>
    </div>
    <div class="balance" style="background-color: rgb(255, 59, 48);">
        <div class="flex balance_content">
            <p class="flex1 tac">现金金额<br><span><?php echo ($user["points"]); ?>元</span></p>
            <p class="flex1 tac">今日中奖<br><span><?php echo ($user['sum_add']); ?>元</span></p>
            <p class="flex1 tac">今日盈亏<br><span><?php echo ($user['ying']); ?>元</span></p>
        </div>
    </div>
    <div class="cztx">
        <a class="cz flex flexAliTem flexJustCen" href="<?php echo U('/Home/Fen/addpage');?>"><img src="/images/chongzhi.png" alt="">
            <p><span>充值</span></p>
        </a>
        <a class="tx flex flexAliTem flexJustCen" href="<?php echo U('Home/Fen/postal');?>"><img src="/images/tixian.png" alt="">
            <p><span>提现</span></p>
        </a>
    </div>
</div>


<div class="operation-content">
    <div class="operation">
        <a href="<?php echo U('/Home/User/setting');?>" class="operation_item"><img src="/images/zhanghuxinxi.png" alt="">
            <p>账户信息</p>
        </a>
        <a href="<?php echo U('/Home/User/gonggao');?>" class="operation_item"><img src="/images/xiaoxigonggao.png" alt="">
            <p>消息公告</p>
        </a>

        <!---->
        <a href="<?php echo U('Home/Run/history');?>" class="operation_item"><img src="/images/touzhujilu.png" alt="">
            <p>购买记录</p>
        </a>
        <a href="<?php echo U('/Home/User/fenxia');?>" class="operation_item"><img src="/images/zijinmingxi.png" alt="">
            <p>资金明细</p>
        </a>
        <a href="<?php echo C('zxkf');?>" href="#" class="operation_item"><img src="/images/kefuzhongxin.png" alt="">
            <p>客服中心</p>
        </a>
        <a href="<?php echo U('Home/User/gonggao');?>" class="operation_item" onclick="jump('/New/index')"><img src="/images/bangzhuzhongxin.png" alt="">
            <p>平台公告</p>
        </a>
        <!---->
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