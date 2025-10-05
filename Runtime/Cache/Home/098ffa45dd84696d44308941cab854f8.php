<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>修改个人信息</title>

	<!-- 引入样式 -->
	<link rel="stylesheet" type="text/css" href="/Public/Home/new/css/index.css"/>
	<link rel="stylesheet" href="/images/css/common.css"/>
	<script src="/images/js/jquery-1.11.2.min.js"></script>
	<script src="/images/js/sizeChange.js"></script>
</head>

<body style="background: #efeae8;">
    <div class="nav">
		<h3>修改个人信息</h3>
		<i class="iconfont icon-40" onclick="back()"></i>
	</div>
    <div id="mainer" style="padding-top:50px;">

                <div class="mainer_main">

                    <div class="pass_form" name="mdfLoginPwdForm" novalidate="">
                        <div class="item">
                            <div class="t ng-binding">账号</div>
                            <div class="m"><input type="text" class="input" value="<?php echo ($user["username"]); ?>" disabled=""></div>
                        </div>
                        <div class="item">
                            <div class="t ng-binding">用户名</div>
                            <div class="m"><input type="text" id="nickname" class="input" value="<?php echo ($user["nickname"]); ?>" placeholder="请输入昵称"></div>
                        </div>
                    </div>
                    <!--TODO 校验不过的情况下，按钮可以设置成灰色-->
                    <div class="btnbox">
                        <input type="button" onclick="tijiao()" class="btn" value="确 认"></div>

                </div>

            </div>
			
<style>
.mainer_main {
    padding: .2rem;
}
.pass_form .item {
    margin-bottom: .2rem;
    box-shadow: 0 1px 1px #fdfcfb;
    border: 1px #dbd3ce solid;
    height: .86rem;
    background: #e8e0dd;
    border-radius: .06rem;
    position: relative;
}
.pass_form .item .t {
    position: absolute;
    left: .2rem;
    top: 0;
    line-height: .86rem;
    font-size: .28rem;
    color: #4c4743;
}
.pass_form .item .input {
    border: 0;
    background: 0;
    height: .86rem;
    font-size: .32rem;
    text-align: right;
    width: 96%;
    padding-right: 4%;
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
<script>
        var loadMainCssJsRunNum = 0;
		function tijiao(){
			var nc = $('#nickname').val();
			
			if(!nc){
				alert('请填写昵称');
			}else{
				$.ajax({
                    url: "<?php echo U('Home/User/ncsetting');?>",
                    type: "post",
                    data: {nc: nc},
                    success: function(result) {
					
                        if (result.status == 1) { //成功
                            alert(result.info);
							location.reload();
                        }

                    },
                    
                });
			}
		
		}
		 

     
    </script>
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