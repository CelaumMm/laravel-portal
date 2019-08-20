@extends('layouts.admin.app')
@section('title', trans('admin.users.edit'))
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
                <i class='fa fa-pencil'></i> @lang('admin.users.edit'): {{$user->name}}
            </h3>
        </div>

        {{-- Form model para preencher automaticamente os campos com dados do usuário --}}
        {{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'method' => 'PUT')) }}
            <div class="box-body">

                <div class="form-group">
                    {{ Form::label('name', trans('admin.name')) }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', trans('admin.email')) }}
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>

                <div class='form-group'>
                    <h5><b>@lang('admin.roles.assign')</b></h5>

                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]', $role->id, $user->roles ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}
                        <br>
                    @endforeach
                </div>

                <div class='form-group'>
                    <h5><b>@lang('admin.permissions.assign')</b></h5>

                    @foreach ($permissions as $permission)
                        {{ Form::checkbox('permissions[]', $permission->id, $user->permissions ) }}
                        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endforeach
                </div>

                <div class="form-group">
                    {{ Form::label('password', trans('admin.password')) }}<br>
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', trans('admin.password_confirmation')) }}<br>
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="box-footer">
                    {{ Form::button('<i class="fa fa-save"></i> '. trans('admin.save'), [
                        'type' => 'submit',
                        'class' => 'btn btn-success'
                    ]) }}

                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                        <i class="fa fa-undo"></i> @lang('admin.return')
                    </a>
            </div>
        {{ Form::close() }}

    </div>
</section>

@endsection
