@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
@endsection
@section('content')

    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner1.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner2.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner3.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner4.jpg') }}"></a>
                        </li>
                    </ul>
                    <ul class="hd"></ul>
                </div>
            </div>

            <div class="m_notice" style="display: none">
                <span class="notice_logo"></span>
                <div class="pull-left notice_title">
                    系统公告:
                </div>
                <div class="pull-left notice_content">
                    <marquee id="mar0" behavior="scroll" direction="left" scrollamount="4">
                        @foreach($_system_notices as $v)
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
            </div>

            {{--视讯--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    视讯直播
                </div>
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('ag.playGame') }}?devices=1">
                            <img src="{{ asset('/wap/images/m_box-live1.png') }}" alt="">
                          <span class="m_box-name">
                            AG视讯
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('mg.playGame') }}?devices=1">
                            <img src="{{ asset('/wap/images/m_box-live3.png') }}" alt="">
                      <span class="m_box-name">
                        MG视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SA', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('sa.playGame') }}?devices=1">
                            <img src="{{ asset('/wap/images/m_box-live5.jpg') }}" alt="">
                      <span class="m_box-name">
                        SA视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('PT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('pt.playGame') }}?gametype=bal&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live6.jpg') }}" alt="">
                      <span class="m_box-name">
                        PT视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('bbin.playGame') }}?gametype=live&devices=1">
                            <img src="{{ asset('/wap/images/m_box-live4.jpg') }}" alt="">
                        <span class="m_box-name">
                        BB视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('bg.playGame') }}?devices=1">
                            <img src="{{ asset('/wap/images/m_box-live5.jpg') }}" alt="">
                        <span class="m_box-name">
                        BG视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('CG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('cg.playGame') }}?devices=1">
                            <img src="{{ asset('/wap/images/m_box-live7.jpg') }}" alt="">
                        <span class="m_box-name">
                        CG视讯
                      </span>
                        </a>
                    </div>
                @endif
            </div>

            {{--电子--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    电子游艺
                </div>
                @if(in_array('AG', $_api_list))
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('ag.playGame') }}?devices=1&gametype=8">
                            <img src="{{ asset('/wap/images/m_box-game5.png') }}" alt="">
                          <span class="m_box-name">
                            AG电子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('wap.mg_eGame_list') }}">
                            <img src="{{ asset('/wap/images/m_box-game2.png') }}" alt="">
                          <span class="m_box-name">
                            MG电子
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('PT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('pt.rng_game_list') }}">
                            <img src="{{ asset('/wap/images/m_box-game3.png') }}" alt="">
                      <span class="m_box-name">
                        PT电子
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('bbin.playGame') }}?gametype=game&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game4.png') }}" alt="">
                      <span class="m_box-name">
                        BB电子
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('DT', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('dt.rng_game_list') }}">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-game9.png') }}" alt="">
                          <span class="m_box-name">
                            DT电子
                          </span>
                        </a>
                    </div>
                @endif
                {{--@if(in_array('SA', $_api_list))--}}
                {{--<div class="m_box m_box-half">--}}
                {{--<a class="m_box-link" href="{{ route('dt.rng_game_list') }}">--}}
                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                {{--<img src="{{ asset('/wap/images/m_box-game1.png') }}" alt="">--}}
                {{--<span class="m_box-name">--}}
                {{--SA电子--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--@endif--}}
            </div>

            {{--捕鱼--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    捕鱼游戏
                </div>
                <div class="m_box m_box-half">
                    <a class="m_box-link" href="{{ route('ag.playGame') }}?devices=1&gameType=6">
                        {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                        <img src="{{ asset('/wap/images/m_box-game10.png') }}" alt="">
                          <span class="m_box-name">
                            AG捕鱼
                          </span>
                    </a>
                </div>
                <div class="m_box m_box-half">
                    <a class="m_box-link" href="{{ route('pt.playGame') }}?gametype=cashfi&devices=1">
                        {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                        <img src="{{ asset('/wap/images/m_box-game11.png') }}" alt="">
                          <span class="m_box-name">
                            PT捕鱼
                          </span>
                    </a>
                </div>
            </div>

            {{--彩票--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    彩票游戏
                </div>
                @if(in_array('BBIN', $_api_list))
                <div class="m_box m_box-full">
                    <a class="m_box-link" href="{{ route('bbin.playGame') }}?gametype=ltlottery&devices=1">
                        <img src="{{ asset('/wap/images/m_box-lottory1.png') }}" alt="">
                          <span class="m_box-name">
                            BB彩票
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('YC', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('yc.playGame') }}?devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-lottory2.png') }}" alt="">
                        <span class="m_box-name">
                        YC彩票
                      </span>
                        </a>
                    </div>
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('yc.playGame') }}?gametype=Cash&devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-lottory3.png') }}" alt="">
                        <span class="m_box-name">
                        YC国彩
                      </span>
                        </a>
                    </div>
                @endif
            </div>

            {{--体育--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    体育赛事
                </div>
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('bbin.playGame') }}?gametype=ball&devices=1">
                            <img src="{{ asset('/wap/images/m_box-esports2.jpg') }}" alt="">
                          <span class="m_box-name">
                            BB体育
                          </span>
                        </a>
                    </div>
                @endif
                @if(in_array('IBC', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{ route('ibc.playGame') }}?devices=1">
                            {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                            <img src="{{ asset('/wap/images/m_box-esports3.png') }}" alt="">
                        <span class="m_box-name">
                        沙巴体育
                      </span>
                        </a>
                    </div>
                @endif
            </div>

            {{--优惠--}}
            <div class="m_wrapper clear">
                <div class="m_category">
                    优惠活动
                </div>
                <div class="m_box m_box-full">
                    <a class="m_box-link" href="{{ route('wap.activity_list') }}">
                        <img src="{{ asset('/wap/images/m_box-act2.png') }}" alt="">
                          <span class="m_box-name">
                            优惠活动
                          </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            $(function () {
                $('.disabled').on('click', function () {
                    alert('暂未开放，敬请期待！');
                });
            })
        })(jQuery)
    </script>

@endsection