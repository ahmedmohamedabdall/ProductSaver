@if (session()->has('succes'))
   <div class="alert alert-success alert-dismissible fade show  " role="alert">
    {{ session('succes') }}
<button class="btn-close" role="button"data-bs-dismiss="alert" aria-label="Close" ></button>
</div> 
@endif