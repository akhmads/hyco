<?php

namespace Akhmads\Hyco;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Akhmads\Hyco\Console\Commands\HycoInstallCommand;
use Akhmads\Hyco\Console\Commands\HycoUninstallCommand;
use Akhmads\Hyco\View\Components\HycoLayout;
use Akhmads\Hyco\View\Components\Toast;
use Akhmads\Hyco\View\Components\InputLabel;
use Akhmads\Hyco\View\Components\InputError;
use Akhmads\Hyco\View\Components\Input;
use Akhmads\Hyco\View\Components\Select;
use Akhmads\Hyco\View\Components\Button;
use Akhmads\Hyco\View\Components\Table;

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
        Blade::component('BladeUI\Icons\Components\Icon', 'svg');
        Blade::component('hyco-layout', HycoLayout::class);
        Blade::component('hc-toast', Toast::class);
        Blade::component('hc-input-label', InputLabel::class);
        Blade::component('hc-input-error', InputError::class);
        Blade::component('hc-input', Input::class);
        Blade::component('hc-select', Select::class);
        Blade::component('hc-button', Button::class);
        Blade::component('hc-table', Table::class);
    }
}
