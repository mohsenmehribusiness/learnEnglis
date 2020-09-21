<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\View::composer(['layouts.footer'],function($view){
            $view->with('tags',\App\Tag::select('tag')->take(6)->get());
            $view->with('wordsFooter',\App\Word::select('word')->take(6)->get());
        });
        \Illuminate\Support\Facades\View::composer(['layouts.footer','layouts.nav_top'],function($view){
            $view->with('lessons',\App\Lesson::select('lesson')->take(6)->get());
        });
    }
}
