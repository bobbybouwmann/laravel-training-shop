@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->statusLabel }}</td>

                                    <td align="right">
                                        @if ($order->status === 0)
                                            <a href="{{ route('orders.products.create', $order) }}" class="btn btn-primary">Fill order</a>
                                        @elseif (in_array($order->status, [1, 2, 3, 4]))
                                            <a href="{{ route('orders.show', $order) }}" class="btn btn-success">Show order</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
