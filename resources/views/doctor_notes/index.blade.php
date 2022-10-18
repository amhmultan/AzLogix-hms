<x-app-layout>
    <main>
        <div class="container-fluid py-4 px-5">
  
              <div class="row mb-4">
                <div class="col-sm-6">
                  <p class="h3 text-danger"><strong><em>Doctor Notes <span class="text-success">Dashboard</span></em></strong></p>
                </div>
                <div class="col-sm-6 text-right">
                  @can('DoctorNotes add')
                    <a href="{{route('admin.doctor_notes.create')}}" class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors" accesskey="a"><u>A</u>dd Doctor Notes</a>
                  @endcan
                </div>
              </div>
            
            @if (!$doctor_notes->isEmpty())
              <div class="overflow-auto">
                <table id="doctorNotesTable" class="bg-white shadow-md rounded text-left border-collapse">
                  <thead>
                    <tr>
                      <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PRESCRIPTION ID</th>
                      <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">MR NO.</th>
                      <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">TOKEN NO.</th>
                      <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PATIENT NAME</th>
                      <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CHECKUP DATE</th>
                      <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PRESCRIPTION</th>
                      <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CREATED ON</th>
                      <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">UPDATED ON</th>
                      <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @can('DoctorNotes access')
                      
                      @foreach($doctor_notes as $doctors_note)
                        <tr>
                          <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctors_note->id }}</td>
                          <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctors_note->fk_patient_id }}</td>
                          <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctors_note->fk_token_id  }}</td>
                          <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctors_note->fk_patient_name  }}</td>
                          <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctors_note->fk_token_created_at }}</td>
                          <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $doctors_note->prescription }}</td>
                          <td class="text-nowrap text-xs px-4 border-grey-light">{{ $doctors_note->created_at }}</td>
                          <td class="text-nowrap text-xs px-4 border-grey-light">{{ $doctors_note->updated_at }}</td>
                          
                          
                          <td class="text-nowrap text-xs px-3 border-grey-light">
                            @can('DoctorNotes access')
                              <a href="{{route('admin.doctor_notes.show',$doctors_note->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-green-400">Show</a>
                            @endcan
                            @can('DoctorNotes edit')
                            <a href="{{route('admin.doctor_notes.edit',$doctors_note->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                            @endcan
        
                            @can('DoctorNotes delete')
                            <form action="{{ route('admin.doctor_notes.destroy', $doctors_note->id) }}" method="POST" class="inline">
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
  </div>
  @section('script')
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
      $('#doctorNotesTable').DataTable(
      {
        order: [[0, 'desc']],
      });
  } );
  </script>
  @stop
  </x-app-layout>