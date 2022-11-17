<x-app-layout>

    <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
        @can('Patient access')

            <div class="container" id="printableArea">
                
                @foreach ($hospitals as $hospital)
                <div class="row mt-2 mb-2 mx-5">
                    <div class="col-sm-2">
                        <img src="{{ asset('img/'.$hospital->logo) }}" width="100px" class="border border-dark border-4 p-2">
                    </div>
                    <div class="col-sm-10">
                        <h1 class="display-5 text-primary text-uppercase font-weight-bold">{{ $hospital->title }}</h1>
                    </div>
                </div>
                @endforeach

            <div class="row mx-auto mt-5">
                <div class="col-sm-12">
                    <div class="card border-dark mb-3">
                        <div class="card-header text-center"><h5 class="card-title font-weight-bold">Patient Information</h5></div>
                            <div class="card-body text-dark">
                            <p class="card-text">

                                <table class="table table-bordered">
                                    <tbody>

                                        <tr>
                                            <td><h6 class="font-weight-bold">MR Number:</h6><span> {{ $patient->id }} </span></td>
                                            <td><h6 class="font-weight-bold">Patient Name:</h6><span> {{ $patient->name }} </span></td>
                                            <td><h6 class="font-weight-bold">Father Name:</h6><span> {{ $patient->fname }} </span></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><h6 class="font-weight-bold">Patient Gender:</h6><span> {{ $patient->gender }} </span></td>
                                            <td><h6 class="font-weight-bold">Patient Marital Status:</h6><span> {{ $patient->marital_status }} </span></td>
                                            <td><h6 class="font-weight-bold">Patient Phone:</h6><span> {{ $patient->phone }} </span></td>
                                        </tr>

                                        <tr>
                                            <td><h6 class="font-weight-bold">Patient Email:</h6><span> {{ $patient->email }} </span></td>
                                            <td><h6 class="font-weight-bold">Patient CNIC:</h6><span> {{ $patient->cnic }} </span></td>
                                            <td><h6 class="font-weight-bold">Patient DOB:</h6><span> {{ $patient->dob }} </span></td>
                                        </tr>

                                        <tr>
                                            <td><h6 class="font-weight-bold">Patient Address:</h6><span> {{ $patient->address }} </span></td>
                                            <td><h6 class="font-weight-bold">Patient History:</h6><span> {{ $patient->history }} </span></td>
                                            <td><h6 class="font-weight-bold">Emergency Person:</h6><span> {{ $patient->emr_name }} </span></td>
                                        </tr>

                                        <tr>
                                            <td><h6 class="font-weight-bold">Relation:</h6><span> {{ $patient->relationship }} </span></td>
                                            <td><h6 class="font-weight-bold">Emergency Number:</h6><span> {{ $patient->emr_phone }} </span></td>
                                            <td><h6 class="font-weight-bold">Reffered By:</h6><span> {{ $patient->reffered_by }} </span></td>
                                        </tr>

                                        <tr>
                                            <td><h6 class="font-weight-bold">Created At:</h6><span> {{ $patient->created_at }} </span></td>
                                            <td colspan="2"><h6 class="font-weight-bold">Updated At:</h6><span> {{ $patient->updated_at }} </span></td>
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
                        <a href="{{ route('admin.patients.index')}}" accesskey="b" class="btn btn-info text-light"><u>B</u>ack</a>
                        <input class="btn btn-success text-light" accesskey="p" type="button" onclick="printDiv('printableArea')" value="Print" />
                        @can('Patient edit')
                          <a href="{{route('admin.patients.edit',$patient->id)}}" accesskey="e" class="btn btn-warning"><u>E</u>dit</a>
                          @endcan
                          @can('Patient delete')
                          <form action="{{ route('admin.patients.destroy', $patient->id) }}" accesskey="d" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger"><u>D</u>elete</button>
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
