<x-app-layout>
    <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="text-danger font-bold">Add <span class="text-success">Purchase Invoice</span></h2>
            </div>
        </div>

        <form action="{{ route('admin.purchases.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="invoice_number">Invoice Number</label>
                    <input type="text" name="invoice_number" class="form-control" value="{{ old('invoice_number') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="purchase_date">Purchase Date</label>
                    <input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date', date('Y-m-d')) }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="supplier_id">Supplier</label>
                    <select name="supplier_id" class="form-control" required>
                        <option value="">-- Select Supplier --</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>

            <h5 class="text-primary">Invoice Items</h5>
            <div class="text-right mb-2">
                <button type="button" class="btn btn-secondary" id="addRow">+ Add Item</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="itemsTable">
                    <thead class="bg-light">
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Batch #</th>
                            <th>Expiry</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="items[0][product_id]" class="form-control" required>
                                    <option value="">Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="items[0][quantity]" class="form-control quantity" min="1" required></td>
                            <td><input type="number" name="items[0][unit_price]" class="form-control unit_price" step="0.01" required></td>
                            <td><input type="text" name="items[0][batch_no]" class="form-control"></td>
                            <td><input type="date" name="items[0][expiry_date]" class="form-control"></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-item">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="discount">Discount (Rs.)</label>
                    <input type="number" step="0.01" name="discount" class="form-control" id="discount" value="{{ old('discount', 0) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="tax_percentage">Tax (%)</label>
                    <input type="number" step="0.01" name="tax_percentage" class="form-control" id="tax_percentage" value="{{ old('tax_percentage', 0) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="notes">Remarks / Notes</label>
                    <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Gross Amount:</strong>
                    <div id="grossAmount">Rs. 0.00</div>
                </div>
                <div class="col-md-3">
                    <strong>Net Amount:</strong>
                    <div id="netAmount">Rs. 0.00</div>
                </div>
            </div>

            {{-- Hidden fields to submit values --}}
            <input type="hidden" name="gross_amount" id="gross_amount_input">
            <input type="hidden" name="net_amount" id="net_amount_input">
            <input type="hidden" name="tax_percentage" id="tax_percentage_input">

            <div class="text-right">
                <a class="btn btn-info mx-2" href="{{ route('admin.purchases.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                <button type="submit" class="btn btn-success">Save Invoice</button>
            </div>
        </form>
    </div>

    @section('script')
    <script>
        let rowIndex = 1;

        document.getElementById('addRow').addEventListener('click', function () {
            const table = document.querySelector('#itemsTable tbody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <select name="items[${rowIndex}][product_id]" class="form-control" required>
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="items[${rowIndex}][quantity]" class="form-control quantity" min="1" required></td>
                <td><input type="number" name="items[${rowIndex}][unit_price]" class="form-control unit_price" step="0.01" required></td>
                <td><input type="text" name="items[${rowIndex}][batch_no]" class="form-control"></td>
                <td><input type="date" name="items[${rowIndex}][expiry_date]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-item">Remove</button></td>
            `;
            table.appendChild(row);
            rowIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-item')) {
                e.target.closest('tr').remove();
                calculateAmounts();
            }
        });

        document.addEventListener('input', function (e) {
            if (
                e.target.classList.contains('quantity') ||
                e.target.classList.contains('unit_price') ||
                e.target.id === 'discount' ||
                e.target.id === 'tax_percentage'
            ) {
                calculateAmounts();
            }
        });

        function calculateAmounts() {
            let total = 0;
            document.querySelectorAll('#itemsTable tbody tr').forEach(function (row) {
                let qty = parseFloat(row.querySelector('.quantity')?.value || 0);
                let price = parseFloat(row.querySelector('.unit_price')?.value || 0);
                total += qty * price;
            });

            let discount = parseFloat(document.getElementById('discount')?.value || 0);
            let tax = parseFloat(document.getElementById('tax_percentage')?.value || 0);

            let afterDiscount = total - discount;
            let taxAmount = afterDiscount * (tax / 100);
            let net = afterDiscount + taxAmount;

            // Display
            document.getElementById('grossAmount').textContent = 'Rs. ' + total.toFixed(2);
            document.getElementById('netAmount').textContent = 'Rs. ' + net.toFixed(2);

            // Hidden inputs
            document.getElementById('gross_amount_input').value = total.toFixed(2);
            document.getElementById('net_amount_input').value = net.toFixed(2);
            document.getElementById('tax_percentage_input').value = tax.toFixed(2);
        }
    </script>
    @endsection
</x-app-layout>
