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


Route::get('/', 'HomeController@home');
Route::redirect('/discord', 'https://discord.gg/y9TwPcqdvm');
Route::redirect('/facebook-page', 'https://facebook.com/teacode.ma');
Route::redirect('/facebook-group', 'https://facebook.com/groups/teacode.ma');
Route::redirect('/linkedin', 'https://www.linkedin.com/company/teacodema');
Route::redirect('/youtube', 'https://youtube.com/channel/UCss61diIS1kW_TRsHMMwtwQ');
Route::redirect('/twitter', 'https://twitter.com/teacodema');
Route::redirect('/instagram', 'https://instagram.com/teacode.ma');
// Route::redirect('/blog', 'https://blog.teacode.ma/');
// Route::redirect('/resume', 'https://resume.teacode.ma/');
// Route::get('/privacy', 'HomeController@privacy');
// Route::get('/terms', 'HomeController@terms');
Route::any('/{var}', 'HomeController@home')->where('var', '.*');
