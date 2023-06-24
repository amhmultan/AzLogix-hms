<x-app-layout>

    <div class="container-fluid bg-white p-5">
        @can('Token access')

            <div class="container" id="printableArea">
                
                @foreach ($hospitals as $hospital)
                <div class="row">
                    
                    <div class="col-sm-9">
                        @foreach ($token as $tokens)
                        <div class="row">
                            <h1 class="display-6 fw-bold">{{$tokens->dName}}</h1>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <span>{{ $tokens->remarks }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-sm-3">
                        <img src="{{ asset('img/'.$hospital->logo) }}" width="200px" height="200px" class="mt-4">
                    </div>
                    
                </div>    
                @endforeach
                <hr />
                @foreach ($token as $tokens)
                <div class="row">
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Token No:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->id }}
                    </div>
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">MR No:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->fk_patients_id }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Patient:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->pName }}
                    </div>
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Guardian:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->fName }}
                    </div>
                    {{-- <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Doctor:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->dName }}
                    </div> --}}
                </div>
                <div class="row">
                    {{-- <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Specialty:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->sTitle }}
                    </div>                    
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">PMDC No:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->pmdc }}
                    </div> --}}
                </div>
                <div class="row">
                    {{-- <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Fees:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->fees }}
                    </div>
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Cash Paid:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->denomination }}
                    </div> --}}
                </div>
                <div class="row">
                    {{-- <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Balance:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->balance }}
                    </div> --}}
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Checkup On:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $date = date('d-m-Y', strtotime($tokens->created_at)) }}
                    </div>
                    @foreach ($hospitals as $hospital)
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">PHC No:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $hospital->phc_no }}
                    </div>
                    @endforeach
                    {{-- <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Updated On:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->updated_at }}
                    </div> --}}
                </div>
                <hr />
                
                @if ($tokens->sTitle == 'Ophthalmologist')
                
                <div class="vl" style="height: 1000px;"></div>
                <div class="container">
                    <div class="col-sm-6" style="float: right; margin-top:-33%">
                        <table class="table table-bordered" style="outline-style: double;">
                            <tbody>
                                
                                    <tr>
                                        <th class="h4 text-center font-weight-bold">℞</th>
                                        <th style="font-family: Arial, Helvetica, sans-serif;" class="text-center font-weight-bold align-middle">SPH</th>
                                        <th style="font-family: Arial, Helvetica, sans-serif;" class="text-center font-weight-bold align-middle">CYL</th>
                                        <th style="font-family: Arial, Helvetica, sans-serif;" class="text-center font-weight-bold align-middle">AXIS</th>
                                        <th style="font-family: Arial, Helvetica, sans-serif;" class="text-center font-weight-bold align-middle">PRISM</th>
                                        <th style="font-family: Arial, Helvetica, sans-serif;" class="text-center font-weight-bold align-middle">BASE</th>
                                    </tr>
                                
                                <tr>
                                    <th style="font-family: Arial, Helvetica, sans-serif;" class="text-center font-weight-bold align-middle">OD</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th style="font-family: Arial, Helvetica, sans-serif;" class="text-center font-weight-bold align-middle">OS</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th style="font-family: Arial, Helvetica, sans-serif;" class="font-weight-bold align-middle" colspan="2" rowspan="2">PD</th>
                                    
                                    <th colspan="4"><small class="h6 font-weight-bold">Remarks:</small></th>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr />
                @foreach ($hospitals as $hospital)
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="font-weight-bold h4 text-primary text-uppercase">{{ $hospital->title }}</p>
                        <span class="italic">{{ $hospital->address }}</span><br>
                        <span class="italic"><strong>Contact Number:</strong> {{ $hospital->contact }} </span>
                        {{-- <span class="italic"><strong>PHC No:</strong> {{ $hospital->phc_no }} </span> --}}
                        <span class="italic"><strong>Email:</strong> {{ $hospital->email }}</span>
                        <span class="italic"><strong>Website:</strong> {{ $hospital->website }}</span>
                    </div>
                </div>
                @endforeach
                @else
                
                
                <div class="container">
                    <div class="col-sm-12">
                        <div class="vl"></div>
                    </div>
                </div>
                
                @endif
                
        </div>
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('admin.tokens.index')}}" accesskey="b" class="btn btn-info text-light"><u>B</u>ack</a>
                    <input class="btn btn-success text-light" accesskey="p" type="button" onclick="printDiv('printableArea')" value="Print" />
                    @can('Token edit')
                        <a href="{{route('admin.tokens.edit',$tokens->id)}}" accesskey="e" class="btn btn-warning"><u>E</u>dit</a>
                        @endcan
                        @can('Token delete')
                        <form action="{{ route('admin.tokens.destroy', $tokens->id) }}" accesskey="d" method="POST" class="inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><u>D</u>elete</button>
                        </form>
                        @endcan
                </div>
            </div>
        </div>
        @endforeach
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
