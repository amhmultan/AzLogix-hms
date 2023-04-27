<x-app-layout>

    <div class="container-fluid bg-white p-5">
        @can('Token access')

            <div class="container" id="printableArea">
                
                @foreach ($hospitals as $hospital)
                <div class="row">
                    <div class="col-sm-3">
                        <img src="{{ asset('img/'.$hospital->logo) }}" width="200px" class="border border-dark border-4">
                    </div>
                    <div class="col-sm-8">
                        <p class="font-weight-bold h4 text-primary text-uppercase">{{ $hospital->title }}</p>
                        <span class="italic">{{ $hospital->address }}</span><br>
                        <span class="italic"><strong>Contact Number:</strong> {{ $hospital->contact }} </span><br>
                        <span class="italic"><strong>PHC No:</strong> {{ $hospital->phc_no }} </span><br>
                        <span class="italic"><strong>Email:</strong> {{ $hospital->email }}</span><br>
                        <span class="italic"><strong>Website:</strong> {{ $hospital->website }}</span>
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
                        <span class="font-weight-bold pr-5 mr-5">Doctor:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->dName }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Balance:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->balance }}
                    </div>
                    <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Created At:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->created_at }}
                    </div>
                    {{-- <div class="col-md-3">
                        <span class="font-weight-bold pr-5 mr-5">Updated On:</span>
                    </div>
                    <div class="col-md-3">
                        {{ $tokens->updated_at }}
                    </div> --}}
                </div>
                <hr />
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
