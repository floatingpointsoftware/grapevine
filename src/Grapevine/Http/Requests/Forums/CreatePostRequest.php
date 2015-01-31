<?php
namespace FloatingPoint\Grapevine\Http\Requests\Forums;

use Illuminate\Support\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function rules()
    {
        return [

        ];
    }

    public function authorize()
    {
        return true;
    }
}
