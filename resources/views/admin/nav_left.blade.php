<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw">
                    <img style="max-width: 80%; height: auto; overflow: hidden;" src="assets/upload/logos/logo.png"
                         alt="logo.png">
                </i>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
        @if (Auth::check())
            <div class="profile_pic">
                <img src="{{ config('path.image_logo_admin') }}/img.jpg" alt="assets." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}
                    <small><i class="fa fa-circle" style="color: green"></i></small>
                </h2>
            </div>
        @endif
    </div>
    <!-- /menu profile quick info -->

    <br/>

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    </ul>
                </li>
                <li><a> <i class="fa fa-cubes"></i></i> Apartments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('apartments.index') }}">List of Apartments</a></li>
                        <li><a href="{{ route('apartments.create') }}">Create New Apartments</a></li>
                    </ul>
                </li>
                <li><a> <i class="fa fa-envelope"></i></i> Set-Calendar <button type="button" style="color: #ED1B1B ;font-size: 10px;border: 1px solid #dcdcdc;border-radius: 25px;">{{ $order }}</button><span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('set_calendars.index') }}">List of Set-Calendar</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-sitemap ion"></i>Category <span class="fa fa-chevron-down"></span></a>

                <li><a><i class="fa fa-sitemap ion"></i> Category <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">
                        <li><a href="{{ route('categories.index') }}">List of Categories</a></li>
                        <li><a href="{{ route('categories.create') }}">Create New Category</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Posts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('posts.index') }}">List of Posts</a></li>
                        <li><a href="{{ route('posts.create') }}">Create New Post</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('pages.index') }}">List of Pages</a></li>
                        <li><a href="{{ route('pages.create') }}">Create New Page</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i> Slides <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('slides.index') }}">List of Slides</a></li>
                        <li><a href="{{ route('slides.create') }}">Create New Slide</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-clone"></i> About Us <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('about_us.index') }}">List of AboutUs</a></li>
                        <li><a href="{{ route('about_us.create') }}">Create New AboutUs</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @role('admin')
        <div class="menu_section">
            <h3>Phân quyền</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-bug"></i> Permission <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('permissions.index') }}">List of Permissions</a></li>
                        <li><a href="{{ route('permissions.create') }}">Create New Permission</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-bug"></i> Role <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('roles.index') }}">List of Role</a></li>
                        <li><a href="{{ route('roles.create') }}">Create New Role</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @endrole

        <div class="menu_section">
            <h3>Managa User</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-bug"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('users.index') }}">List of User</a></li>

                        @role('admin')
                        <li><a href="{{ route('users.create') }}">Create New User</a></li>
                        @endrole
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
