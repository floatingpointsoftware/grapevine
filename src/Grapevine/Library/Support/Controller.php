<?php

namespace FloatingPoint\Grapevine\Library\Support;

use Request;

class Controller extends \Illuminate\Routing\Controller
{
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
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $layout;

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

        // Only render a view if the layout property is defined, and request is not after a pjax response.
        if (! is_null($this->layout) && Request::format() !== 'pjax') {
            $this->layout = $viewFactory->make($this->layout);
        }
    }

    /**
     * Sets or overrides data on the object to be used when rendering a response
     *
     * @param string|array $key
     * @param null         $value
     * @return void
     */
    protected function setData($key, $value = null)
    {
        if (is_array($key) && ! $value) {
            $this->data = $key;
        } else {
            $this->data[$key] = $value;
        }
    }

    /**
     * Sets flash data on the session
     *
     * @param $flash_data
     * @return void
     */
    protected function setFlash($flash_data)
    {
        if (! $this->session) {
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
     * Wraps Laravel's view method, taking optional data to override data set on the object
     *
     * The underlying view method is a provided by Laravel. We wrap that, passing in the path
     * to the view and optional data. If no data is passed in, we will check the object for
     * data set with $this->setData('foo' => 'bar')
     *
     * @param      $path
     * @param null $data
     * @uses view renders the view
     * @return \Illuminate\View\View
     */
    protected function view($path, $data = null)
    {
        return view($path, is_null($data) ? $this->data : $data);
    }

    /**
     * Wrapper for the Redirect facade, accepts an optional HTTP status code
     *
     * @param int $statusCode
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectHome($statusCode = 302)
    {
        return \Redirect::home($statusCode);
    }

    /**
     * Wrapper for the Redirect facade, accepts URL and optional HTTP status code
     *
     * @param     $url
     * @param int $statusCode
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectTo($url, $statusCode = 302)
    {
        return \Redirect::to($url, $statusCode);
    }

    /**
     * Wrapper for the Redirect facade, accepts a named route and optional data
     *
     * @param       $route
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectRoute($route, $data = [])
    {
        return \Redirect::route($route, $data);
    }

    /**
     * Wrapper for the Redirect facade, accepts optional data
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectBack($data = [])
    {
        return \Redirect::back()->withInput()->with($data);
    }

    /**
     * Wrapper for the Redirect facade, accepts a Controller@method string
     *
     * @param $action
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectAction($action)
    {
        return \Redirect::action($action);
    }

    /**
     * Wrapper for the Redirect facade, accepts an optional default path
     *
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
