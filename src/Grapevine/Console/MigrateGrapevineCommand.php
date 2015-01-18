<?php
namespace FloatingPoint\Grapevine\Console;

use Illuminate\Console\Command;
use Illuminate\Container\Container;

class MigrateGrapevineCommand extends Command
{
    /**
     * Name of the command.
     *
     * @param string
     */
    protected $name = 'grapevine:migrate';

    /**
     * Description.
     *
     * @param string
     */
    protected $description = 'Migrate all required grapevine migration files.';

    /**
     * Setup the application container as we'll need this for running migrations.
     */
    public function __construct(Container $app)
    {
        parent::__construct();

        $this->app = $app;
    }

    /**
     * Run the package migrations.
     */
    public function handle()
    {
        $migrations = $this->app->make('migration.repository');
        $migrations->createRepository();

        $migrator = $this->app->make('migrator');

        $migrator->run(__DIR__.'/../../../resources/migrations');
    }
}