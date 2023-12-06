
@extends('backend/layouts/layout')

@section('content')

<div class="">
    <div class="text-end">
        <a href="{{ route('sales.create') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> Add Data</a>
    </div>
    <hr>
    <div class="custom-scrollbar-table">
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{ Session::get('msg') }}
            </div>
        @endif
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Sales</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indexSales as $item)
                <tr>
                    <td>{{$item->sales_id}}</td> 
                    <td>{{$item->customar_name}}</td> 
                    <td>{{$item->customar_phone}}</td> 
                    <td>0000</td> 
                    <td>{{$item->payment}}</td> 
                    <td>{{ date('d M Y', $item->created_at->timestamp) }}</td> 
                    <td class="icons">
                        <a href="{{ route('sales.invice', $item->sales_id) }}" type="button"  class="btn"><i class="fa-solid fa-file-invoice" style="color: #e4740c;"></i></a>
                        <a href="{{ route('sales.destroy', $item->sales_id) }}" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>

@endsection