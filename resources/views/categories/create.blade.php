@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create category</div>

                    <div class="card-body">

                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Category name</label>
                                <input type="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name" name="name" placeholder="My Category" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{ ($errors->has('description')) ? 'is-invalid' : '' }}" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Create category</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
