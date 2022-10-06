<x-app-layout>
    <main>
        <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
              
          <div class="row pb-5">
            <p class="h3 text-danger"><strong><em>Add <span class="text-success">Doctor Notes</span></em></strong></p>
            <hr />
          </div>
          
          <div class="row mb-5">
              <div class="col-sm-3">
                <form action="" method="GET">
                <input type="search" name="search" id="search" placeholder="Enter Token Number" class="form-control">
              </div>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-primary mx-2">Search</button>
              </form>
              </div>
          </div>
          
          <hr />

          <div class="row my-4">
            
            <div class="col-md-3">
              <label for="fk_token_id" class="text-gray-700 font-black">Token No:</label>
              <select class="form-control" name="fk_token_id" disabled>
                @if ($search != "")
                @foreach ($tokens as $token)
                  <option> {{ $token->id }} </option>
                @endforeach
                @else
                <option></option>
                @endif
                
              </select>
            </div>

            <div class="col-md-3">
              <label for="fk_patient_id" class="text-gray-700 font-black">MR No:</label>
              <select class="form-control" name="fk_patient_id" disabled>
                @if ($search != "")
                @foreach ($tokens as $token)
                  <option>{{ $token->fk_patients_id }}</option>
                @endforeach
                @else
                <option></option>
                @endif
                
              </select>
            </div>

            <div class="col-md-3">
              <label for="fk_patient_name" class="text-gray-700 font-black">Patient Name:</label>
              <select class="form-control" name="fk_patient_name" disabled>
                @if ($search != "")
                @foreach ($tokens as $token)
                  <option>{{ $token->name }}</option>
                @endforeach
                @else
                <option></option>
                @endif
                
              </select>
            </div>

            <div class="col-md-3">
              <label for="fk_token_created_at" class="text-gray-700 font-black">Token Date:</label>
              <select class="form-control" name="fk_token_created_at" disabled>
                @if ($search != "")
                @foreach ($tokens as $token)
                  <option>{{ $token->created_at }}</option>
                @endforeach
                @else
                <option></option>
                @endif
                
              </select>
            </div>

          </div>

          <hr />

          <form method="POST" action="{{ route('admin.doctor_notes.store') }}" enctype="multipart/form-data">
          @csrf
          
          <!-- Hidden postings Starts!-->
          <select class="form-control" name="fk_patient_id" hidden>
            @foreach ($tokens as $token)
              <option value="{{ $token->fk_patients_id }}"> {{ $token->fk_patients_id }} </option>
            @endforeach
          </select>
          <select class="form-control" name="fk_token_id" hidden>
            @foreach ($tokens as $token)
              <option value="{{ $token->id }}"> {{ $token->id }} </option>
            @endforeach
          </select>
          <select class="form-control" name="fk_patient_name" hidden>
            @foreach ($tokens as $token)
              <option value="{{ $token->name }}"> {{ $token->name }} </option>
            @endforeach
          </select>
          <select class="form-control" name="fk_token_created_at" hidden>
            @foreach ($tokens as $token)
              <option value="{{ $token->created_at }}"> {{ $token->created_at }} </option>
            @endforeach
          </select>
          <!-- Hidden postings End!-->

          <div class="row mt-4">
            <div class="col-md-12">
              <label for="prescription" class="text-gray-700 font-black">Upload Prescription:</label>
              <input id="prescription" type="file" name="prescription" value="{{ old('prescription') }}" class="form-control" />
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-md-12 text-center">
              <a class="btn btn-warning mx-2" href="{{ route('admin.doctor_notes.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
              <button type="submit" class="btn btn-success mx-2">Submit</button>
            </div>
          </div>
          </form>

        </div>
    </main>
</x-app-layout>