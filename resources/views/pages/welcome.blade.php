@extends('layouts.app')

@section('content')
    @include('includes.navbar')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="row shadow mb-4 categoryDiv">
                    <h3 class="text-capitalize ms-3 text-center">Top picks</h3>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="card border-0 shadow m-1 myCardStyle">
                            <a href="#" class="text-decoration-none text-reset">
                                <img src="images/skyscrapperOne.jpg" class="card-img-top cardImage" alt="skyscrapperOne" >
                                <div class="card-body">
                                    <h5 class="card-title">Card title <small class="float-end text-muted smallyText">3 mins</small></h5>
                                    <p class="card-text fontMaxSize">This is a wider card with supporting text below as a</p>
                                    <div class="clearfix mt-2">
                                        <p class="float-start namedP"><img src="images/male.jpg" class="rounded-circle me-2" width="20" /> Anonymous reelrlerelreerer</p>
                                        <a href="#" class="small text-reset float-end text-decoration-none readMore">Read more <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>    
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">                      
                        <div class="card border-0 shadow m-1 myCardStyle">
                            <a href="#" class="text-decoration-none text-reset">
                                <img src="images/skyscrapperOne.jpg" class="card-img-top cardImage" alt="skyscrapperOne" >
                                <div class="card-body">
                                    <h5 class="card-title">Card title <small class="float-end text-muted smallyText">3 mins</small></h5>
                                    <p class="card-text fontMaxSize">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium rer
                                        This is a wider card with supporting text below as a</p>
                                    <div class="clearfix mt-2">
                                        <p class="float-start namedP"><img src="images/male.jpg" class="rounded-circle me-2" width="20" /> Anonymous</p>
                                        <a href="#" class="small text-reset float-end text-decoration-none">Read more <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="card border-0 shadow m-1 myCardStyle">
                            <a href="#" class="text-decoration-none text-reset">
                                <img src="images/skyscrapperOne.jpg" class="card-img-top cardImage" alt="skyscrapperOne" >
                                <div class="card-body">
                                    <h5 class="card-title">Card title <small class="float-end text-muted smallyText">3 mins</small></h5>
                                    <p class="card-text fontMaxSize">This is a wider card with supporting text below as a</p>
                                    <div class="clearfix mt-2">
                                        <p class="float-start namedP"><img src="images/male.jpg" class="rounded-circle me-2" width="20" /> Anonymous</p>
                                        <a href="#" class="small text-reset float-end text-decoration-none">Read more <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="card border-0 shadow m-1 myCardStyle">
                            <a href="#" class="text-decoration-none text-reset">
                                <img src="images/skyscrapperOne.jpg" class="card-img-top cardImage" alt="skyscrapperOne" >
                                <div class="card-body">
                                    <h5 class="card-title">Card title <small class="mb-3 float-end text-muted smallyText">3 mins</small></h5>
                                    <p class="card-text fontMaxSize">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium rer
                                        This is a wider card with supporting text below as a</p>
                                    <div class="clearfix mt-2">
                                        <p class="float-start namedP"><img src="images/male.jpg" class="rounded-circle me-2" width="20" /> Anonymous</p>
                                        <a href="#" class="small text-reset float-end text-decoration-none">Read more <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </a>
                        </div>    
                    </div>
                    <div class="d-flex bd-highlight mt-3 mx-4">
                        <a href="#" class="me-auto btn btn-outline-secondary">Previous</a>
                        
                        <a href="#" class="me-5 btn btn-outline-secondary">Next</a>
                    </div>
                    <div class="card-group mt-3 mb-3">
                        <div class="card border-0 shadow m-3">
                            <div class="row">
                                <div class="col-4">
                                    <img src="images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title <small class="float-end text-muted smallyText">4 mins</small></h5>
                                        <p class="card-text sideMaxSize">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow m-3">
                            <div class="row">
                                <div class="col-4">
                                    <img src="images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
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
                    <!-- <div class="mt-3 row">
                        <div class="col-md-6 col-12">
                            
                            <div class="card border-0 shadow m-1" style="max-width: 500px; ">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
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
                        <div class="col-md-6 col-12">
                            <div class="card border-0 shadow m-1" style="max-width: 500px;">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="images/skyscrapperOne.jpg" class="img-fluid fluidImage" alt="skyscrapperOne">
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
                    </div> -->
                        <!-- <div class="d-flex myblogs pt-1 px-2">
                            <img src="images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                            <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                            </p>
                        </div>
                        <div class="d-flex myblogs pt-1 px-2">
                            <img src="images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                            <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                            </p>
                        </div>
                        <div class="d-flex myblogs pt-1 px-2">
                            <img src="images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                            <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                                <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                            </p>
                        </div> -->
                    <a href="#" class="btn btn-primary m-2">More >>></a>
                </div>
        

                <!-- <div class="shadow-lg mb-3 categoryDiv">
                    <div class="card-group mb-2">
                        <div class="card border-0 shadow m-1 myCardStyle" style="width: 18rem;">
                            <a href="#" class="text-decoration-none text-reset">
                                <img src="images/skyscrapperOne.jpg" class="card-img-top cardImage" alt="skyscrapperOne" >
                                <div class="card-body">
                                    <h5 class="card-title">Card title <small class="float-end text-muted smallyText">3 mins</small></h5>
                                    <p class="card-text fontMaxSize">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium rer
                                        This is a wider card with supporting text below as a</p>
                                    <a href="#" class="text-reset float-end text-decoration-none">Read more <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </a>
                        </div>
                        <div class="card border-0 shadow m-1 myCardStyle" style="width: 18rem;">
                            <a href="#" class="text-decoration-none text-reset">
                                <img src="images/skyscrapperOne.jpg" class="card-img-top cardImage" alt="skyscrapperOne" >
                                <div class="card-body">
                                    <h5 class="card-title">Card title <small class="float-end text-muted smallyText">3 mins</small></h5>
                                    <p class="card-text fontMaxSize">This is a wider card with supporting text below as a</p>
                                    <a href="#" class="text-reset float-end text-decoration-none">Read more <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex myblogs pt-1 px-2 m-1">
                        <img src="images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />                        
                        <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                            <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                        </p>
                    </div>
                    <div class="d-flex myblogs pt-1 px-2 m-1">
                        <img src="images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                        <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                            <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                        </p>
                    </div>
                    <div class="d-flex myblogs pt-1 px-2 m-1">
                        <img src="images/male.jpg" alt="John Doe" class="rounded-circle ms-1 me-3" style="width:25px; height: 25px" />
                        <p class=""><a href="#" class="text-reset">Lorem ipsum, dolor sit amet consectetur adipisicing elit</a>
                            <small class="ms-2"><a href="#" class="text-reset">John Doe</a><i class="ms-2">12:59 Feb 19, 2016</i></small>
                        </p>
                    </div>

                    <a href="#" class="btn btn-primary m-2">More >>></a>
            
                </div> -->
                
            </div>
        </div>
        
    </div>
@endsection