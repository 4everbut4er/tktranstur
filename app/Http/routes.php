<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('page.main');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    // Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

//    $this->get('_generate_user', 'Auth\GenerateController@index');

//    Registration Routes...
//    $this->get('register', 'Auth\AuthController@showRegistrationForm');
//    $this->post('register', 'Auth\AuthController@register');

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');



    Route::get('', 'Web\PageController@mainPage')->name('main');
    Route::get('contact', 'Web\PageController@contactPage')->name('contact');
    Route::get('services', 'Web\PageController@servicesPage')->name('services');
    Route::get('services/{id}', 'Web\ServiceController@category')->name('services.detail');
    Route::get('catalog/bus', 'Web\CatalogController@bus')->name('catalog.bus');
    Route::get('catalog/bus/{id}', 'Web\CatalogController@busDetail')->name('catalog.bus.detail');
    Route::get('catalog/truck', 'Web\CatalogController@truck')->name('catalog.truck');
    Route::get('catalog/truck/{id}', 'Web\CatalogController@truckDetail')->name('catalog.truck.detail');
    Route::get('news', 'Web\NewsController@news')->name('news');
    Route::get('news/{id}', 'Web\NewsController@newsDetail')->name('news.detail');
    Route::post('feedback', 'Web\FeedbackController@send')->name('feedback');



    Route::get('admin', 'Admin\PageController@index')->name('admin');

    Route::get('admin/services', 'Admin\ServicesController@index')->name('admin.services');
    Route::get('admin/service/structure.json', 'Admin\ServicesController@structure')->name('admin.services.structure.json');
    Route::post('admin/services/structure/element.json', 'Admin\ServicesController@element')->name('admin.services.structure.element.json');
    Route::post('admin/services/structure/create.json', 'Admin\ServicesController@create')->name('admin.services.structure.create.json');
    Route::post('admin/services/structure/update.json', 'Admin\ServicesController@update')->name('admin.services.structure.update.json');
    Route::post('admin/services/structure/remove.json', 'Admin\ServicesController@remove')->name('admin.services.structure.remove.json');

    Route::get('admin/news', 'Admin\NewsController@index')->name('admin.news');
    Route::get('admin/news/add', 'Admin\NewsController@add')->name('admin.news.add');
    Route::get('admin/news/{id}/delete', 'Admin\NewsController@remove')->name('admin.news.delete');
    Route::get('admin/news/{id}/edit', 'Admin\NewsController@edit')->name('admin.news.edit');
    Route::post('admin/news/{id}/edit.json', 'Admin\NewsController@update')->name('admin.news.edit.json');
    Route::post('admin/news/add.json', 'Admin\NewsController@create')->name('admin.news.add.json');
    Route::post('admin/news/table.json', 'Admin\NewsController@table')->name('admin.news.table.json');

    Route::get('admin/catalog', 'Admin\CatalogController@index')->name('admin.catalog');
    Route::get('admin/catalog/add', 'Admin\CatalogController@add')->name('admin.catalog.add');
    Route::get('admin/catalog/{id}/edit', 'Admin\CatalogController@edit')->name('admin.catalog.edit');
    Route::get('admin/catalog/{id}/delete', 'Admin\CatalogController@remove')->name('admin.news.delete');
    Route::post('admin/catalog/table.json', 'Admin\CatalogController@table')->name('admin.catalog.table.json');
    Route::post('admin/catalog/{id}/edit.json', 'Admin\CatalogController@update')->name('admin.catalog.edit.json');
    Route::post('admin/catalog/add.json', 'Admin\CatalogController@create')->name('admin.catalog.add.json');

    Route::post('admin/photo/add', 'Admin\PhotoController@create')->name('admin.photo.add');
});

