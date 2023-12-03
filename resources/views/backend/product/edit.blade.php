@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
    </div>
    <hr>
    
   <form method="post" action="{{ route('product.update', $indexData->product_id) }}" enctype="multipart/form-data" class="row g-3 p-3">
      @csrf

      <div class="col-md-4 pb-3">
        <label for="category_name" class="form-label">Category Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="category_name" name="category_name" value="{{$indexData->category_name}}">
        @error('category_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="brand_name" class="form-label">Brand Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{$indexData->brand_name}}">
        @error('brand_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-4 pb-3">
        <label for="product_sku" class="form-label">SKU<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_sku" name="product_sku" value="{{$indexData->product_sku}}">
        @error('product_sku')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6 pb-3">
        <label for="product_name" class="form-label">Product Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$indexData->product_name}}">
        @error('product_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6 pb-3">
        <label for="product_des" class="form-label">Descritption<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="product_name" name="product_des" value="{{$indexData->product_des}}">
        @error('product_des')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="col-md-3 pb-3">
        <label for="manufacturing_cost" class="form-label">Manufacturing_cost<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="manufacturing_cost" name="manufacturing_cost" value="{{$indexData->manufacturing_cost}}">
        @error('manufacturing_cost')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-3 pb-3">
        <label for="selling_price" class="form-label">Price<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{$indexData->selling_price}}">
        @error('selling_price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-3 pb-3">
        <label for="product_quantity" class="form-label">Quantity<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="manufacturing_cost" name="product_quantity" value="{{$indexData->product_quantity}}">
        @error('product_quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Status</label>
        <select class="form-select" aria-label="Default select example" name="status">
          @foreach ($indexStatus as $itemStatus)
          <option value="{{$itemStatus->id}}" {{ $indexData->product_status == $itemStatus->id ? 'selected' : '' }} >{{$itemStatus->status_name}}</option>
          @endforeach
        </select>
        @error('status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
                        
      <div class="col-md-4">
        <div class="d-flex">
          <div class="">
            <input type="file" class="form-control" id="product_img" name="product_img" value="{{$indexData->product_img}}">
            @error('product_img')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
         <div class=" ps-3">
           <img src="/images/{{$indexData->product_img}}" alt="Image not found" style="height: 40px; width: 40px;" class="rounded">
         </div>
        </div>
      </div>
      

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

	<script>
		jQuery(document).ready(function(){
			jQuery('#category').change(function(){
				let cate_id=jQuery(this).val();
				jQuery('#subsubcategory').html('<option value="">Select City</option>')
				jQuery.ajax({
					url:'/subcategory',
					type:'post',
					data:'cate_id='+cate_id+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#subcategory').html(result)
					}
				});
			});
			
			jQuery('#subcategory').change(function(){
				let sub_id=jQuery(this).val();
				jQuery.ajax({
					url:'/subsubcategory',
					type:'post',
					data:'sub_id='+sub_id+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#subsubcategory').html(result)
					}
				});
			});
			
		});
	</script>

@endsection