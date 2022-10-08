<x-app-layout>
    
    <div class="container-fluid bg-white shadow-md rounded my-6 px-5 py-4">
        @can('DoctorNotes access')

            
            <div class="row">
                ID: {{$doctor_notes->id }}
                MR No: {{$doctor_notes->fk_patient_id }}
                Token No: {{$doctor_notes->fk_token_id }}
                Checkup Date: {{$doctor_notes->fk_token_created_at }}
                Name: {{$doctor_notes->fk_patient_name }}
                Notes Added {{$doctor_notes->created_at }}
                Notes Updated {{$doctor_notes->updated_at }}
            </div>

            <hr />
            
            <div class="row">
                {{-- <iframe src="{{ url('/assets/1665223522.pdf') }}" frameborder="1" width="400" height="600"></iframe> --}}
                <iframe src="/assets/{{$doctor_notes->prescription}}" frameborder="1" width="400" height="600"></iframe>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('admin.doctor_notes.index')}}" accesskey="b" class="btn btn-danger"><u>B</u>ack</a>
                </div>
            </div>

        @endcan
    </div>

</x-app-layout>