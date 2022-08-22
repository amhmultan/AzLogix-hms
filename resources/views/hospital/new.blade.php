<x-app-layout>
   <div>
        <main>
            <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
              

                <form method="POST" action="{{ route('admin.hospitals.store') }}" enctype="multipart/form-data">
                  @csrf

                  <p class="h3 text-danger"><strong><em>Add <span class="text-success">Hospital</span></em></strong></p>
                <hr />
                  <div class="row pt-4 pb-4">

                    <div class="col-md-4">
                      <label for="title" class="text-gray-700 font-black">Hospital Title:</label>
                      <input id="title" type="text" name="title" value="{{ old('title') }}" class="form-control" />
                    </div>
                    
                    <div class="col-md-4">
                      <label for="logo" class="text-gray-700 font-black">Logo:</label>
                      <input id="logo" type="file" name="logo" value="{{ old('logo') }}" class="form-control" />
                    </div>

                    <div class="col-md-4">
                      <label for="phc_no" class="text-gray-700 font-black">PHC No:</label>
                      <input id="phc_no" type="number" name="phc_no" value="{{ old('phc_no') }}" class="form-control" />
                    </div>
                    
                  </div>
                  
                  <div class="row mt-4">

                    <div class="col-md-4">
                      <label for="contact" class="text-gray-700 font-black">Contact Number</label>
                      <input type="tel" id="contact" name="contact" placeholder="xxxxxxxxxxx" pattern="[0-9]{4}[0-9]{7}" value="{{ old('contact') }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                      <label for="email" class="text-gray-700 font-black">Email</label>
                      <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" class="form-control" />
                    </div>
                    <div class="col-md-4">
                      <label for="website" class="text-gray-700 font-black">Website</label>
                      <input type="tel" id="website" name="website" value="{{ old('website') }}" class="form-control" />
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
                      <a class="btn btn-info mx-2" href="{{ route('admin.hospitals.index')}}" accesskey="b" role="button"><u>B</u>ack</a>
                      <button type="submit" class="btn btn-success mx-2">Submit</button>
                    </div>

                  </div>

                </form> 
            </div>
        </main>
    </div>
</div>
</x-app-layout>
