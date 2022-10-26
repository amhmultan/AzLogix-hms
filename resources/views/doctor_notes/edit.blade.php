<x-app-layout>
    <main>
        <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
              
                <form method="POST" action="{{ route('admin.doctor_notes.update',$doctor_notes->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
  
                  <p class="h3 text-danger"><strong><em>Update <span class="text-success">Doctor Notes</span></em></strong></p>
                  
                  <hr />
                  
                  <div class="row pt-4 pb-4">
                    
                    <div class="col-md-6">
                      <label for="fk_patient_id" class="text-gray-700 font-black">Patient MR Number:</label>
                      <select class="form-control" name="fk_patient_id" disabled>
                        <option value="{{ $doctor_notes->fk_patient_id }}"> {{ old('fk_patient_id',$doctor_notes->fk_patient_id ) }} </option>
                      </select>
                    </div>
  
                    <div class="col-md-6">
                        <label for="fk_token_id" class="text-gray-700 font-black">Patient Token Number:</label>
                        <select class="form-control" name="fk_token_id" disabled>
                            <option value="{{ $doctor_notes->fk_token_id }}"> {{ old('fk_token_id',$doctor_notes->fk_token_id ) }} </option>
                        </select>
                    </div>

                  </div>
                  
                  
                  
                  <div class="row">
                    
                    <div class="col-md-12">
                        <label for="prescription" class="text-gray-700 font-black">Edit Prescription:</label>
                        <input type="file" name="prescription" id="prescription" value="{{ old('prescription',$doctor_notes->prescription ) }}" class="form-control">
                    </div>

                  </div>

                  <div class="row mt-5">
  
                    <div class="col-md-12 text-center">
                      <a class="btn btn-info mx-2" href="{{ route('admin.doctor_notes.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                      <button type="submit" class="btn btn-success mx-2">Submit</button>
                    </div>
  
                  </div>

                </form>
                
            </div>
  
    </main>
  </x-app-layout>