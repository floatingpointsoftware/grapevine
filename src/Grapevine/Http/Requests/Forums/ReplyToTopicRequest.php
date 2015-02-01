<?php
namespace FloatingPoint\Grapevine\Http\Requests\Forums;

use Illuminate\Foundation\Http\FormRequest;

class ReplyToTopicRequest extends FormRequest
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
