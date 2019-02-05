@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if ($category->image)
                        <img src="{{ $category->image->path }}" class="card-img-top">
                    @endif
                          
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <form method="POST" action="{{ route('categories.destroy', $category) }}" class="form-inline">
                            @CSRF
                            @method('DELETE')

                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary mr-2">Edit</a>

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
