<?php

namespace Andynoelker\Laravel5ViewGenerator;

use Illuminate\Console\Command;

class ViewMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view
                            {name : The name of the view.}
                            {--parent= : The parent Blade template this view extends.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Blade template view.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->getPath($name);

        $this->makeDirectory($path);

        if (file_exists($path)) {
            if ($this->confirm('View already exists. Do you wish to overwrite it?')) {
                $this->createView($path);
            }
        } else {
            $this->createView($path);
        }     
    }

    /**
     * Generate the Blade view.
     *
     * @param string $path The path of the view.
     * @return void
     */
    protected function createView($path)
    {
        $contents = $this->getViewContents();

        file_put_contents($path,$contents);

        $this->info('View created successfully.');
    }

    /**
     * Generate the contents of the view file.
     *
     * @return string
     */
    protected function getViewContents()
    {
        $contents = '';

        if ($this->option('parent')) {
            $contents = "@extends('" . $this->option('parent') . "')\r\n";
        }

        return $contents;
    }
    /**
     * Create the directory for the view if it does not already exist.
     * 
     * @param  string $path The full path of the view file.
     * @return void
     */
    protected function makeDirectory($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    /**
     * Get the full path for the view file.
     * 
     * @param  string $name The name of the view.
     * @return string
     */
    protected function getPath($name)
    {
        return base_path() . '/resources/views/' . str_replace('\\', '/', $name) . '.blade.php';
    }
}
