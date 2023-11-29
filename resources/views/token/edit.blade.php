<x-app-layout>
  <main>
      <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
            
              @foreach ($data['tokens'] as $token)
              <form method="POST" action="{{ route('admin.tokens.update',$token->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @endforeach
                <p class="h3 text-danger"><strong><em>Update <span class="text-success">Token</span></em></strong></p>
              <hr />
                <div class="row pt-4 pb-4">

                  <div class="col-md-2">
                    <label for="fk_patients_id" class="text-gray-700 font-black">MR#</label>
                    <select class="form-control" name="fk_patients_id" disabled>
                      @foreach ($data['tokens'] as $token)
                      <option value="{{ $token->fk_patients_id }}"> {{ old('fk_patients_id',$token->fk_patients_id ) }} </option>
                    </select>
                  </div>

                  <div class="col-md-5">
                    <label for="name" class="text-gray-700 font-black">Patients Name</label>
                    <select class="form-control" name="name" disabled>
                      <option value="{{ $token->fk_patients_id }}"> {{ old('name',$token->pName ) }} </option>                      
                    </select>
                  </div>

                  <div class="col-md-5">
                    <label for="phone" class="text-gray-700 font-black">Contact number</label>
                    <select class="form-control" name="phone" disabled>
                      <option value="{{ $token->phone }}"> {{ old('phone',$token->phone ) }} </option>                      
                    </select>
                  </div>
                  
                </div>
                
                <hr />
                
                <div class="row my-4">
                  
                  <div class="col-md-6">
                    <label for="name" class="text-gray-700 font-black mr-2">Update Doctor:</label>
                    <select class="form-control" name="fk_doctors_id" required>
                      @foreach ($data['doctors'] as $doctor)
                        <option class="text-center" value="{{ $doctor->id }}" > {{ old('',$doctor->name) }} </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label for="fk_specialty_id" class="text-gray-700 font-black mr-2">Update Doctor:</label>
                    <select class="form-control" name="fk_specialty_id" required>
                      @foreach ($data['specialities'] as $specialty)
                        <option class="text-center" value="{{ $specialty->id }}"> {{ $specialty->title }} </option>
                      @endforeach
                    </select>
                  </div>

                </div>

                <div class="row">
                  
                  <div class="col-md-4">
                      <label for="fees" class="text-gray-700 font-black">Fees:</label>
                      <input id="fees" type="number" name="fees" value="{{ old('fees',$token->fees) }}" class="form-control" oninput="calculateBalance()" required />
                    </div>

                    <div class="col-md-4">
                      <label for="denomination" class="text-gray-700 font-black">Denomination:</label>
                      <input id="denomination" type="number" name="denomination" value="{{ old('denomination',$token->denomination) }}" class="form-control" oninput="calculateBalance()" required />
                    </div>

                  <div class="col-md-4">
                    <label for="balance" class="text-gray-700 font-black">Balance</label>
                    <input id="balance" type="number" name="balance" value="{{ old('balance',$token->balance) }}" class="form-control" readonly />
                  </div>


                <div class="row mt-5">

                  <div class="col-md-12 text-center">
                    <a class="btn btn-info mx-2" href="{{ route('admin.tokens.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                    <button type="submit" class="btn btn-success mx-2">Submit</button>
                  </div>

                </div>
                @endforeach
              </form> 
          </div>

  </main>
  @section('script')
     <script type="text/javascript">
        function calculateBalance() {
            // Get values from input fields
            var fees = parseFloat(document.getElementById('fees').value) || 0;
            var denomination = parseFloat(document.getElementById('denomination').value) || 0;

            // Calculate balance
            var balance = fees - denomination;

            // Update the readonly input field
            document.getElementById('balance').value = balance.toFixed(2);
        }
     </script>
    @stop
</x-app-layout>