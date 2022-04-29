<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
          <div class="text-right">
            @can('Patient create')
              <a href="{{route('admin.patients.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Patient</a>
            @endcan
          </div>

        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Mr. No.</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-3/12">Patient Name</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-3/12">Phone</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">Reffered By</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Patient access')
                @foreach($patients as $patient)
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">{{ $patient->mr_number }}</td>
                  <td class="py-4 px-6 border-b border-grey-light">{{ $patient->name }}</td>
                  <td class="py-4 px-6 border-b border-grey-light">{{ $patient->phone }}</td>
                  <td class="py-4 px-6 border-b border-grey-light">{{ $patient->reffered_by }}</td>
                  
                  <td class="py-4 px-6 border-b border-grey-light text-right">

                    @can('Patient edit')
                    <a href="{{route('admin.patients.edit',$patient->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                    @endcan

                    @can('Patient delete')
                    <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                    </form>
                    @endcan
                  </td>
                </tr>
                @endforeach
                @endcan
            </tbody>
          </table>

          @can('Patient access')
          <div class="text-right p-4 py-10">
            {{ $patients->links() }}
          </div>
          @endcan
        </div>

      </div>
  </main>
</div>
</x-app-layout>
