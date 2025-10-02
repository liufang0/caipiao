<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 62px;">
<HEAD>
	<title>短期宝-蚂蚁金服</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/Public/Home/new/css/index.css" />
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="/Public/Home/new/css/page.css" />
</HEAD>
<BODY onload="connect(15535);">
<input type="hidden" id="fangjian" value="<?php echo ($fangjian); ?>">
<div class="headblank"></div>
<div class="gmfix">
	<div style="height: 25px;    background-size: 100%; ">
		<a onclick="history.go(-1)" style="color:#fff;font-size: 16px;"><i class="ico02 back fl"></i>返回</a>
		<i class=" plus qx0 fr"><img src="/tu/more.png" style=" width: 1.6em; margin-right:5px;"></i>
	</div>
	<div id="01" style="height: 0.8rem;">

		<?php if($userinfo): ?><a href='/Home/User/index'><img src="<?php echo ($userinfo["headimgurl"]); ?>" style="width: .66rem;height: .66rem;border-radius: 50%;margin: 0 .2rem;float: left;"><?php endif; ?>
		<div class="gmfr" style="width: auto;">
			<!--p class="line3"><i><b style="font-size:14px; color:#fff;">流水: ￥</b></i> <span class="yeup"></span></p-->
			<p class="line4"><i><b style="font-size:14px; color:#fff;font-weight:normal">余额: ￥<span id="myMoney"><?php echo ($userinfo["points"]); ?></span></b></i></p></a>
		</div>

		<div class="cp_message game_top_l" id="hqkj">
			<?php if(current): ?><p><span ><?php echo ($current["periodnumber"]); ?></span>期开奖结果</p>
				<div class="result">
					<span class="pink"><?php echo ($current["numberOne"]); ?></span> +
					<span class="purple"><?php echo ($current["numberTwo"]); ?></span> +
					<span class="yellow"><?php echo ($current["numberThree"]); ?></span>=
					<span class="green"><?php echo ($current["tema"]); ?></span><?php echo ($current["tema_ds"]); ?>,<?php echo ($current["tema_dx"]); ?></div><?php endif; ?>
		</div>
		
		
	</div>
	<div class="gmfl">
		<span class="line1">距<i><b></b></i>期购买截止：</span>
		<span class="line2"><i><b></b></i></span>
		<span>秒</span>
	</div>
	<div class="open" onclick="a1()"><div id="02" style="width: 20px;
    background: url(/tu/jiantpu_xia.png) no-repeat center top;
    background-color: rgb(255, 59, 48);
    height: 10px;
    background-size: 60%;
    position: absolute;
    top: -7px;
    left: 50%;
    margin-left: -10px;
    border-radius: 0 0 .06rem .06rem;"><li class="ico02 down fr"></li></div>


		<div id="o">
			<ul class="openmo">
				<?php if(is_array($kjlist)): $i = 0; $__LIST__ = $kjlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>第 <i><?php echo ($vo["periodnumber"]); ?></i> 期<i> <span class="num"><?php echo ($vo["numberOne"]); ?></span> + <span class="num"><?php echo ($vo["numberTwo"]); ?></span> + <span class="num"><?php echo ($vo["numberThree"]); ?></span> = <span class="hong"><?php echo ($vo["tema"]); ?></span><font style="display:inline-block;width:15px"></font>(<?php echo ($vo["tema_ds"]); ?>,<?php echo ($vo["tema_dx"]); ?>)</i></li><?php endforeach; endif; else: echo "" ;endif; ?>

			</ul>
		</div>
	</div>
	<p class="gonggao"><marquee scrollamount="4" width="95%" style="    color: #00458a;"><?php echo C('welcome');?></marquee></p>
</div>
<!--聊天开始-->
<div class="main">
	<ul class="betup">
		<div id="03">
			<?php if(is_array($msglist)): $i = 0; $__LIST__ = $msglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['type'] == 'admin'): ?><p class="bettime"><?php echo ($vo["time"]); ?></p>
					<li class="notice"><center><?php echo (stripcslashes(htmlspecialchars_decode($vo["content"]))); ?></center></li><?php endif; ?>
				<?php if($vo['type'] == 'system'): ?><p class="bettime"><?php echo ($vo["time"]); ?></p>
					<li class="notice"><center><?php echo (stripcslashes(htmlspecialchars_decode($vo["content"]))); ?></center></li><?php endif; ?>
				<!--<?php if($vo['type'] == 'say'): ?><li>
						<div>
							<div class="uhead">
								<img src="<?php echo ($vo["head_img_url"]); ?>" style= "pointer-events: none;">
							</div>
							<div class="betinfo">
								
								<p class="uname"><?php echo ($vo["from_client_name"]); ?>　　<?php echo ($vo["time"]); ?></p>
								<div class="ubet">
									<p class="rase"><img src="/tu/gu.png" alt="">第 <span class="qihao">9056637</span>期</p>
									<p class="title"><span>购买类型</span><span style="float:right">购买金额</span></p>
									<p class="tz_detail"><span class="leixing"><?php echo (stripcslashes(htmlspecialchars_decode($vo["content"]))); ?></span><span class="jie">9500</span></p>
								</div>
							</div>
						</div>
					</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>-->
			<!--li class="notices"><center>仅显示前50条竞猜记录</center></li-->
		</div>
	</ul>
	</ul>
