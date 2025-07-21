<x-app-layout>
    <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="text-primary font-bold">View <span class="text-success">Sale Invoice</span></h2>
            </div>
            <div class="col-sm-6 text-right">
                <a class="btn btn-info mx-2" href="{{ route('admin.sales.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                <a href="{{ route('admin.sales.print', $sale->id) }}" class="btn btn-outline-primary" target="_blank">
                    Print Invoice
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Invoice Number:</label>
                <div>SI-{{ $sale->id }}</div>
            </div>

            <div class="col-md-4 mb-3">
                <label>Sale Date:</label>
                <div>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d-M-Y') }}</div>
            </div>

            <div class="col-md-4 mb-3">
                <label>Patient:</label>
                <div>{{ $sale->patient->name ?? '-' }}</div>
            </div>
        </div>

        <hr>

        <h5 class="text-primary">Invoice Items</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Batch #</th>
                        <th>Expiry</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sale->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rs. {{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->batch_no ?? '-' }}</td>
                            <td>{{ $item->expiry_date ? \Carbon\Carbon::parse($item->expiry_date)->format('d-M-Y') : '-' }}</td>
                            <td>Rs. {{ number_format($item->gross_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-md-3 mb-2">
                <label><strong>Total Amount (Gross):</strong></label>
                <div>Rs. {{ number_format($sale->gross_amount, 2) }}</div>
            </div>
            <div class="col-md-3 mb-2">
                <label><strong>Discount:</strong></label>
                <div>Rs. {{ number_format($sale->discount, 2) }}</div>
            </div>
            <div class="col-md-3 mb-2">
                <label><strong>Tax:</strong></label>
                <div>   {{ number_format($sale->tax, 2) }}% (Rs.{{ $sale->gross_amount * $sale->tax / 100 ? number_format($sale->gross_amount * $sale->tax / 100, 2) : '0.00' }})</div>
            </div>
            <div class="col-md-3 mb-2">
                <label><strong>Net Amount:</strong></label>
                <div><strong>Rs. {{ number_format($sale->net_amount, 2) }}</strong></div>
            </div>
        </div>

        <div class="mt-4">
            <label><strong>Remarks / Notes:</strong></label>
            <p>{{ $sale->notes ?: 'N/A' }}</p>
        </div>
    </div>
</x-app-layout>
