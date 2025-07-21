<x-app-layout>
  <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
    <div class="row mb-4">
      <div class="col-sm-6">
        <h2 class="text-danger font-bold">Add <span class="text-success">Sale Invoice</span></h2>
      </div>
    </div>

    {{-- Error Display --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    {{-- Search Form --}}
    <form method="GET" action="">
      <div class="row mb-4">
        <div class="col-sm-3">
          <input type="search" name="search" id="search" placeholder="Enter MR Number" class="form-control" value="{{ old('search', $search) }}">
        </div>
        <div class="col-sm-9">
          <button type="submit" class="btn btn-primary mx-2">Search</button>
        </div>
      </div>
    </form>

    @if ($search && count($patients) > 0)
    {{-- Patient Info --}}
    @php $patient = $patients[0]; @endphp
    <div class="row my-4">
      <div class="col-md-6">
        <label class="text-gray-700 font-black">Patient Name:</label>
        <div class="form-control-plaintext">{{ $patient->name }}</div>
      </div>
      <div class="col-md-6">
        <label class="text-gray-700 font-black">Contact Number:</label>
        <div class="form-control-plaintext">{{ $patient->phone }}</div>
      </div>
    </div>

    {{-- Sale Invoice Form --}}
    <form action="{{ route('admin.sales.store') }}" method="POST">
      @csrf

      {{-- Hidden Patient ID --}}
      <input type="hidden" name="fk_patient_id" value="{{ $patient->id }}">

      {{-- Invoice Items --}}
      <div class="text-start mb-3">
      <label for="date" class="form-label">Invoice Date</label>
      <input type="date" name="date" id="date" class="form-control text-black" value="{{ old('date', date('Y-m-d')) }}" required>
    </div>
    <hr />
      <h5 class="text-primary">Invoice Items</h5>
      <div class="text-right mb-2">
        <button type="button" class="btn btn-secondary" id="addRow">+ Add Item</button>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" id="itemsTable">
          <thead class="bg-light">
            <tr>
              <th>Product</th>
              <th>Batch</th>
              <th>Expiry</th>
              <th>Qty</th>
              <th>Unit Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select name="items[0][fk_product_id]" class="form-control" required>
                  <option value="">Select Product</option>
                  @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                  @endforeach
                </select>
              </td>
              <td><input type="text" name="items[0][batch_no]" class="form-control"></td>
              <td><input type="date" name="items[0][expiry_date]" class="form-control"></td>
              <td><input type="number" name="items[0][quantity]" class="form-control quantity" min="1" required></td>
              <td><input type="number" name="items[0][unit_price]" class="form-control unit_price" step="0.01" required></td>
              <td><button type="button" class="btn btn-danger btn-sm remove-item">Remove</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      {{-- Totals --}}
      <div class="row">
        <div class="col-md-3 mb-3">
          <label>Discount (Rs.)</label>
          <input type="number" step="0.01" name="discount" class="form-control" id="discount" value="{{ old('discount', 0) }}">
        </div>
        <div class="col-md-3 mb-3">
          <label>Tax (%)</label>
          <input type="number" step="0.01" name="tax_percentage" class="form-control" id="tax_percentage" value="{{ old('tax_percentage', 0) }}">
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

      {{-- Hidden Amounts --}}
      <input type="hidden" name="gross_amount" id="gross_amount_input">
      <input type="hidden" name="net_amount" id="net_amount_input">
      <input type="hidden" name="tax_amount" id="tax_percentage_input">

      <div class="text-right">
        <a class="btn btn-info mx-2" href="{{ route('admin.sales.index') }}"><u>B</u>ack</a>
        <button type="submit" class="btn btn-success">Save Invoice</button>
      </div>
    </form>
    @endif
  </div>

  @section('script')
  <script>
    let rowIndex = 1;

    document.getElementById('addRow').addEventListener('click', function () {
      const table = document.querySelector('#itemsTable tbody');
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>
          <select name="items[${rowIndex}][fk_product_id]" class="form-control" required>
            <option value="">Select Product</option>
            @foreach ($products as $product)
              <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
          </select>
        </td>
        <td><input type="text" name="items[${rowIndex}][batch_no]" class="form-control"></td>
        <td><input type="date" name="items[${rowIndex}][expiry_date]" class="form-control"></td>
        <td><input type="number" name="items[${rowIndex}][quantity]" class="form-control quantity" min="1" required></td>
        <td><input type="number" name="items[${rowIndex}][unit_price]" class="form-control unit_price" step="0.01" required></td>
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

      document.getElementById('grossAmount').textContent = 'Rs. ' + total.toFixed(2);
      document.getElementById('netAmount').textContent = 'Rs. ' + net.toFixed(2);
      document.getElementById('gross_amount_input').value = total.toFixed(2);
      document.getElementById('net_amount_input').value = net.toFixed(2);
      document.getElementById('tax_percentage_input').value = taxAmount.toFixed(2);
    }
  </script>
  @endsection
</x-app-layout>
