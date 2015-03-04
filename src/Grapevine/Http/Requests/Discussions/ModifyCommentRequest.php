<?php 
namespace FloatingPoint\Grapevine\Http\Requests\Discussions;

use Illuminate\Foundation\Http\FormRequest;

class ModifyCommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
