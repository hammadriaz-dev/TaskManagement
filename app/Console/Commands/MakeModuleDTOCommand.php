<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModuleDTOCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-dto {module} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a DTO class inside a specific module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $module = $this->argument('module');
        $name = $this->argument('name');

        $modulePath = base_path("Modules/{$module}");
        if (!File::exists($modulePath)) {
            $this->error("Module '{$module}' does not exist.");
            return;
        }

        $dtoPath = "{$modulePath}/DTO";
        File::ensureDirectoryExists($dtoPath);

        $filePath = "{$dtoPath}/{$name}.php";
        if (File::exists($filePath)) {
            $this->error("DTO already exists!");
            return;
        }

        File::put($filePath, $this->getStub($module, $name));

        $this->info("DTO {$name} created successfully inside {$module} module.");

    }

    private function getStub($module, $name)
    {
        return <<<PHP
        <?php

        namespace Modules\\$module\\DTO;

        class $name
        {
        
        }
        PHP;
    }
}
