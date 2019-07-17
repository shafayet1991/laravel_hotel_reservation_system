<?php

namespace App\Http\Requests\Blog\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $blog_category_id = $this->request->get('blog_category_id');
        return [
            'slug' => 'required|max:191|unique:blog_categories,slug,'.$blog_category_id,
        ];
    }
}
