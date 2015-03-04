<?php
namespace FloatingPoint\Grapevine\Http\Requests\Discussions;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscussionRequest extends FormRequest
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
