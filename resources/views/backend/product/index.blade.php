
@extends('backend/layouts/layout')

@section('content')

<div class="">
    <div class="text-end">
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> Add Data</a>
    </div>
    <hr>
    <div class="custom-scrollbar-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th class="px-5">Name</th>
                    <th>Desicription</th>
                    <th>SKU</th>
                    <th>Manufacturing_Cost</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th class="ps-5">Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($indexproduct as $itemproduct)
                <?php
                    // $product_ids         = $itemproduct->product_id;
                    // $category_name      = $itemproduct->category_name;
                    // $brand_name         = $itemproduct->brand_name;
                    // $product_name       = $itemproduct->product_name;
                    // $product_des        = $itemproduct->product_des;
                    // $product_sku        = $itemproduct->product_sku;
                    // $manufacturing_cost = $itemproduct->manufacturing_cost;
                    // $selling_price      = $itemproduct->selling_price;
                    // $product_quantity   = $itemproduct->product_quantity;
                    // $product_img        = $itemproduct->product_img;
                ?>
                @endforeach
                <tr>
                    <td>{{$product_ids }}</td> 
                    <td>{{$category_name }}</td> 
                    <td>{{$brand_name }}</td> 
                    <td>{{$product_name  }}</td> 
                    <td>{{$product_name  }}</td> 
                    <td>{{$product_name  }}</td> 
                    <td>{{$product_name  }}</td> 
                    <td>{{$product_name  }}</td> 
                    <td>{{$product_name  }}</td>
                    <td>
                        <img src="/images/{{$itemproduct->product_img}}" alt="Image not found" style="height: 40px; width: 40px;" class="rounded">
                    </td> 
                    <td>{{$itemproduct->status_name}}</td> 
                    <td class="icons">
                        <a href="{{ route('product.show', $itemproduct->product_id) }}" type="button"  class="btn view"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('product.edit', $itemproduct->product_id) }}" type="button" class="btn edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('product.destroy', $itemproduct->product_id) }}" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody> --}}
            <tbody>
                @foreach ($indexproduct as $itemproduct)
                <tr>
                    <td>{{$itemproduct->product_id}}</td> 
                    <td>{{$itemproduct->category_name}}</td> 
                    <td>{{$itemproduct->brand_name}}</td> 
                    <td>{{$itemproduct->product_name}}</td> 
                    <td>{{$itemproduct->product_des}}</td> 
                    <td>{{$itemproduct->product_sku}}</td> 
                    <td>{{$itemproduct->manufacturing_cost}}</td> 
                    <td>{{$itemproduct->selling_price}}</td> 
                    <td>{{$itemproduct->product_quantity}}</td>
                    <td>
                        <img src="/images/{{$itemproduct->product_img}}" alt="Image not found" style="height: 40px; width: 40px;" class="rounded">
                    </td> 
                    <td>{{$itemproduct->status_name}}</td> 
                    <td class="icons">
                        <a href="{{ route('product.show', $itemproduct->product_id) }}" type="button"  class="btn view"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('product.edit', $itemproduct->product_id) }}" type="button" class="btn edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('product.destroy', $itemproduct->product_id) }}" type="button"  class="btn delete" onclick="return confirm('Are you sure dalete')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{asset('backend/js/jquery-3.7.1.min.js') }} "></script>
<script src="{{asset('backend/js/dataTables.js') }} "></script>
@endsection