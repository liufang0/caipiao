<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
    @if(in_array('AB', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('ab.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('AG', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('ag.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('BBIN', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('bbin.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('BG', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('bg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('CG', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('cg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('DT', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('dt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('IBC', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('ibc.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('MG', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('mg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('PT', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('pt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('SA', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('sa.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('TTG', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('ttg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('YC', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <iframe src="{{ route('yc.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('EG', $_api_list))
    <div style="width: 200px;height:100px;margin: auto">
        <p>其他</p>
        <iframe src="{{ route('eg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    <div style="width: 200px;height:100px;margin: auto">
        <p>福彩3D</p>
        <iframe src="{{ route('eg.game_record_3d') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    <div style="width: 200px;height:100px;margin: auto">
        <p>六合彩</p>
        <iframe src="{{ route('eg.game_record_6hc') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    <div style="width: 200px;height:100px;margin: auto">
        <p>排列3</p>
        <iframe src="{{ route('eg.game_record_pl3') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
</body>
</html>
