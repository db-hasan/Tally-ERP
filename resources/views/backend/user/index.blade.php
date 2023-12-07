
@extends('backend/layouts/layout')

@section('content')

<div class="">
    <div class="text-end">
        <a href="" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> Add Data</a>
    </div>
    <hr>
    <div class="custom-scrollbar-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indexUser as $item)
                <tr>
                    <td>{{$item->id}}</td> 
                    <td>{{$item->name}}</td> 
                    <td>{{$item->email}}</td> 
                    <td>{{ date('d M Y', $item->created_at->timestamp) }}</td> 
                    <td class="icons">
                        <a href="" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>

@endsection