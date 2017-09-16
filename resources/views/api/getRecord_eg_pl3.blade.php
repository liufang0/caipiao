<?php
set_time_limit(0);
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}
$t = time();
$S_time=date('Y-m-d H:i:s', $t - 2*24*60*60 - 5*60);
$E_time=date('Y-m-d H:i:s', $t - 12*60*60 - 5*60);
$limit=500;
$PageIndex=0;
$api_mod = \App\Models\Api::where('api_name', 'EG')->first();
$api=new \App\Http\Controllers\Api\EgController();
$fc_type = null;
$fc_id = 69;//六合彩
$data=$api->getGameRecord($S_time,$E_time,$fc_type,$fc_id,$PageIndex);
$count=0;
if(!empty($data['Data']['Data'])){
    $count=$data['Data']['Total'];
    $data =$data['Data']['Data'];
    foreach($data as $k=>$v){
        //结算状态  0 为 未结算 1 已结算
        $result = $v['is_settle'];

//        if ($result == 1)
//            {
        $r_mod = \App\Models\GameRecord::where('billNo', $v['order_num'])->where('api_type', $api_mod->id)->first();

        if($r_mod){
            $r_mod->update([
                'netAmount' => $v['result']+$v['bet'],
                'validBetAmount' => $v['valid_bet'],
                'flag' => $result
            ]);
        }else{
            $l = strlen($api_mod->prefix);
            $PlayerName = $v["username"];
            $name = substr($PlayerName, $l);
            $m = \App\Models\Member::where('name', $name)->first();


            \App\Models\GameRecord::create([
                'billNo' => $v['order_num'],
                'playerName' => $PlayerName,
                'betAmount' => $v['bet'],
                'netAmount' => $v['result']+$v['bet'],
                'validBetAmount' => $v['valid_bet'],
                'betTime' => date('Y-m-d H:i:s', strtotime($v['add_time']) - 12*60*60),
                'gameType' => 4,
                'gameCode' => $v['fc_name'],//彩票种类
                'tableCode' => $v['play_name'],//玩法名字
                'stringex' => $v['content_name'],//下注号码,
                'reAmount' =>  $v['result'],
                'flag' => $result,

                'api_type' => $api_mod->id,
                'name' => $name,
                'member_id' => $m?$m->id:0,
                'result' => json_encode($v)
            ]);
        }

        //}
    }



    if ($count > $limit)
    {
        for ($i=2;$i < ceil($count/$limit);$i++)
        {
            $data=$api->getGameRecord($S_time,$E_time,$fc_type,$i);
            if (!empty($data['Data']['Data']))
            {
                $data =$data['data']['Data'];
                foreach($data as $k=>$v){
                    //结算状态  0 为 未结算 1 已结算
                    $result = $v['is_settle'];

//        if ($result == 1)
//            {
                    $r_mod = \App\Models\GameRecord::where('billNo', $v['order_num'])->where('api_type', $api_mod->id)->first();

                    if($r_mod){
                        $r_mod->update([
                            'netAmount' => $v['result']+$v['bet'],
                            'validBetAmount' => $v['valid_bet'],
                            'flag' => $result
                        ]);
                    }else{
                        $l = strlen($api_mod->prefix);
                        $PlayerName = $v["username"];
                        $name = substr($PlayerName, $l);
                        $m = \App\Models\Member::where('name', $name)->first();


                        \App\Models\GameRecord::create([
                            'billNo' => $v['order_num'],
                            'playerName' => $PlayerName,
                            'betAmount' => $v['bet'],
                            'netAmount' => $v['result']+$v['bet'],
                            'validBetAmount' => $v['valid_bet'],
                            'betTime' => date('Y-m-d H:i:s', strtotime($v['add_time']) - 12*60*60),
                            'gameType' => 4,
                            'gameCode' => $v['fc_name'],//彩票种类
                            'tableCode' => $v['play_name'],//玩法名字
                            'stringex' => $v['content_name'],//下注号码,
                            'reAmount' =>  $v['result'],
                            'flag' => $result,

                            'api_type' => $api_mod->id,
                            'name' => $name,
                            'member_id' => $m?$m->id:0,
                            'result' => json_encode($v)
                        ]);
                    }

                    //}
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
            EG:成功采集到<?=$count?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
