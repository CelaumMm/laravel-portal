@extends('layouts.admin.app')
@section('title', trans('admin.roles.create'))
@section('content')

@include('includes.alerts')

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
            <h3 class="box-title"><i class='fa fa-wrench'></i> @lang('admin.roles.create')</h3>
        </div>

        {{ Form::open(array('url' => route('admin.roles.store'))) }}
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('admin.name')) }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>@lang('admin.permissions.assign')</b></h5>

                <div class='form-group'>
                    @foreach ($permissions as $permission)
                        {{ Form::checkbox('permissions[]', $permission->id ) }}
                        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endforeach
                </div>

            </div>

            <div class="box-footer">
                {{ Form::button(
                    '<i class="fa fa-save"></i> ' . trans('admin.save'), [
                    'type' => 'submit',
                    'class' => 'btn btn-success'
                ]) }}

                <a href="{{ route('admin.roles.index') }}" class="btn btn-default">
                    <i class="fa fa-undo"></i> @lang('admin.return')
                </a>
            </div>
        {{ Form::close() }}

    </div>
</section>

@endsection
