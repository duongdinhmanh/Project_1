<?php

namespace App\Providers;

use App\Models\Category;
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
        view()->composer('*', function ($view) {
            $cat_parent = Category::where('parent_id', 0)->get();
            $view->with('cat_parent', $cat_parent);
        });
        // view()->composer('*', function ($view) {
        //     $cat_parent = Post::where('status', 1)->where('')->get();
        //     $view->with('cat_parent', $cat_parent);
        // });
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
