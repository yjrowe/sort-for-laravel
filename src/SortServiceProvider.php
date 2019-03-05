<?php

namespace Aex\Sort;

use Illuminate\Support\ServiceProvider;

class SortServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('packagetest', function ($app) {
            return new Sort($app['session'], $app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'Sort');
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/sort'),
            __DIR__ . '/config/sort.php' => config_path('sort.php'),
        ]);
    }

    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['sort'];
    }
}
