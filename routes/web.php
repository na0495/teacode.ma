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

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    Route::get('/', 'HomeController@home');

    // Pages
    Route::get('/contributors', 'PageController@contributors');
    Route::get('/resources', 'PageController@resources');
    Route::get('/privacy', 'PageController@privacy');
    Route::get('/coming-soon', 'PageController@comingSoon');
//    Route::get('/terms', 'HomeController@terms');

    // Blog
    Route::get('/category/{category}', 'PostController@getPostsByCategory');
    Route::get('/tags/{tag}', 'PostController@getPostsByTag');
    Route::get('blog', 'PostController@index');
    Route::get('blog/{slug}', 'PostController@show');

    // SiteMap
    Route::get('/sitemap', 'SitemapController@sitemap');
    Route::get('/generateSitemap', 'SitemapController@generateSitemap');

    // External
    Route::get('/{link}', 'GotoController@gotoExternalLink');

    Route::post('/banner/update', 'ApiController@updateBanner');

    Route::any('/{var}', 'HomeController@home')->where('var', '.*');
});
