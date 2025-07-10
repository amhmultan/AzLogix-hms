<x-app-layout>
    <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="text-primary font-bold">View <span class="text-success">Purchase Invoice</span></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Invoice Number:</label>
                <div>{{ $purchase_invoice->invoice_number }}</div>
            </div>

            <div class="col-md-4 mb-3">
                <label>Purchase Date:</label>
                <div>{{ \Carbon\Carbon::parse($purchase_invoice->purchase_date)->format('d-M-Y') }}</div>
            </div>

            <div class="col-md-4 mb-3">
                <label>Supplier:</label>
                <div>{{ $purchase_invoice->supplier->name }}</div>
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
                    @foreach($purchase_invoice->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rs. {{ number_format($item->unit_price, 2) }}</td>
                            <td>{{ $item->batch_no ?? '-' }}</td>
                            <td>{{ $item->expiry_date ? \Carbon\Carbon::parse($item->expiry_date)->format('d-M-Y') : '-' }}</td>
                            <td>Rs. {{ number_format($item->total_price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-md-3 mb-2">
                <label><strong>Total Amount (Gross):</strong></label>
                <div>Rs. {{ number_format($purchase_invoice->total_amount, 2) }}</div>
            </div>
            <div class="col-md-3 mb-2">
                <label><strong>Discount:</strong></label>
                <div>Rs. {{ number_format($purchase_invoice->discount, 2) }}</div>
            </div>
            <div class="col-md-3 mb-2">
                <label><strong>Tax:</strong></label>
                <div>{{ number_format($purchase_invoice->tax_percent, 2) }}% (Rs. {{ number_format($purchase_invoice->tax_amount, 2) }})</div>
            </div>
            <div class="col-md-3 mb-2">
                <label><strong>Net Amount:</strong></label>
                <div><strong>Rs. {{ number_format($purchase_invoice->net_amount, 2) }}</strong></div>
            </div>
        </div>

        <div class="mt-4">
            <label><strong>Remarks / Notes:</strong></label>
            <p>{{ $purchase_invoice->notes ?: 'N/A' }}</p>
        </div>
    </div>
</x-app-layout>
