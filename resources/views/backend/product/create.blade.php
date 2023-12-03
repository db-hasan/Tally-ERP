@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
    </div>
    <hr>
    
    <form method="post" action="{{ route('product.store') }}"class="row g-3 p-3" enctype="multipart/form-data">
      @csrf

      <div class="col-md-4 pb-3">
        <label for="category_name" class="form-label">Category Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="category_name" name="category_name" value="{{old('category_name')}}">
        @error('category_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="brand_name" class="form-label">Brand Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{old('brand_name')}}">
        @error('brand_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="product_sku" class="form-label">SKU<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_sku" name="product_sku" value="{{old('product_sku')}}">
        @error('product_sku')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6 pb-3">
        <label for="product_name" class="form-label">Product Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name')}}">
        @error('product_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6 pb-3">
        <label for="product_des" class="form-label">Descritption<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_name" name="product_des" value="{{old('product_des')}}">
        @error('product_des')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="col-md-4 pb-3">
        <label for="manufacturing_cost" class="form-label">Manufacturing_cost<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="manufacturing_cost" name="manufacturing_cost" value="{{old('manufacturing_cost')}}">
        @error('manufacturing_cost')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="selling_price" class="form-label">Price<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{old('selling_price')}}">
        @error('selling_price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="product_quantity" class="form-label">Quantity<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="manufacturing_cost" name="product_quantity" value="{{old('product_quantity')}}">
        @error('product_quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-4">
        <input type="file" class="form-control" id="product_img" name="product_img" value="{{old('product_img')}}">
        @error('product_img')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

</div>

@endsection