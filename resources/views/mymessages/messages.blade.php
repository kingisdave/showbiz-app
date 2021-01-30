@if (session()->has('successMessage')) 
    <div class="alert alert-success">
        {{ session()->get('successMessage')}}
    </div>
@elseif (session()->has('errorMessage'))
    <div class="alert alert-danger">
        {{ session()->get('errorMessage')}}
    </div>
@endif