<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}

$time=time();
$S_time=$time-2*60*60;
$E_time=$time;
$limit=50;
$PageIndex=0;
$platformCode='BBIN';
$api_mod = \App\Models\Api::where('api_name', $platformCode)->first();
$api_bi = \App\Models\Api::where('api_name', 'BI')->first();
$api=new \App\Http\Controllers\Api\BiController();
$data=$api->getGameRecord($platformCode,$S_time,$E_time,$PageIndex,$limit,$time);
//体育
$bbin_ball_list = [
    "BK"=>"篮球",
    "BS"=>"棒球",
    "F1"=>"其他",
    "FB"=>"美足",
    "FT"=>"足球",
    "FU"=>"指数",
    "IH"=>"冰球",
    "SP"=>"冠军",
    "TN"=>"网球"
];
//真人
$bbin_live_list = [
    "3001"=>"百家乐",
    "3002"=>"二八杠",
    "3003"=>"龙虎斗",
    "3005"=>"三公",
    "3006"=>"温州牌九",
    "3007"=>"轮盘",
    "3008"=>"骰宝",
    "3010"=>"德州扑克",
    "3011"=>"色碟",
    "3012"=>"牛牛",
    "3014"=>"无限21点",
    "3015"=>"番摊",
];
//电子
        $bbin_game_list = [
            "5001"=>"水果拉霸",
            "5002"=>"扑克拉霸",
            "5003"=>"筒子拉霸",
            "5004"=>"足球拉霸",
            "5005"=>"惑星战记",
            "5008"=>"猴子爬树",
            "5011"=>"西游记",
            "5012"=>"外星争霸",
            "5013"=>"传统",
            "5014"=>"丛林",
            "5015"=>"FIFA2010",
            "5016"=>"史前丛林冒险",
            "5017"=>"星际大战",
            "5018"=>"齐天大圣",
            "5019"=>"水果乐园",
            "5020"=>"热带风情",
            "5025"=>"法海斗白蛇",
            "5026"=>"2012伦敦",
            "5027"=>"功夫龙",
            "5028"=>"中秋月光派对",
            "5029"=>"圣诞派对",
            "5030"=>"幸运财神",
            "5034"=>"王牌5PK",
            "5035"=>"加勒比扑克",
            "5039"=>"魚蝦蟹",
            "5040"=>"百搭二王",
            "5041"=>"7PK",
            "5047"=>"尸乐园",
            "5048"=>"特务危机",
            "5049"=>"玉蒲团",
            "5050"=>"战火佳人",
            "5057"=>"明星97",
            "5058"=>"疯狂水果盘",
            "5059"=>"马戏团",
            "5060"=>"动物奇观",
            "5061"=>"超级7",
            "5062"=>"龙在囧途",
            "5065"=>"筒子拉霸",
            "5070"=>"黃金大轉輪",
            "5073"=>"百家乐大转轮",
            "5076"=>"数字大转轮",
            "5077"=>"水果大转轮",
            "5078"=>"象棋大转轮",
            "5079"=>"3D数字大转轮",
            "5080"=>"乐透转轮",
            "5083"=>"钻石列车",
            "5084"=>"圣兽传说",
            "5088"=>"斗大",
            "5089"=>"红狗",
            "5091"=>"三国拉霸",
            "5092"=>"封神榜",
            "5093"=>"金瓶梅",
            "5094"=>"金瓶梅2",
            "5095"=>"斗鸡",
            "5101"=>"欧式轮盘",
            "5102"=>"美式轮盘",
            "5103"=>"彩金轮盘",
            "5104"=>"法式轮盘",
            "5106"=>"三国",
            "5115"=>"经典21点",
            "5116"=>"西班牙21点",
            "5117"=>"维加斯21点",
            "5118"=>"奖金21点",
            "5131"=>"皇家德州扑克",
            "5201"=>"火焰山",
            "5202"=>"月光宝盒",
            "5203"=>"爱你一万年",
            "5204"=> "2014FIFA",
            "5401"=>"天山侠侣传",
            "5402"=>"夜市人生",
            "5403"=>"七剑传说",
            "5404"=>"沙滩排球",
            "5405"=>"暗器之王",
            "5407"=>"大红帽与小",
            "5701"=>"连连看",
            "5703"=>"发发啰",
            "5704"=>"斗牛",
            "5705"=>"聚宝盆",
            "5706"=>"农情巧克力",
            "5707"=>"金钱豹",
            "5802"=>"阿基里斯",
            "5803"=>"阿兹特克宝藏",
            "5804"=>"大明星",
            "5805"=>"凯萨帝国",
            "5806"=>"奇幻花园",
            "5808"=>"浪人武士",
            "5809"=>"空战英豪",
            "5810"=>"航海时代",
            "5824"=>"恶龙传说",
            "5825"=>"金莲",
            "5826"=>"金矿工",
            "5827"=>"老船长",
            "5828"=>"霸王龙",
            "5835"=>"喜福牛年",
            "5836"=>"龙卷风",
            "5888"=>"JackPot",
            "5901"=>"连环夺宝",
            "5902"=>"糖果派对",
            "5903"=>"秦皇秘宝",
            "15006"=>"3D玉蒲团",
            "15016"=>"厨王争霸",
            "15017"=>"连环夺宝",
            "15018"=>"激情243",
            "15019"=>"倩女幽魂",
            "15020"=>"欲望射手",
            "15021"=>"全民狗仔",
            "15022"=>"怒火领空 ",
            "15024"=>"2014世足赛",
            "15026"=>"环游世界",
            "15027"=>"神舟27",
        ];
        //彩票
        $bbin_lottery_list = [
            "LT"=>"六合彩",
            "BJ3D"=>"3D彩",
            "PL3D"=>"排列三",
            "BB3D"=>"BB3D",
            "SH3D"=>"上海时时彩",
            "CQSC"=>"重庆时时彩",
            "JXSC"=>"江西时时彩",
            "TJSC"=>"天津时时彩",
            "XJSC"=>"新疆时时彩",
            "GXSF"=>"广西十分彩",
            "GDSF"=>"广东十分彩",
            "TJSF"=>"天津十分彩",
            "BJKN"=>"北京快乐8",
            "CAKN"=>"加拿大卑斯",
            "AUKN"=>"澳洲首都商业区",
            "BBKN"=>"BB快乐彩",
            "BJPK"=>"北京PK拾",
            "BBPK"=>"BB PK3",
            "GDE5"=>"广东11选5",
            "CQE5"=>"重庆11选5",
            "JXE5"=>"江西11选5",
            "SDE5"=>"山东十一运夺金",
            "BBRB"=>"BB滚球王",
            "JSQ3"=>"江苏快3",
            "AHQ3"=>"安微快3",
            "OTHER"=>"除了六合彩外的游戏"
        ];

