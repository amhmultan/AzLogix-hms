<x-app-layout>
  <main class="flex-1 bg-gray-200">
      <div class="container-fluid py-20">
          <div class="text-right">
            @can('Patient create')
              <a href="{{route('admin.patients.create')}}" class="text-decoration-none bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Patient</a>
            @endcan
          </div>
        <div class="bg-white shadow-md rounded my-6 overflow-auto">

          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Patient Id</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">MR. No.</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Patient Name</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Date Of Birth</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Gender</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Marital Status</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Phone</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">email</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">CNIC No.</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Picture</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Address</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">In Case Of Emergency Name</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Emergency Person Relation</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Emergency Person Phone</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Patient Weight</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Patient Height</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Patient History</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Reffered By</th>
                <th class="py-2 px-2 bg-gray-900 font-bold text-sm text-white text-center border border-grey-light">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Patient access')
                @foreach($patients as $patient)
                  <tr class="hover:bg-grey-lighter">
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->id }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->mr_number }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->name }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->dob }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->gender }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->marital_status }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->phone }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->email }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->cnic }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->pic }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->address }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->emr_name }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->relationship }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->emr_phone }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->weight }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->height }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->history }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $patient->reffered_by }}</td>
                    
                    <td class="py-4 px-6 border-b border-grey-light">
  
                      @can('Patient edit')
                      <a href="{{route('admin.patients.edit',$patient->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                      @endcan
  
                      @can('Patient delete')
                      <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" class="inline">
                          @csrf
                          @method('delete')
                          <button class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
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
