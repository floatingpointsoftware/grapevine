<?php

namespace FloatingPoint\Grapevine\Library\Support;

class Controller extends \Illuminate\Routing\Controller
{
    use CommanderTrait;

    /**
     * TODO set the user class
     */
    protected $current_user;

    /**
     * @var array
     */
    protected $viewData;

    /**
     * @var Store
     */
    protected $session;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->data = [];
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        $viewFactory = \App::make('Illuminate\View\Factory');
        if (! is_null($this->layout)) {
            $this->layout = $viewFactory->make($this->layout);
        }
    }

    protected function setData($key, $value = null)
    {
        if (is_array($key) && ! $value) {
            $this->data = $key;
        } else {
            $this->data[$key] = $value;
        }
    }

    /**
     * @param $flash_data
     * @return void
     */
    protected function setFlash($flash_data)
    {
        if(! $this->session) {
            $this->session = \App::make('session');
        }

        if (empty($flash_data)) {
            return;
        }
        foreach ($flash_data as $title => $text) {
            $this->session->flash($title, $text);
        }
    }

    /**
     * @param      $path
     * @param null $data
     * @return void
     */
    protected function view($path, $data = null)
    {
        return view($path, is_null($data) ? $this->data : $data);
    }

    /**
     * @param int $statusCode
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectHome($statusCode = 302)
    {
        return \Redirect::home($statusCode);
    }

    /**
     * @param     $url
     * @param int $statusCode
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectTo($url, $statusCode = 302)
    {
        return \Redirect::to($url, $statusCode);
    }

    /**
     * @param       $route
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectRoute($route, $data = [])
    {
        return \Redirect::route($route, $data);
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectBack($data = [])
    {
        return \Redirect::back()->withInput()->with($data);
    }

    /**
     * @param $action
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectAction($action)
    {
        return \Redirect::action($action);
    }

    /**
     * @param string $default
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectIntended($default = '/')
    {
        $intended = $this->session->get('auth.intended_redirect_url');
        if ($intended) {
            return $this->redirectTo($intended);
        }

        return \Redirect::to($default);
    }
}