<?php
namespace FloatingPoint\Grapevine\Library\Support;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends \Illuminate\Routing\Controller
{
    use DispatchesCommands;
    use Respondable;
    use ValidatesRequests;

    /**
     * @var View
     */
    protected $layout;

    /**
     * Setup the layout that may be required for the view.
     */
    protected function setupLayout()
    {
        if ($this->isFullPage()) {
            $this->layout = view('layouts.fullpage');
        }
        else if ($this->isPjax()) {
            $this->layout = view('layouts.pjax');
        }
    }

    /**
     * Pulled from Laravel 4. Laravel 5 completely does away with any ability to support PJAX
     * applications - we need this method as it was.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        $this->setupLayout();

        $response = call_user_func_array(array($this, $method), $parameters);

        if (is_null($response) && ! is_null($this->layout)) {
            $response = $this->layout;
        }

        return $response;
    }
}
