<?php

namespace App\Providers;

use App\Services\Interfaces\WebCrawlerServiceInterface;
use App\Services\WebCrawlerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WebCrawlerServiceInterface::class, WebCrawlerService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
