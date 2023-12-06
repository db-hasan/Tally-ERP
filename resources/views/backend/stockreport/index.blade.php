
@extends('backend/layouts/layout')

@section('content')

<div class="">
    <div class="text-end">
        <a href="" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> New Data </a>
    </div>
    <hr>
    <div class="row">
        <h3>Stock Report</h3>
        <div class="col ">
            <div class="row g-1 py-3">
                <label for="inputState" class="form-label">All Product</label>
                    <select id="inputState" class="form-select">
                    <option selected>All Product</option>
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
                <button type="submit" class="btn btn-primary fw-100">Submit</button>
            </div>
        </div>
        <div class="col ">
            <div class="row g-1 py-3">
                <label for="inputState" class="form-label">Single Product</label>
                    <select id="inputState" class="form-select">
                    <option selected>Select Product</option>
                    <option>...</option>
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
                <button type="submit" class="btn btn-primary fw-100">Submit</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>

@endsection