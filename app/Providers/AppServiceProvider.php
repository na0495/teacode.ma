<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        view()->composer('*', function ($view) {
            $mode = \Cookie::get('mode');
            if ($mode != 'dark' && $mode != 'light') {
                $mode = 'light';
            }
            if (!$view->data) {
                $view->data = new \stdClass;
            }
            $view->data->banner = json_decode(\File::get(base_path() . '/database/data/banner.json'));
            $x = $view->data->banner;

            $view->data->socialLinks = getSocialLinks();
            $view->data->footerMenu = getFooterMenu();
            $view->with(['mode' => $mode]);
        });

        Paginator::useBootstrap();
    }
}