</div>
<!--聊天结束-->

<div class="alert" id="alert"></div>
<div class="alert1" id="alert1"></div>
<div class="chat_box">
	<div>
		<table width="100%">
			<tr>
				<td style="width:15%;"><input type="submit" onclick="$('.bm-layer-wrapper').show();$('.bm-layer').show();;tel()" name="chat" style="width:100%; height:35px; font-size:16px; background:#ff3b30;border:solid #ff3b30 1px; color:#ffffff; margin:auto;" id="sendbtn" value="购买"></td>
				<td style="width:70%; text-align:center;"><div style="width:94%; height:30px; color:#bdbdbd;background-color: #fff; text-align:center;line-height:30px;border-radius: .08rem; margin:auto;">禁止发言</div></td>
				<td style="width:15%;"><img src='/tu/xiaolian.png' style='width:40%; margin-right:10%'><img src='/tu/jiahao.png' style='width:40%; '></td>
			</tr>
		</table>
	</div>
</div>
<!-- 投注 -->
<script type="text/javascript" src="/Public/Home/new/css/js/artDialog.js"></script>
<script type="text/javascript" src="/Public/Home/new/css/js/page.js"></script>
<div class="bm-layer-wrapper"></div>
<div class="bm-layer" style="margin-bottom: 0;">

	<div class="bm-layer-fixed">

		<div class="bm-box-form">
			<div class="game_ftip">已选<span>0</span>注</div>
			<input type="tel" placeholder="输入金额" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
				   onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}" value="" maxlength="5" id="J_jine" style="width: 2rem;
    height: .6rem;
    padding-left: .2rem;
    background: #f4f4f4;
    font-size: .24rem;
    color: #ababab;
    border-radius: .08rem;
    margin-top: .2rem;
    margin-right: 1rem;"/>
			<button type="button" class="bm-btn" id="clear" style="font-size: 14px; width:4.2em;color:#fff; background:#ababab;border-radius: .08rem;">清桌</button>
			<button type="button" class="bm-btn" id="J_touzhu2" style="font-size: 14px;color:#fff; background:#ff3b30;border-radius: .08rem;">立即购买</button>
		</div>
	</div>
	<style>
		.game_ftip{ color:#000; font-size:13px;}
		.game_ftip span{ color:#ff0000}
		.wf_box{ width:100%; height:auto; overflow:hidden;border-bottom: 1px solid #d7d7d7;}
		.wf_box .left{ width: 2.18rem;height: 6.5rem;background: #f4f4f4; float:left}
		.wf_box .left .active{color: #ff3b30;background: #fff;}
		.wf_box .left div{ font-size: .22rem;font-weight: 600;color: #333;padding: .26rem 0;text-align: center;}
		.wf_box .right{width: calc(100% - 2.18rem);height: 6.5rem;position: relative;overflow: hidden; float:left}
		.wf_box .right h2{font-size: .24rem;font-weight: 600;color: #333;text-align: center;line-height: .6rem;}
		.wf_box .right>div {height: 6.6rem;overflow:auto;}
		.wf_box .right ul{width:100%; height:100%; }
		.wf_box .right ul:after {content: ''; height: 20px; width: 100%; display: flex;}
		.wf_box .right ul li{border-color: rgb(215, 215, 215);margin: .2rem .15rem 0;width: 40%;height: .70rem;border: 1px solid #d7d7d7;margin-top: .2rem;display: flex; float:left}
		.wf_box .right ul li span{font-weight: 600;color: #333;margin-top: 13px;margin-left: 20px;font-size: 13px;}
		.wf_box .right ul li p{font-size: .2rem;    color: #ff3b30;margin-top: 14px;}
		.wf_box .right ul .on{ background:url(/tu/lvjt.png) no-repeat 1.2rem center; background-size:1.0em;}
		.flexJustAro {
			-ms-flex-pack: distribute;
			justify-content: space-around;
		}

		.flex {
			display: -ms-flexbox;
			display: flex;
		}
		.paramyBetting {
			position: fixed;
			bottom: 2.0rem;
			width: 96%;
			height: 5.3rem;
			background: #fff;
			padding: 0 .2rem;
			box-sizing: border-box;
			border-radius: .08rem;
			z-index: 23;
			font-size: .2rem;
			left: 50%;
			margin-left: -48%;
			color:#000;
		}
		.paramyBetting h3 {
			font-size: .24rem;
			font-weight: 600;
			color: #333;
			line-height: .6rem;
			overflow: hidden;
		}
		.paramyBetting h3 img {
			width: .21rem;
			height: .21rem;
			float: right;
			margin: .2rem 0;
		}
		.paramyBetting ul li {
			line-height: .4rem;
			margin: .12rem 0;
			position: relative;
		}
		.paramyBetting ul .first {
			background: #f1f1f1;
			padding: .06rem 0;
			margin-top: 0;
		}
		.paramyBetting ul li img {
			width: .3rem;
			height: .3rem;
			position: absolute;
			right: 0;
			top: .07rem;
		}
		.paramyBetting .total {
			text-align: center;
			margin-top: .1rem;
		}
		.paramyBetting .submit {
			margin-top: .3rem;
		}
		.paramyBetting .submit button {
			border: none;
			outline: none;
			width: 100%;
			height: .66rem;
			color: #fff;
			line-height: .66rem;
			background: #ff3b30;
			border-radius: .08rem;
		}
		.paramyBetting .total .money {
			color: #ff3b30;
		}
		.mask {
			position: absolute;
			top: 0px;
			left: 0px;
			z-index: 20;
			display: none;
			filter: alpha(opacity=60);
			background-color: #777;
			opacity: 0.5;
			-moz-opacity: 0.5;
			height: 100%;
			width: 100%;
		}
	</style>

	<div class="wf_box">
		<div class="left">
			<div class="active">大小单双</div>
			<div>组合</div>
			<div>号码</div>
		</div>
		<div class="right">
			<div>
				<h2>大小单双</h2>
				<ul>
				<?php if($fangjian=='a')$fangjian='';?>
					<li><span>大</span><p>/<?php echo C('jnd28'.$fangjian.'_dxds');?></p></li>
					<li><span>小</span><p>/<?php echo C('jnd28'.$fangjian.'_dxds');?></p></li>
					<li><span>单</span><p>/<?php echo C('jnd28'.$fangjian.'_dxds');?></p></li>
					<li><span>双</span><p>/<?php echo C('jnd28'.$fangjian.'_dxds');?></p></li>

				</ul>
			</div>
			<div style="display:none">
				<h2>组合</h2>
				<ul>
					<li><span>大单</span><p>/<?php echo C('jnd28'.$fangjian.'_zuhe_1');?></p></li>
					<li><span>小单</span><p>/<?php echo C('jnd28'.$fangjian.'_zuhe_2');?></p></li>
					<li><span>大双</span><p>/<?php echo C('jnd28'.$fangjian.'_zuhe_2');?></p></li>
					<li><span>小双</span><p>/<?php echo C('jnd28'.$fangjian.'_zuhe_1');?></p></li>
					<li><span>极大</span><p>/<?php echo C('jnd28'.$fangjian.'_jdx');?></p></li>
					<li><span>极小</span><p>/<?php echo C('jnd28'.$fangjian.'_jdx');?></p></li>
				</ul>
			</div>
			<div style="display:none">
				<h2>号码</h2>
				<ul>
					<li><span>0</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_0');?></p></li>
					<li><span>1</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_1');?></p></li>
					<li><span>2</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_2');?></p></li>
					<li><span>3</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_3');?></p></li>
					<li><span>4</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_4');?></p></li>
					<li><span>5</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_5');?></p></li>
					<li><span>6</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_6');?></p></li>
					<li><span>7</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_7');?></p></li>
					<li><span>8</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_8');?></p></li>
					<li><span>9</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_9');?></p></li>
					<li><span>10</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_10');?></p></li>
					<li><span>11</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_11');?></p></li>
					<li><span>12</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_12');?></p></li>
					<li><span>13</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_13');?></p></li>
					<li><span>14</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_13');?></p></li>
					<li><span>15</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_12');?></p></li>
					<li><span>16</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_11');?></p></li>
					<li><span>17</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_10');?></p></li>
					<li><span>18</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_9');?></p></li>
					<li><span>19</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_8');?></p></li>
					<li><span>20</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_7');?></p></li>
					<li><span>21</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_6');?></p></li>
					<li><span>22</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_5');?></p></li>
					<li><span>23</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_4');?></p></li>
					<li><span>24</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_3');?></p></li>
					<li><span>25</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_2');?></p></li>
					<li><span>26</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_1');?></p></li>
					<li><span>27</span><p>/<?php echo C('jnd28'.$fangjian.'_tema_0');?></p></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="mask" class="mask" style="display: none;"></div>
	<div class="paramyBetting" style="display: none;">
		<h3 >确认购买 <img onclick="gbtz()" src="/tu/room_close.png" alt="">
		</h3>
		<ul>
			<li class="first"><div class="flex flexJustAro flexJustCen"><span >玩法</span><span >赔率</span><span >金额</span></div></li>
			<div class="wrapper" style="height: 2.5rem; overflow: auto;"><div class="selList">
			</div></div>
		</ul>
		<p class="total">共<span ></span>注 <span class="money"></span></p>
		<div class="submit"><button id="J_touzhu" style="background-color: rgb(255, 59, 48);">确认购买</button></div>
	</div>
	<script>
		$(".wf_box .left div").click(function(){
			$(".wf_box .left div").removeClass("active");
			$(this).addClass("active");
			var index=$(this).index();
			$(".wf_box .right div").hide();
			$(".wf_box .right div:eq("+index+")").show();
		});
		$(".wf_box .right div li").click(function(){
			if($(this).is(".on")){
				$(this).removeClass("on");
				$(".game_ftip span").html(parseInt($(".game_ftip span").html())-1);
			}else{
				$(this).addClass("on");
				$(".game_ftip span").html(parseInt($(".game_ftip span").html())+1);
			}

		});
		$("#clear").click(function(){
			$(".wf_box .right div li").removeClass("on");
			$("#J_jine").val("");
			$(".game_ftip span").html(0);
		});
		$("#J_touzhu2").click(function(){
			var m=$("#J_jine").val();
			if(!m){
				alert("请输入购买金额");
				return false;
			}
			var ons=$(".wf_box .right div .on");
			if(!ons.length){
				alert("请选择号码");
				return false;
			}
			$(".paramyBetting ul .selList").html("");
			$(".paramyBetting ul .selList").append('');
			for(var i=0;i<parseInt(ons.length);i++){
				var s=$(".wf_box .right div .on:eq("+i+") span").html();
				var p=$(".wf_box .right div .on:eq("+i+") p").html();
				p=p.replace('/','');
				var add='<li class="bettingList"><div class="flex flexJustAro flexJustCen"><span class="flex1 betnum">'+s+'</span><span class="flex1">'+p+'</span><span class="flex1">￥<span class="listmoney">'+m+'</span></span></div><img src="/tu/guanbi.png" class="tzsc" onclick="tzsc(this)" alt=""></li>';
				$(".paramyBetting ul .selList").append(add);
			}
			$(".paramyBetting .total span").html(ons.length);
			$(".paramyBetting .total .money").html(parseInt(ons.length)*parseInt(m)+'元');
			$("#mask").show();
			$(".paramyBetting").show();
		});
		function gbtz(){
			$("#mask").hide();
			$(".paramyBetting").hide();
		}
		function tzsc(t){
			var m=$("#J_jine").val();
			var s=parseInt($(".paramyBetting .total span").html())-1;
			$(t).parent(".bettingList").remove();
			$(".paramyBetting .total span").html(s);
			$(".paramyBetting .total .money").html(parseInt(s)*parseInt(m)+'元');
		}
	</script>

</div>

<style type="text/css">
	html {
		height:100%;
	}
	.body{
		position-:fixed;
		height:100%;
		overflow:hidden;
	}
</style>
<script type="text/javascript">
	function tel(){
		document.getElementById("J_jine").focus()
	}
	var tmp_top;
	$('#J_jine').focus(function(){
		tmp_top = $('body').scrollTop();
		$("body").scrollTop( $('body').height() );
	}).blur(function(){
		$("body").scrollTop( tmp_top );
	})
	;(function(){
		$('.Q_quxiao').click(function(){
			$('.bm-layer-wrapper').click();
			art.dialog({
				content: '确定要取消本次投注吗？',
				lock: 1,
				ok: function(){
					$.ajax({
						url:'qx.php?do=2',
						data: {
						},
						success: function(data){
							//alert(data)
							document.getElementById("alert1").innerHTML=data
							$(".alert1").show();
							setTimeout( "$('.alert1').fadeOut()" , 1000)
						}
					})
				},
				cancelVal: '关闭'
				,cancel: function(){
					//alert(2)
				}
			});
			return !1;
		});
		$('.J_quxiao').click(function(){
			$('.bm-layer-wrapper').click();
			art.dialog({
				content: '确定要取消本期全部投注吗？',
				lock: 1,
				ok: function(){
					$.ajax({
						url:'qx.php?do=1',
						data: {
						},
						success: function(data){
							//alert(data)
							document.getElementById("alert1").innerHTML=data
							$(".alert1").show();
							setTimeout( "$('.alert1').fadeOut()" , 1000)
						}
					})
				},
				cancelVal: '关闭'
				,cancel: function(){
					//alert(2)
				}
			});
			return !1;
		})
		var mySwiper;
		mySwiper = new Swiper('.swiper-container');
		$('.bm-layer-prev').on('click', function(e){
			mySwiper.swipePrev();
		})
		$('.bm-layer-next').on('click', function(e){
			mySwiper.swipeNext();
		})
		$('.bm-box-list li').click(function(){
			$(this).addClass('bm-box-list-current').siblings().removeClass('bm-box-list-current');
		})
		$('#J_show').click(function(){
			$('.bm-layer-wrapper').show();
			$('.bm-layer').show();
		})
		$('.bm-layer-wrapper').click(function(){
			$('.bm-layer-wrapper').hide();
			$('.bm-layer').hide();
		})
		// 第几名/大小单双/金额
		$('#J_touzhu').click(function(){
			var active = $('.paramyBetting');
			var lx = $('.selList li', active);
			
			for(var i=0;i<lx.length;i++){

				var lx1 = $(".selList li:eq("+i+") .betnum").html();
				var je = $(".selList li:eq("+i+") .listmoney").html();
				
				var input = "";
				if(escape(lx1).indexOf( "%u" )<0){
					input = lx1+'点'+je;
				}else{
					input = lx1+je;
				}
				
				onSubmit(input);
			}
			$(".wf_box .right div li").removeClass("on");
			$("#J_jine").val("");
			$(".game_ftip span").html(0);
			gbtz()

		})
	})();
</script>

<!--推送-->
<script type="text/javascript">
	var ws, name;

	// 连接服务端
	function connect(port){

		// 创建websocket
		ws = new WebSocket("ws://" + document.domain + ":"+port);
		//console.log(ws);
		// 当socket连接打开时，发送登录信息
		ws.onopen = function(){
			var name = "<?php echo ($userinfo["nickname"]); ?>";
			// 登录
			var userid = "<?php echo ($userinfo["id"]); ?>";
			var login_data = '{"type":"login","client_name":"' + name.replace(/"/g, '\"') + '","client_id":"'+userid+'"}';
			console.log("websocket握手成功，发送登录数据:" + login_data);
			ws.send(login_data);
		};
		// 当有消息时根据消息类型显示不同信息
		ws.onmessage = onmessage;
		ws.onclose = function(){
			console.log("连接关闭，定时重连");
			location.reload();
			connect();
		};
		ws.onerror = function() {
			console.log("出现错误");
		};
	}

	var inte = parseInt(Math.random()*12+1);
	function onmessage(e) {
		var rate = 0;
		var robot_rate = <?php echo C('robot_rate');?> ? <?php echo C('robot_rate');?> : 3;
		
	
		switch(<?php echo C('robot_rate');?>){
			case 5:
				rate = 5;
				break;
			case 4:
				rate = 10;
				break;
			case 3:
				rate = 25;
				break;
			case 2:
				rate = 35;
				break;
			case 1:
				rate = 45;
				break;
			default:
				rate = 25;
				break;
		}
		
		var data = eval("(" + e.data + ")");
		//console.log(data);
		switch(data['type']) {
			
			// 服务端ping客户端
			case 'ping':
				$('#xs').html(data.content+<?php echo C('online');?>);
				ws.send('{"type":"pong"}');
				inte--;
				if(inte==0){
					ws.send('{"type":"robot"}');
					inte = parseInt(Math.random()*rate+1)+2;
				}
				break;
				// 登录 更新用户列表
			case 'login':
				console.log(data['client_name'] + "登录成功");
				break;
				// 发言
			case 'say':
				say(data['uid'],data['from_client_name'], data['head_img_url'], data['content'], data['time']);
				break;
				// 用户退出 更新用户列表
			case 'logout':
				break;
			case 'broadcast':
				//alert('client');
			
				//房管
			case 'admin':
				$("#03").append('<li class="notice"><center>' + data["content"] + '</center></li>');
				//$("#03").append('<p class="bettime">'+data["time"]+'</p>');
				document.getElementById("alert1").innerHTML=data["content"];
				$(".alert1").show();
				setTimeout( "$('.alert1').fadeOut()" , 1000);
				$('html,body').scrollTop($('body')[0].scrollHeight);
				break;
				//系统
			case 'system':
				
				if(data["content"].indexOf("结算已完毕") != -1){

					
				}
				$("#03").append('<li><div><div class="uhead" style="margin-right: 5px;"><img src="' + data["head_img_url"] + '" style="pointer-events: none;"></div><div class="betinfo"><p class="ubet" style=""><span><span class="type"> ' + data["content"] + '</span></span></p></div></div></li>');
				//$("#03").append('<p class="bettime">'+data["time"]+'</p>');
				break;
				//积分减
			case 'points':
				$('#sy').html((parseFloat($('#sy').html())-data['content']).toFixed(1));
				break;
				//积分加
			case 'pointsadd':
				$('#sy').html((parseFloat($('#sy').html())+data['points']).toFixed(1));
				parent.layer.msg('恭喜竞猜成功');
				break;
				//重载
			case 'reload':
				if('<?php echo ($userinfo["id"]); ?>'==9){
					
					window.location.href=window.location.href;
				}
				break;
				//切换
			case 'switch':
				parent.location.reload();
				break;
						
						
			case 'getNumber':
				getMoneyData(data);
				break;
		}
	}

	// 提交对话
	function onSubmit(input) {
		var headimgurl = '<?php echo ($userinfo["headimgurl"]); ?>';
		var from_client_name = '<?php echo ($userinfo["nickname"]); ?>';
		if(input==''){
			//$('#textarea').focus();
			return false;
		}
		var fangjian=$("#fangjian").val();
		if(fangjian=='')fangjian="a";
		console.log(fangjian);
		ws.send('{"type":"say","client_name":"'+from_client_name+'","headimgurl":"'+headimgurl+'","content":"' + input.replace(/"/g, '\"').replace(/n/g, '\n').replace(/r/g, '\r') + '","fangjian":"'+fangjian+'"}');
		//$('#textarea').val('');
		//$('#dialog').scrollTop(0);
		$('html,body').scrollTop($('body')[0].scrollHeight);
	}

	// 发言
	function say(uid, from_client_name, head_img_url, content, time, number) {
	
		let reg = new RegExp("\\[([^\\[\\]]*?)\\]", 'igm');
        let html = $('#say').html();
		
		var num = content.replace(/[^0-9]/ig,"-");
		var arr=num.split('-');
		
		var len = arr.length - 1;
			num = arr[len];
		var back = '';
		if('<?php echo ($userinfo["id"]); ?>'==uid){
			back = 'background:#5e8bed; color:#fff;'
		}
		
		var con = content.replace(num,'');
		let source = html.replace(reg, function (node, key) { return {
            time:  time,
            images: head_img_url ,
            username: from_client_name ,
            number: $('.gmfix .line1 b').html() ,
            count: con ,
            nums: num ,
			back: back
        }[key]; });
	
		if('<?php echo ($userinfo["id"]); ?>'==uid){
			$("#03").append($(source));
		}else{
			$("#03").append($(source));
		}

		$('html,body').scrollTop($('body')[0].scrollHeight);
		/*if('<?php echo ($userinfo["id"]); ?>'==uid){
			$("#03").append('<li><div><div class="uhead"><img src="'+head_img_url+'" style= "pointer-events: none;"></div><div class="betinfo"><p class="uname">' + from_client_name +'　　'+time +'</p><p class="ubet"><i class="ico02 timeico"></i>投注内容：' + content + '</p></div></div></li>');
		}else{
			$("#03").append('<li><div><div class="uhead"><img src="'+head_img_url+'" style= "pointer-events: none;"></div><div class"><p class="uname">' + from_client_name +'　　'+time +'</p><p class="ubet"><i class="ico02 timeico"></i>投注内容：' + content + '</p></div></div></li>');
		}*/
	}

	
</script>
<style>
	foot{display:none;}
</style>
<script type='text/html' id="say">
<li>
					<div class="time"><p>[time]</p></div>
						<div>
							<div class="uhead">
								<img src="[images]" style= "pointer-events: none;">
							</div>
							<div class="betinfo">
								<p class="uname">[username]</p>
								<div class="ubet">
									<p class="rase"><img src="/tu/gu.png" alt="">第 <span class="qihao">[number]</span>期</p>
									<p class="title"><span>购买类型</span><span style="float:right">购买金额</span></p>
									<p class="tz_detail"><span class="leixing">[count]</span><span class="jie">[nums]</span></p>
								</div>
							</div>
						</div>
					</li>
 
</script>
<script type='text/html' id="numberss">
	第<i>[numbers]</i>期
	<span class='a[b1]'></span>
	<span class='a[b2]'></span>
	<span class='a[b3]'></span>
	<span class='a[b4]'></span>
	<span class='a[b5]'></span>
	<span class='a[b6]'></span>
	<span class='a[b7]'></span>
	<span class='a[b8]'></span>
	<span class='a[b9]'></span>
	<span class='a[b10]'></span>
	<span class='d'></span>
</script>
<script type='text/html' id="numbersss">
<p><span >[numbers]</span>期开奖结果</p>
				<div class="result">
					<span class="pink">[b1]</span> +
					<span class="purple">[b2]</span> +
					<span class="yellow">[b3]</span>=
					<span class="green">[b4]</span>[tema_ds],[tema_dx]</div>
</script>
<script>
	function get_money(){

		$.ajax({
			url:'/home/user/get_number',
			data:{
				number:'<?php echo ($list[0]["periodnumber"]); ?>',
				type:'<?php echo ($list[0]["game"]); ?>'
				
			},
			success:function(data){
				$('#myMoney').html(data.info.points);
				var now = parseInt(data.info.periodnumber)+1;
				var bef = $('.line1 b').html();
				
				var shos = $('#hqkj').html();
				shos = parseInt(shos)+1;
				if(data.info.over < 0){
					return false;
				}
				
				if(now != bef){
					
					clearInterval(settime);
					 $('.line1 b').html();
					 $('#J_touzhu').attr("disabled",false);
					//$("#J_touzhu").css("background-color","#de6f7e");
					
					if(data.info.game == 'pk10'){
						
						
						let reg = new RegExp("\\[([^\\[\\]]*?)\\]", 'igm');
						let html = $('#numberss').html();
						
						strs=data.info.awardnumbers.split(",");
						
						let source = html.replace(reg, function (node, key) { return {
							numbers:  data.info.periodnumber,
							b1:  strs[0],
							b2:  strs[1],
							b3:  strs[2],
							b4:  strs[3],
							b5:  strs[4],
							b6:  strs[5],
							b7:  strs[6],
							b8:  strs[7],
							b9:  strs[8],
							b10: strs[9] ,
						}[key]; });
						
						let lis = '<li>第 <i>'+data.info.periodnumber+'</i> 期<i> &nbsp;<span class="a'+strs[0]+'"></span><span class="a'+strs[1]+'"></span><span class="a'+strs[2]+'"></span> <span class="a'+strs[3]+'"></span> <span class="a'+strs[4]+'"></span> <span class="a'+strs[5]+'"></span> <span class="a'+strs[6]+'"></span> <span class="a'+strs[7]+'"></span> <span class="a'+strs[8]+'"></span> <span class="a'+strs[9]+'"></span></i></li>'
						
						$('.openmo').append($(lis));
						$('#hqkj').html(source);
					}else{
						
						let reg = new RegExp("\\[([^\\[\\]]*?)\\]", 'igm');
						let html = $('#numbersss').html();
						
						strs=data.info.awardnumbers.split(",");
						
						
						
						let source = html.replace(reg, function (node, key) { return {
							numbers:  data.info.periodnumber,
							b1:  strs[0],
							b2:  strs[1],
							b3:  strs[2],
							b4:  parseInt(strs[0]) + parseInt(strs[1]) + parseInt(strs[2]),
							tema_ds:  data.info.tema_ds,
							tema_dx:  data.info.tema_dx,
						}[key]; });
						var aa=parseInt(strs[0]) + parseInt(strs[1]) + parseInt(strs[2]);
						let lis = '<li>第 <i>'+data.info.periodnumber+'</i> 期<i> <span class="num">'+strs[0]+'</span> + <span class="num">'+strs[1]+'</span> + <span class="num">'+strs[2]+'</span> = <span class="hong">'+aa+'</span><font style="display:inline-block;width:15px"></font>('+data.info.tema_ds+','+data.info.tema_dx+')</i></li>'
						
						$('.openmo').append($(lis));
						
						$('#hqkj').html(source);
						//$('#hqkj').html(source);
						
					}
					
					
					
					countDown();
					
					//console.log(data);
					
				}else{
					
				}
		
			}
		});
	}
	
	function getMoneyData(data){
		//$('#myMoney').html(data.info.points);
		var now = parseInt(data.info.periodnumber)+1;
		var bef = $('.line1 b').html();
		
		var shos = $('#hqkj').html();
		shos = parseInt(shos)+1;
		if(data.info.over < 0){
			return false;
		}
		
		if(now != bef){
			
			clearInterval(settime);
			 $('.line1 b').html();
			 $('#J_touzhu').attr("disabled",false);
			//$("#J_touzhu").css("background-color","#de6f7e");
			
			if(data.info.game == 'pk10'){
				
				
				let reg = new RegExp("\\[([^\\[\\]]*?)\\]", 'igm');
				let html = $('#numberss').html();
				
				strs=data.info.awardnumbers.split(",");
				
				let source = html.replace(reg, function (node, key) { return {
					numbers:  data.info.periodnumber,
					b1:  strs[0],
					b2:  strs[1],
					b3:  strs[2],
					b4:  strs[3],
					b5:  strs[4],
					b6:  strs[5],
					b7:  strs[6],
					b8:  strs[7],
					b9:  strs[8],
					b10: strs[9] ,
				}[key]; });
				
				let lis = '<li>第 <i>'+data.info.periodnumber+'</i> 期<i> &nbsp;<span class="a'+strs[0]+'"></span><span class="a'+strs[1]+'"></span><span class="a'+strs[2]+'"></span> <span class="a'+strs[3]+'"></span> <span class="a'+strs[4]+'"></span> <span class="a'+strs[5]+'"></span> <span class="a'+strs[6]+'"></span> <span class="a'+strs[7]+'"></span> <span class="a'+strs[8]+'"></span> <span class="a'+strs[9]+'"></span></i></li>'
				
				$('.openmo').append($(lis));
				$('#hqkj').html(source);
			}else{
				
				let reg = new RegExp("\\[([^\\[\\]]*?)\\]", 'igm');
				let html = $('#numbersss').html();
				
				strs=data.info.awardnumbers.split(",");
				
				
				
				let source = html.replace(reg, function (node, key) { return {
					numbers:  data.info.periodnumber,
					b1:  strs[0],
					b2:  strs[1],
					b3:  strs[2],
					b4:  parseInt(strs[0]) + parseInt(strs[1]) + parseInt(strs[2]),
					tema_ds:  data.info.tema_ds,
					tema_dx:  data.info.tema_dx,
				}[key]; });
				var aa=parseInt(strs[0]) + parseInt(strs[1]) + parseInt(strs[2]);
				let lis = '<li>第 <i>'+data.info.periodnumber+'</i> 期<i> <span class="num">'+strs[0]+'</span> + <span class="num">'+strs[1]+'</span> + <span class="num">'+strs[2]+'</span> = <span class="hong">'+aa+'</span><font style="display:inline-block;width:15px"></font>('+data.info.tema_ds+','+data.info.tema_dx+')</i></li>'
				
				$('.openmo').append($(lis));
				
				$('#hqkj').html(source);
				//$('#hqkj').html(source);
				
			}
			
			
			
			countDown();
			
			//console.log(data);
			
		}else{
			
		}
		
	}
	
	
	var t2 = window.setInterval("get_money()",3000);
	function s_to_hs(s){
		//计算分钟
		//算法：将秒数除以60，然后下舍入，既得到分钟数
		var h;
		h  =   Math.floor(s/60);
		//计算秒
		//算法：取得秒%60的余数，既得到秒数
		s  =   s%60;
		//将变量转换为字符串
		h    +=    '';
		s    +=    '';
		//如果只有一位数，前面增加一个0
		h  =   (h.length==1)?h:h;
		s  =   (s.length==1)?'0'+s:s;
		return h+'分'+s+'秒';
	}
	if(("standalone" in window.navigator) && window.navigator.standalone){
		var noddy, remotes = false;
		document.addEventListener('click', function(event) {
			noddy = event.target;
			while(noddy.nodeName !== "A" && noddy.nodeName !== "HTML") {
				noddy = noddy.parentNode;
			}
			if('href' in noddy && noddy.href.indexOf('http') !== -1 && (noddy.href.indexOf(document.location.host) !== -1 || remotes)){
				event.preventDefault();
				document.location.href = noddy.href;
			}
		},false);
	}
</script>
 
<script src='/Public/Common/js/socket.io.js'></script>
<!--推送-->

<script>

	var count = 0;
	var settime;
	function countDown(){
		$.ajax({
			url:'/Home/Get/getjnd28',
			data: {
			},
			success: function(data){
				data = JSON.parse(data);
				$(".line1").html("距离 <i><b>"+data.drawIssue+"</b></i> 期开奖");
				count = data.time;
				executeCountDown();
				settime = setInterval(function() {
					executeCountDown();
				}, 1000);
			}
		})
	}

	function executeCountDown(){
		if(count == 0){
			$(".line2").html("正在开奖");
		}else if(count <= <?php echo C('jnd28_stop_time');?>){
			count = count - 1;
			$(".line2").html("已封盘");
			//$('#J_touzhu').attr("disabled",true);
			//$("#J_touzhu").css("background-color","#c7c7c7");
		}else{
			count = count - 1;
			$date_str = formatSeconds(count);

			$(".line2").html($date_str);
		}
	}
	function formatSeconds(value) {
		var theTime = parseInt(value);// 秒
		var theTime1 = 0;// 分
		var theTime2 = 0;// 小时
// alert(theTime);
		if(theTime > 60) {
			theTime1 = parseInt(theTime/60);
			theTime = parseInt(theTime%60);
// alert(theTime1+"-"+theTime);
			if(theTime1 > 60) {
				theTime2 = parseInt(theTime1/60);
				theTime1 = parseInt(theTime1%60);
			}
		}
		var result = '';
		if(theTime2 > 0) {
			if(theTime2 > 9){
				result += parseInt(theTime2)+": ";
			}else{
				result += "0"+parseInt(theTime2)+": ";
			}
		}else{
			result += "00: ";
		}
		if(theTime1 > 0) {
			if(theTime1 > 9){
				result += parseInt(theTime1)+": ";
			}else{
				result += "0"+parseInt(theTime1)+": ";
			}
		}else{
			result += "00: ";
		}
		if(theTime > 9){
			result += parseInt(theTime);
		}else{
			result += "0"+parseInt(theTime);
		}


		return result;
	}

	countDown();

</script>
</div>

<!--websocket-start-->
<div class="rmenu">
	<div class="icons"></div>
	<a href="<?php echo U('Home/Fen/addpage');?>"><img src="/tu/ljcz.png">立即充值</a>
	<a href="<?php echo U('Home/Run/trend1', array('game' => 'jnd28'));?>"><img src="/tu/kjjg.png">开奖结果</a>
	<a href="<?php echo U('Home/Run/trend2', array('game' => 'jnd28'));?>"><img src="/tu/kjzs.png">开奖走势</a>
	<a href="<?php echo U('/Home/Run/rulejnd28');?>"><img src="/tu/wfsm.png">玩法说明</a>
	<a href="<?php echo U('Home/Run/history');?>"><img src="/tu/tzjl.png">购买记录</a>

</div>


<script>
	$(".bm-btn").click(function(){
		//$(".alert").show();
		//setTimeout( "$('.alert').fadeOut()" , 1000)
	});
	$(".f").click(function(){
		$(".alert1").show();
		setTimeout( "$('.alert1').fadeOut()" , 1000)
	});
	function a1()
	{
		$(".openmo").slideToggle();
	}
	$(".ufmenu, .ufup").click(function(){
		$(".ufix").animate({height:"0"});
		$("header").show();
	});

	$(".menu").click(function(){
		$(".ufix").animate({height:"100%"});
		$("header").hide();

	});

	$(".qx0").click(function(){
		if($(".rmenu").is(":hidden")){
			$(".rmenu").show();
		}else{
			$(".rmenu").hide();
		}


	});
	$(".qx45").click(function(){
		$(".rmenu").hide(300);
		$(this).hide();
		$(".qx0").show();
	});
	$(".plsm").click(function(){
		$(".peilv").show();
		$(".main, .gmfix").hide();
	});
	$(".pltit span").click(function(){
		$(".peilv").hide();
		$(".main, .gmfix").show();
	});
	function showMask(){
		$("#mask").css("height",$(document).height());
		$("#mask").css("width",$(document).width());
		$("#mask").show();
	}
	function hideMask(){
		$("#mask").hide();
	}
</script>
 
<style>
	ul{
		list-style-type:none;
		margin:0;
		padding:0;
	}
	li{
		line-height: 1;
		list-style:none;
		text-align: center;
	}

	.home {
		margin-top: 5%;
		display: inline-block;
		height: 2em;
		width: 2em;
 
		background-size: cover;
	}
	.wd {
		margin-top: 5%;
		display: inline-block;
		height: 2em;
		width: 2em;
	 
		background-size: cover;
	}
	.kf {
		margin-top: 5%;
		display: inline-block;
		height: 2em;
		width: 2em;
	 
		background-size: cover;
	}

	.tx {
		margin-top: 5%;
		display: inline-block;
		height: 2em;
		width: 2em;
 
		background-size: cover;
	}


	.cz {
		margin-top: 5%;
		display: inline-block;
		height: 2em;
		width: 2em;
	 
		background-size: cover;
	}
	.cp_message {
		padding-right: .1rem;
		text-align: right;
		color: #fff1f3;
	}
	.cp_message .result {
		margin-top: .1rem;
	}
	.cp_message .result span {
		display: inline-block;
		width: .3rem;
		height: .3rem;
		border-radius: 50%;
		text-align: center;
		line-height: .28rem;
		font-size: .20rem;
	}
	.pink {
		background: #ff9494;
	}
	.purple {
		background: #d858eb;
	}
	.yellow {
		background: #fce05c;
	}
	.green {
		background: #41c16b;
	}
</style>
</body>
</html>