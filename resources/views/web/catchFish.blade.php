@extends('web.layouts.main')
@section('content')
    <div class="body">
        <div class="by-bg">
            <div class="container by-nr">
                <div class="pullLeft ag-by-bg">
                    <a class="pullLeft" href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?gametype=6','','width=1024,height=768')" @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif></a>
                </div>
                <div class="pullLeft pt-by-bg">
                    <a class="pullLeft" @if($_member) onclick="javascript:window.open('{{ route('pt.playGame') }}?gametype=cashfi','','width=1024,height=768')" @else onclick="return layer.msg('请先登录!',{icon:6})"  @endif href="javascript:;"></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.disabled').on('click',function(){
                layer.msg('暂未开放，敬请期待',{icon:6});
            });
        })
    </script>

@endsection