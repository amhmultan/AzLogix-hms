<x-app-layout>
  <main>
      <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
            

              <form method="POST" action="{{ route('admin.tokens.update',$token->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <p class="h3 text-danger"><strong><em>Update <span class="text-success">Token</span></em></strong></p>
              <hr />
                <div class="row pt-4 pb-4">

                  <div class="col-md-12">
                    <label for="fk_patients_id" class="text-gray-700 font-black">Patient MR Number:</label>
                    <select class="form-control" name="fk_patients_id">
                      <option value="{{ $token->fk_patients_id }}"> {{ old('fees',$token->fk_patients_id ) }} </option>
                    </select>
                  </div>

                </div>
                
                <div class="row">
                  
                  <div class="col-md-3">
                      <label for="fees" class="text-gray-700 font-black">Fees:</label>
                      <input id="fees" type="number" name="fees" value="{{ old('fees',$token->fees) }}" class="form-control" />
                    </div>

                    <div class="col-md-3">
                      <label for="denomination" class="text-gray-700 font-black">Denomination:</label>
                      <input id="denomination" type="number" name="denomination" value="{{ old('denomination',$token->denomination) }}" class="form-control" />
                    </div>

                  <div class="col-md-3">
                    <label for="balance" class="text-gray-700 font-black">Balance</label>
                    <input id="balance" type="number" name="balance" value="{{ old('balance',$token->balance) }}" class="form-control" />
                  </div>


                <div class="row mt-5">

                  <div class="col-md-12 text-center">
                    <a class="btn btn-info mx-2" href="{{ route('admin.tokens.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                    <button type="submit" class="btn btn-success mx-2">Submit</button>
                  </div>

                </div>

              </form> 
          </div>

  </main>
</x-app-layout>