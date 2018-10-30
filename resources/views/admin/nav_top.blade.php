<div class="nav_menu">
    <nav>
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                   aria-expanded="false">
                    @if (Auth::check())
                        <img src="assets/upload/config/img.jpg" alt="">
                        <span class=" fa fa-angle-down">
              {{ Auth::user()->name }}
            </span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="admin/logOut"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
            </li>
            {{--i18n --}}
            <li role="presentation" class="dropdown">
                <a href="javascript:" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-language"></i>
                    <span id="current_lang" class="public-icon">
                    </span>{{ trans('config.language') }}<span class="caret">
                    </span>
                </a>
                <ul id="lang" class="dropdown-menu " style="z-index: 999999">
                    <li><a href="{!! route('change_lang',['vi']) !!}">
                            <img id="vi" src="assets/upload/config/vn.png" alt=""> Việt Nam
                        </a>
                    </li>
                    <li><a href="{!! route('change_lang',['en']) !!}">
                            <img src="assets/upload/config/en.png" alt="">
                            English
                        </a>
                    </li>
                </ul>
            </li>
            {{--end i18n--}}

         {{--    <ul class="nav navbar-nav">
                <li class="dropdown dropdown-notifications">
                    <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                        <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                    </a>

                    <div class="dropdown-container">
                        <div class="dropdown-toolbar">
                            <div class="dropdown-toolbar-actions">
                                <a href="#">Mark all as read</a>
                            </div>
                            <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                        </div>
                        <ul class="dropdown-menu">
                        </ul>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All</a>
                        </div>
                    </div>
                </li>
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Friends</a></li>
            </ul> --}}

            <li role="presentation" class="dropdown dropdown-notifications">
                <a href="#notifications-panel" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                </a>
                <ul class="dropdown-menu">
                    <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                    <li>
                        <div class="text-center">
                            <a>
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
