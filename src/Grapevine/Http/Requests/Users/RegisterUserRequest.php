<?php
namespace FloatingPoint\Grapevine\Http\Requests\Forums;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Setup the rules required for the create forum request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|size:3',
            'email'    => 'required|email|confirmed|unique:users,email',
            'password' => 'required|size:8|confirmed'
        ];
    }
}
