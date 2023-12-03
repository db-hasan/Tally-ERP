
@extends('backend/layouts/layout')


@section('content')
<div class="px-5">
    <div class="text-end">
        <a href="{{ route('purchaes.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>

        <a href="#" class="btn btn-sm btn-dark" id="printBtn" onclick="printInvoice()">
            <i class="fa-solid fa-file-invoice" style="color: #fff;"></i> Print Invoice
        </a>  
    </div>

    <div class="pt-3" id="invice">
        <div class="d-flex justify-content-between">
            <div class="text">
                <div class="">Helpsx IT</div>
                <div class="">+8801723629080</div>
                <div class="">infoalihasanbd@gmail.com</div>
                <div class="">Behar hat, Shibgonj-Bogura</div>
            </div>
            <div class="text-end">
                <div class="">{{$showData->supplier_name}}</div>
                <div class="">{{$showData->supplier_phone}}</div>
                <div class="">{{$showData->supplier_email}}</div>
                <div class="">{{$showData->supplier_address}}</div>
            </div>
        </div>
        <hr>
        <div class="">
            <div class="">Purchaes ID: #{{$showData->purchaes_id}}</div>
            <div class="">{{$showData->created_at}}</div>
        </div>
        <hr>
        <!-- Display other product information as needed -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    $totalQuantity = 0;
                    $totalPrice = 0;
                ?>
                
                @foreach ($indexOrder as $order)
                <?php
                    $quantity=($order->p_product_quantity);
                    $totalQuantity += $quantity; // Increment the total quantity
                    $total=($order->p_buying_price * $order->p_product_quantity);
                    $totalPrice += $total; // Increment the total quantity
                ?>
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->p_buying_price}}</td>
                    <td>{{$quantity}}</td>
                    <td>{{$total}}</td>
                </tr>
                @endforeach
                <tr >
                    <th class="text-end" colspan="3">Total:</th>
                    <th class="text-start">{{$totalQuantity}}</th>
                    <th class="text-end">{{$totalPrice}}</th>
                </tr>
            </tbody>       
        </table>
    </div>
</div>

<script>
    function printInvoice() {
    var printContent = document.getElementById('invice').innerHTML;
    var originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;

    window.print();

    // Restore original content after printing is done
    document.body.innerHTML = originalContent;
}
</script>

@endsection