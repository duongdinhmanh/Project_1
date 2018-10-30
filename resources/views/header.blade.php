<header class="main-header sticky-header" id="main-header-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded">
                    <a class="navbar-brand logo navbar-brand d-flex w-50 mr-auto" href="">
                        <img src="assets/upload/logos/logo.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="navbar-collapse collapse w-100" id="navbar">
                        <ul class="navbar-nav w-100 justify-content-center" id="menu">
                            @foreach ($cat_parent as $c_parent)
                                <li class="nav-item dropdown active">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $c_parent->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach ($c_parent->childs as $cat_child)
                                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">{{ $cat_child->name }}</a>
                                            <ul class="dropdown-menu">
                                                @foreach ($cat_child->childs as $cat_child2)
                                                <li><a class="dropdown-item" href="properties-list-rightside.html">{{ $cat_child2->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="nav navbar-nav ml-auto justify-content-end" id="customer">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-language"></i>
                                    {{ trans('config.language') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                    <a class="dropdown-item" href="{!! route('change_lang',['vi']) !!}">
                                        <img id="vi" src="assets/upload/config/vn.png" alt=""> Việt Nam
                                    </a>
                                     <a class="dropdown-item" href="{!! route('change_lang',['vi']) !!}">
                                        <img src="assets/upload/config/en.png" alt=""> English
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                @if (Auth::check() && Auth::user()->role == 2)
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Xin Chào :  {{ Auth::user()->email }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                        <a class="dropdown-item" href="{{ route('log-out') }}">Thoát</a>
                                        <a class="dropdown-item" href="">Đăng Bài</a>
                                    </div>
                                @else
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Đăng Nhập
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                        <a class="dropdown-item" href="contact-1.html">Đăng Ký</a>
                                        <a class="dropdown-item" data-toggle="modal" href='#modal-login' data-toggle="modal">Đăng Nhập</a>
                                    </div>
                                @endif
                            </li>
                             <li class="nav-item">
                                <a class="open-offcanvas" href="#" style="padding-top: 30px">
                                    <span>Menu</span>
                                    <span class="fa fa-bars"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
