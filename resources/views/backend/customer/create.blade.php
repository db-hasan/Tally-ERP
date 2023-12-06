@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('customer.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
    </div>
    <hr>
    
    <form method="post" action="{{ route('customer.store') }}"class="row g-3 p-3">
      @csrf

      <div class="row bg-light pt-3 pb-5">
        
        <div class="col-3">
            <label for="customer_name" class="form-label">Customer Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="customer_name">
            @error('customer_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-3">
            <label for="customer_phone" class="form-label">customer Phone<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="customer_phone">
            @error('customer_phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-6">
            <label for="customer_address" class="form-label">customer Address<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="customer_address">
            @error('customer_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

</div>

@endsection