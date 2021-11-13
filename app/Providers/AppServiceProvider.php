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
                $mode = 'dark';
            }
            if (!$view->data) {
                $view->data = new \stdClass;
            }

            $view->data->events = collect(json_decode(\File::get(base_path() . '/database/data/events.json')));
            $view->data->banner = $view->data->events->filter(function ($e, $i){
                $e->date = explode(' ', ($e->start ?? $e->startRecur))[0];
                $diff = now()->diffInDays(\Carbon\Carbon::createFromFormat('Y-m-d', $e->date), false);
                return $diff >= 0;
            })->sortBy('date')->values();
            $view->data->banner = (count($view->data->banner) > 0) ? $view->data->banner[0] : null;

            $view->data->socialLinks = getSocialLinks();
            $view->data->footerMenu = getFooterMenu();
            $view->with(['mode' => $mode]);
        });

        Paginator::useBootstrap();
    }
}
