<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeHelperCommand extends Command
{
    protected $signature = 'make:helper {name : The name of the helper}';
    protected $description = 'Create a new helper file by Hadyan Yuma Ekdiattan!';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = base_path("app/Helpers/{$name}.php");

        if ($this->files->exists($path)) {
            $this->error("Helper file {$name}.php already exists!");
            return;
        }

        if (!$this->files->isDirectory(base_path('app/Helpers'))) {
            $this->files->makeDirectory(base_path('app/Helpers'), 0755, true);
        }

        $this->files->put($path, $this->getStubContent($name));
        $this->info("Helper file {$name}.php created successfully.");

    }

    protected function getStubContent($name)
    {
        return "<?php
        
namespace App\Helpers;

class {$name}
{
    // Add your helper methods here
}
";
    }
}
