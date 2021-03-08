@extends('layouts.app')

    @section('content')
    <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <h3 class="fw-bold mt-2">Dashboard</h3>
                    <p class="fst-italic">Welcome {{ Auth::user()->full_name }} to your dashboard.</p>
                    <hr />
                    <h5>Complete Overview</h5>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="card m-1 shadow overviewCard">
                                {{-- <h4 class="fw-bolder lh-1">0</h4> --}}
                                @if(count($myblogs) > 0)
                                    <h4 class="fw-bolder lh-1">{{count($myblogs)}}</h4>
                                @else
                                    <h4 class="fw-bolder lh-1">0</h4>
                                @endif
                                <p class="small lh-1">Your Blogs</p> 
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="card m-1 shadow overviewCard">
                                <h4 class="fw-bolder lh-1 ">0</h4>
                                <p class="small lh-1">Store Items</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="card m-1 shadow overviewCard">
                                <h4 class="fw-bolder lh-1 ">0</h4>
                                <p class="small lh-1">Comments</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="card m-1 shadow overviewCard">
                                <h4 class="fw-bolder">Account Details</h4>
                                <p class="small lh-1 fst-italic">
                                    <a href="#" class="text-decoration-underline"><small>Click to update your account profile</small></a>
                                </p>
                            </div>        
                        </div>
                    </div>
                    <hr />
                    <div class="container-fluid">
                        <h5>Notifications</h5>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Shop Request</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Shop Request</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Blog Comment</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-primary small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Blog Comment</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Shop Request</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Shop Request</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Blog Comment</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                                <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                    <div class="d-flex align-content-start justify-content-start">
                                        <p class="text-primary small"><i class="fa fa-circle me-2"></i>New</p>
                                        <p class="ms-auto text-muted"><small>24th March</small></p>
                                    </div>
                                    <div class="text-center text-wrap">
                                        <p class="fw-bold">Blog Comment</p>
                                    </div>
                                    <div class="d-flex text-wrap">
                                        <img src="images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                        <p class="fw-bold ms-3 mt-1">Named Username</p>
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
</body>
</html>