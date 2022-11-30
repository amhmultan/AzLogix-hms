<x-app-layout>
  <main>
      <div class="container-fluid py-4 px-5">

            <div class="row mb-5">
              <div class="col-sm-6">
                <p class="h3 text-danger"><strong><em>Pharmacy <span class="text-success">Configuration</span></em></strong></p>
              </div>
              <div class="col-sm-6 text-right">
                @can('PharmacyConfig add')
                  <a href="{{route('admin.pharmacies.create')}}" class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors" accesskey="n"><u>N</u>ew Pharmacy</a>
                @endcan
              </div>
            </div>
          
          @if (!$pharmacies->isEmpty())
            
          <table id="pharmacyTable" class="table-responsive bg-white shadow-md w-full rounded text-left border-collapse">
            <thead>
              <tr>
                <th class="py-3 px-1 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ID</th>
                <th class="py-3 px-1 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">TITLE</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">LOGO</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">REG NO</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CONTACT NO</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ADDRESS</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">REMARKS</th>
                <th class="py-3 px-3 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">REGISTERED ON</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">UPDATED ON</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              @can('PharmacyConfig access')
                @foreach($pharmacies as $pharmacy)
                  <tr>
                    <td class="text-nowrap text-xs px-4 border-grey-light">{{ $pharmacy->id }}</td>
                    <td class="text-nowrap text-xs px-3 border-grey-light">{{ $pharmacy->name }}</td>
                    <td class="img img-responsive"><img src="{{ asset('img/'.$pharmacy->pic) }}" width="100px"></td>
                    <td class="text-nowrap text-xs px-3 border-grey-light">{{ $pharmacy->reg_no }}</td>
                    <td class="text-nowrap text-xs px-3 border-grey-light">{{ $pharmacy->phone }}</td>
                    <td class="text-nowrap text-xs px-3 border-grey-light">{{ $pharmacy->address }}</td>
                    <td class="text-nowrap text-xs px-3 border-grey-light">{{ $pharmacy->remarks }}</td>
                    <td class="text-nowrap text-xs px-3 border-grey-light">{{ $pharmacy->created_at }}</td>
                    <td class="text-nowrap text-xs px-3 border-grey-light">{{ $pharmacy->updated_at }}</td>
                    
                    <td class="text-nowrap text-xs px-3 border-grey-light">
                      
                      @can('PharmacyConfig edit')
                      <a href="{{route('admin.pharmacies.edit',$pharmacy->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                      @endcan
  
                      @can('PharmacyConfig delete')
                      <form action="{{ route('admin.pharmacies.destroy', $pharmacy->id) }}" method="POST" class="inline">
                          @csrf
                          @method('delete')
                          <button class="text-decoration-none text-grey-lighter font-bold py-1 px-1 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                @endforeach
                @endcan
            </tbody>
          </table>
        
        
        @else

          <div class="row flex text-center mt-5 pt-5">
            <div class="col-sm-12">
              <h1 class="h4 italic text-danger">NO RECORD FOUND</h1>
            </div>
          </div>
        
        @endif

      </div>
  </main>
</div>
@section('script')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#pharmacyTable').DataTable();
} );
</script>
@stop
</x-app-layout>