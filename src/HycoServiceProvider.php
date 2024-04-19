<?php

namespace Akhmads\Hyco;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Akhmads\Hyco\Console\Commands\HycoInstallCommand;
use Akhmads\Hyco\Console\Commands\HycoUninstallCommand;
use Akhmads\Hyco\View\Components\HycoLayout;
use Akhmads\Hyco\View\Components\InputLabel;
use Akhmads\Hyco\View\Components\InputError;
use Akhmads\Hyco\View\Components\Input;
use Akhmads\Hyco\View\Components\Button;

class HycoServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'hyco');

        $this->bootComponents();

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    // Publishing the configuration file.
    protected function bootForConsole(): void
    {
        $this->commands([HycoInstallCommand::class, HycoUninstallCommand::class]);
    }

    public function bootComponents()
    {
        Blade::component('hyco-layout', HycoLayout::class);
        Blade::component('hc-input-label', InputLabel::class);
        Blade::component('hc-input-error', InputError::class);
        Blade::component('hc-input', Input::class);
        Blade::component('hc-button', Button::class);

        Livewire::component('hyco::hello', \Akhmads\Hyco\Livewire\Hello::class);
        Livewire::component('hyco::counter', \Akhmads\Hyco\Livewire\Counter::class);
    }
}
