<?php
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset');
    });
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'roles'], 'block' => ['null']], function () {
        Route::group(['roles' => ['User', 'Author', 'Moderator', 'Admin']], function () {
            Route::get('/', 'AdminController@index')->name('admin.index');
            Route::get('profile', 'ProfileController@index')->name('profile.index');
            Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('profile/{id}/edit', 'ProfileController@updateedit');
            Route::get('profile/{id}/password', 'ProfileController@password')->name('profile.password');
            Route::put('profile/{id}/password', 'ProfileController@updatepassword');
            Route::delete('profile/{id}', 'ProfileController@destroy')->name('profile.destroy');
            Route::resource('urls', 'UrlController');
        });
        Route::group(['roles' => ['Admin']], function () {
            Route::resource('users', 'UserController');
            Route::get('roles', 'RoleController@index')->name('roles.index');
            Route::get('role/{id}', 'RoleController@show')->name('roles.show');
            Route::get('roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
            Route::put('roles/{id}', 'RoleController@update')->name('roles.update');
            Route::get('settings', 'AdminController@settings')->name('admin.settings');
        });
    });
    Route::namespace('Site')->group(function () {
        Route::get('/', 'SiteController@index')->name('site.index');
        Route::put('/', 'SiteController@submit');
        Route::get('anonymous/{id}', 'SiteController@anonymous')->name('site.anonymous')->where('id', '[\w\d\-\_]+');
        Route::get('url/{id}', 'SiteController@url')->name('site.url')->where('id', '[\w\d\-\_]+');
    });
});


