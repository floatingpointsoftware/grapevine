<?php
namespace FloatingPoint\Grapevine\Http\Requests\Topics;

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