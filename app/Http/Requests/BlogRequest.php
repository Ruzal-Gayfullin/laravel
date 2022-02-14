<?php

namespace App\Http\Requests;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        $blog = new Blog();
        $blog_category = new BlogCategory();
        $users = new User();

        return [
            'title' => 'required|string',
            'slug' => 'required|string|unique:' . $blog->getTable(),
            'author_id' => 'integer|exists:' . $users->getTable() . ',' . $users->getKeyName(),
            'category_id' => 'integer|exists:' . $blog_category->getTable() . ',' . $blog_category->getKeyName(),
            'text' => 'string',
            'description' => 'string|max:255',
            'image' => 'required|mimes:jpeg,jpg,gif|dimensions:min_width=200,max_width=1000,min_height=200,max_height=1000',
        ];
    }
}
