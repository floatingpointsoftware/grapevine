<?php
namespace FloatingPoint\Grapevine\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
