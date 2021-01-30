<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_category' => 'required|unique:blogcategory,blog_category|min:3|max:35'
        ]);
        $myId = auth()->user()->id;
        $blogCat = BlogCategory::create(['blog_category' => $request->blog_category, 'user_id' => $myId]);
        // $blogCat = new BlogCategory;
        // $blogCat->blog_category = $request->input('blog_category');
        // $blogCat->user_id = auth()->user()->id;
        // $blogCat->save();
        
        if($blogCat)
        {
            return redirect('/dashboard/blog')->with('successMessage', 'Blog Category Added');
        } else {
            return redirect()->back();
        }
            // return redirect()->back(); 
    }
}
