<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeServiceCommand extends Command
{
    protected $signature = 'make:service {name : The name of the service}';
    protected $description = 'Create a new service file by Hadyan Yuma Ekdiattan!';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = base_path("app/Services/{$name}.php");

        if ($this->files->exists($path)) {
            $this->error("Service file {$name}.php already exists!");
            return;
        }

        if (!$this->files->isDirectory(base_path('app/Services'))) {
            $this->files->makeDirectory(base_path('app/Services'), 0755, true);
        }

        $this->files->put($path, $this->getStubContent($name));
        $this->info("Services file {$name}.php created successfully.");

    }

    protected function getStubContent($name)
    {
        return "<?php
        
namespace App\Services;

class {$name}
{
    // Add your service methods here
}
";
    }
}
