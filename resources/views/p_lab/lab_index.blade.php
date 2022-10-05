<x-app-layout>
  <main class="flex-1 bg-gray-200">
      <div class="container py-10">
          <div class="text-right">
            @can('PathologyLabConfig new')
              <a href="{{route('admin.p_lab.create')}}" class="text-decoration-none bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New</a>
            @endcan
          </div>
        
        <div class="overflow-auto">
          <p class="h3 text-danger"><strong><em>Pathology Lab <span class="text-success">Configuration</span></em></strong></p>
          <hr />
          <table class="bg-white shadow-md rounded mt-5 text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-3 px-1 bg-success font-bold text-sm text-white text-center border border-grey-light">Pathology Lab ID</th>
                <th class="py-3 px-1 bg-success font-bold text-sm text-white text-center border border-grey-light">Pathology Lab Name</th>
                <th class="py-3 px-3 bg-success font-bold text-sm text-white text-center border border-grey-light">Lab Logo</th>
                <th class="py-3 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Lab Address</th>
                <th class="py-3 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Contact Number</th>
                <th class="py-3 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Lab Email ID</th>
                <th class="py-3 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Remarks</th>
                <th class="py-3 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Created At</th>
                <th class="py-3 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Updated At</th>
                <th class="py-3 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('PathologyLabConfig access')
                @foreach($p_lab as $p_labs)
                  <tr class="hover:bg-grey-lighter">
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->id }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->p_lab_name }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->p_lab_pic }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->p_lab_address }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->p_lab_contact }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->p_lab_email }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->p_lab_remarks }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->created_at }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $p_labs->updated_at }}</td>
                    
                    <td class="py-4 px-6 border-b border-grey-light">
  
                      @can('PathologyLabConfig edit')
                      <a href="{{route('admin.p_lab.edit',$p_labs->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                      @endcan
  
                      @can('PathologyLabConfig delete')
                      <form action="{{ route('admin.p_lab.destroy', $p_labs->id) }}" method="POST" class="inline">
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

          @can('Pathology lab access')
          <div class="py-3 px-5">
            {{ $p_lab->links() }}
          </div>
          @endcan
        </div>

      </div>
  </main>
</div>
</x-app-layout>
