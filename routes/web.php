<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function () {
        Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::resource('users', 'UserController');
            Route::resource('roles', 'RoleController');
            Route::resource('permissions', 'PermissionController');

            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/home', 'HomeController@index');
        });

        // perfil do usuario
        Route::get('meu-perfil', 'Admin\ProfileController@edit')->name('profile.edit');
        Route::post('meu-perfil', 'Admin\ProfileController@update')->name('profile.update');

        // fotos do perfil
        Route::put('foto-update/{id}', 'Admin\ProfileController@updateFoto')->name('profile.foto-update');
        Route::delete('foto-destroy/{id}', 'Admin\ProfileController@destroyFoto')->name('profile.foto-destroy');

        // home
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/home', 'HomeController@index');

        Auth::routes();
    }
);
