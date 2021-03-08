@extends('layouts.app')

    @section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/myckeditor.js') }}"></script>

        <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <div class="text-center">
                        <h2 class="fw-bolder mt-2">Blog Section</h2>
                        <p class="fst-italic">This is the blog section. Post your new blogs here</p>
                        @if (session('errorMessage'))
                            <div class="alert alert-danger logalert rounded-pill" role="alert">
                                {{ session('errorMessage') }}
                            </div>   
                        @endif
                    </div>
                    <hr />
                    <div class="row">
                        <div class="card col-md-8 col-sm-10 col-12 mx-auto border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Edit Blog</h5>
                                {{-- @if($specblog) --}}
                                <form class="form row" method="POST" action="{{route('blog.update', $specblog->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-6 col-sm-7 col-12">
                                        <img id="blogImage" class="mb-2" src="/storage/blogs/{{$specblog->blogimage}}" alt="{{$specblog->blogimage}}"/>
                                    </div>
                                    <div class="col-md-6 col-sm-5 col-12">
                                        <label for="blog_image">Cover Image</label>
                                        <div class="form-group p-1 mb-1">
                                            <input type="file" name="blogimage" accept="image/*" class="form-control @error('blogimage') is-invalid @enderror" 
                                            onchange="previewMyFile(event)" />
                                            @error('blogimage')
                                                <small class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="blog_category">Blog Category</label>
                                        <select class="form-control" name="blogcategory">
                                            @if(count($blogcats) > 0) 
                                                @foreach($blogcats as $category)
                                                    <option value="{{$category->blog_category}}">{{$category->blog_category}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="blog_title">Blog Title</label>
                                        <input type="text" name="blog_title" class="form-control @error('blog_title') is-invalid @enderror"
                                        required autocomplete="blog_title" value="{{$specblog->blog_title}}" />
                                    
                                        @error('blog_title')
                                            <small class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="blog_body">Blog</label>
                                        <textarea id="editor" name="blog_body" class="form-control @error('blog_body') is-invalid @enderror"
                                        required>
                                            {!! $specblog->blog_body !!}
                                        </textarea>
                                        @error('blog_body')
                                            <small class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="form-control btn btn-info">Submit Post</button>
                                    </div>
                                </form>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer details -->
                @include('includes.footer')
            </div>
        </div>
        <script>
            const previewMyFile = function(e) {
                const blogImage = document.getElementById('blogImage');
                blogImage.src = URL.createObjectURL(event.target.files[0]);
                blogImage.onload = function() {
                    URL.revokeObjectURL(blogImage.src) // free memory
                }
            };
            
        </script>
    @endsection