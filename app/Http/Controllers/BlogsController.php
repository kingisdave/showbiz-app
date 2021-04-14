<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
        /**
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $clientBlogCats = BlogCategory::orderBy('blog_category', 'asc')->get();
        $myClientblogs = Blog::all();
    
        return view('pages.forumpage')
            ->with('clientBlogCats', $clientBlogCats)
            ->with('myClientblogs', $myClientblogs)
            ->with('successMessage');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('pages.privates.blogger');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $otherBlogs = array();
        $allBlogs = Blog::orderBy('created_at')->get();
        $oneBlog = $allBlogs->whereIn('id', $id)->first();
        $otherBlog= $allBlogs->whereNotIn('id', $id);
        if($oneBlog){
            $blogger = User::where('id', $oneBlog->user_id)->first();
            if($blogger){
                $oneBlog['blogger_name'] = $blogger->full_name;
                $oneBlog['blogger_pics'] = $blogger->profileImage;
            }
        }
        if(count($otherBlog) > 0){
            foreach ($otherBlog as $blog) {
                $blogger = User::where('id', $blog->user_id)->first();
                if($blogger){
                    $blog['blogger_name'] = $blogger->full_name;
                    $blog['blogger_pics']= $blogger->profileImage;
                }
                array_push($otherBlogs, $blog);
            }
        }
        return view('pages.blogpage')
            ->with('oneBlog', $oneBlog)
            ->with('otherBlogs', $otherBlogs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
