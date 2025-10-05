<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/Home/new/css/index.css"/>
    <meta charset="utf-8">
    <title>购买记录</title>
    <link rel="stylesheet" href="/images/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/images/css/style_m.css">
    <link rel="stylesheet" type="text/css" href="/images/css/weui.css">
    <link rel="stylesheet" type="text/css" href="/images/css/_pk10.css">
    <script src="/images/js/jquery-1.11.2.min.js"></script>
    <script src="/images/js/sizeChange.js"></script>
    <style>
        .tab_t {
            height: .76rem;
        }
        .tab_t ul li {
            float: left;
            width: 33.33%;
            text-align: center;
            height: .76rem;
            position: relative;
            cursor: pointer;
        }

        .tab_t ul li::after {
            content: "";
            display: block;
            position: absolute;
            right: 0;
            top: .26rem;
            height: .36rem;
            width: 1px;
            overflow: hidden;
            background: #efeae8;
        }
        .tab_t ul li.on span {
            color: #e54d4d
        }
        .tab_t ul li.on::before {
            display: block;
            content: "";
            position: absolute;
            left: 50%;
            margin-left: -0.05rem;
            bottom: -0.03rem;
            width: 0;
            height: 0;
            border-left: .05rem solid transparent;
            border-right: .05rem solid transparent;
            border-top: .05rem solid #e54d4d;
        }
        .tab_t ul li a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #4c4743;
        }
        .tab_t ul li span {
            display: inline-block;
            height: .75rem;
            line-height: .75rem;
            font-size: .28rem;
            color: #545454;
        }
        .tab_t ul li.on span {
            border-bottom: .03rem #e54d4d solid;
        }
        .my_table table {
            width: 100%;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        .my_table table tr th {
            border-bottom: 1px #e2d3cd solid;
            background: #e8e0dd;
            text-align: center;
            font-size: .22rem;
            color: #655754;
            line-height: .4rem;
            padding: .13rem .1rem;
            font-weight: normal;
        }
        .my_table table tr td {
            border-bottom: 1px #efeae8 solid;
            text-align: center;
            font-size: .22rem;
            color: #555;
            line-height: .4rem;
            padding: .23rem .1rem;
        }
    </style>
</head>

<body style="background: #efeae8;">
<div class="nav">
    <h3>购买记录</h3>
</div>
<div class="container" style="margin-top: 0.8rem; background: #fdfbfa;">
    <div class="tab_t">
        <ul>
            <li style="width:33.33%" class="tab1 on"><a><span class="ng-binding">全部</span></a></li>
            <li style="width:33.33%" class="tab2"><a><span class="ng-binding">未结算</span></a></li>
            <li style="width:33.33%" class="tab3"><a><span class="ng-binding">已结算</span></a></li>
        </ul>
    </div>
    <div class="my_table tabcon1" style="display: block;">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <thead>
            <tr>
                <th class="ng-binding">项目</th>
                <th class="ng-binding">购买期号</th>
                <th class="ng-binding">购买金额</th>
                <th class="ng-binding">购买内容</th>
                <th class="ng-binding">状态</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                    <td class="ng-binding"><?php echo ($v['game'] == 'bj28' ? '长期宝' : '短期宝'); ?>
					<?php  if($v['fangjian']=='a'){ echo '<br>(普通厅)'; }elseif($v['fangjian']=='b'){ echo '<br>(贵宾厅)'; }elseif($v['fangjian']=='c'){ echo '<br>(VIP厅)';} ?>
					</td>
                    <td class="ng-binding"><?php echo ($v["number"]); ?></td>
                    <td class="ng-binding"><?php echo ($v["del_points"]); ?></td>
                    <td class="ng-binding"><?php echo ($v["jincai"]); ?></td>
                    <td class="ng-binding">
                        <?php if($v['is_add'] == 1 && $v['add_points'] > 0): ?><span style="color: #FF0000">+<?php echo ($v["add_points"]); ?></span><?php endif; ?>
                        <?php if($v['is_add'] == 1 && $v['add_points'] == 0): ?>未中奖<?php endif; ?>
                        <?php if($v['is_add'] == 0): ?><span style="color: rgb(13, 186, 0)">未开奖</span><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div class="my_table tabcon2" style="display: none;">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <thead>
            <tr>
                <th class="ng-binding">彩种</th>
                <th class="ng-binding">购买期号</th>
                <th class="ng-binding">购买金额</th>
                <th class="ng-binding">购买内容</th>
                <th class="ng-binding">状态</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                    <td class="ng-binding"><?php echo ($v['game'] == 'bj28' ? '长期宝' : '短期宝'); ?></td>
                    <td class="ng-binding"><?php echo ($v["number"]); ?></td>
                    <td class="ng-binding"><?php echo ($v["del_points"]); ?></td>
                    <td class="ng-binding"><?php echo ($v["jincai"]); ?></td>
                    <td class="ng-binding">
                        <?php if($v['is_add'] == 1 && $v['add_points'] > 0): ?><span style="color: #FF0000">+<?php echo ($v["add_points"]); ?></span><?php endif; ?>
                        <?php if($v['is_add'] == 1 && $v['add_points'] == 0): ?>未中奖<?php endif; ?>
                        <?php if($v['is_add'] == 0): ?><span style="color: rgb(13, 186, 0)">未开奖</span><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div class="my_table tabcon3" style="display: none;">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <thead>
                <tr>
                    <th class="ng-binding">彩种</th>
                    <th class="ng-binding">购买期号</th>
                    <th class="ng-binding">购买金额</th>
                    <th class="ng-binding">购买内容</th>
                    <th class="ng-binding">状态</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                    <td class="ng-binding"><?php echo ($v['game'] == 'bj28' ? '长期宝' : '短期宝'); ?></td>
                    <td class="ng-binding"><?php echo ($v["number"]); ?></td>
                    <td class="ng-binding"><?php echo ($v["del_points"]); ?></td>
                    <td class="ng-binding"><?php echo ($v["jincai"]); ?></td>
                    <td class="ng-binding">
                        <?php if($v['is_add'] == 1 && $v['add_points'] > 0): ?><span style="color: #FF0000">+<?php echo ($v["add_points"]); ?></span><?php endif; ?>
                        <?php if($v['is_add'] == 1 && $v['add_points'] == 0): ?>未中奖<?php endif; ?>
                        <?php if($v['is_add'] == 0): ?><span style="color: rgb(13, 186, 0)">未开奖</span><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $a=4;?>
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
<script>
    $('.tab_t li').click(function() {
        $('.tab_t li').removeClass('on');
        $('.my_table').hide();
        $(this).addClass('on');
        $('.my_table').eq($(this).index()).show();
    });

</script>
</body>

</html>