<x-app-layout>
    <div class="container-fluid bg-white p-5">
        @can('Token access')
        <div class="container" id="printableArea">

            {{-- Header with Doctor Info and Hospital Logo --}}
            <div class="row">
                <div class="col-sm-9">
                    <h1 class="display-6 fw-bold">{{ $token->dName }}</h1>
                    <p>{{ $token->remarks }}</p>
                </div>
                <div class="col-sm-3">
                    @if($hospital)
                        <img src="{{ asset('img/' . $hospital->logo) }}" width="150" height="150" class="mt-4">
                    @endif
                </div>
            </div>

            <hr />

            {{-- Token Info --}}
            <div class="row mb-2">
                <div class="col-md-3 font-weight-bold">Token No:</div>
                <div class="col-md-3">{{ $token->id }}</div>
                <div class="col-md-3 font-weight-bold">MR No:</div>
                <div class="col-md-3">{{ $token->fk_patients_id }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3 font-weight-bold">Patient:</div>
                <div class="col-md-3">{{ $token->pName }}</div>
                <div class="col-md-3 font-weight-bold">Guardian:</div>
                <div class="col-md-3">{{ $token->fName }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3 font-weight-bold">Specialty:</div>
                <div class="col-md-3">{{ $token->sTitle }}</div>
                <div class="col-md-3 font-weight-bold">PMDC No:</div>
                <div class="col-md-3">{{ $token->pmdc }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3 font-weight-bold">Fees:</div>
                <div class="col-md-3">{{ $token->fees }}</div>
                <div class="col-md-3 font-weight-bold">Cash Paid:</div>
                <div class="col-md-3">{{ $token->denomination }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-3 font-weight-bold">Balance:</div>
                <div class="col-md-3">{{ $token->balance }}</div>
                <div class="col-md-3 font-weight-bold">Checkup On:</div>
                <div class="col-md-3">{{ date('d-m-Y', strtotime($token->created_at)) }}</div>
            </div>

            @if ($hospital)
            <div class="row mb-2">
                <div class="col-md-3 font-weight-bold">PHC No:</div>
                <div class="col-md-3">{{ $hospital->phc_no }}</div>
            </div>
            @endif
            <hr />
            <div class="vl">
                <p class="display-4">℞</p>
            </div>

            {{-- Ophthalmologist Rx Section --}}
            
            <div class="container">
                <div class="col-sm-6" style="float: right; margin-top: -400px;">
                    <table class="table table-bordered" style="outline-style: double;">
                        <thead class="text-center font-weight-bold">
                            <tr>
                                <th>℞</th>
                                <th>SPH</th>
                                <th>CYL</th>
                                <th>AXIS</th>
                                <th>PRISM</th>
                                <th>BASE</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th>OD</th>
                                <td></td><td></td><td></td><td></td><td></td>
                            </tr>
                            <tr>
                                <th>OS</th>
                                <td></td><td></td><td></td><td></td><td></td>
                            </tr>
                            <tr>
                                <th colspan="2" rowspan="2">PD</th>
                                <th colspan="4">Remarks:</th>
                            </tr>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            

            {{-- Hospital Info Footer --}}
            @if($hospital)
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="h4 text-primary text-uppercase font-weight-bold">{{ $hospital->title }}</p>
                    <p>{{ $hospital->address }}</p>
                    <p>
                        <strong>Contact:</strong> {{ $hospital->contact }} |
                        <strong>Email:</strong> {{ $hospital->email }} |
                        <strong>Website:</strong> {{ $hospital->website }}
                    </p>
                </div>
            </div>
            @endif
            

            {{-- Action Buttons --}}
            <hr />
            <div class="row mt-5 text-center">
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

        </div>
        @endcan
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</x-app-layout>
