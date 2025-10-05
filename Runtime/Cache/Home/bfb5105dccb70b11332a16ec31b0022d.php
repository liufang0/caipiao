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
            margin-top: 0.8rem;
        }
        .main_form {
            padding-bottom: .2rem;
        }
        .main_form .item {
            margin-bottom: .1rem;
            min-height: .76rem;
            border: 1px #e5e1df solid;
            line-height: .76rem;
            font-size: .22rem;
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
        .main_form .item .m .input {
            display: block;
            border: 0;
            background: 0;
            height: .76rem;
            font-size: .24rem;
            text-align: right;
            color: #4c4743;
            width: 95%;
        }
        ::placeholder {
            color: #ad978e;
        }
        input, textarea {
            -webkit-user-select: auto;
            margin: 0px;
            padding: 0px;
            padding-right: 0px;
            outline: none;
        }
        .main_form .tip {
            text-align: right;
            margin-bottom: .2rem;
            color: #e54d4d;
            padding-right: .3rem;
        }
        .main_form .item .m .select {
            border: 0;
            background: 0;
            background-size: auto;
            height: .76rem;
            font-size: .24rem;
            text-align: right;
            direction: rtl;
            color: #4c4743;
            width: 100%;
            padding-right: 5%;
            background-size: .64rem .86rem;
        }
        .btnbox .btn {
            margin-bottom: .2rem;
            display: block;
            height: .76rem;
            line-height: .76rem;
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
    <h3>修改银行卡</h3>
    <i class="iconfont icon-40" onclick="back()"></i>
</div>
<div class="mainer_main">
    <form method="post" action="<?php echo U('Home/Fen/yhkxg');?>" id="submitForm">
    <div class="main_form">
        <div class="item">
            <div class="t ng-binding">姓名</div>
            <div class="m"><input type="text" class="input" name="bankrealname" value="<?php echo ($banklist["0"]["bankrealname"]); ?>" ></div>
        </div>
        <div class="item">
            <div class="t ng-binding">银行卡号</div>
            <div class="m"><input type="text" name="bankid" class="input" value="<?php echo ($banklist["0"]["bankid"]); ?>" placeholder="请输入账号"></div>
        </div>
        <div class="item">
            <div class="t ng-binding">所属银行</div>
            <div class="m">
                <select name="bankname" class="select">
                    <option value="交通银行" <?php if($banklist[0]['bankname']=='交通银行')echo "selected";?>>交通银行</option>
                    <option value="招商银行" <?php if($banklist[0]['bankname']=='招商银行')echo "selected";?>>招商银行</option>
                    <option value="中国银行" <?php if($banklist[0]['bankname']=='中国银行')echo "selected";?>>中国银行</option>
                    <option value="建设银行" <?php if($banklist[0]['bankname']=='建设银行')echo "selected";?>>建设银行</option>
                    <option value="工商银行" <?php if($banklist[0]['bankname']=='工商银行')echo "selected";?>>工商银行</option>
                    <option value="农业银行" <?php if($banklist[0]['bankname']=='农业银行')echo "selected";?>>农业银行</option>
                    <option value="邮储银行" <?php if($banklist[0]['bankname']=='邮储银行')echo "selected";?>>邮储银行</option>
                    <option value="中信银行" <?php if($banklist[0]['bankname']=='中信银行')echo "selected";?>>中信银行</option>
                    <option value="浦发银行" <?php if($banklist[0]['bankname']=='浦发银行')echo "selected";?>>浦发银行</option>
                    <option value="兴业银行" <?php if($banklist[0]['bankname']=='兴业银行')echo "selected";?>>兴业银行</option>
                    <option value="民生银行" <?php if($banklist[0]['bankname']=='民生银行')echo "selected";?>>民生银行</option>
                    <option value="光大银行" <?php if($banklist[0]['bankname']=='光大银行')echo "selected";?>>光大银行</option>
                    <option value="华夏银行" <?php if($banklist[0]['bankname']=='华夏银行')echo "selected";?>>华夏银行</option>
                    <option value="广发银行" <?php if($banklist[0]['bankname']=='广发银行')echo "selected";?>>广发银行</option>
                    <option value="浙商银行" <?php if($banklist[0]['bankname']=='浙商银行')echo "selected";?>>浙商银行</option>
                    <option value="上海银行" <?php if($banklist[0]['bankname']=='上海银行')echo "selected";?>>上海银行</option>
                </select>
            </div>
        </div>
        <div class="item">
            <div class="t ng-binding">开户网点</div>
            <div class="m"><input type="text" name="bankzh" class="input" value="<?php echo ($banklist["0"]["bankzh"]); ?>" placeholder="请输入开户网点"></div>
        </div>
    </div>
    <div class="btnbox"><input type="submit" class="btn" value="修改银行卡"></div>
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

<script>
    $(function(){
        $('#submitForm').ajaxForm({
            beforeSubmit: checkForm,
            success: complete,
            dataType: 'json'
        });
        function checkForm(){
             
			 if ('' == $.trim($('input[name="bankrealname"]').val())) {
                layer.alert('姓名不能为空', {icon: 5}, function (index) {
                    layer.close(index);
                    $('input[name="bankrealname"]').focus();
                });
                return false;
            }
            if ('' == $.trim($('input[name="bankid"]').val())) {
                layer.alert('银行卡号不能为空', {icon: 5}, function (index) {
                    layer.close(index);
                    $('input[name="bankid"]').focus();
                });
                return false;
            }

            if ('' == $.trim($('input[name="bankzh"]').val())) {
                layer.alert('开户网点不能为空', {icon: 5}, function (index) {
                    layer.close(index);
                    $('input[name="bankzh"]').focus();
                });
                return false;
            }
        }
        function complete(data){
            if(data.status==1){
                $('.btn').attr('disabled','disabled');
                alert('修改成功');
                setTimeout(function(){
                    window.location.href='<?php echo U("Home/Fen/xiapage");?>';
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