<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
        return [
            "blogcategory" => "required",
            "blog_title" => "required|max:200|unique:blogs,blog_title",
            "blog_body" => "required|max:2000",
            "blogimage" => "image|nullable|max:1000"
        ];
    }
    public function messages()
    {
        return [
            'blogcategory.required'=> 'Blog Category is required',
            'blog_title.required'=> 'Title is required',
            'blog_title.max'=> 'Title must be less than 200 characters',
            'blog_title.unique'=> 'You can not post the same title',
            'blog_body.required'=> 'Body is required',
            'blog_body'=> 'Body must be less than 2000 characters',
            'blogimage.image'=> 'Image file must be jpeg, jpg or png',
            'blogimage.max'=> 'Image file must be less than 1MB',
        ];
    }
}
