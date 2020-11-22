<div class="header-top hidden-sm-down">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="header-top-left col-lg-6 col-md-6 d-flex justify-content-start align-items-center">
                    <div class="detail-email d-flex align-items-center justify-content-center">
                        <i class="icon-email"></i>
                        <p>Email :  </p>
                        <span>
                  kerolesmonsef@gmail.com
                </span>
                    </div>
                    <div class="detail-call d-flex align-items-center justify-content-center">
                        <i class="icon-deal"></i>
                        <p>Today Deals </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center header-top-right">
                    <div class="register-out">
                        <i class="zmdi zmdi-account"></i>
                        @guest()
                            <a class="register" href="{{ route('register') }}" data-link-action="display-register-form">
                                Register
                            </a>
                            <span class="or-text">or</span>
                            <a class="login" href="{{ route('login') }}" rel="nofollow" title="تسجيل الدخول إلى حسابك">
                                Sign in
                            </a>
                        @endguest

                        @auth
                            <a class="login" href="{{ route('login') }}" rel="nofollow" title="تسجيل الدخول إلى حسابك"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth



                    </div>

                    <!-- begin module:ps_currencyselector/ps_currencyselector.tpl -->
                    <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_currencyselector/ps_currencyselector.tpl -->
                    <div id="_desktop_currency_selector"
                         class="currency-selector groups-selector hidden-sm-down currentcy-selector-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                             role="main">
                            <span class="expand-more">GBP</span>
                        </div>
                        <div class="currency-list dropdown-menu">
                            <div class="currency-list-content text-left">
                                <div class="currency-item current flex-first">
                                    <a title="جنيه إسترليني" rel="nofollow"
                                       href="http://demo.bestprestashoptheme.com/savemart/ar/?home=home_3&amp;SubmitCurrency=1&amp;id_currency=1">UK£
                                        GBP</a>
                                </div>
                                <div class="currency-item">
                                    <a title="دولار أمريكي" rel="nofollow"
                                       href="http://demo.bestprestashoptheme.com/savemart/ar/?home=home_3&amp;SubmitCurrency=1&amp;id_currency=2">US$
                                        USD</a>
                                </div>
                            </div>
                        </div>
                    </div>



                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="main">
                            <span class="expand-more">
                                {{ \App\Models\Language::where("short_cut",'=',get_default_lang())->first()->name ?? "English" }}
                            </span>
                        </div>
                        <div class="language-list dropdown-menu">
                            <div class="language-list-content text-left">
                                @foreach(\App\Models\Language::all() as $language)
                                    <a href="{{ route('set.language',$language->short_cut) }}" class="dropdown-item py-2"> <span
                                            class="mr-1"> {{ $language->name }}
                                        </span>
                                    </a>

{{--                                    <div class="language-item {{ $language->short_cut == get_default_lang() ? "current flex-first": "" }}">--}}
{{--                                        <div  class=""  >--}}
{{--                                            <a href="{{ route('set.language',$language->short_cut) }}">--}}
{{--                                                <span> {{ $language->name }}</span>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_languageselector/ps_languageselector.tpl -->
                    <!-- end module:ps_languageselector/ps_languageselector.tpl -->

                </div>
            </div>
        </div>
    </div>
</div>
