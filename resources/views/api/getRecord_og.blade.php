<?php
header('Content-Type:text/html; charset=utf-8');
function SaveTime($jsonDate){
    preg_match('/\d{10}/',$jsonDate,$matches);
    return (date('Y-m-d H:i:s',$matches[0]));
}

$time=time();
$S_time=$time-60*60;
$E_time=$time;
$limit=100;
$PageIndex=0;
$platformCode='OG';
$api_mod = \App\Models\Api::where('api_name', $platformCode)->first();
$api=new \App\Http\Controllers\Api\OgController();
$rowid = \App\Models\GameRecord::where('api_type', $api_mod->id)->max('rowid');
$rowid = $rowid >0 ?$rowid:'1423921395708';

$data = $api->getBettingRecord($rowid);
$count=0;
if(!empty($data['data'])){
    $count=$data['TotalCount'];
    $data =$data['data']['Records'];
    $data =array_reverse($data);
    foreach($data as $k=>$v){

        $r_mod = \App\Models\GameRecord::where('rowid', $value["VendorId"])->where('api_type', $api_mod->id)->first();

        if($r_mod){
            if($r_mod->netAmount != $v['WinLoseAmount']){

                $r_mod->update([
                    'netAmount' => $v['WinLoseAmount']
                ]);
            }
        }else{

            //
            $l = strlen($api_mod->prefix);
            $PlayerName = $v["client"];
            $name = substr($PlayerName, $l);
            $m = \App\Models\Member::where('name', $name)->first();

            \App\Models\GameRecord::create([
                'rowid' => $value["VendorId"],
                'billNo' => $v['OrderNumber'],
                'playerName' => $PlayerName,
                'betAmount' => $v['BettingAmount'],
                'validBetAmount' => $v['ValidAmount'],
                'netAmount' => $v['WinLoseAmount'],
                'betTime' => date('Y-m-d H:i:s', strtotime($v["AddTime"])),
                'gameCode' => $v['gameId'],
                //'gameType' => $v['gameType'],
                'gameType' => 1,

                'api_type' => $api_mod->id,
                'name' => $name,
                'member_id' => $m->id,
                'result' => json_encode($v)
            ]);

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
            OG:成功采集到<?=$count?>条数据
            <span id="timeinfo"></span>
        </td>
    </tr>
</table>
</body>
</html>
