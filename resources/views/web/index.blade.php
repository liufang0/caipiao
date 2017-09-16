@extends('web.layouts.main')
@section('after.js')

    <script type="text/javascript">

        if(/AppleWebKit.*mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))){

            if(window.location.href.indexOf("?mobile")<0){

                try{

                    if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)){

                        window.location.href="http://m.tianting888.com";

                    }else if(/iPad/i.test(navigator.userAgent)){

                        window.location.href="http://m.tianting888.com";

                    }else{

                        window.location.href="http://m.tianting888.com"

                    }

                }catch(e){}

            }

        }

    </script>
    @endsection

@section('content')
            <!--电子游戏banner-->
    <div class="egame-banner slide slide3 s1">
        <div class="demo">
            <div class="pane">
                <div class="icons">
                    <a href="javascript:;"><i class="img1 ico selected"></i></a>
                    <a href="javascript:;"><i class="img2 ico"></i></a>
                    <a href="javascript:;"><i class="img3 ico"></i></a>
                    <a href="javascript:;"><i class="img4 ico"></i></a>
                    <a href="javascript:;"><i class="img5 ico"></i></a>
                </div>
            </div>
        </div>

        <div class="slide_bg">
            <div class="slide_bg1 on"><a href="{{ route('web.lottory') }}" style="display: block;height: 100%"></a></div>
            <div class="slide_bg2"><a href="{{ route('web.liveCasino') }}" style="display: block;height: 100%"></a></div>
            <div class="slide_bg3"><a href="{{ route('web.esports') }}" style="display: block;height: 100%"></a></div>
            <div class="slide_bg4"><a href="{{ route('web.eGame') }}" style="display: block;height: 100%"></a></div>
            <div class="slide_bg5"><a href="{{ route('web.catchFish') }}" style="display: block;height: 100%"></a></div>
        </div>
    </div>

    <div id="modal-tit" class="modal modal-login">
        <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
            <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=189983035&site=qq&menu=yes">
                <img src="{{ asset('/web/images/modal-tit.jpg') }}" alt="">
            </a>
        </div>
    </div>
    <script>
        (function($){
            $(function(){
//                $('#modal-tit').modal();
            })
        })(jQuery);
    </script>

    <script src="{{ asset('/web/js/jquery.slide.js') }}"></script>

    <script type="text/javascript">
        $(".egame-banner").slidebigbg({mouseWheel:true,resizeWin:true});
    </script>
@endsection