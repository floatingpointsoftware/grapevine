<?php
namespace FloatingPoint\Grapevine\Http\Requests\Topics;

use Illuminate\Foundation\Http\FormRequest;

class StartTopicRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required|min:3'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
