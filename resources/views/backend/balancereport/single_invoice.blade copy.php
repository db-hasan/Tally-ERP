
@extends('backend/layouts/layout')


@section('content')
<div class="px-5">
    <div class="text-end">
        <a href="{{ route('sales.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> View Data</a>

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
                <div class="">{{$showData->customar_name}}</div>
                <div class="">{{$showData->customar_phone}}</div>
                <div class="">{{$showData->customar_address}}</div>
            </div>
        </div>
        <hr>
        <div class="">
            <div class="">Customar ID: #{{$showData->customar_id}}</div>
        </div>
        <hr>
        <!-- Display other product information as needed -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sales</th>
                    <th scope="col">Collection</th>
                    <th scope="col">Balance</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $totalSales = 0;
                    $totalCollection = 0;
                ?>
                @foreach ($showDatas as $item)
                <?php
                    $sales = ($item->selling_price * $item->order_quantity);
                    $totalSales += $sales; // Increment the total quantity
                    $collection = $item->payment;
                    $totalCollection += $collection;
                    $balance=($totalSales-$collection);
                ?>
                
                @endforeach
                <tr>
                    <td>{{$showData->customar_id}}</td>
                    <td>{{$showData->customar_name}}</td>
                    <td>{{$totalSales}}</td>
                    <td>{{$collection}}</td>
                    <td>{{$balance}}</td>
                </tr>
                
            </tbody>  
            
            {{-- <tbody>
                <?php
                    $totalQuantity = 0;
                    $totalPrice = 0;
                ?>
                
                @foreach ($indexOrder as $order)
                <?php
                    $quantity=($order->order_quantity);
                    $totalQuantity += $quantity; // Increment the total quantity
                    $total=($order->selling_price * $order->order_quantity);
                    $totalPrice += $total; // Increment the total quantity
                ?>
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->selling_price}}</td>
                    <td>{{$quantity}}</td>
                    <td>{{$total}}</td>
                </tr>
                @endforeach
                <tr >
                    <th class="text-end" colspan="3">Total:</th>
                    <th class="text-start">{{$totalQuantity}}</th>
                    <th class="text-end">{{$totalPrice}}</th>
                </tr>
            </tbody>        --}}
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