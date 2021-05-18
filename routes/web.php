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

    // Pages    
    Route::get('contributors', 'PageController@contributors');
    Route::get('/resources', 'PageController@resources');
    Route::get('/privacy', 'PageController@privacy');
//    Route::get('/terms', 'HomeController@terms');

    // SiteMap
    Route::get('/sitemap', 'SitemapController@sitemap');
    Route::get('/generateSitemap', 'SitemapController@generateSitemap');
        
    // External
    Route::get('/{link}', 'GotoController@gotoExternalLink');

//    Route::redirect('/blog', 'https://blog.teacode.ma/');
//    Route::redirect('/resume', 'https://resume.teacode.ma/');

    Route::any('/{var}', 'HomeController@home')->where('var', '.*');
});
