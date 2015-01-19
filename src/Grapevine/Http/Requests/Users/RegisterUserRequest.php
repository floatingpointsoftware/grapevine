<?php
namespace FloatingPoint\Grapevine\Http\Requests\Users;

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
            'username' => 'required|min:3|alpha_num',
            'email'    => 'required|email|confirmed|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ];
    }

    /**
     * Registrations are allowed by all users.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
