<?php
namespace FloatingPoint\Grapevine\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateUserRequest extends FormRequest
{
    /**
     * Some basic rules for email and password validation.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    /**
     * All users can authenticate.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
