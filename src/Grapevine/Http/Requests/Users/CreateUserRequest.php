<?php

namespace FloatingPoint\Grapevine\Http\Requests\Forums;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
	/**
	 * Setup the rules required for the create forum request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email' => 'required',
			'password' => 'required'
		];
	}

	/**
	 * @todo implement authority check for who can create forums
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
}