$count=0;
if(!empty($data['data'])){
    $count=$data['TotalCount'];
    $data =$data['data'];
    $data =array_reverse($data);
    foreach($data as $k=>$v){

        $r_mod = \App\Models\GameRecord::where('billNo', $v['ID'])->where('api_type', $api_mod->id)->first();

        if($r_mod){
            if($r_mod->netAmount != $v['Payoff'] + $v['BetAmount']){

                $r_mod->update([
                    'netAmount' => $v['Payoff'] + $v['BetAmount']
                ]);
            }
        }else{

            //
            //$l = strlen($api_bi->prefix);
            $ctime = SaveTime($v['WagersDate']);
            $l = 0;
            $PlayerName = $v["UserName"];
            $name = substr($PlayerName, $l);
            $m = \App\Models\Member::where('name', $name)->first();

            $gameType = $v['GameType'];
            if (in_array($gameType, array_keys($bbin_ball_list)))//体育
            {
                $gameType = 5;
            } elseif (in_array($gameType, array_keys($bbin_game_list)))//电子
            {
                $gameType = 3;
            } elseif (in_array($gameType, array_keys($bbin_live_list)))//真人
            {
                $gameType = 1;
            } else { //彩票
                $gameType = 4;
            }

            \App\Models\GameRecord::create([
                'billNo' => $v['ID'],
                'playerName' => $PlayerName,
                'betAmount' => $v['BetAmount'],
                'validBetAmount' => $gameType == 4 ?$v['BetAmount']:$v['Commissionable'],
                'netAmount' => $v['Payoff'] + $v['BetAmount'],
                'reAmount' => $v['Payoff'],
                'betTime' => $ctime,
                'gameCode' => $v['GameType'],
                //'gameType' => $v['gameType'],
                'gameType' => $gameType,

                'api_type' => $api_mod->id,
                'name' => $name,
                'member_id' => $m?$m->id:0,
                'result' => json_encode($v)
            ]);

        }

    }

    if ($count > $limit)
    {
        for ($i=1;$i < ceil($count/$limit);$i++)
        {
            $p = $i*$limit;
            $time = time();
            $data=$api->getGameRecord($platformCode,$S_time,$E_time,$p,$limit,$time);
            if (!empty($data['data']))
            {
                $data =$data['data'];
                foreach($data as $k=>$v){

                    $r_mod = \App\Models\GameRecord::where('billNo', $v['ID'])->where('api_type', $api_mod->id)->first();

                    if($r_mod){
                        if($r_mod->netAmount != $v['Payoff'] + $v['BetAmount']){

                            $r_mod->update([
                                'netAmount' => $v['Payoff'] + $v['BetAmount']
                            ]);
                        }
                    }else{

                        //
                        //$l = strlen($api_bi->prefix);
                        $ctime = SaveTime($v['WagersDate']);
                        $l = 0;
                        $PlayerName = $v["UserName"];
                        $name = substr($PlayerName, $l);
                        $m = \App\Models\Member::where('name', $name)->first();

                        $gameType = $v['GameType'];
                        if (in_array($gameType, array_keys($bbin_ball_list)))//体育
                        {
                            $gameType = 5;
                        } elseif (in_array($gameType, array_keys($bbin_game_list)))//电子
                        {
                            $gameType = 3;
                        } elseif (in_array($gameType, array_keys($bbin_live_list)))//真人
                        {
                            $gameType = 1;
                        } else { //彩票
                            $gameType = 4;
                        }

                        \App\Models\GameRecord::create([
                            'billNo' => $v['ID'],
                            'playerName' => $PlayerName,
                            'betAmount' => $v['BetAmount'],
                            'validBetAmount' => $gameType == 4 ?$v['BetAmount']:$v['Commissionable'],
                            'netAmount' => $v['Payoff'] + $v['BetAmount'],
                            'reAmount' => $v['Payoff'],
                            'betTime' => $ctime,
                            'gameCode' => $v['GameType'],
                            //'gameType' => $v['gameType'],
                            'gameType' => $gameType,

                            'api_type' => $api_mod->id,
                            'name' => $name,
                            'member_id' => $m?$m->id:0,
                            'result' => json_encode($v)
                        ]);

                    }

                }
            }
        }
    }
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style type="text/css">
        body,td,th {
            font-size: 12px;
        }
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
<script>
    var limit="300"
    if (document.images){
        var parselimit=limit
    }
    function beginrefresh(){
        if (!document.images)
            return
        if (parselimit==1)
            window.location.reload()
        else{
            parselimit-=1
            curmin=Math.floor(parselimit)
            if (curmin!=0)
                curtime=curmin+"秒后自动获取!"
            else
                curtime=cursec+"秒后自动获取!"
            timeinfo.innerText=curtime
            setTimeout("beginrefresh()",1000)
        }
    }

    window. onload=beginrefresh
</script>
<table width="100%"border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <input type=button name=button value="刷新" onClick="window.location.reload()">
            BBIN:成功采集到<?=$count?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
