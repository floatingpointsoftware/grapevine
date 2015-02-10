<?php 
namespace FloatingPoint\Grapevine\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReplyRequest extends FormRequest
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
