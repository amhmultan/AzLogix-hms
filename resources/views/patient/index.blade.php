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
          <table class="bg-white shadow-md rounded mt-3 text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-3 px-1 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">Patient ID</th>
                <th class="py-3 px-1 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">MR. No.</th>
                <th class="py-3 px-3 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">Date of Registration</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">Last Updated Date</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">Patient Name</th>
                <th class="py-3 px-2 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Patient access')
                @foreach($patients as $patient)
                  <tr class="hover:bg-grey-lighter">
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->id }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->mr_number }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->created_at }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->updated_at }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->name }}</td>
                    
                    <td class="py-4 px-6 border-b border-grey-light">
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

      </div>
  </main>
</div>
</x-app-layout>
