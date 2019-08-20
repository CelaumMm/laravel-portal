@extends('layouts.admin.app')

@section('title', 'Admin :: Home')

@section('content')

    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bem-vindo</h3>
            </div>

            <div class="box-body">
                <p>{{ Auth::user()->name }}</p>
            </div>

            <div class="box-footer">
                Footer
            </div>
        </div>
    </section>

@endsection
