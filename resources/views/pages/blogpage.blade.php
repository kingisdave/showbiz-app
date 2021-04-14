@extends('layouts.app')

    @section('content')
        @include('includes.navbar')
        <div>
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-md-9 col-12">
                        <div class="container">
                            @if ($oneBlog)
                                <div class="card mx-1 px-1 border-0">
                                    <h3 class="text-capitalize text-center my-4">{{$oneBlog->blog_title}}</h3>
                                    <p class="text-center">
                                        <img src="/storage/profileImages/{{$oneBlog->blogger_pics}}" class="rounded-circle" alt="{{$oneBlog->blogger_pics}}" width="25" />
                                        <a href="#" class="text-decoration-none text-reset text-capitalize">{{$oneBlog->blogger_name}}</a>
                                        {{-- <small class="ms-3">January 13th, 2021</small> --}}
                                        <small class="ms-3">{{$oneBlog->created_at}}</small>
                                    </p>
                                    <div class="divTopImage">
                                        <img src="/storage/blogs/{{$oneBlog->blogimage}}" class="topBigImage rounded m-2" alt="{{$oneBlog->blogimage}}"/>
                                    </div>
                                    <p class="small m-1"><em>This image is caption by the International Captioner </em></p>
                                    <div class="card-body">
                                        <p class="justify">{!! $oneBlog->blog_body !!}</p>
                                    </div>
                                    <div class="container m-2">
                                        <h6 class="mb-3">Post your comment</h6>
                                        <form class="form mt-3">
                                            <div class="row my-1">
                                                <label class="col-md-3 col-sm-4 col-12">Your Email</label>
                                                <div class="form-group col-md-9 col-sm-8 col-12">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" />
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <label class="col-md-3 col-sm-4 col-12">Comment</label>
                                                <div class="form-group col-md-9 col-sm-8 col-12">
                                                    <textarea class="form-control" name="comment" placeholder="Write your comment here"></textarea>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <button type="submit" class="btn btn-primary float-end">Post comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>    
                            @else
                                <div >
                                    <span class="alert alert-danger">Blog Not Found</span>
                                </div>
                            @endif

                            @if ($otherBlogs)
                                <h4 class="my-4">Related News</h4>
                                <div class="row mt-3 mb-3">
                                    @foreach ($otherBlogs as $relatedBlog)
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 card border-0 shadow m-2 mx-auto">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img src="/storage/blogs/{{$relatedBlog->blogimage}}" class="img-fluid fluidImage" alt="{{$relatedBlog->blogimage}}">
                                                </div>
                                                <div class="col-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong>{{$relatedBlog->blog_title}}</strong><small class="float-end text-muted smallyText">4 mins</small></h5>
                                                        {{-- <p class="card-text sideMaxSize">{{$relatedBlog->blog_body}}</p> --}}
                                                        <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    @endforeach
                                </div>
                                    
                                {{-- <div class="card-group mt-3 mb-3"> --}}
                                    {{-- <div class="card border-0 shadow m-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="/images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title <small class="float-end text-muted smallyText">4 mins</small></h5>
                                                    <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-0 shadow m-2">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="/images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title <small class="float-end text-muted smallyText">4 mins</small></h5>
                                                    <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     --}}
                            {{-- @else
                                 --}}
                            @endif
                            {{-- <h4 class="my-4">Related News</h4> --}}
                            {{-- <div class="card-group mt-3 mb-3">
                                <div class="card border-0 shadow m-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="/images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title <small class="float-end text-muted smallyText">4 mins</small></h5>
                                                <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0 shadow m-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="/images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title <small class="float-end text-muted smallyText">4 mins</small></h5>
                                                <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group mt-3 mb-3">
                                <div class="card border-0 shadow m-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="/images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title <small class="float-end text-muted smallyText">4 mins</small></h5>
                                                <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0 shadow m-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="/images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title <small class="float-end text-muted smallyText">4 mins</small></h5>
                                                <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card m-1 border-0 shadow-lg">
                            <div class="mb-2">
                                @if (count($otherBlogs) > 0)
                                    <h5 class="m-1">Top picks</h5>
                                    @foreach ($otherBlogs as $topBlog)
                                        <div class="d-flex myblogs pt-1 px-2 m-1">
                                            <img src="/storage/profileImages/{{$topBlog->blogger_pics}}" alt="{{$topBlog->blogger_pics}}" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                                            <p class=""><a href="#" class="text-reset">{{$topBlog->blog_title}}</a>
                                                {{-- <small class="ms-2"><a href="#" class="text-reset">{{$topBlog->blogger_name}}</a><i class="ms-2">12:59 Feb 19, 2016</i></small> --}}
                                                <small class="ms-2"><a href="#" class="text-reset">{{$topBlog->blogger_name}}</a><i class="ms-2">{{$topBlog->created_at}}</i></small>
                                            </p>
                                        </div>    
                                    @endforeach
                                @else
                                    
                                @endif
                                {{-- <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div>
                                <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div>
                                <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div>
                                <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div> --}}
                            </div>
                            <div class="mt-2">
                                @if (count($otherBlogs) > 0)
                                    <h5 class="m-1">Recent Blogs</h5>
                                    @foreach ($otherBlogs as $recentBlog)
                                        <div class="d-flex myblogs pt-1 px-2 m-1">
                                            <img src="/storage/profileImages/{{$recentBlog->blogger_pics}}" alt="{{$recentBlog->blogger_pics}}" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                                            <p class=""><a href="#" class="text-reset">{{$recentBlog->blog_title}}</a>
                                                <small class="ms-2"><a href="#" class="text-reset">{{$recentBlog->blogger_name}}</a><i class="ms-2">{{$recentBlog->created_at}}</i></small>
                                            </p>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- <h5 class="m-1">Recent Blogs</h5>
                                <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div>
                                <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div>
                                <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div>
                                <div class="d-flex myblogs pt-1 px-2 m-1">
                                    <img src="/images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                                    <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                        <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- The Signup and Signin Modal -->
            {{-- <div class="modal fade" id="signModal" tabindex="-1" aria-labelledby="signModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content"> --}}
                
                        <!-- Modal Header -->
                        {{-- <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> --}}
                
                        <!-- Modal body -->
                        {{-- <div class="modal-body">
                            <div class="container-fliud">
                                <ul class="nav nav-tabs text-center tabHeader pt-2">
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link active" id="signIn-tab" data-bs-toggle="tab" href="#signIn" role="tab" aria-controls="signIn" aria-selected="true">Sign in</a>
                                    </li>
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link" id="signUp-tab" data-bs-toggle="tab" href="#signUp" role="tab" aria-controls="signUp" aria-selected="false">Sign Up</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="signIn" role="tabpanel" aria-labelledby="signIn-tab">
                                        <form class="form" id="logger" method="post">
                                            <div class="form-floating my-3">
                                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                            <div class="clearfix my-3">  
                                                <div class="form-group form-check float-start">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="check"/>Remember me
                                                    </label>
                                                </div>
                                                <div class=" float-end">
                                                    <a href="#">Forgot Password?</a>
                                                </div>                                                    
                                            </div>
                                
                                            
                                            <div class="d-grid gap-2 text-center">
                                                <button class="btn btn-primary fa fa-envelope" type="button">Sign in</button>
                                                <h6>OR</h6>
                                                <button class="btn btn-danger" type="button">Sign in with Gmail</button>
                                                <p class="small">Not Registered? <a href="#">Sign up here</a></p>
                                            </div>
                            
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-tab">
                                        <p class="small text-center">Sign up here, it's very easy and quick</p>
                                        <form class="form" id="logger" method="post">
                                            <div class="row g-2 my-2">
                                                <div class="col-md">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="First name" />
                                                        <label for="floatingInputGrid">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingLastname" placeholder="Last name" />
                                                        <label for="floatingLastname">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-2 my-2">
                                                <div class="col-md">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingUsername" placeholder="Enter your Username" />
                                                        <label for="floatingUsername">Username</label>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-floating">
                                                        <input type="email" class="form-control" id="floatingEmail" placeholder="user@email.com" />
                                                        <label for="floatingEmail">Email Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-floating my-2">
                                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                            <div class="form-floating my-2">
                                                <input type="password" class="form-control" id="floatingConfirmPassword" placeholder="Confirm password" />
                                                <label for="floatingConfirmPassword">Confirm your password</label>
                                            </div>
                                    
                                            <div class="clearfix my-3">  
                                                <div class="form-group form-check float-start">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="check"/>Remember me
                                                    </label>
                                                </div>
                                                <div class=" float-end">
                                                    <a href="#">Forgot Password?</a>
                                                </div>                                                    
                                            </div>
                                
                                            
                                            <div class="d-grid gap-2 text-center">
                                                <button class="btn btn-primary fa fa-envelope" type="button">Sign up</button>
                                                <h6>OR</h6>
                                                <button class="btn btn-danger" type="button">Sign up with Gmail</button>
                                            </div>
                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>     --}}
                    {{-- </div>
                </div>
            </div> --}}
        </div>
    @endsection