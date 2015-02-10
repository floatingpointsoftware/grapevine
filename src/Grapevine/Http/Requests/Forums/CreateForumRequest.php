<?php
namespace FloatingPoint\Grapevine\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Setup the rules required for the create category request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:categories,title'],
        ];
    }

    /**
     * @todo implement authority check for who can create categories
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
