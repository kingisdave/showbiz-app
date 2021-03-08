<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Requests\BlogStoreRequest;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // $blogCat = auth()->user()->BlogCategory;
        $blogcats = BlogCategory::orderBy('blog_category', 'asc')->get();
        $myblogs = auth()->user()->Blog;
        
        return view('pages.privates.blogger')
                ->with('blogcats', $blogcats)
                ->with('myblogs', $myblogs)
                ->with('successMessage');
    	// return view('pages.privates.blogger')->with('blogs', $user->blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        // handle file upload
        if($request->hasFile('blogimage')){
            // get the filename with the extension
            $filenameWithExt = $request->file('blogimage')->getClientOriginalName();
            // get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // just the extension
            $fileExt = $request->file('blogimage')->getClientOriginalExtension();
            // Filename to Store
            $fileNameToStore = $filename.time().'.'.$fileExt;
            // uploaded Image 
            $storagePath = $request->file('blogimage')->storeAs('public/blogs', $fileNameToStore);
        } else {
            $fileNameToStore = 'bloggers.jpg';
        }
        // if($validated){
        $a = BlogCategory::where('blog_category', $request->blogcategory)->first();
        $blogCatId = $a->id;
        $userId = auth()->user()->id;
        $createBlog = Blog::create([
            'user_id' => $userId,
            'blog_title' => $request->blog_title, 
            'blog_body' => $request->blog_body, 
            'blogimage' => $fileNameToStore, 
            'blog_category_id' => $blogCatId
        ]); 
        if($createBlog){
            return redirect()->back()->with("successMessage", "Blog Posted");
        } else{
            return redirect()->back()->with("errorMessage", "You have been followed. Check yourself");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // $blogId = $blog->id;
        $blogcats = BlogCategory::orderBy('blog_category', 'asc')->get();
        $specBlog = Blog::find($blog->id);

        return view('pages.privates.blogedit')
                ->with('specblog', $specBlog)
                ->with('blogcats', $blogcats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogStoreRequest $request, Blog $blog)
    {
        if($request->hasFile('blogimage')){
            // get the filename with the extension
            $filenameWithExt = $request->file('blogimage')->getClientOriginalName();
            // get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // just the extension
            $fileExt = $request->file('blogimage')->getClientOriginalExtension();
            // Filename to Store
            $fileNameToStore = $filename.time().'.'.$fileExt;
            // uploaded Image 
            $storagePath = $request->file('blogimage')->storeAs('public/blogs', $fileNameToStore);
        } else {
            $fileNameToStore = 'bloggers.jpg';
        }
        $blogCat = BlogCategory::where('blog_category', $request->blogcategory)->first();
        $blogCatId = $blogCat->id;
        $pickBlog = Blog::find($blog->id);
        $upBlog = $pickBlog->update([
                        'blog_category_id' => $blogCatId,
                        'blog_title'=> $request->blog_title, 
                        'blog_body'=> $request->blog_body,
                        'blogimage' => $fileNameToStore, 
                    ]);
        if($upBlog){
            return redirect("/dashboard/blog")->with('successMessage', "Your blog has been updated");
        } else {
            return redirect()->back()->with('errorMessage', "Error updating the blog");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $pickBlog = Blog::find($blog->id);
        $downBlog = $pickBlog->delete();
        if($downBlog){
            return redirect()->back()->with('successMessage', "Post has been deleted");
        } else {
            return redirect()->back()->with('errorMessage', "Error updating the blog");
        }
    }
}
