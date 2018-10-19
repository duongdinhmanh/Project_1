<?php

namespace App\Providers;

use App\Repositories\EloquentRepository;
use App\Repositories\EloquentRepository\ApartmentImageRepository;
use App\Repositories\EloquentRepository\ApartmentRepository;
use App\Repositories\InterfaceRepository\ApartmentImagefaceRepository;
use App\Repositories\InterfaceRepository\ApartmentInterfaceRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, EloquentRepository::class);
        $this->app->bind(ApartmentInterfaceRepository::class, ApartmentRepository::class);
        $this->app->bind(ApartmentImagefaceRepository::class, ApartmentImageRepository::class);
    }
}
