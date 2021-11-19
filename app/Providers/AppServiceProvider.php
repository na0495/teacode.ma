<?php

namespace App\Providers;

use App\Models\Event;
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
                $mode = 'dark';
            }
            if (!$view->data) {
                $view->data = new \stdClass;
            }

            $view->data->banner = Event::whereDate('start_date', '>=', now())->get();
            if (count($view->data->banner) > 0) {
                $view->data->banner = $view->data->banner[0];
                $view->data->banner->title = strlen($view->data->banner->title) > 40 ? \Str::substr($view->data->banner->title, 0, 40).'...' : $view->data->banner->title;
            } else {
                $view->data->banner = null;
            }


            $view->data->socialLinks = getSocialLinks();
            $view->data->footerMenu = getFooterMenu();
            $view->with(['mode' => $mode]);
        });

        Paginator::useBootstrap();
    }
}
