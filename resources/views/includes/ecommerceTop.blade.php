<div class="d-flex align-items-start mx-3">
    <h4 class="fw-bold">Showbiz</h4>
    <div class="ms-auto">
        <a href="/cart" class="btn btn-outline-dark rounded-circle fa fa-shopping-cart position-relative me-3">
           
            @if($myCart)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{count($myCart)}} <span class="visually-hidden">unread messages</span></span>
            @else
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary"> <span class="visually-hidden">unread messages</span></span>
            @endif    
        </a>
        <a href="#" class="btn btn-outline-dark rounded-circle fa fa-envelope position-relative">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99 <span class="visually-hidden">unread messages</span></span>
        </a>
    </div>
</div>