<?php

namespace Akhmads\Hyco\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

class HycoInstallCommand extends Command
{
    protected $signature = 'hyco:install';

    protected $description = 'Hyco library';

    protected $ds = DIRECTORY_SEPARATOR;

    public function handle()
    {
        $this->info("Hyco installer");

        $this->info("Start copying file...");

        // (new Filesystem)->ensureDirectoryExists(base_path('app/Http/Controllers'));
        // (new Filesystem)->ensureDirectoryExists(base_path('resources/views'));
        // (new Filesystem)->copy(__DIR__.'/../../../stubs/Controllers/Demo/UserController.php', base_path('app/Http/Controllers/Demo/UserController.php'));
        // (new Filesystem)->copyDirectory(__DIR__.'/../../../stubs/resources/views/demo/users', base_path('resources/views/demo/users'));

        $this->info("Done");
    }
}
