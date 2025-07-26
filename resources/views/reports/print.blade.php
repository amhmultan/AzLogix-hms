<!DOCTYPE html>
<html>
<head>
    <title>Stock Report</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 6px;
        }
        th {
            background-color: #f3f3f3;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body class="p-4">

    <div class="no-print">
        <button style="background-color: #28a745; color: white; border: none; padding: 10px 15px; border-radius: 5px; text-align: center;" onclick="window.print()">Print</button>
    </div>

    <h2 class="text-2xl font-bold text-primary">Stock Report</h2>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Product</th>
                <th>Total Purchased</th>
                <th>Total Sold</th>
                <th>Stock in Hand</th>
                <th>Last Purchase</th>
                <th>Last Sale</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stockData as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['total_purchased'] }}</td>
                    <td>{{ $item['total_sold'] }}</td>
                    <td>{{ $item['stock_in_hand'] }}</td>
                    <td>{{ $item['last_purchase'] ? \Carbon\Carbon::parse($item['last_purchase'])->format('d-m-Y') : '-' }}</td>
                    <td>{{ $item['last_sale'] ? \Carbon\Carbon::parse($item['last_sale'])->format('d-m-Y') : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
