@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create order</div>

                    <div class="card-body">

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf

                            <input type="submit" value="Create a new empty order" class="btn btn-primary">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
