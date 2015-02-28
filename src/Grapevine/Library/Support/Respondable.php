<?php
namespace FloatingPoint\Grapevine\Library\Support;

use Request;

trait Respondable
{
    /**
     * Respond with the the $data array for JSON, a partial of the view for PJAX requests,
     * or the full layout render if it's a full page request.
     *
     * @param string $view
     * @param array  $data
     *
     * @return mixed
     */
    public function respond($view, array $data = [])
    {
        if (Request::wantsJson()) {
            return $data;
        }

        $this->layout->content = view($view, $data);
    }

    /**
     * Determines whether or not the request is a PJAX request.
     *
     * @return bool
     */
    public function isPjax()
    {
        return Request::header('X-PJAX') === 'true';
    }

    /**
     * Returns true if the request is for the full page.
     *
     * @return bool
     */
    public function isFullPage()
    {
        return !Request::wantsJson() && !$this->isPjax();
    }
}
