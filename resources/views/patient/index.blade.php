<x-app-layout>
  <main class="flex-1 bg-gray-200">
      <div class="container-fluid py-5 px-5">
          
        <div class="">
          <h3 class="h2 mb-4 fw-bold text-success">Patients Information</h3>
          <div class="text-right">
            @can('Patient create')
              <a href="{{route('admin.patients.create')}}" class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Patient</a>
            @endcan
          </div>
          

          @if (!$patients->isEmpty())

          <table id="table1" class="table-responsive bg-white shadow-md rounded mt-5 text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-3 px-1 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">MR No.</th>
                <th class="py-3 px-1 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PICTURE</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">NAME</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">FATHERS NAME</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">DOB</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">GENDER</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">MARITAL STATUS</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PHONE</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">EMAIL</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CNIC #</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ADDRESS</th>
                <th class="py-3 px-3 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">REGISTERED ON</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">UPDATED ON</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              @can('Patient access')
                @foreach($patients as $patient)
                  <tr class="hover:bg-grey-lighter">
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->id }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->pic }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->name }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->fname }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->dob }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->gender }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->marital_status }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->phone }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->email }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->cnic }}</td>
                    <td class="text-nowrap text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->address }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->created_at }}</td>
                    <td class="text-nowrap text-xs py-4 px-6 border border-grey-light">{{ $patient->updated_at }}</td>
                    
                    <td class="text-nowrap py-4 px-6 border-b border-grey-light">
                      @can('Patient access')
                        <a href="{{route('admin.patients.show',$patient->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-green-400">Show</a>
                      @endcan
                      @can('Patient edit')
                      <a href="{{route('admin.patients.edit',$patient->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                      @endcan
  
                      @can('Patient delete')
                      <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" class="inline">
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
          

          @can('Patient access')
          <div class="py-3 px-5">
            {{ $patients->links() }}
          </div>
          @endcan
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
</div>
</x-app-layout>