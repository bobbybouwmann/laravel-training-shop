@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Current order</div>

                    <div class="card-body">

                        <h2>Current added products</h2>

                        @if (count($order->products))

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>€{{ $product->pivot->price }}</td>
                                            <td>{{ $product->pivot->quantity }}</td>
                                            <td>€{{ $product->pivot->price *  $product->pivot->quantity }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="right">Total</td>
                                        <td>€{{ $totalPrice }}</td>
                                    </tr>
                                </tfoot>

                            </table>

                            <form action="{{ route('orders.finalize.store', $order->id) }}" method="POST">
                                @csrf

                                <input type="submit" value="Finalize order" class="btn btn-primary">

                            </form>

                        @else

                            There are no products yet, add some products to finalize this order.

                        @endif

                        <hr>

                        <form action="{{ route('orders.products.store', $order->id) }}" method="POST">
                            @csrf

                            <h2>Add more products</h2>

                            <div class="row">

                                @foreach ($products as $count => $product)

                                    <div class="col-3">

                                        <div class="form-group form-check">

                                            <input type="radio"
                                                   class="form-check-input"
                                                   name="product_id"
                                                   value="{{ $product->id }}"
                                                   id="product-{{ $product->id }}">

                                            <label class="form-check-label"
                                                   for="product-{{ $product->id }}">
                                                {{ $product->name }}
                                            </label>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                            <div class="form-group">

                                <label for="quantity">Quantity</label>

                                <input type="number"
                                       value="1"
                                       min="1"
                                       max="5"
                                       class="form-control-range"
                                       name="quantity"
                                       id="quantity">

                            </div>

                            <input type="submit" value="Submit" class="btn btn-primary">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
