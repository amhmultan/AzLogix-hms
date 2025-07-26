<x-app-layout>
    <div class="container bg-white shadow-md rounded my-6 p-4">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="text-2xl font-bold text-primary">Stock Report</h2>
            <a href="{{ route('admin.reports.print') }}" target="_blank" class="btn btn-success">
                <i class="fas fa-print mr-1"></i> Print Report
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>S.No.</th>
                        <th>Product Name</th>
                        <th>Total Purchased</th>
                        <th>Total Sold</th>
                        <th>Stock In Hand</th>
                        <th>Last Purchase</th>
                        <th>Last Sale</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockData as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['total_purchased'] }}</td>
                            <td>{{ $item['total_sold'] }}</td>
                            <td>{{ $item['stock_in_hand'] }}</td>
                            <td>{{ $item['last_purchase'] ? \Carbon\Carbon::parse($item['last_purchase'])->format('d M Y') : 'N/A' }}</td>
                            <td>{{ $item['last_sale'] ? \Carbon\Carbon::parse($item['last_sale'])->format('d M Y') : 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
