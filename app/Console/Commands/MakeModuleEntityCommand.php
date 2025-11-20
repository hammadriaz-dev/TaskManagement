<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeModuleEntityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-entity {module} {name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Entity Class inside a specific module';


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

        $entityPath = "{$modulePath}/Entities";
        if (!File::exists($entityPath)) {
            File::makeDirectory($entityPath, 0755, true);
        }

        $filePath = "{$entityPath}/{$name}.php";

        if (File::exists($filePath)) {
            $this->error("Entity already exists");
            return;
        }

        $stub = $this->getStub($module, $name);

        File::put($filePath, $stub);
        $this->info("Entity {$name} created successfully in {$module} module.");
    }

    private function getStub($module, $name)
    {
        return <<<PHP
        <?php

        namespace Modules\\$module\\Entities;
        use Illuminate\Database\Eloquent\Model;

        class $name extends Model
        {

        }
        PHP;
    }
}
