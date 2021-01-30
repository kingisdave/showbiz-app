@extends('layouts.app')

    @section('content')
        @include('includes.navbar')
            
        <div class="container-fluid ecommerceWrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 eCard mt-3 p-2 mx-auto shadow">
                        <div class="card-body p-2 eCardBody">
                            <div class="d-flex align-items-start mx-3">
                                <h4 class="fw-bold">Showbiz</h4>
                                <div class="ms-auto">
                                    <a href="cart.html" class="btn btn-outline-dark rounded-circle fa fa-shopping-cart position-relative me-3">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99 <span class="visually-hidden">unread messages</span></span>
                                    </a>
                                    <a href="#" class="btn btn-outline-dark rounded-circle fa fa-envelope position-relative">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99 <span class="visually-hidden">unread messages</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="card mt-2 border-0 innerTitleCard mt-1 py-4 mx-auto shadow">
                                <div class="d-flex align-items-start">
                                    <h4 class="fw-bolder mx-auto text-white">Cart</h4>
                                    <p class="fw-bold text-end text-white me-4">$134450.44</p>
                                </div>
                                <div class="card-body">
                                    <div class="mx-auto cartContainer">
                                        <div class="card cartCardHeight my-2">
                                            <div class="card-body row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <img src="images/shoe.jpg" class="img-fluid border-0 shadow" alt="shoe" />
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bolder">Nike Air Max 270 to King Dave 1</p>
                                                    <p>Lorem ipsum, dolor sit amet</p>
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bold">$134450.44</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cartCardHeight my-2">
                                            <div class="card-body row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <img src="images/shoe.jpg" class="img-fluid border-0 shadow" alt="shoe" />
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bolder">Nike Air Max 270 to King Dave 1</p>
                                                    <p>Lorem ipsum, dolor sit amet c</p>
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bold">$134450.44</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card totalCartHeight my-2">
                                            <div class="card-body row">
                                                <div class="col-md-8">
                                                    <h4 class="fw-bold">Total Purchase</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <p class="text-center fw-bold">$134450.44</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <div class="row">
                                                <div class="col-md-8">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <button class="btn btn-block form-control btn-danger text-center">Buy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
