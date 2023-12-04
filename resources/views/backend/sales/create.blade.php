@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('sales.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
    </div>
    <hr>
    
    <form method="post" action="{{ route('sales.store') }}" class="row g-3 p-3">
      @csrf

      @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
      @endif
      
      <div class="row bg-light pt-3 pb-5">
        <div class="col-3">
            <label for="customar_name" class="form-label">Customer Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="customar_name">
            @error('customar_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-3">
            <label for="customar_phone" class="form-label">Customar Phone<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="customar_phone">
            @error('customar_phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="customar_address" class="form-label">Customar Address<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="customar_address">
            @error('customar_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>

      
      <div class="container">
          <div class="pt-3">
              <div class="row item mb-3">
                  <div class="col-4">
                      <select class="form-select" aria-label="Default select example" name="product_name[]" required>
                          <option value="" selected>Select Product</option>
                          @foreach ($indexProduct as $itemProduct)
                          <option value="{{$itemProduct->product_id}}">{{$itemProduct->product_name}}</option>
                          @endforeach
                      </select>
                      @error('product_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="col-2">
                      <h5 class="pt-1" id="price">100</h5>
                  </div>

                  <div class="col-2">
                      <input type="number" class="form-control" placeholder="Quantity" name="order_quantity[]" id="qty" required>
                      @error('order_quantity')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="col-2">
                      <h5 class="pt-1" id="total">00</h5>
                  </div>

                  <div class="col-2 icons">
                      <a href="javascript:void(0);" class="btn add-row"><i class="fa-solid fa-circle-plus fa-xl" style="color: #1fe04f;"></i></a>
                      <a href="javascript:void(0);" class="btn remove-row"><i class="fa-solid fa-trash fa-xl" style="color: #da1647;"></i></a>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-6 text-end">
        <div class="p-1">Grand Total : </div>
      </div>
      <div class="col-2">
        <div class="p-1">00</div>
      </div>
      <div class="col-2">
        <h5 class="pt-1" id="grandTotal">00</h5>
      </div>

      <div class="col-8 text-end">
        <div class="p-1">Payment : </div>
      </div>
      <div class="col-2 text-end">
        <input type="text" class="form-control" placeholder="Amount" name="payment">
        @error('payment')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-2 text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Event delegation for add-row and remove-row buttons
        $(".container").on("click", ".add-row", function () {
            var newRow = $(".item").first().clone();
            newRow.find("input").val(""); // Clear the input values
            $(this).closest(".item").after(newRow);
        });

        $(".container").on("click", ".remove-row", function () {
            if ($(".item").length > 1) {
                $(this).closest(".item").remove();
            }
        });
    });
</script>


@endsection