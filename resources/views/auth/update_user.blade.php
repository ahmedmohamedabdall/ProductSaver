@extends('layout.layout')
@section('content')

    <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST" >
@method('put')

    
        @csrf
        <div class="container p-5">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName"value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputBio" class="form-label">Bio</label>
                <input type="text" name="bio" class="form-control" id="exampleInputBio" value="{{ old('bio') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">image</label>
                <input type="file" name="image" class="form-control" id="exampleInputImage"
                    value="{{ old('image') }}">
            </div>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type='text' name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" value="{{ old('email') }}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">update</button>
    </form>
    </div>
@endsection
