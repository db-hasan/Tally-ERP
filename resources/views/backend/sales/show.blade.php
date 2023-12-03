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
                            <a href="{{ route('purchaes.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="text">
                            <div class="">Purchaes ID: #{{$showData->purchaes_id}}</div>
                            <div class="">{{$showData->created_at}}</div>
                            
                        </div>
                        <div class="text">
                            <div class="">{{$showData->supplier_name}}</div>
                            <div class="">{{$showData->supplier_phone}}</div>
                            <div class="">{{$showData->supplier_email}}</div>
                            <div class="">{{$showData->supplier_address}}</div>
                        </div>
                    </div>
                    <hr>
                    
                        <!-- Display other product information as needed -->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Buying Price</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            @foreach ($indexOrder as $order)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$order->product_name}}</td>
                                    <td>{{$order->p_buying_price}}</td>
                                    <td>{{$order->p_selling_price}}</td>
                                    <td>{{$order->p_product_quantity}}</td>
                                </tr>
                                <tr>
                            </tbody>
                            @endforeach
                        </table>
                    
                    
                    
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <a href="{{ route('purchaes.index') }}" class="btn btn-sm btn-dark">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection