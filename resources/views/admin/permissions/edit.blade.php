@extends('layouts.admin.app')
@section('title', trans('admin.permissions.edit'))
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
            <h3 class="box-title">
                <i class='fa fa-briefcase'></i> @lang('admin.permissions.edit'): {{$permission->name}}
            </h3>
        </div>

        {{-- Form model para preencher automaticamente os campos com dados da permissao --}}
        {{ Form::model($permission, array('route' => array('admin.permissions.update', $permission->id), 'method' => 'PUT')) }}
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('admin.name')) }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                @if(!$roles->isEmpty())
                    <h4>@lang('admin.permissions.assign.roles')</h4>

                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]', $role->id ) }} {{ Form::label($role->name, ucfirst($role->name)) }} <br>
                    @endforeach
                @endif
            </div>
            <div class="box-footer">
                {{ Form::button('<i class="fa fa-save"></i> '. trans('admin.save'), [
                    'type' => 'submit',
                    'class' => 'btn btn-success'
                ]) }}

                <a href="{{ route('admin.permissions.index') }}" class="btn btn-default">
                    <i class="fa fa-undo"></i> @lang('admin.return')
                </a>
            </div>

        {{ Form::close() }}

    </div>
</section>

@endsection
