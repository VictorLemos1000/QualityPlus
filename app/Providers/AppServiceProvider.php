<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registrar quaisquer serviços da aplicação.
     */
    public function register(): void
    {
        //
    }

    /**
     * Inicializar quaisquer serviços da aplicação.
     */
    public function boot(): void
    {
        //
    }

    // Definir constante HOME para redirecionamento após login
    public const HOME = '/dashboard';
}
