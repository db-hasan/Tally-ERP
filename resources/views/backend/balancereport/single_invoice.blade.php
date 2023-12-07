
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
                <div class="">{{$customerInfo->customar_name}}</div>
                <div class="">{{$customerInfo->customar_phone}}</div>
                <div class="">{{$customerInfo->customar_address}}</div>
            </div>
        </div>
        <hr>
        <div class="">
            <div class="">Customar ID: #{{$customerInfo->customar_id}}</div>
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
                <th>
                    <td>{{$customerInfo->customar_name}}</td>
                    <td>{{$customerInfo->totalSales}}</td>
                    <td>{{$customerInfo->totalCollection}}</td>
                    <td>{{$customerInfo->totalSales - $customerInfo->totalCollection}}</td>
                </th>
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