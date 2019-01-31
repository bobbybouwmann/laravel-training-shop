@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Order [{{ $order->id }}]
                        <span class="badge badge-secondary">{{ $order->statusLabel }}</span>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">

                            <thead>

                                <tr>
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($order->products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ $product->image->path ?? 'https://dummyimage.com/640x480/e062e0/ffffff&text=Default+image' }}" width="100px">
                                        </td>
                                        <td>{{ $product->pivot->name }}</td>
                                        <td>€{{ $product->pivot->price }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>€{{ $product->pivot->quantity * $product->pivot->price }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                            <tfoot>

                                <tr>
                                    <td colspan="4" align="right">Total</td>
                                    <td>€{{ $totalPrice }}</td>
                                </tr>

                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
