<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\SiteSetting;
use App\Models\Page;
use App\Models\SocialSetting;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//        \Illuminate\Support\Facades\URL::forceScheme('https');

            $site_settings = SiteSetting::find(1);
            $social_settings = SocialSetting::all();
// notifications
  // notification


            // pages

            $home=Page::where('slug','home')->first();
            $about=Page::where('slug','about-us')->first();
            $contact=Page::where('slug','contact-us')->first();
            $news=Page::where('slug','news')->first();
            $packages=Page::where('slug','packages')->first();
            $shop=Page::where('slug','shop')->first();
            $book_now=Page::where('slug','book_now')->first();
            // $rooms = Room::all();

            View::share([
                'site_settings' =>  $site_settings,
                'social_settings' => $social_settings,
                'home' => $home,
                'about' => $about,
                'contact' => $contact,
                'news' => $news,
                'packages' => $packages,
                'shop' => $shop,
                'book_now' => $book_now,


            ]);
    }
}
