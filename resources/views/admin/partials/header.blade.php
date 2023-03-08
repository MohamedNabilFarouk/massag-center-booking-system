    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">

            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{@App\Libs\Adminauth::user()->name}}</span><span class="user-status"></span></div><span class="avatar"><img class="round" src="{{url('uploads/admin_images')}}/{{@App\Libs\Adminauth::user()->profile_img}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{url('admin/admins/edit-account')}}"><i class="mr-50" data-feather="user"></i> بيانات الحساب</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('admin/admins/change-password')}}"><i class="mr-50" data-feather="settings"></i> تغيير كلمة السر</a>

                        <a class="dropdown-item" href="{{url('admin/auth/logout')}}"><i class="mr-50" data-feather="power"></i> تسجيل خروج</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- END: Header-->
