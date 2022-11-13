<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\PessoaRepository;
use App\Repositories\PessoaRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PessoaRepository::class, PessoaRepositoryEloquent::class);
        //:end-bindings:
    }
}
