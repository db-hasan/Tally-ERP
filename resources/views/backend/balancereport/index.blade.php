
@extends('backend/layouts/layout')

@section('content')

<div class="">
    <div class="text-end">
        <a href="" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> New Data </a>
    </div>

    <hr>
    <div class="row">
        <h3>Customer Balance</h3>
        <div class="col ">
                <div class="row g-1 py-3">
                    <label for="inputState" class="form-label">All Customer</label>
                        <select id="inputState" class="form-select">
                        <option selected>All Customer</option>
                        </select>
                </div>
                <div class="row g-3">
                    <div class="col pb-3">
                        <label for="inputPassword4" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col pb-3">
                        <label for="inputPassword4" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="row g-1 pb-3">
                    <a href="{{ route('all_balance.invice') }}" class="btn btn-primary fw-100">Submit</a>
                </div>
        </div>

        <div class="col ">
            <form action="" method="post">
                <div class="row g-1 py-3">
                    <label for="inputState" class="form-label">Single Customer</label>
                        {{-- <select id="inputState" class="form-select">
                        <option selected>Select Customer</option>
                        @foreach ($indexCustomar as $item)
                        <option value="{{$item->customar_id}}">{{$item->customar_name}}</option>
                        @endforeach
                        </select> --}}
                        @foreach ($indexCustomar as $item)
                        <a href="{{ route('single_balance.invice', $item->customar_id) }}" class="nav-link">{{$item->customar_name}}</a>
                        @endforeach

                </div>
                <div class="row g-3">
                    <div class="col pb-3">
                        <label for="inputPassword4" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col pb-3">
                        <label for="inputPassword4" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="row g-1 pb-3">
                    <button href="" type="submit" class="btn btn-primary fw-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
  
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>

@endsection