<x-app-layout>
    <main>
        <div class="container-fluid py-4 px-5 overflow-x-auto w-full">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <p class="h3 text-danger"><strong><em>Sale <span class="text-success">Invoice</span></em></strong></p>
                </div>
                <div class="col-sm-6 text-right">
                    @can('Sale add')
                        <a href="{{ route('admin.sales.create') }}"
                           class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors"
                           accesskey="a"><u>A</u>dd Sale Invoice</a>
                    @endcan
                </div>
            </div>

            @can('Sale access')
                @if($sales->isNotEmpty())
                    <table id="salesTable" class="min-w-full bg-white shadow-md rounded text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Invoice #</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Date</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Patient</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Gross Amount</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Discount</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Tax (%)</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Net Amount</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Updated</th>
                                <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td class="text-xs px-4 py-2 text-center border">SI-{{ $sale->id }}</td>
                                    <td class="text-xs px-4 py-2 text-center border">{{ $sale->date }}</td>
                                    <td class="text-xs px-4 py-2 text-center border">{{ $sale->patient->name ?? '-' }}</td>
                                    <td class="text-xs px-4 py-2 text-center border">Rs. {{ number_format($sale->gross_amount, 2) }}</td>
                                    <td class="text-xs px-4 py-2 text-center border">Rs. {{ number_format($sale->discount, 2) }}</td>
                                    <td class="text-xs px-4 py-2 text-center border">{{ $sale->tax }}%</td>
                                    <td class="text-xs px-4 py-2 text-center border">Rs. {{ number_format($sale->net_amount, 2) }}</td>
                                    <td class="text-xs px-4 py-2 text-center border">{{ $sale->updated_at->format('Y-m-d') }}</td>
                                    <td class="text-xs px-4 py-2 text-center border">
                                        <a href="{{ route('admin.sales.print', $sale->id) }}" class="bg-indigo-500 text-white px-3 mx-1 py-1 rounded hover:bg-indigo-600 text-xs text-decoration-none" target="_blank">
                                            Print
                                        </a>
                                        <a href="{{ route('admin.sales.show', $sale->id) }}" class="bg-yellow-600 text-white px-3 py-1 rounded hover:bg-yellow-700 text-xs text-decoration-none">Show</a>

                                        @can('Sale delete')
                                            <form action="{{ route('admin.sales.destroy', $sale->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this invoice?')"
                                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs mt-1 text-decoration-none">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="row flex text-center mt-5 pt-5">
                        <div class="col-sm-12">
                            <h1 class="h4 italic text-danger">NO RECORD FOUND</h1>
                        </div>
                    </div>
                @endif
            @endcan
        </div>
    </main>

    @push('scripts')
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#salesTable').DataTable({
                    order: [[0, 'desc']],
                });
            });
        </script>
    @endpush
</x-app-layout>
