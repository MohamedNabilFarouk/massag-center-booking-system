
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href='{{url("ar/admin")}}'><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 anks/view/7L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span>
                        <h2 class="brand-text">{{Session::get('configs')["site_title"]}}</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <style>
            .main-menu-content::-webkit-scrollbar {
                                    width: 5px;
                                }
        </style>
        <div class="main-menu-content" style="overflow-y: auto;">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                @if(App\Libs\Adminauth::user()->super_admin)
                <li class="{{(Request::is('admin/dashboard') || Request::is(App::getLocale().'/admin/dashboard'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/dashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">الصفحة الرئيسية</span></a>
                </li>

                @endif

                @if(App\Libs\ACL::can('view-areas') || App\Libs\ACL::can('view-govs') || App\Libs\ACL::can('view-cities') || App\Libs\ACL::can('view-countries'))
                <li class=" nav-item"><a class="{{(Request::is('admin/currencies*') || Request::is(App::getLocale().'/admin/currencies*')||Request::is('admin/govs*') || Request::is(App::getLocale().'/admin/govs*') || Request::is('admin/cities*') || Request::is(App::getLocale().'/admin/cities*') || Request::is('admin/countries*') || Request::is(App::getLocale().'/admin/countries*'))?'open':''}} d-flex align-items-center" href="#"><i data-feather='database'></i><span class="menu-title text-truncate" data-i18n="User">اعداد البيانات</span></a>
                    <ul class="menu-content">
                        @if(App\Libs\ACL::can('view-countries'))
                        <li class="{{(Request::is('admin/countries*') || Request::is(App::getLocale().'/admin/countries*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/countries')}}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">إدارة الدول</span></a>
                        </li>
                        @endif
                        @if(App\Libs\ACL::can('view-currencies'))
                        <li class="{{(Request::is('admin/currencies*') || Request::is(App::getLocale().'/admin/currencies*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/currencies')}}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">إدارة العملات</span></a>
                        </li>
                        @endif
                        @if(App\Libs\ACL::can('view-govs'))
                        <li class="{{(Request::is('admin/govs*') || Request::is(App::getLocale().'/admin/govs*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/govs')}}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">إدارة المحافظات</span></a>
                        </li>
                        @endif
                        @if(App\Libs\ACL::can('view-cities'))
                        <li class="{{(Request::is('admin/cities*') || Request::is(App::getLocale().'/admin/cities*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/cities')}}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">إدارة المدن</span></a>
                        </li>
                        @endif

                    </ul>
                </li>
                @endif


                @if(App\Libs\ACL::can('view-users') || App\Libs\ACL::can('view-admins'))
                <li class=" nav-item"><a class="{{(Request::is('admin/roles*') || Request::is(App::getLocale().'/admin/roles*') || Request::is('admin/admins*') || Request::is(App::getLocale().'/admin/admins*'))?'open':''}} d-flex align-items-center" href="#"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="User">المستخدمين</span></a>
                    <ul class="menu-content">
                        @if(App\Libs\ACL::can('view-admins'))
                        <li class="{{(Request::is('admin/admins*') || Request::is(App::getLocale().'/admin/admins*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/admins')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="User">إدارة المديرين</span></a>
                        </li>
                        <li class="{{(Request::is('admin/roles*') || Request::is(App::getLocale().'/admin/roles*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/roles')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="User">الوظائف و الصلاحيات</span></a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif




                @if(App\Libs\ACL::can('view-groups'))
                <li class="{{(Request::is('admin/groups*') || Request::is(App::getLocale().'/admin/groups*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/groups')}}"><i data-feather="credit-card"></i><span class="menu-title text-truncate" data-i18n="Card">إدارة المجموعات</span></a>
                </li>
                @endif

                @if(App\Libs\ACL::can('view-offices'))
                <li class="{{(Request::is('admin/offices*') || Request::is(App::getLocale().'/admin/offices*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/offices')}}"><i data-feather="credit-card"></i><span class="menu-title text-truncate" data-i18n="Card">إدارة المكاتب</span></a>
                </li>
                @endif

                @if(App\Libs\ACL::can('view-clients'))
                <li class="{{(Request::is('admin/clients*') || Request::is(App::getLocale().'/admin/clients*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/clients')}}"><i data-feather="credit-card"></i><span class="menu-title text-truncate" data-i18n="Card">إدارة العملاء</span></a>
                </li>
                @endif

                @if(App\Libs\ACL::can('view-packages'))
                <li class="{{(Request::is('admin/packages*') || Request::is(App::getLocale().'/admin/packages*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/packages')}}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">إدارة الباقات</span></a>
                </li>
                @endif

                @if(App\Libs\ACL::can('view-transfers'))
                <li class="{{(Request::is('admin/transfers*') || Request::is(App::getLocale().'/admin/transfers*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url(App::getLocale().'/admin/transfers')}}"><i data-feather="map"></i><span class="menu-title text-truncate" data-i18n="Leaflet Maps">إدارة التحويلات</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
