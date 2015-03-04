<?php 
namespace FloatingPoint\Grapevine\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'unique:categories,title'],
            'id' => ['required', 'integer']
        ];
    }

    public function authorize()
    {
        return true;
    }
}
