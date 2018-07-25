<?php

namespace App\Providers;

use App\Post;
use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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


        view()->composer('pages._sidebar', function($view){

            #=============   POPULAR POSTS  ===============#
            $view->with('popularPosts', Post::getPopularPosts());

            #=============   FEATURED  ==================#
            $view->with('featuredPosts', Post::getFeaturedPosts());

            #=============   RECENT POSTS  ==============#
            $view->with('recentPosts',
                Post::orderBy('date', 'desc')->take(2)->get());


            #=============   ALL CATEGORIES  ==============#
            $view->with('categories', Category::all());


        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
