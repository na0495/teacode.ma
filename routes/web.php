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
// 6months => max_age = 60 * 60 * 24 * 183
Route::middleware('cache.headers:public;max_age=15811200;etag')->group(function () {

    Route::get('/', 'HomeController@home');
    Route::get('/privacy', 'HomeController@privacy');
    Route::get('/terms', 'HomeController@terms');
    Route::get('/sitemap', 'HomeController@sitemap');

    // Route::get('/generateSitemap', 'HomeController@generateSitemap');

    // External
    Route::redirect('/discord', 'https://discord.gg/y9TwPcqdvm');
    Route::redirect('/activities/workshops', 'https://discord.gg/acVUjZ74PU');
    Route::redirect('/activities/communication', '/activities/communication/en');
    Route::redirect('/activities/communication/en', 'https://discord.gg/rSeFZZvjDY');
    Route::redirect('/activities/communication/fr', 'https://discord.gg/RTycrq2Hfk');
    Route::redirect('/activities/hangouts', 'https://discord.gg/cC7kuBqJsy');
    Route::redirect('/activities/pair-programming', 'https://discord.gg/7d3mDvVFvs');
    Route::redirect('/activities/mock-interview', 'https://discord.gg/F5rBCKj2ah');
    Route::redirect('/facebook-page', 'https://facebook.com/teacode.ma');
    Route::redirect('/facebook-group', 'https://facebook.com/groups/teacode.ma');
    Route::redirect('/linkedin', 'https://www.linkedin.com/company/teacodema');
    Route::redirect('/youtube', 'https://youtube.com/channel/UCss61diIS1kW_TRsHMMwtwQ');
    Route::redirect('/twitter', 'https://twitter.com/teacodema');
    Route::redirect('/instagram', 'https://instagram.com/teacode.ma');
    Route::redirect('/blog', 'https://blog.teacode.ma/');
    // Route::redirect('/resume', 'https://resume.teacode.ma/');

    Route::any('/{var}', 'HomeController@home')->where('var', '.*');
});
