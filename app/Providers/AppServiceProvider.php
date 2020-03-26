<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Models\Page;
use App\Models\Contact;
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
        $page = Page::all();
        $contact = Contact::first();
        View::composer(['client.layouts.header','client.layouts.footer'],function($view) use($page){
            $view->with('pages',$page);
        });
        View::composer('client.layouts.footer',function($view) use($contact){
            $view->with('contact',$contact);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = array(
            'Page',
            'Role',
            'School',
            'User',
            'Banner',
            'Category',
            'Contact',
            'Customer',
            'Product',
            'RulesCategory',
            'Rules'
        );
        foreach ($models as $model) {
            $this->app->bind(
                "App\Repositories\\{$model}Repository"
            );
        }
    }
}
