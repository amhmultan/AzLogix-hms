<x-app-layout>
   <div>
        <main>
            <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
              

                <form method="POST" action="{{ route('admin.suppliers.store') }}" enctype="multipart/form-data">
                  @csrf

                  <p class="h3 text-danger"><strong><em>Add <span class="text-success">Supplier</span></em></strong></p>
                <hr />
                  <div class="row mt-5">

                    <div class="col-md-12">
                      <label for="name" class="text-gray-700 font-black">Supplier Name:</label>
                      <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" />
                    </div>
                    
                  </div>
                  
                  <div class="row mt-4">
                    
                    <div class="col-md-4">
                      <label for="contact" class="text-gray-700 font-black">Contact Number</label>
                      <input type="tel" id="contact" name="contact" placeholder="xxxxxxxxxxx" pattern="[0-9]{4}[0-9]{7}" value="{{ old('contact') }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                      <label for="fbr_no" class="text-gray-700 font-black">FBR No:</label>
                      <input id="fbr_no" type="number" name="fbr_no" value="{{ old('fbr_no') }}" class="form-control" />
                    </div>
                    <div class="col-md-4">
                      <label for="license_no" class="text-gray-700 font-black">License No:</label>
                      <input id="license_no" type="number" name="license_no" value="{{ old('license_no') }}" class="form-control" />
                    </div>

                  </div>

                  <div class="row mt-4">
                    
                    <div class="col-md-12">
                      <label for="description" class="text-gray-700 font-black">Description:</label>
                      <input id="description" type="text" name="description" value="{{ old('description') }}" class="form-control" />
                    </div>

                  </div>

                  <div class="row mt-4">

                    <div class="col-md-12">
                      <label for="address" class="text-gray-700 font-black">Address</label>
                      <textarea name="address" id="address" placeholder="Enter address" class="form-control" rows="5">{{ old('address') }}</textarea>
                    </div>

                  </div>
                  
                  <div class="row mt-4">
                    
                    <div class="col-md-12">
                      <label for="remarks" class="text-gray-700 font-black">Remarks</label>
                      <textarea name="remarks" id="remarks" placeholder="Enter Remarks" class="form-control" rows="5">{{ old('remarks') }}</textarea>
                    </div>
                    
                  </div>

                  <div class="row mt-5">

                    <div class="col-md-12 text-center">
                      <a class="btn btn-info mx-2" href="{{ route('admin.suppliers.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                      <button type="submit" class="btn btn-success mx-2">Submit</button>
                    </div>

                  </div>

                </form> 
            </div>
        </main>
    </div>
</div>
</x-app-layout>
