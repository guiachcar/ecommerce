<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\ProdutoRepository::class, \App\Repositories\ProdutoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VendaRepository::class, \App\Repositories\VendaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VendaConcluidaRepository::class, \App\Repositories\VendaConcluidaRepositoryEloquent::class);
        //:end-bindings:
    }
}
