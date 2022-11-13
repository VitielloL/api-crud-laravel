<?php

namespace App\Providers;

use App\Services\PessoaService;
use App\Services\PessoaServiceInterface;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
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
        $this->app->bind(PessoaServiceInterface::class, PessoaService::class);
    }
}
