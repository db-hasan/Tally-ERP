@extends('backend/layouts/layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>All Data</h4>
                        <div class="text-end">
                            <a href="{{ route('sales.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="text">
                            <div class="">Sales ID: #{{$showData->sales_id}}</div>
                            <div class="">{{ date('d M Y', $showData->created_at->timestamp) }}</div>
                            
                        </div>
                        <div class="text">
                            <div class="">{{$showData->customar_name}}</div>
                            <div class="">{{$showData->customar_phone}}</div>
                            <div class="">{{$showData->customar_address}}</div>
                        </div>
                    </div>
                    <hr>
                    
                        <!-- Display other product information as needed -->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            @foreach ($indexOrder as $order)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->selling_price}}</td>
                                    <td>{{$order->order_quantity}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <a href="{{ route('sales.index') }}" class="btn btn-sm btn-dark">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection