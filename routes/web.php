<?php
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset');
        Route::get('socialite/{provider}', 'AuthController@redirectToProvider');
        Route::get('socialite/{provider}/callback', 'AuthController@handleProviderCallback');
    });
    Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'roles'], 'block' => ['null']], function () {
        Route::group(['roles' => ['User', 'Author', 'Moderator', 'Admin']], function () {
            Route::get('/', 'AdminController@index')->name('admin.index');
            Route::get('profile', 'ProfileController@index')->name('profile.index');
            Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('profile/{id}/updateedit', 'ProfileController@updateedit')->name('profile.updateedit');
            Route::get('profile/{id}/password', 'ProfileController@password')->name('profile.password');
            Route::put('profile/{id}/updatepassword', 'ProfileController@updatepassword')->name('profile.updatepassword');
            Route::delete('profile/{id}', 'ProfileController@destroy')->name('profile.destroy');
            Route::resource('url', 'UrlController');
        });
        Route::group(['roles' => ['Admin']], function () {
            Route::resource('users', 'UserController');
            Route::get('roles', 'RoleController@index')->name('roles.index');
            Route::get('role/{id}', 'RoleController@show')->name('roles.show');
            Route::get('roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
            Route::put('roles/{id}', 'RoleController@update')->name('roles.update');
            Route::get('settings', 'AdminController@settings')->name('admin.settings');
            Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
        });
    });
    Route::namespace('Site')->group(function () {

    });
    Route::redirect('/', 'admin', 301);

});


