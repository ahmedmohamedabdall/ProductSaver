    @extends('layout.layout')
    @section('content')
        @include('share.message')
            <div class="card-body">

                            <div class="row ms-5 mt-4">

                                <div class="col c-d">
                                    <div class="card">

                                        <div class="card-body ">

                                            <h5 class="card-title"> <i class="bi-person-fill card-icon  me-1 ">
                                                </i>4569</h5>
                                            <p class="card-text lead">{{ $product->user->name }}
                                             <h1 class="fs-4 lead"> posted =>{{ $product->user->users_products() }} product </h1></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col c-d">
                                    <div class="card ">

                                        <div class="card-body ">
                                            <h5 class="card-title  "><i class="bi-clipboard-data me-1"></i> 15872
                                            </h5>
                                            <p class="card-text lead">{{ $product->user->email}}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col c-d">
                                    <div class="card">

                                        <div class="card-body ">
                                            <h5 class="card-title"><i class="bi-arrow-repeat  me-1"></i> 272</h5>
                                            <p class="card-text lead ">{{ $product->user->bio}}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col c-d">
                                    <div class="card w-50 rounded-circle">

                                        <div class="card-body ">
                                            
                                            <img src="{{ str_replace('http://127.0.0.1:8000/product/','', $product->user->getImgUrl() ) }}" alt="User Image"
                     {{-- here --}}   class="img-fluid rounded mx-auto   rounded-circle" > 

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
        <div class="row ms-5 mt-2">
            <div class="col">
                <div class="card " style="width:50rem; margin-bottom: 100px;">

                    <div class="card-body ">

                        <h4 class="card-title ">products table </h4>


                        <p class="card-text ">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">name</th>
                                    <th scope="col">ds</th>
                                    <th scope="col">price</th>
                                    <th scope="col">link</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->slug }}</td>
                                </tr>

                            </tbody>
                        </table>
                        </p>

                    </div><!-- card body end-->
                </div>
            </div>
            <div class="col mt-5">
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">edit</button>
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </div>




            <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

    

                            <form method="post" action="{{ route('product.update', $product->id) }}" class="ms-5"
                                style="width: 40%">
                                @csrf
                                


                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">name</label>
                                    <input type="text" class="form-control" name='name' id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">description</label>
                                    <input type="text" class="form-control" name='description'
                                        id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">price</label>
                                    <input type="number" class="form-control" name='price' id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">slug</label>
                                    <input type="url" class="form-control" name="slug" id="exampleInputEmail1">

                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>




                        </div>

                    </div>
                </div>
            </div>
        @endsection
