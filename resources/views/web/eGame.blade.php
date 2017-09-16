@extends('web.layouts.main')
@section('content')

    <div class="body" style="background: url('{{ asset('/web/images/egame-banner.jpg') }}') no-repeat;">
        <div class="container tbbg-margin">
            <div class="notice clear" style="margin-top:-220px">
                <div class="notice-bg"></div>
                <div class="notice-title pullLeft">
                    <div class="notice-title_bg"></div>
                    <span class="bg-icon pullLeft"></span>
                    系统公告
                </div>
                <marquee id="mar0" scrollAmount="4" direction="left" onmouseout="this.start()"
                         onmouseover="this.stop()">
                    @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    @endforeach
                </marquee>
            </div>
            <div class="egameslide">
                <div class="hd">
                    <ul>
                        @if(in_array('PT', $_api_list))
                            <li class="on">
                                {{--<img class="isComing" src="{{ asset('/web/images/isComing2.png') }}" alt="">--}}
                                <p class="pic">
                                    <img src="{{ asset('/web/images/app-bg-pt1.png') }}" class="default">
                                    <img src="{{ asset('/web/images/app-bg-pt2.png') }}" class="activepic">
                                </p>
                                <p class="tit">PT厅</p>
                            </li>
                        @endif
                        @if(in_array('MG', $_api_list))
                            <li>
                                <p class="pic">
                                    <img src="{{ asset('/web/images/app-bg-mg1.png') }}" class="default">
                                    <img src="{{ asset('/web/images/app-bg-mg2.png') }}" class="activepic">
                                </p>
                                <p class="tit">MG厅</p>
                            </li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <li>
                                <p class="pic">
                                    <img src="{{ asset('/web/images/app-bg-by1.png') }}" class="default">
                                    <img src="{{ asset('/web/images/app-bg-bb2.png') }}" class="activepic">
                                </p>
                                <p class="tit">BB厅</p>
                            </li>
                        @endif
                        @if(in_array('SA', $_api_list))
                            <li>
                                {{--<img class="isComing" src="{{ asset('/web/images/isComing2.png') }}" alt="">--}}
                                <p class="pic">
                                    <img src="{{ asset('/web/images/app-bg-sa1.png') }}" class="default">
                                    <img src="{{ asset('/web/images/app-bg-sa2.png') }}" class="activepic">
                                </p>
                                <p class="tit">SA厅</p>
                            </li>
                        @endif
                        @if(in_array('DT', $_api_list))
                            <li>
                                {{--<img class="isComing" src="{{ asset('/web/images/isComing2.png') }}" alt="">--}}
                                <p class="pic">
                                    <img src="{{ asset('/web/images/app-bg-dt1.png') }}" class="default">
                                    <img src="{{ asset('/web/images/app-bg-dt2.png') }}" class="activepic">
                                </p>
                                <p class="tit">DT厅</p>
                            </li>
                        @endif
                        @if(in_array('TTG', $_api_list))
                            <li>
                                {{--<img class="isComing" src="{{ asset('/web/images/isComing2.png') }}" alt="">--}}
                                <p class="pic">
                                    <img src="{{ asset('/web/images/app-bg-ttg1.png') }}" class="default">
                                    <img src="{{ asset('/web/images/app-bg-ttg2.png') }}" class="activepic">
                                </p>
                                <p class="tit">TTG厅</p>
                            </li>
                        @endif
                        @if(in_array('AG', $_api_list))
                            <div class="last">
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?gametype=8','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                    <p class="pic">
                                        <img src="{{ asset('/web/images/app-bg-ag1.png') }}" style="display: inline;">
                                    </p>
                                    <p class="tit">AG电子游戏</p>
                                </a>
                            </div>
                        @endif

                    </ul>
                </div>
                <div class="bd">
                    @if(in_array('PT', $_api_list))
                        {{--pt--}}
                        <div class="module">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="{{ asset('/web/images/pt-pic-bz.png') }}">PT厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                </div>
                            </div>
                            <div class="bodylist">
                                <div class="egame_list">
                                   <ul>
                                       @foreach(config('game_list.pt.web') as $item)
                                           <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                               <a href="javascript:;"
                                                  @if($_member) onclick="javascript:window.open('{{ route('pt.playGame') }}?gametype={{ $item['id'] }}','','width=1024,height=768')"
                                                  @else onclick="return alert('请先登录！')" @endif>
                                                   <?php $img_path = $item['img'];?>
                                                   <img data-original="{{ asset("/web/images/games/pt/$img_path")}}" class="lazy">
                                                   <p class="collect">{{ $item['name'] }}</p>
                                                   <span class="button">开始游戏</span>
                                               </a>
                                           </li>
                                       @endforeach
                                   </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(in_array('MG', $_api_list))
                        {{--mg--}}
                        <div class="module">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="{{ asset('/web/images/pt-pic-bz.png') }}">MG厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                </div>
                            </div>
                            <!--MG-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        @foreach(config('game_list.mg.web') as $item)
                                            <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                                <a href="javascript:;"
                                                   @if($_member) onclick="javascript:window.open('{{ route('mg.playGame') }}?gametype={{ $item['id'] }}','','width=1024,height=768')"
                                                   @else onclick="return alert('请先登录！')" @endif>
                                                    <?php $img_path = $item['img'];?>
                                                    <img data-original="{{ asset("/web/images/games/mg/$img_path")}}"
                                                         class="lazy">
                                                    <p class="collect">{{ $item['name'] }}</p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        {{--BB--}}
                        <div class="module bbinGame">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="{{ asset('/web/images/pt-pic-bz.png') }}">BB厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                </div>
                            </div>
                            <!--bb-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        @foreach(config('game_list.bbin.web') as $item)
                                            <li class="scrollLoading" style="width: 180px;height: 180px">
                                                <a href="javascript:;"
                                                   @if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?gametype={{ $item['id'] }}','','width=1024,height=768')"
                                                   @else onclick="return alert('请先登录！')" @endif>
                                                    <?php $img_path = $item['img'];?>
                                                    <div class="pic"><img
                                                                data-original="{{ asset("/web/images/games/bbin/$img_path")}}"
                                                                class="lazy"></div>
                                                    <p class="collect">{{ $item['name'] }}</p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(in_array('SA', $_api_list))
                        {{--sa--}}
                        <div class="module saGame">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="{{ asset('/web/images/pt-pic-bz.png') }}">SA厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                </div>
                            </div>
                            <div class="bodylist">
                                <div class="egame_list">

                                    <ul>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-S007','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/zombieHunter.png')}}"
                                                            class="lazy"></div>
                                                <p class="collect">丧尸猎人</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-S006','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/volleybeauties.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">美女沙排</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-S005','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/AngelsDemons.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">魔鬼天使</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-S004','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/BeckoningGirls.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">幸运喵星人</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('pt.playGame') }}?gametype=EG-SLOT-A008','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/redChamber.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">红楼春梦</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A002','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/ThreeStarGod.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">三星报喜</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A004','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/DragonTiger.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">龙虎</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A018','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/CheungPoTsai.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">张保仔</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-S007','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/FantasyGoddess.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">梦幻女神</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A006','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/JiGong.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">济公</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A001','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/NewYearRich.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">过大年</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A020','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/goldenchicken.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">运财金鸡</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A015','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/FruitPoppers.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">脆爆水果</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A017','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/LionDance.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">南北狮王</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A003','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/guard.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">锦衣卫</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A013','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/Bikini.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">比基尼狂热</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A012','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/CreepyCuddlers.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">趣怪丧尸</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A009','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/Classmate.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">同校生</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-S003','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/WongFaiHung.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">黄飞鸿</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A016','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/Fish.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">热带宝藏</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A010','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/FunnyFarm.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">欢乐农场</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A020','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/goldenchicken.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">运财金鸡</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                        <li class="scrollLoading" style="width: 180px;height: 180px">
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}?gametype=EG-SLOT-A015','','width=1024,height=768')"
                                               @else onclick="return alert('请先登录！')" @endif>
                                                <div class="pic"><img
                                                            data-original="{{ asset('/web/images/games/sa/FruitPoppers.jpg')}}"
                                                            class="lazy"></div>
                                                <p class="collect">脆爆水果</p>
                                                <span class="button">开始游戏</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(in_array('DT', $_api_list))
                        {{--dt--}}
                        <div class="module">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="{{ asset('/web/images/pt-pic-bz.png') }}">DT厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                </div>
                            </div>
                            <!--dt-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        @foreach(config('game_list.dt.web') as $item)
                                            <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                                <a href="javascript:;"
                                                   @if($_member) onclick="javascript:window.open('{{ route('dt.playGame') }}?gametype={{ $item['id'] }}','','width=1024,height=768')"
                                                   @else onclick="return alert('请先登录！')" @endif>
                                                    <?php $img_path = $item['img'];?>
                                                    <img data-original="{{ asset("/web/images/games/dt/$img_path")}}"
                                                         class="lazy">
                                                    <p class="collect">{{ $item['name'] }}</p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(in_array('TTG', $_api_list))
                        {{--ttg--}}
                        <div class="module">
                            <div class="top">
                                <div class="egameTit"></div>
                                <div class="egame_filter_top">
                                    <span class="title"><img src="{{ asset('/web/images/pt-pic-bz.png') }}">TTG厅</span>
                                    <span class="list_wrap active"><a href="javascript:void(0)"
                                                                      class="list ">全部</a></span>
                                </div>
                            </div>
                            <!--ttg-->
                            <div class="bodylist">
                                <div class="egame_list mg_game">
                                    <ul>
                                        @foreach(config('game_list.ttg.wap') as $item)
                                            <li class="scrollLoading" style="width: 130px;height: 168.44px">
                                                <a href="javascript:;"
                                                   @if($_member) onclick="javascript:window.open('{{ route('ttg.playGame') }}?gametype={{ $item['id'] }}','','width=1024,height=768')"
                                                   @else onclick="return alert('请先登录！')" @endif>
                                                    <?php $img_path = $item['img'];?>
                                                    <img data-original="{{ asset("/wap/images/newgame/$img_path")}}"
                                                         class="lazy">
                                                    <p class="collect">{{ $item['name'] }}</p>
                                                    <span class="button">开始游戏</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <div class="notice_layer">
        <h3>公告详情 <span class="close"></span></h3>
        <div class="notice_con">
            @foreach($_system_notices as $v)
                <div class="module">
                    <h4>{{ $v->title }}</h4>
                    <p>✿{{ $v->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        (function ($) {
            $(function () {
                $('.live-ul li').on('mouseenter', function () {
                    $(this).addClass('on').siblings('li').removeClass('on');
                });
                $('.egameslide').on('click', '.disabled', function () {
                    layer.msg('暂未开通，敬请期待！', {icon: 6});
                    return false;
                });
                jQuery(".egameslide").slide({trigger: "click", mainCell: ".bd"});

                $("img.lazy").lazyload({
                    placeholder: "{{ asset('/web/images/egame-loading.gif') }}",
                    effect: "fadeIn",
                    skip_invisible: false  //解决滚动才显示的问题
                });

                //公告
                $('#mar0').on('click', function () {
                    var notice_index = layer.open({
                        type: 1,
                        title: false,
                        closeBtn: 0,
                        area: ['680px'],
                        skin: 'layui-layer-nobg', //没有背景色
                        shadeClose: true,
                        content: $('.notice_layer')
                    });

                    $('.notice_layer').on('click', '.close', function () {
                        layer.close(notice_index)
                    })
                })


            });


        })(jQuery)
    </script>
@endsection