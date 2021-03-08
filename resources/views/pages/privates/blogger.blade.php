@extends('layouts.app')

    @section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/myckeditor.js') }}"></script>

        <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <h3 class="fw-bolder mt-2">Blog Section</h3>
                    <p class="small">This is the blog section. Post your new blogs here</p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    @if (session('successMessage'))
                                        <div class="alert alert-success logalert rounded-pill" role="alert">
                                            {{ session('successMessage') }}
                                        </div>   
                                    @endif
                                </div>
                            </div>

                                <div class="card m-1 shadow">
                                
                                {{-- @if (session('errorMessage'))
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="alert alert-danger logalert rounded-pill" role="alert">
                                            {{ session('errorMessage') }}
                                        </div>

                                    </div>
                                </div>
                                @endif --}}
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <strong>Blog Categories</strong>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="d-flex flex-wrap">
                                                    @if(count($blogcats) > 0) 
                                                        @foreach($blogcats as $category)
                                                        <span class="badge bg-primary rounded-pill p-3 m-1 shadow">{{$category->blog_category}}</span>   
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <button class="btn btn-secondary addBtn text-white m-1" data-bs-toggle="modal" data-bs-target="#blogCatModal">Add Category</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- The add new blog category Modal -->
                        <div class="modal fade" id="blogCatModal" tabindex="-1" aria-labelledby="blogCatModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="container-fliud">
                                            <h5 class="text-center">Add New Category</h5>
                                            <div class="card m-1 border-0 shadow">
                                                <div class="card-body">
                                                    <form class="row" method="POST" action="/dashboard/blog/category">
                                                        @csrf
                                                        <div class="col-md-4 col-12 p-2">
                                                            New Category :
                                                        </div>
                                                        <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                            <input type="text" name="blog_category" class="form-control @error('blog_category') is-invalid @enderror"
                                                                required autocomplete="blog_category" placeholder="Sports, Agriculture...." />
                                                            @error('blog_category')
                                                                <small class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                        
                                                        <button class="btn btn-sm btn-primary float-right" type="submit">Add Category</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card m-1 shadow">
                                <button type="button" class="btn btn-primary addBtn text-white" data-bs-toggle="modal" data-bs-target="#bloggersModal">Add new blog</button>
                            </div>
                            <p><a href="/blog" class="small">Click here to go to Blog page</a></p>
                        </div>
                    </div>
                    <hr />
                    <div class="row blogsRows">
                        <h5 class="col-md-9 col-8 fw-bolder">Posted Blogs</h5>
                        <div class="col-md-3 col-4 form-group mb-1">   
                            <select class="form-control">
                                <option value="all">All</option>
                                @if(count($blogcats) > 0) 
                                    @foreach($blogcats as $category)
                                        <option value="{{$category->blog_category}}">{{$category->blog_category}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        @if(count($myblogs)>0)
                            @foreach ($myblogs as $myblog)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    {{-- <div class="card my-2 mx-1 border-0 shadow bloggerCard">
                                        <a href="#" class="text-decoration-none text-reset">
                                            <img src="/storage/blogs/{{$myblog->blogimage}}" alt="lroom" class="card-img-top bloggerImg" style="height: 20vh" />
                                            <div class="d-flex p-1">
                                                <p class="small"><small><i class="fa fa-eye"></i>111 views</small></p>
                                                <p class="small mx-auto"><small><i class="fa fa-heart text-danger"></i>10 likes</small></p>
                                                <p class="small ms-auto"><small><i class="fa fa-commenting text-primary"></i>2 comments</small></p>
                                            </div>
                                            <div class="card-body">
                                                <p class="small">
                                                    <small>{!!$myblog->blog_body!!}</small>
                                                </p>
                                            </div>
                                        </a>
                                    </div> --}}
                                    <div class="card border-0 shadow m-1">
                                        <div class="d-flex dashboardBlogs pt-1 pe-2 m-1">
                                            <img src="/storage/blogs/{{$myblog->blogimage}}" alt="{{$myblog->blogimage}}" class="img-fluid ms-1 me-3" style="width:100px; height: 80px" />
                                            <p class=""><a href="/dashboard/blog/{{$myblog->id}}" class="text-reset"><strong>{{$myblog->blog_title}}</strong></a>
                                                <small class="ms-2"><i class="">12:59 Feb 19, 2016</i></small>
                                            </p>
                                            <p class="ms-auto"><span class="btn btn-sm btn-outline-danger" onclick="var a = <?php echo 'deleting'.$myblog->id ?>; a.submit() ">Delete</span></p>
                                            <form method="POST" id="{{'deleting'.$myblog->id}}" action="{{route('blog.destroy', $myblog->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                    {{-- <div class="card border-0 shadow m-1 myCardStyle">
                                        <a href="#" class="text-decoration-none text-reset">
                                            <img src="/storage/blogs/{{$myblog->blogimage}}" class="card-img-top cardImage" alt="skyscrapperOne" >
                                            <div class="card-body">
                                                <h5 class="card-title">{{$myblog->blog_title}} <small class="float-end text-muted smallyText">3 mins</small></h5>
                                                <p class="card-text"><small>{!!$myblog->blog_body!!}</small></p>
                                                
                                            </div>
                                        </a>
                                    </div> --}}
                                </div>

                                {{-- <div class="card border-0 shadow m-1 myCardStyle">
                                    <a href="#" class="text-decoration-none text-reset">
                                        <img src="/storage/blogs/{{$myblog->blogimage}}" class="card-img-top cardImage" alt="skyscrapperOne" >
                                        <div class="card-body">
                                            <h5 class="card-title">{{$myblog->blog_title}} <small class="float-end text-muted smallyText">3 mins</small></h5>
                                            <p class="card-text fontMaxSize">{!!$myblog->blog_body!!}</p>
                                            
                                        </div>
                                    </a>
                                </div> --}}

                            @endforeach
                        @else
                            <div class="alert alert-danger logalert rounded-pill" role="alert">
                                You have no blog yet
                            </div>
                        @endif
                        
                        {{-- <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="card my-2 mx-1 shadow bloggerCard">
                                <img src="/images/livingRoomOne.jpg" alt="lroom" class="img-fluid bloggerImg" />
                                <div class="d-flex p-1">
                                    <p class="small"><small><i class="fa fa-eye"></i>111 views</small></p>
                                    <p class="small mx-auto"><small><i class="fa fa-heart text-danger"></i>10 likes</small></p>
                                    <p class="small ms-auto"><small><i class="fa fa-commenting text-primary"></i>2 comments</small></p>
                                </div>
                                <div class="card-body">
                                    <p class="small"><small>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Am
                                        et voluptates eveniet architecto beatae cum sint, numquam fu
                                        ga cupiditate odio, alias sunt ab consequatur blanditiis modi
                                    </small></p>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    
                    <!-- The add new blog Modal -->
                    <div class="modal fade" id="bloggersModal" tabindex="-1" aria-labelledby="bloggersModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="container-fliud createModalBlog">
                                        <h5 class="text-center">Add New Blog</h5>
                                        <div class="card m-1 border-0 shadow">
                                            <div class="card-body">
                                                <form class="row" method="POST" action="/dashboard/blog" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-12">
                                                        <img id="mailHeaderImage" class="mb-2" src="..." alt="..."/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-12 p-2">
                                                            Blog Image :
                                                        </div>
                                                        <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                        <input type="file" name="blogimage" accept="image/*" class="form-control @error('blogimage') is-invalid @enderror" 
                                                        onchange="previewMyFile(event)" />
                                                        @error('blogimage')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 col-12 p-2">
                                                        Blog Category :
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                        <select class="form-control" name="blogcategory">
                                                            @if(count($blogcats) > 0) 
                                                                @foreach($blogcats as $category)
                                                                    <option value="{{$category->blog_category}}">{{$category->blog_category}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-2">
                                                        Blog Title :
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                        <input type="text" name="blog_title" class="form-control @error('blog_title') is-invalid @enderror"
                                                        required autocomplete="blog_title" value="{{old('blog_title')}}" />
                                                    
                                                        @error('blog_title')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="col-12 form-group p-2 mb-1">
                                                        <textarea id="editor" name="blog_body" class="form-control h-50 @error('blog_body') is-invalid @enderror"
                                                        required autocomplete="blog_body">
                                                            Write your blog here...
                                                        </textarea>
                                                        @error('blog_body')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <button class="btn btn-sm btn-primary float-right">Post</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
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
                const mailHeaderImage = document.getElementById('mailHeaderImage');
                mailHeaderImage.src = URL.createObjectURL(event.target.files[0]);
                mailHeaderImage.onload = function() {
                    URL.revokeObjectURL(mailHeaderImage.src) // free memory
                }
            };
            // $(document).ready(function() {
            //     $('#logger').submit(function(e) {
            //         e.preventDefault();
            //         if (email.value=="" || password.value=="") {
            //             $('#aler').fadeIn(1000).fadeOut(4000);
            //             aler.hidden=false;
            //             logerror.hidden = true;
            //             return;
            //         }
            //         loader.hidden=false;
            //         $.ajax({
            //             type: "POST",
            //             url: 'functions.php',
            //             data: $(this).serialize(),
            //             success: function(response)
            //             {
            //                 var jsonData = JSON.parse(response);
            //                 // user is logged in successfully in the backend, now lets redirect
            //                 if (jsonData.success == "1") {
            //                     location.href = 'usernew.php';
            //                 } else {
            //                     logerror.hidden = false;
            //                     aler.hidden=true;
            //                     loader.hidden=true;

            //                 }
            //             }
            //         })
            //     });
            // })
        </script>
    @endsection