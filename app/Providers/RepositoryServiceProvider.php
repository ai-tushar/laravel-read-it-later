<?php

namespace App\Providers;

use App\Repositories\ContentDataRepository;
use App\Repositories\ContentRepository;
use App\Repositories\Interfaces\ContentDataRepositoryInterface;
use App\Repositories\Interfaces\ContentRepositoryInterface;
use App\Repositories\Interfaces\PocketRepositoryInterface;
use App\Repositories\PocketRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PocketRepositoryInterface::class, PocketRepository::class);
        $this->app->bind(ContentRepositoryInterface::class, ContentRepository::class);
        $this->app->bind(ContentDataRepositoryInterface::class, ContentDataRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
