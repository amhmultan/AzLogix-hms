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
              <div class="table-responsive bg-white p-3 shadow rounded">
              <table id="specialityTable" class="table w-100 border-collapse">
                <thead>
                  <tr class="bg-indigo-500 text-white">
                    <th class="py-3 px-4 border text-center">ID</th>
                    <th class="py-3 px-4 border text-center">TITLE</th>
                    <th class="py-3 px-4 border text-center">REMARKS</th>
                    <th class="py-3 px-4 border text-center">CREATED ON</th>
                    <th class="py-3 px-4 border text-center">UPDATED ON</th>
                    <th class="py-3 px-4 border text-center">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  @can('Speciality access')
                  
                    @foreach($specialities as $speciality)
                      <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $speciality->id }}</td>
                        <td class="px-4 py-2 border">{{ $speciality->title }}</td>
                        <td class="px-4 py-2 border">{{ $speciality->remarks  }}</td>
                        <td class="px-4 py-2 border">{{ $speciality->created_at  }}</td>
                        <td class="px-4 py-2 border">{{ $speciality->updated_at }}</td>
                        
                        <td class="px-4 py-2 border">
                          
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
              </div>
                    
        @else

          <div class="row flex text-center mt-5 pt-5">
            <div class="col-sm-12">
              <h1 class="h4 italic text-danger">NO RECORD FOUND</h1>
            </div>
          </div>
        
        @endif

      </div>

    </main>

    @push('scripts')
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <script>
      $(document).ready(function () {
          $('#specialityTable').DataTable({
              order: [[0, 'asc']],
          });
      });
      </script>
    @endpush
    
</x-app-layout>