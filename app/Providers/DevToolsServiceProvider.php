<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DevToolsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Livewire\LivewireServiceProvider::class);
            $this->app->register(\Laravel\Breeze\BreezeServiceProvider::class);
        }

        if ($this->app->runningInConsole()) {
            return;
        }

        if (! $this->app->runningInConsole() && env('APP_DEBUG', false)) {
            try {
                if (!request()->is('telescope*')) {
                    $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
                }
            } catch (\Throwable $e) {
                // Ignorar si no hay request activa (por ejemplo en CLI)
            }
        }
    }
}
