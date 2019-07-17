<?php

namespace App\Http\Requests\Blog\Tag;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogTagRequest extends FormRequest
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
        $blog_tag_id = $this->request->get('blog_tag_id');
        return [
            'slug' => 'required|max:191|unique:blog_tags,slug,'.$blog_tag_id,
        ];
    }
}
