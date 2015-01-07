<?php
namespace FloatingPoint\Grapevine\Library\Support;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends \Illuminate\Routing\Controller
{
    use DispatchesCommands;
    use ValidatesRequests;

    /**
     * @var string
     */
    protected $layout;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {

    }
}
