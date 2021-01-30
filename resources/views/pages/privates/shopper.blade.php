@extends('layouts.app')

    @section('content')
        <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <div class="text-center">
                        <h2 class="fw-bolder mt-2">Blog Section</h2>
                        <p class="fst-italic">This is the blog section.</p>
                        
                        <button type="button" class="btn btn-primary addBtn text-white" data-bs-toggle="modal" data-bs-target="#bloggersModal">Add new blog</button>
                        <p><a href="./blogpage.html" class="small">Click here to go to Blog page</a></p>
                    </div>
                    <hr />
                    <div class="row blogsRows">
                        <h5 class="col-md-9 col-8 fw-bolder">Posted Blogs</h5>
                        <div class="col-md-3 col-4 form-group mb-1">
                            <select class="form-control">
                                <option value="all">All</option>
                                <option value="sports">Sports</option>
                                <option value="agriculture">Agriculture</option>
                                <option value="health">Health</option>
                                <option value="education">Education</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="card my-2 mx-1 shadow bloggerCard">
                                <img src="./assets/images/livingRoomOne.jpg" alt="lroom" class="img-fluid bloggerImg" />
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
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="card my-2 mx-1 shadow bloggerCard">
                                <img src="./assets/images/livingRoomOne.jpg" alt="lroom" class="img-fluid bloggerImg" />
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
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="card my-2 mx-1 shadow bloggerCard">
                                <img src="./assets/images/livingRoomOne.jpg" alt="lroom" class="img-fluid bloggerImg" />
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
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="card my-2 mx-1 shadow bloggerCard">
                                <img src="./assets/images/livingRoomOne.jpg" alt="lroom" class="img-fluid bloggerImg" />
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
                        </div>
                    </div>
                    <!-- The add new blog Modal -->
                    <div class="modal fade" id="bloggersModal" tabindex="-1" aria-labelledby="signModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="container-fliud">
                                        <h5 class="text-center">Add New Shop</h5>
                                        <div class="card m-1 border-0 shadow">
                                            <div class="card-body">
                                                <form class="row">
                                                    <div class="col-md-4 col-12 p-2">
                                                        Shop Category :
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                        <select class="form-control">
                                                            <option value="new">Add New</option>
                                                            <option value="agriculture">Agriculture</option>
                                                            <option value="education">Education</option>
                                                            <option value="health">Health</option>
                                                            <option value="politics">Politics</option>
                                                            <option value="sports">Sports</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-12 p-2">
                                                        Blog Title :
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                        <input type="text" class="form-control" name="blogtitle" placeholder="The rise of ..." />
                                                    </div>
                                                    <div class="col-md-4 col-12 p-2">
                                                        Subtitle :
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                        <input type="text" class="form-control" name="subtitle" placeholder="How did he..." />
                                                    </div>
                                                    <div id="editor">
                                                        Write your blog here...
                                                    </div>
                                                    <script>
                                                        ClassicEditor
                                                            .create(document.querySelector('#editor'))
                                                            .then( editor => {
                                                                console.log( editor );
                                                            })
                                                            .catch(error => {
                                                                console.error( error );
                                                            })
                                                    </script>
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
    @endsection