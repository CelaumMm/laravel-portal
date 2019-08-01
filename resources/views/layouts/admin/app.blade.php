<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @section('title')
            Admin
            @show
    </title>

    @include('layouts.admin.partials.stylesheet')

    @yield('css')
    @stack('css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('js-head')
    @stack('js-head')
</head>

<body class="
        hold-transition
        skin-{{ config('adminlte.skin','blue') }}
        sidebar-mini
        @if(config('adminlte.layout'))
            {{ [
            'boxed' => 'layout-boxed',
            'fixed' => 'fixed',
            'top-nav' => 'layout-top-nav'
            ][config('adminlte.layout')] }}
        @endif

        @if(config('adminlte.collapse_sidebar'))
            ' sidebar-collapse '
        @endif
    ">

    <div class="wrapper">

        @include('layouts.admin.partials.topbar')

        @include('layouts.admin.partials.sidebar')

        @include('layouts.admin.partials.content')

        @include('layouts.admin.partials.footer')

        @include('layouts.admin.partials.control')

        <!-- Adicione o plano de fundo da barra lateral. Esta div deve ser colocado imediatamente após a barra lateral de controle -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @include('layouts.admin.partials.javascript')

    @yield('js')
    @stack('js')
</body>

</html>
