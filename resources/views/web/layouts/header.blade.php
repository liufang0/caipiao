<nav class="navbar" id="w0">
    <div class="container header">
        <div class="navbar-header-logo">
            <a href="{{ route('web.index') }}" class="navbar-brand"><img src="{{ $_system_config->site_logo}}"/></a>
        </div>

        <div class="navbar-header-logo" style=" padding-left: 0px;padding-top: 10px;padding-bottom: 0">
            <a href="javascript:;" class="navbar-brand"><img src="{{ asset('/web/images/t6-logojj.png') }}"/></a>
        </div>
        @if (Auth::guard('member')->guest())
            <ul class="navbar-nav navbar-right nav nav-user">
                <li class="menu-user" style=" margin-top: 20px;position: relative;">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <input type="text" id="username" placeholder="会员账号" autocomplete="off" class="header-input" name="name"/>
                        <input type="password" id="password" placeholder="会员密码" autocomplete="off" class="header-input" name="password"/>
                        <input type="text" id="code" placeholder="验证码" autocomplete="off" class="header-input code" name="captcha"/>
                        <a onclick="javascript:re_captcha();" >
                            <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff6" style="width: 106px;border-radius: 2px;cursor: pointer;vertical-align: middle;display: inline-block;margin: 0;height: 36px"></a>
                        <script>
                            function re_captcha() {
                                $url = "{{ URL('kit/captcha') }}";
                                $url = $url + "/" + Math.random();
                                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
                            }
                        </script>
                        {{--<img  title="看不清？点击刷新" style="width: 106px;display: none;border-radius: 2px;cursor: pointer;vertical-align: middle; height: 34px;" id="captchaimg"/>--}}
                        <input type="submit" value="登陆" class="btn btn-red ajax-submit-btn" style="padding:5px 20px;width: 70px;height: 32px"/>
                        <a style="color:#cdcdd0;margin-right: 10px" href="{{ route('web.register_one') }}" title="试玩注册">试玩注册</a>
                        <a class="daili_apply" href="javascript:;" title="代理申请">代理申请</a>
                        {{--<a href="javascript:;" class="layershow" style="color:#cdcdd0"--}}
                           {{--data-url="/index.php?forgotpassword" title="找回密码">忘记密码</a>--}}
                    </form>
                </li>
            </ul>
        @else
            <div class="collapse navbar-collapse" id="w0-collapse">
                <ul class="navbar-nav navbar-right nav nav-user">
                    <li class="menu-user">
                            <span aria-hidden="true" class="icon-user" style=" position: relative">
                                {{--<i title="站内信息" class="msgnum layershow"--}}
                                   {{--data-url="/?controller=user&amp;action=messages">0</i>--}}
                            </span>
                        <div style="display:inline-block;padding: 17px 0 0px 10px;float: left">
                            <span>欢迎您！</span><br>
                            <a href="{{ route('member.userCenter') }}">
                                <span class="username layershow" title="个人中心"
                                      data-url="/?controller=user&action=changename" style="cursor: pointer">{{ $_member->name }}</span>
                            </a>
                            <a   href="{{ route('member.logout') }}"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                 class="quit_btn" style="float:right;line-height: 20px;margin-left: 5px;">[退出]</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>

                    </li>
                    <span class="space-line" style="margin-right: 0px;margin-left: 0px"></span>
                    <li class="menu-user-found">
                        <div style="padding: 14px 0px;">
                            可用余额：<span class="user-balance" style="cursor: pointer;" title="可用余额"
                                       id="user-balance">{{ $_member->money }}</span>
                             <a href="javascript:;" style="float:right;line-height: 20px;margin-left: 5px;">[刷新]</a>
                            <br/>
                            <a class="daili_apply" href="javascript:;">代理申请</a>
                            {{--可用积分：<span class="user-balance" id="user-credit">0</span> <a href="javascript:;"--}}
                                                                                         {{--onclick="Suke.common.user.point2cash()"--}}
                                                                                         {{--style="float:right;line-height: 20px;margin-left: 5px;">[兑换]</a>--}}
                        </div>
                    </li>
                    <span class="space-line" style="margin-right: 0px;margin-left: 0px"></span>
                    <li class="menu-action">
                        <a aria-hidden="true" title="充值" href="{{ route('member.finance_center') }}"
                           class="icon-cz"></a>
                        <a aria-hidden="true" title="提现" href="{{ route('member.update_bank_info') }}"
                           class="icon-tk"></a>
                        <a aria-hidden="true" title="转账" href="{{ route('member.indoor_transfer') }}"
                           class="icon-zz"></a>
                    </li>
                </ul>

            </div>
        @endif
    </div>
</nav>

<!--半透明遮罩层-->
<div class="backdrop"></div>