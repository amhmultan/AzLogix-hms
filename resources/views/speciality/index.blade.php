<x-app-layout>
    <main>
        
        <div class="container-fluid py-4 px-5">

            <div class="row mb-5">
              <div class="col-sm-6">
                <p class="h3 text-danger"><strong><em>Specialty <span class="text-success">Information</span></em></strong></p>
              </div>
              <div class="col-sm-6 text-right">
                @can('Speciality create')
                  <a href="{{route('admin.specialities.create')}}" class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors" accesskey="a"><u>A</u>dd Specialty</a>
                @endcan
              </div>
            </div>
          
          @if (!$specialities->isEmpty())
            
              <table id="specialityTable" class="bg-white shadow-md rounded text-left w-full border-collapse">
                <thead>
                  <tr>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ID</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">TITLE</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">REMARKS</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CREATED ON</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">UPDATED ON</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  @can('Speciality access')
                  
                    @foreach($specialities as $speciality)
                      <tr>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $speciality->id }}</td>
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $speciality->title }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $speciality->remarks  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $speciality->created_at  }}</td>
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $speciality->updated_at }}</td>
                        
                        <td class="text-nowrap text-xs px-3 border-grey-light">
                          
                          @can('Speciality edit')
                          <a href="{{route('admin.specialities.edit',$speciality->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                          @endcan
      
                          @can('Speciality delete')
                          <form action="{{ route('admin.specialities.destroy', $speciality->id) }}" method="POST" class="inline">
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
            $('#specialityTable').DataTable(
            {
            order: [[0, 'asc']],
            });
        } );
        </script>
    @stop

</x-app-layout>