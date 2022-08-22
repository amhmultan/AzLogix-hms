<x-app-layout>

    <div  id="printableArea" class="container bg-white shadow-md rounded my-6 px-5 py-4">
        @can('Patient access')
            
            <div class="row">
                
                <div class="col-sm-3">
                    <h6>MR No:</h6><span>{{ $patient->id }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Patient Name:</h6><span>{{ $patient->name }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Father Name:</h6><span>{{ $patient->fname }}</span>
                </div>
                <div class="col-sm-3">
                    
                </div>

            </div>
            <div class="row mt-5">
                
                <div class="col-sm-3">
                    <h6>Patient Gender:</h6><span>{{ $patient->gender }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Patient Marital Status:</h6><span>{{ $patient->marital_status }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Patient Phone:</h6><span>{{ $patient->phone }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Patient Email:</h6><span>{{ $patient->email }}</span>
                </div>

            </div>
            <div class="row mt-5">
                
                <div class="col-sm-3">
                    <h6>Patient CNIC:</h6><span>{{ $patient->cnic }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Patient DOB:</h6><span>{{ $patient->dob }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Patient Address:</h6><span>{{ $patient->address }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Patient History:</h6><span>{{ $patient->history }}</span>
                </div>
                
            </div>

            <div class="row mt-5">
                
                <div class="col-sm-3">
                    <h6>Emergency Person:</h6><span>{{ $patient->emr_name }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Relation:</h6><span>{{ $patient->relationship }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Emergency Number:</h6><span>{{ $patient->emr_phone }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Reffered By:</h6><span>{{ $patient->reffered_by }}</span>
                </div>

            </div>

            <div class="row mt-5">
                
                <div class="col-sm-3">
                    <h6>Created At:</h6><span>{{ $patient->created_at }}</span>
                </div>
                <div class="col-sm-3">
                    <h6>Updated At:</h6><span>{{ $patient->updated_at }}</span>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('admin.patients.index')}}" accesskey="b" class="btn btn-info text-light"><u>B</u>ack</a>
                    
                    {{-- <a class="btn btn-success text-light">Print</a> --}}

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
