@inject('request', 'Illuminate\Http\Request')

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if( !is_null(Auth::user()->avatar_id) && !empty(Auth::user()->avatar_id) && !is_null(Auth::user()->getMedia('avatar')->first() ) )
                    <img class="img-circle" src="{{ Auth::user()->avatar->getUrl('thumb') }}" alt="{{ Auth::user()->name }}">
                @else
                    <img class="img-circle" src="{{ asset('img/no-user.png') }}" alt="{{ auth()->user()->name }}">
                @endif
            </div>
            <div class="pull-left info" style="position: static;">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        -->

        <ul class="sidebar-menu" data-widget="tree">

            {{--  <li class="header">@lang('admin.management')</li>  --}}

            <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span>@lang('admin.dashboard')</span></a></li>
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> <span>@lang('admin.home_page')</span></a></li>

            @canany(['manage users', 'manage roles', 'manage permissions', 'manage debugger'])
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>@lang('admin.administration')</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('manage users')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-users"></i>
                            <span class="title">
                                @lang('admin.users')
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('manage roles')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-wrench"></i>
                            <span class="title">
                                @lang('admin.roles')
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('manage permissions')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('admin.permissions')
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('manage debugger')
                    <li><a href="{{ url('admin/debugger') }}"><i class="fa fa-bug"></i> <span>@lang('admin.debugger')</span></a></li>
                    @endcan
                </ul>
            </li>
            @endcanany

        </ul>
    </section>
</aside>

@prepend('js')
<script>
    $(function () {
        var url = window.location;

        // Se o ultima letra da url for / será removido
        if(url.href.slice(-1) == "/"){
            url.href = url.href.slice(0,-1)+ "";
        }

        // Para o menu da barra lateral inteiramente mas não cobre o treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        // Para treeview
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
    });
</script>
@endprepend
