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
        .lottery_top {
            height: .1rem;
            overflow: hidden;
            position: fixed;
            left: 0;
            top: 0.8rem;
            width: 100%;
            background: #efeae8;
            z-index: 999;
        }
        .lottery_main {
            position: relative;
            padding-top: .8rem;
            padding-bottom: 2rem;
        }
        .lottery_right {
            position: relative;
        }
        .lottery_rt {
            background: url(/images/rt.png) .2rem center no-repeat #fdfbfa;
            background-size: auto;
            background-size: .30rem .30rem;
            height: .7rem;
            line-height: .7rem;
            padding-left: .67rem;
            color: #513c36;
            font-size: .24rem;
            position: fixed;
            right: 0;
            top: 0.9rem;
            left: 1.72rem;
            left: 0rem;
        }
        .lottery_rt a {
            float: right;
            height: .7rem;
            font-size: .24rem;
            color: #917c73;
            padding: 0 .25rem 0 .42rem;
            background: url(/images/trend.png) left center no-repeat;
            background-size: auto;
            background-size: .3rem .20rem;
        }
        .lottery_list {
            overflow: auto;
            width: 100%;
            margin-top: .8rem;
        }
        .lottery_list .item {
            margin-bottom: .1rem;
            background: #fdfbfa;
        }
        .lottery_list .item .t {
            padding-left: .2rem;
            border: 1px #e6e1df solid;
            border-right-color: rgb(230, 225, 223);
            border-right-style: solid;
            border-right-width: 1px;
            border-right: 0;
            line-height: .78rem;
            font-size: .24rem;
            color: #333;
        }
        .lottery_list .item .t b {
            color: #e54d4d;
        }
        b {
            font-weight: normal;
        }
        .lottery_list .item .t span {
            color: #917c73;
            margin-left: .4rem;
            font-size: .24rem;
        }
        .lottery_list .item .m3 {
            padding-left: .3rem;
        }
        .lottery_list .item .m {
            padding-left: .07rem;
            padding-top: .1rem;
            padding-bottom: .1rem;
            border-left: 1px #e6e1df solid;
        }

        .lottery_list .item .m b {
            display: block;
            float: left;
            font-size: .24rem;
            color: #fff;
            margin-right: .01rem;
            width: .40rem;
            overflow: hidden;
            height: .40rem;
            line-height: .40rem;
            text-align: center;
            border-radius: 50%;
        }
        .lottery_list .item .m .blue {
            background: #0a83c6;
            background-image: none;
            background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#0a83c6),to(#0a83c6));
            box-shadow: 0 .01rem .1rem rgba(0,0,0,0.2);
        }
        .lottery_list .item .m span {
            display: block;
            float: left;
            font-size: .32rem;
            color: #d6cecc;
            margin-right: .05rem;
            font-weight: bold;
            width: .40rem;
            overflow: hidden;
            height: .40rem;
            line-height: .40rem;
            text-align: center;
            border: 0;
        }
        .lottery_list .item .m .red {
            background: #d53434;
            background-image: none;
            background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#e54d4d),to(#cf2c2c));
            box-shadow: 0 .01rem .1rem rgba(0,0,0,0.2);
        }
        .lottery_list .item .m::after {
            clear: both;
            content: "";
            display: block;
        }
        .lottery_list .item .f {
            background: #f7f4f2;
        }
        .lottery_list .item .f table {
            border-collapse: collapse;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        .lottery_list .item .f table tr td:last-child {
            border-right: 1px #f7f4f2 solid;
        }
        .lottery_list .item .f table td {
            border: 1px #e6e1df solid;
            border-right-color: rgb(230, 225, 223);
            border-right-style: solid;
            border-right-width: 1px;
            text-align: center;
            font-size: .24rem;
            color: #252322;
            line-height: .3rem;
            padding: .14rem 0;
        }
        .lottery_list .item .f table td span {
            color: #917c73;
        }
        .lottery_list .item .f table td {
            border: 1px #e6e1df solid;
            text-align: center;
            font-size: .24rem;
            color: #252322;
            line-height: .3rem;
            padding: .14rem 0;
        }
        .lottery_btn {
            position: fixed;
            left: 1.72rem;
            left: 0rem;
            right: 0;
            bottom: .86rem;
            background: #fdfbfa;
        }
        .lottery_btn .btnbox .btn {
            height: .60rem;
            line-height: .60rem;
            font-size: .3rem;
        }
        .lottery_btn .btnbox {
            padding: .15rem .3rem;
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

<body style="background: #efeae8; padding-bottom: .86rem;">
    <div class="nav">
        <h3>走势结果</h3>
        <i class="iconfont icon-40" onclick="back()"></i>
    </div>

    <div class="lottery_wrap">
        <div class="lottery_top"></div>
        <div class="lottery_main">
            <div class="lottery_right">
                <div class="lottery_rt ng-binding"><?php echo ($game == 'bj28' ? '长期宝' : '短期宝'); ?>-走势结果<a href="<?php echo U('Home/Run/trend2', array('game' => $game));?>" class="ng-binding">走势分析</a></div>
                <div class="lottery_list">

                    <?php if(is_array($kjlist)): $i = 0; $__LIST__ = $kjlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item" style="">
                        <div class="t ng-binding">第<b class="ng-binding"><?php echo ($vo["periodnumber"]); ?></b>期<span class="ng-binding"><?php echo ($vo["awardtime"]); ?></span></div>
                        <div class="m m3 ng-binding">
                            <b class="blue"><?php echo ($vo["numberOne"]); ?></b><span>+</span><b class="blue"><?php echo ($vo["numberTwo"]); ?></b><span>+</span><b class="blue"><?php echo ($vo["numberThree"]); ?></b><span>=</span><b class="red"><?php echo ($vo["tema"]); ?></b>
                        </div>

                        <div class="f">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                <tr>
                                    <td colspan="3"><span class="ng-binding">总和</span></td>
                                </tr>
                                <tr class="ng-binding">
                                    <td width="33.33%"><?php echo ($vo["tema"]); ?></td>
                                    <td width="33.33%"><?php echo ($vo["tema_dx"]); ?></td>
                                    <td width="33.33%"><?php echo ($vo["tema_ds"]); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


                </div>
            </div>

        </div>
        <div class="lottery_btn">
            <div class="btnbox">
                <?php if($game == 'bj28'): ?><a href="<?php echo U('home/run/bj28');?>" class="btn ng-binding">去下注</a>
                <?php else: ?>
                    <a href="<?php echo U('home/run/jnd28');?>" class="btn ng-binding">去下注</a><?php endif; ?>
            </div>
        </div>
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