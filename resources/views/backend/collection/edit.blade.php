@extends('backend/layouts/layout')

@section('content')
<div class="">
    <div class="text-end">
        <a href="{{ route('collection.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>
    </div>
    <hr>
    
   <form method="post" action="{{ route('collection.update', $indexData->collection_id) }}"class="row g-3 p-3">
      @csrf

      <div class="col-4">
        <label for="customar_name" class="form-label">Customar Name<span class="text-danger">*</span></label>
        <select class="form-select" aria-label="Default select example" name="customar_name">
          @foreach ($indexCustomar as $item)
          <option value="{{$item->customar_id}}">{{$item->customar_name}}</option>
          @endforeach
        </select>
        @error('customar_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-md-4 pb-3">
        <label for="payment" class="form-label">Payment<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="payment" name="payment" value="{{$indexData->payment}}">
        @error('payment')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>

@endsection