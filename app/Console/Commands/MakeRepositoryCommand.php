<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepositoryCommand extends Command
{
    protected $signature = 'make:repository {name : The name of the service}';
    protected $description = 'Create a new repository file by Hadyan Yuma Ekdiattan!';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = base_path("app/Repositories/{$name}.php");

        if ($this->files->exists($path)) {
            $this->error("Repository file {$name}.php already exists!");
            return;
        }

        if (!$this->files->isDirectory(base_path('app/Repsositories'))) {
            $this->files->makeDirectory(base_path('app/Repsositories'), 0755, true);
        }

        $this->files->put($path, $this->getStubContent($name));
        $this->info("Repsositories file {$name}.php created successfully.");

    }

    protected function getStubContent($name)
    {
        return "<?php
        
namespace App\Repsositories;

class {$name}
{

}
";
    }
}
