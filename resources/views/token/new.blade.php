<x-app-layout>
    <main>
        <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
              
          <div class="row pb-5">
            <p class="h3 text-danger"><strong><em>Add <span class="text-success">Token</span></em></strong></p>
            <hr />
          </div>
          
          <div class="row mb-5">
              <div class="col-sm-3">
                <form action="" method="GET">
                <input type="search" name="search" id="search" placeholder="Enter MR Number" class="form-control">
              </div>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-primary mx-2">Search</button>
              </form>
              </div>
          </div>
          
          <hr />

          <div class="row my-4">
            <div class="col-md-12">
              <label for="fk_patients_id" class="text-gray-700 font-black">Patient Name:</label>
              <select class="form-control" name="fk_patients_id" disabled>
                @if ($search != "")
                @foreach ($patients as $patient)
                  <option>{{ $patient->name }}</option>    
                @endforeach
                @else
                <option></option>
                @endif
                
              </select>
            </div>
          </div>

          <hr />

          <form method="POST" action="{{ route('admin.tokens.store') }}" enctype="multipart/form-data">
          @csrf
          <select class="form-control" name="fk_patients_id" hidden>
            @foreach ($patients as $patient)
              <option value="{{ $patient->id }}"> {{ $patient->id }} {{ $patient->name }} </option>    
            @endforeach
          </select>
          <div class="row mt-4">
            <div class="col-md-4">
              <label for="fees" class="text-gray-700 font-black">Fees:</label>
              <input id="fees" type="number" name="fees" value="{{ old('fees') }}" class="form-control" />
            </div>
            <div class="col-md-4">
              <label for="denomination" class="text-gray-700 font-black">Denomination:</label>
              <input id="denomination" type="number" name="denomination" value="{{ old('denomination') }}" class="form-control" />
            </div>
            <div class="col-md-4">
              <label for="balance" class="text-gray-700 font-black">Balance</label>
              <input id="balance" type="number" name="balance" value="{{ old('balance') }}" class="form-control" />
            </div>
            <div class="row mt-5">
              <div class="col-md-12 text-center">
                <a class="btn btn-warning mx-2" href="{{ route('admin.tokens.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                <button type="submit" class="btn btn-success mx-2">Submit</button>
              </div>
            </div>
          </form>

        </div>
    </main>
</x-app-layout>