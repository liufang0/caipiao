<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title><?php echo C('sitename');?></title>

    <!-- 引入样式 -->
    <link rel="stylesheet" href="/images/css/common.css"/>
    <link rel="stylesheet" href="/images/css/swiper-3.4.2.min.css"/>
    <link rel="stylesheet" href="/images/css/index.css"/>
    <!-- 公用js 自适应js-->
    <script src="/images/js/sizeChange.js"></script>




</head>

<body style="background: #f6f6f6;">
<input type="hidden" id="user_id" value="2434"/>
<input id="loginType" type="text" style="display: none" value=""/>
<input type="hidden" id="user_nickname" value="555555"/>

<div class="container" style="padding-bottom: 60px;">
    <!-- 公告 start-->
    <div style="width:100%;height:32px;padding: .05rem .2rem .05rem .1rem;background: #fff;float: left;">
        <div style="width:8%;float:left;font-size:0.23rem;text-align:center;line-height:22px;color: #000;">
            <img src="/images/laba.png" style="width: .27rem;height: .25rem;margin-top: .08rem;">
        </div>
        <div style="width:92%;float:left;font-size:0.23rem;color:#FFFFFF;line-height:22px;color: #000;">
            <marquee><?php echo ($gdxx["content"]); ?></marquee>
        </div>
    </div>
    <!-- 通栏轮播图 start-->
    <div class="swiper-container banner">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="/images/lun2.png" style="border-radius: .2rem;"></div>
            <div class="swiper-slide"><img src="/images/lun3.png" style="border-radius: .2rem;"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>



    <div class="scroll_text">
        <div class="swiper-container scroll_text1">
            <div class="swiper-wrapper">
                <?php if(is_array($scroll)): foreach($scroll as $key=>$vo): ?><div class="swiper-slide">
                    <span><?php echo ($vo[0]); ?></span>
                    <span><?php echo ($vo[1]); ?></span>
                    <span><?php echo ($vo[2]); ?></span>
                </div><?php endforeach; endif; ?>

            </div>
        </div>
    </div>

    <!-- 玩法种类 start-->
    <div class="sort">
        <ul class="flex">
            <li>
                <a href="<?php echo U('Home/Run/fangjian/game/bj28');?>"><img alt="" src="/images/tab2.png"/></a>
            </li>
            <li>
                <a href="<?php echo U('Home/Run/fangjian/game/jnd28');?>"><img alt="" src="/images/tab1.png"/></a>
            </li>
        </ul>
    </div>
</div>
<!-- <div class="tuichuup" style="display:none">
	<div class="tuichu" id="tuichu">
		<span id="tuichuT" class="tuichuT" 
			style="font-size: 0.25rem; color: rgb(255, 255, 255); margin: 0.12rem 0.13rem;">
			退
		</span>
	</div>
</div> -->


<?php $a=1;?>
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
<!-- 轮播js -->
<script src="/images/js/swiper.min.js"></script>
 

<script>
    var swiper = new Swiper('.banner', {
        pagination: {
            el: '.swiper-pagination',
        },
    });

    var swiper = new Swiper('.scroll_text1', {
        loop : true,
        autoplay:true,
        autoplay: { delay: 800},
        direction: 'vertical',
        pagination: {
            clickable: true,
        },
    });



</script>
</body>

</html>