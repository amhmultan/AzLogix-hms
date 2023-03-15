<x-app-layout>
    <main>
        
        <div class="container-fluid py-4 px-5">

            <div class="row mb-5">
              <div class="col-sm-6">
                <p class="h3 text-danger"><strong><em>Doctors <span class="text-success">Information</span></em></strong></p>
              </div>
              <div class="col-sm-6 text-right">
                @can('Doctor create')
                  <a href="{{route('admin.doctors.create')}}" class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors" accesskey="a"><u>A</u>dd Doctor</a>
                @endcan
              </div>
            </div>
          
          @if (!$doctors->isEmpty())
            
              <table id="doctorTable" class="table-responsive bg-white shadow-md rounded text-left w-full border-collapse">
                <thead>
                  <tr>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ID</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PICTURE</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">NAME</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CONTACT</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">EMAIL</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ADDRESS</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">DATE OF BIRTH</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">SPECIALTY</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">SCHEDULE</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CNIC NO.</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PMDC NO.</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">REMARKS</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CREATED ON</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">UPDATED ON</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  @can('Doctor access')
                  
                    @foreach($doctors as $doctor)
                      <tr>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->id }}</td>
                        <td class="img img-responsive"><img src="{{ asset('img/'.$doctor->pic) }}" style="width:50px;height:auto;"></td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->name  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->contact  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->email  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->address  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->dob  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->sTitle  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->schedule  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->cnic  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->pmdc  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->remarks  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctor->created_at  }}</td>
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $doctor->updated_at }}</td>
                        
                        <td class="text-nowrap text-xs px-3 border-grey-light">
                          
                          @can('Doctor edit')
                          <a href="{{route('admin.doctors.edit',$doctor->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                          @endcan
      
                          @can('Doctor delete')
                          <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="inline">
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

    @section('script')
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready( function () {
            $('#doctorTable').DataTable(
            {
            order: [[0, 'asc']],
            });
        } );
        </script>
    @stop

</x-app-layout>