<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as'=>'site.home', function(){
    return view('site.home');
}]);
Route::get('/sobre', ['as'=>'site.sobre', function(){
    return view('site.sobre');
}]);
Route::get('/contato', ['as'=>'site.contato', function(){
    return view('site.contato');
}]);

Route::get('/imovel/{id}/{titulo?}', ['as'=>'site.imovel', function(){
    return view('site.imovel');
}]);

Route::get('/admin/login', ['as'=>'admin.login', function(){
    return view('admin.login.index');
}]);
Route::post('/admin/login', ['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);
Route::group(['Middleware'=>'auth'], function(){
    Route::get('/admin', ['as'=>'admin.principal', function(){
        return view('admin.principal.index');
    }]);
});