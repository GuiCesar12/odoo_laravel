<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Alazzidev\LaraodooXmlrpc\Facades\Odoo;
class XMLRPCServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('xmlrpc', function ($app) {
            return new \PEAR_XMLRPC2_Client($app['request']->root());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
