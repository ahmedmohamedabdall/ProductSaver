

@extends('layout.layout')
@section('content')

<div class="container  p-3 "></div>
<div class="row">
    <div class="col-md-3 ms-3 mt-1">
                 @auth
            <div class="list-group">
                <a href="{{ route('user.edit', $user->id) }}" class="list-group-item list-group-item-action">
                    <i class="bi-gear-fill me-2"></i>{{ $user->name }}
                </a>

                <a href="{{ route('user.show', $user->id) }}" class="list-group-item list-group-item-action">
                    <i class="bi-pencil-square me-2"></i>
                    @if ($user->getImgUrl() !== 'no img')
                    <img src="{{ str_replace('http://127.0.0.1:8000/', '', $user->getImgUrl()) }}" alt="User Image"
                        class="img-fluid rounded mx-auto d-block">
                    @endif
                </a>

                <a href="#" class="list-group-item list-group-item-action ">
                    <i class="bi-person-fill me-2"></i>{{ $user->email }}
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="bi-book me-2"></i>{{ $user->bio }}
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <h5>postet_{{  $user->users_products()}}_products</h5>
                </a>
            </div>

            <div class="well mt-3">
                <h4>space used</h4>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 65%;">
                        65%
                    </div>
                </div>

                <h4>current week</h4>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%;">
                        25%
                    </div>
                </div>
            </div>
            @endauth
    </div>


        <div class="col">
            <div class="card mt-2" style="width: 100%;">
                <div class="card-body">
                    <h4 class="card-title">Products Table</h4>
                    <p class="card-text">
                        <table class="table table-hover table-striped mb-5">
                            <thead>
                                <tr>
                                    <th scope="col">owner</th>
                                    <th scope="col">product</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $index => $item)
                                <tr>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <a href="{{ route('product.show', $item->id) }}" type="button"
                                            class="btn btn-outline-primary">{{ $item->name }}</a>
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->slug }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </p>
         
                </div>
            </div>
                 <div class="mt-5">
                {{ $product->links() }}
            </div>
        </div>
    </div>
</div>
      
    </div>
</div>
</div>

@endsection
