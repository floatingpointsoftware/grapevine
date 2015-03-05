<?php
namespace FloatingPoint\Grapevine\Http\Requests\Discussions;

use Illuminate\Foundation\Http\FormRequest;

class StartDiscussionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
