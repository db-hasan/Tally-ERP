@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('stock.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
    </div>
    <hr>
    
   <form method="post" action="{{ route('stock.update', $indexData->stock_id) }}"class="row g-3 p-3">
      @csrf

      <div class="col-4">
        <label for="product_name" class="form-label">Customar Name<span class="text-danger">*</span></label>
        <select class="form-select" aria-label="Default select example" name="product_name">
          @foreach ($indexproduct as $item)
          <option value="{{$item->product_id}}">{{$item->product_name}}</option>
          @endforeach
        </select>
        @error('product_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-4 pb-3">
        <label for="stock_quantity" class="form-label">Payment<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" value="{{$indexData->stock_quantity}}">
        @error('stock_quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>

@endsection