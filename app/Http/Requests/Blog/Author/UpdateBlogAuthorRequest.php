<?php

namespace App\Http\Requests\Blog\Author;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogAuthorRequest extends FormRequest
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
        $blog_author_id = $this->request->get('blog_author_id');
        return [
            'name' => 'required|max:191',
            'slug' => 'required|max:191|unique:blog_authors,slug,'.$blog_author_id,
        ];
    }
}
