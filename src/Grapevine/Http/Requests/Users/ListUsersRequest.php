<?php

namespace FloatingPoint\Grapevine\Http\Requests\Forums;

use Illuminate\Foundation\Http\FormRequest;

class ListUsersRequest extends FormRequest
{
    /**
     * @todo implement authority check for who can create forums
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
