
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
                    <th>Amount</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($indexpurchaes as $itempurchaes)
                <tr>
                    <td>{{$itempurchaes->purchaes_id}}</td> 
                    <td>{{$itempurchaes->supplier_name}}</td> 
                    <td>{{$itempurchaes->supplier_phone}}</td> 
                    <td>{{$itempurchaes->supplier_email}}</td> 
                    <td>{{ date('d M Y', $itempurchaes->created_at->timestamp) }}</td> 
                    <td class="icons">
                        <a href="{{ route('purchaes.show', $itempurchaes->purchaes_id) }}" type="button"  class="btn view"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('purchaes.invice', $itempurchaes->purchaes_id) }}" type="button"  class="btn"><i class="fa-solid fa-file-invoice" style="color: #e4740c;"></i></a>
                        <a href="{{ route('purchaes.destroy', $itempurchaes->purchaes_id) }}" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>

@endsection