<?php

namespace App\Providers;

use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerTwillAdminNavigationLinks();
    }

    public function registerTwillAdminNavigationLinks()
    {
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('articles')
        );
    }
}
