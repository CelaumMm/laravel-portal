<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>@lang('admin.version')</b> {{ config('adminlte.version') }}
    </div>
    <div class="text-center">
        • @lang('admin.all_rights_reserved') {{ config('adminlte.since_year') }}-{{ Carbon\carbon::now()->year }} &copy;
        <a href="{{ route('home') }}"><b>{{ config('adminlte.footer_name') }}</b></a> •
        @lang('admin.produced_by') <a href="{{ config('adminlte.produced_url') }}"><b>{{ config('adminlte.produced_by') }}</b></a> •
    </div>
</footer>
