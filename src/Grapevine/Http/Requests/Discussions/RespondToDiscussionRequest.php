<?php
namespace FloatingPoint\Grapevine\Http\Requests\Discussions;

use Illuminate\Foundation\Http\FormRequest;

class RespondToDiscussionRequest extends FormRequest
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
