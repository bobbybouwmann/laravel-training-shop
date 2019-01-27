@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($orders))

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Invoice number</td>
                                    <td>Number of products</td>
                                    <td>Number of items</td>
                                    <td>Price</td>
                                    <td>Status</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->invoice_number }}</td>
                                        <td>{{ $order->products->count() }}</td>
                                        <td>{{ $order->products->sum('pivot.quantity') }}</td>
                                        <td>{{ $order->products->sum('pivot.price') }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else

                        <p>No orders found yet!</p>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
