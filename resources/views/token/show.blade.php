<x-app-layout>

    <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
        @can('Token access')

            <div class="container" id="printableArea">
                
                @foreach ($hospitals as $hospital)
                <div class="row mt-2 mb-2 mx-5">
                    <div class="col-sm-2">
                        {{-- <img src="{{ asset('img/20221011093603.JPG')}}" alt="hospital-logo" width="100" height="200"> --}}
                    </div>
                    <div class="col-sm-10">
                        <h1 class="display-5 text-primary text-uppercase font-weight-bold">{{ $hospital->title }}</h1>
                    </div>
                </div>
                @endforeach
            <div class="row mx-auto">
                <div class="col-sm-12">
                    <div class="card border-dark mb-3">
                        <div class="card-header text-center"><h5 class="card-title font-weight-bold">PATIENT TOKEN</h5></div>
                            <div class="card-body text-dark">
                            <p class="card-text">

                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach ($token as $tokens)
                                            
                                        
                                        <tr>
                                            <td><h6 class="font-weight-bold">Token Number:</h6><span> {{ $tokens->id }} </span></td>
                                            <td colspan="2"><h6 class="font-weight-bold">Patient Name:</h6><span> {{ $tokens->name }} </span></td>                                            
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
