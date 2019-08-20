<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>C</b>S') !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{!! config('adminlte.logo', '<b>Code</b>site') !!}</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                {{-- @foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
                    @if (LaravelLocalization::getCurrentLocale() != $localeCode)
                        <li>
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <i class="{{ config('adminlte.icon_' . $localeCode) }}" style="font-size: 1.4em"></i>
                            </a>
                        </li>
                    @endif
                @endforeach --}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="{{ config('adminlte.icon_' . LaravelLocalization::getCurrentLocale()) }}" style="font-size: 1.4em"></i>

                        <span class="label label-danger">{{ count(LaravelLocalization::getSupportedLocales()) }}</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
                            @if (LaravelLocalization::getCurrentLocale() != $localeCode)
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <i class="{{ config('adminlte.icon_' . $localeCode) }}" style="font-size: 1.4em"></i>
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                {{-- <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ asset('admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ asset('admin-lte/dist/img/user3-128x128.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ asset('admin-lte/dist/img/user4-128x128.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ asset('admin-lte/dist/img/user3-128x128.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ asset('admin-lte/dist/img/user4-128x128.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            <i class="fa fa-warning text-yellow"></i>
                                            Very long description here that may not fit into the page and may cause design problems
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li> --}}

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if( !is_null(Auth::user()->avatar_id) && !empty(Auth::user()->avatar_id) && !is_null(Auth::user()->getMedia('avatar')->first() ) )
                            <img class="user-image" src="{{ Auth::user()->avatar->getUrl('thumb') }}" alt="{{ Auth::user()->name }}">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        @else
                            <img class="user-image" src="{{ asset('img/no-user.png') }}" alt="{{ Auth::user()->name }}">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if( !is_null(Auth::user()->avatar_id) && !empty(Auth::user()->avatar_id) && !is_null(Auth::user()->getMedia('avatar')->first() ) )
                                <img class="img-circle" src="{{ Auth::user()->avatar->getUrl('thumb') }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img class="img-circle" src="{{ asset('img/no-user.png') }}" alt="{{ Auth::user()->name }}">
                            @endif

                            <p>
                                {{ Auth::user()->name }}
                                <small>@lang('admin.member.since') {{ Auth::user()->created_at->toFormattedDateString() }}</small>
                            </p>
                        </li>
                        {{-- <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">@lang('admin.followers')</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">@lang('admin.sales')</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">@lang('admin.friends')</a>
                                </div>
                            </div>
                        </li> --}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">
                                    <i class="fa fa-user"></i> @lang('admin.profile')
                                </a>
                            </div>

                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i> @lang('admin.logout')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
