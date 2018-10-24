<?php

namespace App\Providers;

use App\Models\SetCalendar;
use App\Repositories\EloquentRepository;
use App\Repositories\EloquentRepository\ApartmentImageRepository;
use App\Repositories\EloquentRepository\ApartmentRepository;
use App\Repositories\EloquentRepository\SetCalendarRepository;
use App\Repositories\InterfaceRepository\ApartmentImagefaceRepository;
use App\Repositories\InterfaceRepository\ApartmentInterfaceRepository;
use App\Repositories\InterfaceRepository\SetCalendarInterfaceRepository;
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

        view()->composer('*', function ($view) {
            $order = SetCalendar::where('status', 0)->count();
            $view->with('order', $order);
        });
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
        $this->app->bind(SetCalendarInterfaceRepository::class, SetCalendarRepository::class);
    }
}
