@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            @if ($category->image)
                                                <img src="{{ $category->image->path }}" width="150px" height="auto">
                                            @endif
                                        </td>
                                        <td>
                                            <p><a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit</a></p>

                                            <form method="POST" action="{{ route('categories.destroy', $category) }}">
                                                @CSRF
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
