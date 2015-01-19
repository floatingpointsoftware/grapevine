<?php
namespace FloatingPoint\Grapevine\Console;

use Illuminate\Console\Command;
use Illuminate\Container\Container;

class InstallGrapevineCommand extends Command
{
    /**
     * Name of the command.
     *
     * @param string
     */
    protected $name = 'grapevine:install';

    /**
     * Description.
     *
     * @param string
     */
    protected $description = 'Install grapevine.';

    /**
     * Handle the command functionality, installing grapevine.
     *
     * 1. Migrate required grapevine files
     * 2. Publish the grapevine theme for use
     */
    public function handle()
    {
        $this->call('grapevine:migrate');
        $this->call('stylist:publish');
    }
}
