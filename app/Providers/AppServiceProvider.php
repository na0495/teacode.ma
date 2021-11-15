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

            $view->data->banner = Event::where('start_date', '>=', now())->get();
            $view->data->banner = (count($view->data->banner) > 0) ? $view->data->banner[0] : null;

            $view->data->socialLinks = getSocialLinks();
            $view->data->footerMenu = getFooterMenu();
            $view->with(['mode' => $mode]);
        });

        Paginator::useBootstrap();
    }
}
