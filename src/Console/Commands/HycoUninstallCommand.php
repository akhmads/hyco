<?php

namespace Akhmads\Hyco\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

class HycoUninstallCommand extends Command
{
    protected $signature = 'hyco:uninstall';

    protected $description = 'Remove hyco library';

    public function handle()
    {
        $this->info("Hyco uninstaller");

        $this->info("Start removing file...");

        // (new Filesystem)->delete(base_path('app/Http/Controllers/Demo/UserController.php'));
        // (new Filesystem)->deleteDirectory(base_path('resources/views/demo/users'));

        $this->info("Done");
    }
}
