<?php

namespace App\Providers;
use App\BlogCategory;
use App\BlogPost;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('blog.sidebar', function ($view) {
            $view->with('popularPosts', BlogPost::orderBy('views', 'desc')->take(3)->get());
            $view->with('featuredPosts', BlogPost::where('is_recommended', 1)->take(3)->get());
            $view->with('recentPosts', BlogPost::orderBy('date', 'desc')->take(4)->get());
            $view->with('categories', BlogCategory::all());
        });
    }
}
