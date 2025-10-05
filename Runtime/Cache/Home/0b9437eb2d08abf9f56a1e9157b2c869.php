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
        .lottery_list2 {
            margin-top: 0.8rem;
            padding: .1rem 0;
        }
        .lottery_list2 .item {
            border-bottom: 1px #e6e1df solid;
            border-top: 1px #e6e1df solid;
            height: 1.35rem;
            padding: .05rem 0 .15rem 0.1rem;
            position: relative;
            background: #fdfcfa;
            margin-bottom: .1rem;
        }
        .lottery_list2 .item a {
            display: block;
            text-decoration: none;
            color: #4c4743;
        }
        .lottery_list2 .item .m {
            height: .66rem;
            line-height: .66rem;
            font-size: .23rem;
        }
        .lottery_list2 .item .m b {
            font-size: .25rem;
            color: #665754;
            margin-right: .2rem;
            font-weight: bold;
        }
        .red {
            color: red;
        }
        .lottery_list2 .item .f {
            height: .52rem;
            overflow: hidden;
        }
        .lottery_list2 .item .f b {
            display: block;
            float: left;
            font-size: .22rem;
            color: #fff;
            margin-right: .05rem;
            width: .40rem;
            overflow: hidden;
            height: .40rem;
            line-height: .40rem;
            text-align: center;
            border-radius: 50%;
        }
        .lottery_list2 .item .f .blue {
            background: #0a83c6;
            background-image: none;
            background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#0a83c6),to(#0a83c6));
            box-shadow: 0 .01rem .1rem rgba(0,0,0,0.2);
        }
        .lottery_list2 .item .f .jh {
            display: block;
            float: left;
            font-size: .24rem;
            color: #000000;
            margin-right: .05rem;
            width: .40rem;
            overflow: hidden;
            height: .40rem;
            line-height: .40rem;
            text-align: center;
            border-radius: 50%;
        }
        .lottery_list2 .item .trend_btn {
            position: absolute;
            right: .26rem;
            top: .2rem;
            width: .96rem;
            height: .35rem;
            line-height: .35rem;
            font-size: .2rem;
            border-radius: .05rem;
            border: 1px #d3beb6 solid;
            background: #e8e0dd;
            background-image: none;
            background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#eee2dd),to(#e2d3cd));
            color: #4c4743;
        }
        .lottery_list2 .item .trend_btn::before {
            content: "";
            display: block;
            background: url(/images/trend2.png) left top no-repeat;
            background-size: auto;
            width: .40rem;
            height: .30rem;
            float: left;
            background-size: .40rem .66rem;
        }
        .lottery_list2 .item .trend_btn:hover {
            border: 1px #c93131 solid;
            background: #d53434;
            background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#e54d4d),to(#cf2c2c));
            color: #fff
        }

        .lottery_list2 .item .trend_btn:hover:before {
            background-position: left bottom
        }
    </style>


</head>

<body style="background: #efeae8;">
    <div class="nav">
        <h3>历史走势</h3>
    </div>

    <div class="lottery_list2">
        <?php if(is_array($kjlist)): $i = 0; $__LIST__ = $kjlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item" style="">
                <a href="<?php echo U('Home/Run/trend1', array('game' => $vo['game']));?>">
                    <div class="m ng-binding"><b class="ng-binding"><?php echo ($vo['game'] == 'bj28' ? '长期宝' : '短期宝'); ?></b>第<span class="red ng-binding"><?php echo ($vo["periodnumber"]); ?></span>期
                    </div>
                    <div class="f ng-binding" ng-bind-html="showData">
                        <b class="blue"><?php echo ($vo["numberOne"]); ?></b><b class="jh">+</b><b class="blue"><?php echo ($vo["numberTwo"]); ?></b><b class="jh">+</b><b class="blue"><?php echo ($vo["numberThree"]); ?></b><b class="jh">=</b><b class="blue"><?php echo ($vo["tema"]); ?></b>
                    </div>
                </a>
                <a href="<?php echo U('Home/Run/trend2', array('game' => $vo['game']));?>" class="trend_btn ng-binding">走势</a>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>


<?php $a=2;?>
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