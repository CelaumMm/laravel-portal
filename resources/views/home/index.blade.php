@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="container">
    @include('includes.alerts')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1><i class='fa fa-wrench'></i> Em construção</h1>
                </div>

                <div class="card-body">
                    <h4><b>Usuários para teste</b></h4>
                    <hr>
                    <h5>ADMIN</h5>
                    <h5><b>Usuario:</b> admin@admin.com</h5>
                    <h5><b>Senha:</b> 123456</h5>
                    <hr>
                    <h5>USER</h5>
                    <h5><b>Usuario:</b> user@user.com</h5>
                    <h5><b>Senha:</b> 123456</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    body, html {
        height: 100%;
        margin: 0;
    }
    body {
        background-image: url('/svg/construction.svg');
        background-position: center;
        background-repeat: no-repeat;
        background-size:auto 100%;
    }

    main .container {
        width: 500px;
        opacity: 0.8;
        filter: alpha(opacity=80);
    }
</style>
@endpush
