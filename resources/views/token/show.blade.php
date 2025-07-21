<x-app-layout>

    <div class="container bg-white p-5"
        @can('Token access')
        <div class="container" id="printableArea">

            {{-- Header: Hospital Name & Logo --}}
            <div class="row">
                <div class="col-sm-2">
                @if($hospital)
                    <img src="{{ asset('img/' . $hospital->logo) }}" style="border: 5px solid black; width:150px;height:150px; padding: 5px;" alt="{{ $hospital->title }} Logo">
                </div>
                <div class="col-sm-10">
                    <div class="text-center mb-4">
                        <h2 class="display-5 fw-bold text-uppercase">{{ $hospital->title }}</h2>
                            <p>{{ $hospital->address }}</p>
                            <p>
                                <strong>Contact:</strong> {{ $hospital->contact }} |
                                <strong>Email:</strong> {{ $hospital->email }} |
                                <strong>Website:</strong> {{ $hospital->website }}
                            </p>
                    </div>
                @endif
                </div>
            </div>
            
            <hr>

            {{-- Token & Patient Info (Table Layout) --}}
            <div class="fw-bold ml-2">Patient Information</div>
            <table class="table table-bordered w-100">
                <tbody>
                    <tr>
                        <th class="text-start">Token No:</th>
                        <td>{{ $token->id }}</td>
                        <th class="text-start">MR No:</th>
                        <td>{{ $token->fk_patients_id }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Patient:</th>
                        <td>{{ $token->pName }}</td>
                        <th class="text-start">Guardian:</th>
                        <td>{{ $token->fName }}</td>
                    </tr>
                    
                    <tr>
                        <th class="text-start">Fees:</th>
                        <td>{{ $token->fees }}</td>
                        <th class="text-start">Cash Paid:</th>
                        <td>{{ $token->denomination }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Balance:</th>
                        <td>{{ $token->balance }}</td>
                        <th class="text-start">Checkup On:</th>
                        <td>{{ date('d-m-Y', strtotime($token->created_at)) }}</td>
                    </tr>
                </tbody>
            </table>
            
            <hr>

            {{-- Rx Symbol --}}
            <div class="display-5 fw-bold pl-4">℞</div>

            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><hr />

            {{-- Doctor Signature --}}
            <div class="text-end mt-3 mr-5">
                <div class="">Doctor's Signature</div>
            </div>

    </div>
            {{-- Action Buttons --}}
            <div class="row mt-5 text-center no-print">
                <div class="col-sm-12">
                    <a href="{{ route('admin.tokens.index') }}" class="btn btn-info text-light"><u>B</u>ack</a>
                    <button class="btn btn-success text-light" onclick="printDiv('printableArea')" accesskey="p">Print</button>

                    @can('Token edit')
                    <a href="{{ route('admin.tokens.edit', $token->id) }}" class="btn btn-warning"><u>E</u>dit</a>
                    @endcan

                    @can('Token delete')
                    <form action="{{ route('admin.tokens.destroy', $token->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><u>D</u>elete</button>
                    </form>
                    @endcan
                </div>
            </div>

        @endcan
    </div>

    {{-- Print Script --}}
    <script>
        function printDiv(printableArea) {
            const printContents = document.getElementById(printableArea).innerHTML;
            const printWindow = window.open('', '', 'height=800,width=1000');
            printWindow.document.write('<html><head><title>MR No: {{ $token->fk_patients_id }} </title>');
            printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">');
            // printWindow.document.write('<style>@media print {.no-print { display: none !important; }}</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</x-app-layout>
