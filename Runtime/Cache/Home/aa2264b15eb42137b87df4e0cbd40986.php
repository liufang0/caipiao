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
        .table table {margin-top: 0;}
        table{border: 0;border-collapse: collapse;}
        table tr:nth-child(2n){background: #555;color: black;}
        table td {border:#F3F3F3 solid 1px;}
        table td span { display: block;color:#fff}
        .table th {
            background: #E4C05F;
            color: #ffffff;
            font-size: .27rem;
        }
        .main p{    line-height: 1.6em;
            background: #fff;
            margin: 1em 0;
            border-radius: 5px;
            padding: 10px;}
        .main p span.gm{font-size:1.2em;line-height:1.8em;color: #FD645E;}
        .main p span.yk{font-size:1.2em;font-weight:bold;line-height:1.8em;float:right}
        .pg a{color:#0083D0;border: #dedede solid 1px; padding: 6px 12px;}
        .pg span{color:#fff;display:inline;border:1px solid #dedede;padding: 6px 12px;background: #0083D0;}
        .pg a.next {
            margin-right: 0;
            position: relative;
            top: 0;
            right: 0;
            z-index: 9999;
        }
        .pg a.prev {
            margin-left: 0;
            position: relative;
            top: 0;
            left: 0;
            z-index: 9999;
        }

    </style>


</head>

<body style="background: #efeae8;">
    <div class="nav">
        <h3>走势图</h3>
        <i class="iconfont icon-40" onclick="back()"></i>
    </div>
    <div class="main table" style="margin-top: 0.8rem !important;">
        <table>
            <thead>
            <tr>
                <th width="20%">期号</th>
                <th width="8%">值</th>
                <th width="9%">大</th>
                <th width="9%">小</th>
                <th width="9%">单</th>
                <th width="9%">双</th>
                <th width="9%">大单</th>
                <th width="9%">小单</th>
                <th width="9%">大双</th>
                <th width="9%">小双</th>
            </tr>
            </thead>
            <tbody>
                <?php if(is_array($kjlist)): $i = 0; $__LIST__ = $kjlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["periodnumber"]); ?></td>
                    <td style="color:#0083D0"><?php echo ($vo["tema"]); ?></td>
                    <td><?php echo ($vo['tema_dx'] == '大'?'<span style="background:#0083D0">大</span>':''); ?></td>
                    <td><?php echo ($vo['tema_dx'] == '小'?'<span style="background:#0083D0">小</span>':''); ?></td>
                    <td><?php echo ($vo['tema_ds'] == '单'?'<span style="background:#0083D0">单</span>':''); ?></td>
                    <td><?php echo ($vo['tema_ds'] == '双'?'<span style="background:#0083D0">双</span>':''); ?></td>
                    <td><?php echo ($vo['zuhe'] == '大单'?'<span style="background:#2BB387">大单</span>':''); ?></td>
                    <td><?php echo ($vo['zuhe'] == '小单'?'<span style="background:#2BB387">小单</span>':''); ?></td>
                    <td><?php echo ($vo['zuhe'] == '大双'?'<span style="background:#2BB387">大双</span>':''); ?></td>
                    <td><?php echo ($vo['zuhe'] == '小双'?'<span style="background:#2BB387">小双</span>':''); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody></table>

        <!--<div class="pg" style="text-align:center;margin-top:2rem;margin-bottom:3rem;">-->
            <!--<div>  <span class="current">1</span><a class="num" href="/pcdd/Home/P/BjChart/f/1/p/2.html">2</a><a class="num" href="/pcdd/Home/P/BjChart/f/1/p/3.html">3</a> <a class="next" href="/pcdd/Home/P/BjChart/f/1/p/2.html">下一页</a> <a class="end" href="/pcdd/Home/P/BjChart/f/1/p/775.html">775</a></div>  </div>-->
        <!--</div>-->
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