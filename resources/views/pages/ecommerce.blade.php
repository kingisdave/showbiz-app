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
                                    <a href="/cart" class="btn btn-outline-dark rounded-circle fa fa-shopping-cart position-relative me-3">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99 <span class="visually-hidden">unread messages</span></span>
                                    </a>
                                    <a href="#" class="btn btn-outline-dark rounded-circle fa fa-envelope position-relative">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99 <span class="visually-hidden">unread messages</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="card mt-2 border-0 innerTitleCard mt-1 p-4 mx-auto shadow">
                                <div class="d-flex align-items-start">
                                    <h4 class="fw-bolder mx-auto text-white">Shop</h4>
                                    <p class="fw-bold text-end text-white me-2">$4450.44</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                                <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow mx-auto text-center">
                                                        <h5 class="card-title fw-bold">Card title</h5>
                                                        <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal">
                                                <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow mx-auto text-center">
                                                        <h5 class="card-title fw-bold">Card title</h5>
                                                        <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal">
                                                <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow mx-auto text-center">
                                                        <h5 class="card-title fw-bold">Card title</h5>
                                                        <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Each Product details Modal -->
        <div class="modal fade productDetails" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
            
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fliud">
                            <div class="card mt-2 border-0 otherTitleCard mt-1 p-4 mx-auto shadow">
                                <h4 class="text-white text-center">Nike Air Max 270 to King Dave 1</h4>
                                <div class="row">
                                    <div id="carouselExampleSlidesOnly" class="col-12 carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                {{-- <div class="mx-auto insideModal rounded mt-4">
                                                    <img src="images/shoe.jpg" class="img-thumbnail border-0 rounded shadow alt="shoe" />
                                                </div> --}}
                                                <img src="images/shoe.jpg" class="d-block w-100 rounded shadow alt="shoe" />
                                            </div>
                                            <div class="carousel-item">
                                                {{-- <div class="mx-auto insideModal rounded mt-4">
                                                    <img src="images/shoe.jpg" class="img-thumbnail border-0 rounded shadow alt="shoe" />
                                                </div> --}}
                                                <img src="images/shoe.jpg" class="d-block w-100 rounded shadow alt="shoe" />
                                            </div>
                                            <div class="carousel-item">
                                                {{-- <div class="mx-auto insideModal rounded mt-4">
                                                    <img src="images/shoe.jpg" class="img-thumbnail border-0 rounded shadow alt="shoe" />
                                                </div> --}}
                                                <img src="images/shoe.jpg" class="d-block w-100 rounded shadow alt="shoe" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 row my-2">
                                        <div class="col-4">
                                            <div class="mx-auto smallInsideModal rounded">
                                                <img src="images/shoe.jpg" class="img-thumbnail border-0 rounded shadow" alt="shoe" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mx-auto smallInsideModal rounded">
                                                <img src="images/shoe.jpg" class="img-thumbnail border-0 rounded shadow" alt="shoe" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mx-auto smallInsideModal rounded">
                                                <img src="images/shoe.jpg" class="img-thumbnail border-0 rounded shadow" alt="shoe" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <h5 class="text-center fw-bold">$399.99</h5>
                                        <h6>Product Description</h6>
                                        <p>
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo eius, 
                                            officia itaque aut corporis voluptatum fugit totam. Iure, eius. 
                                            Modi reiciendis maxime quae quam tempora asperiores magni vel 
                                            ullam accusantium.
                                        </p>
                                        <p class="text-primary">
                                            Review: <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <small>5.0(40)</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- <div class="row"> -->
                            <div class="col-3">Select quantity</div>
                            <div class="col-2 form-group">
                                <select class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add to cart</button>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    @endsection