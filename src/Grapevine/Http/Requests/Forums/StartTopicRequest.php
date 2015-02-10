<?php
namespace FloatingPoint\Grapevine\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StartTopicRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
