<?php
namespace FloatingPoint\Grapevine\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ListUsersRequest extends FormRequest
{
    /**
     * @todo implement authority check for who can create categories
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
