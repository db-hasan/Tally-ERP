
@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('collection.create') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> Add Data</a>
    </div>
    <hr>
    <div class="custom-scrollbar-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indexcollection as $itemcollection)
                <tr>
                    <td>{{$itemcollection->collection_id}}</td>  
                    <td>{{$itemcollection->customar_name}}</td> 
                    <td>{{$itemcollection->customar_phone}}</td> 
                    <td>{{$itemcollection->payment}}</td>
                    <td>{{ date('d M Y', $itemcollection->created_at->timestamp) }}</td>  
                    <td class="icons">
                        <a href="{{ route('collection.edit', $itemcollection->collection_id) }}" type="button" class="btn edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('collection.destroy', $itemcollection->collection_id) }}" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
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