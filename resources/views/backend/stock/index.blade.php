
@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('stock.create') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> Add Data</a>
    </div>
    <hr>
    <div class="custom-scrollbar-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indexstock as $itemstock)
                <tr>
                    <td>{{$loop->index+1}}</td>  
                    <td>{{$itemstock->product_id}}</td>  
                    <td>{{$itemstock->product_name}}</td> 
                    <td>{{$itemstock->stock_quantity}}</td>
                    <td>{{ date('d M Y', $itemstock->created_at->timestamp) }}</td>  
                    <td class="icons">
                        <a href="{{ route('stock.edit', $itemstock->stock_id) }}" type="button" class="btn edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('stock.destroy', $itemstock->stock_id) }}" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>
@endsection