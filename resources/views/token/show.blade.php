<x-app-layout>

    <div class="container-fluid bg-white p-5">
        @can('Token access')

            <div class="container" id="printableArea">
                
                @foreach ($hospitals as $hospital)
                <div class="row">
                    <div class="col-sm-2">
                        <img src="{{ asset('img/'.$hospital->logo) }}" width="200px" class="border border-dark border-4 p-2">
                    </div>
                    <div class="col-sm-8">
                        <p class="font-weight-bold h4 text-primary text-uppercase">{{ $hospital->title }}</p>
                        <span class="italic">{{ $hospital->address }}</span><br>
                        <span class="italic"><strong>Contact Number:</strong> {{ $hospital->contact }} </span><br>
                        <span class="italic"><strong>Email:</strong> {{ $hospital->email }}</span><br>
                        <span class="italic"><strong>Website:</strong> {{ $hospital->website }}</span>
                    </div>
                </div>    
                @endforeach

                <hr />
            <div class="row mx-auto mt-2">
                <div class="col-sm-12">
                    <div class="card border-dark mb-3">
                        <div class="card-header text-center"><h5 class="card-title font-weight-bold">PATIENT TOKEN</h5></div>
                            <div class="card-body text-dark">
                            <p class="card-text">

                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach ($token as $tokens)
                                            
                                        
                                        <tr>
                                            <td><h6 class="font-weight-bold">Token No:</h6><span> {{ $tokens->id }} </span></td>
                                            <td><h6 class="font-weight-bold">MR No:</h6><span> {{ $tokens->fk_patients_id }} </span></td>                                            
                                            <td><h6 class="font-weight-bold">Patient Name:</h6><span> {{ $tokens->name }} </span></td>                                            
                                        </tr>
                                        
                                        <tr>
                                            <td><h6 class="font-weight-bold">Fees:</h6><span> {{ $tokens->fees }} </span></td>
                                            <td><h6 class="font-weight-bold">Denomination:</h6><span> {{ $tokens->denomination }} </span></td>
                                            <td><h6 class="font-weight-bold">Balance</h6><span> {{ $tokens->balance }} </span></td>
                                            
                                        </tr>

                                        <tr>
                                            <td><h6 class="font-weight-bold">Token Created At:</h6><span> {{ $tokens->created_at }} </span></td>
                                            <td><h6 class="font-weight-bold">Token Updated On:</h6><span> {{ $tokens->updated_at }} </span></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="container">
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
