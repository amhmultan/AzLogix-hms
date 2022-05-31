<x-app-layout>
   <div>
        <main>
            <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
              

                <form method="POST" action="{{ route('admin.patients.store') }}">
                  @csrf

                <h3 class="h2 mb-4 fw-bold text-success">Add Patients</h3>
                <hr />
                  <div class="row pt-5 pb-4">

                    <div class="col-md-2">
                      <label for="mr_number" class="text-gray-700 font-black mr-2">MR. No.</label>
                      <input id="mr_number" type="number" name="mr_number" value="{{ old('mr_number') }}" class="form-control" />
                    </div>
                    <div class="col-md-4">
                      <label for="name" class="text-gray-700 font-black">Full Name:</label>
                      <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" />
                    </div>
                    <div class="col-md-2">
                      <label for="name" class="text-gray-700 font-black">Date Of Birth:</label>
                      <input id="dob" type="date" name="dob" value="{{ old('dob') }}" class="form-control" />
                    </div>
                    <div class="col-md-2">
                      <label for="gender" class="text-gray-700 font-black">Gender:</label>
                      <select class="form-control" name="gender">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Others</option>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="marital_status" class="text-gray-700 font-black">Marital Status:</label>
                      <select class="form-control" name="marital_status">
                        <option value="0">Single</option>
                        <option value="1">Married</option>
                        <option value="2">Widowed</option>
                        <option value="3">Divorced</option>
                        <option value="4">Separated</option>
                      </select>
                    </div>

                  </div>
                  
                  <div class="row">

                    <div class="col-md-2">
                      <label for="phone" class="text-gray-700 font-black">Phone Number</label>
                      <input type="tel" id="phone" name="phone" placeholder="XXXXXXXXXXX" pattern="[0-9]{4}[0-9]{7}" value="{{ old('phone') }}" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                      <label for="email" class="text-gray-700 font-black">Email</label>
                      <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Please enter your email address" class="form-control" />
                    </div>
                    <div class="col-md-2">
                      <label for="cnic" class="text-gray-700 font-black">CNIC</label>
                      <input type="tel" id="cnic" name="cnic" placeholder="XXXXX-XXXXXXX-X" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" value="{{ old('cnic') }}" class="form-control" />
                    </div>
                    <div class="col-md-5">
                      <label for="pic" class="text-gray-700 font-black">Picture</label>
                      <input type="file" id="pic" name="pic" value="{{ old('pic') }}" class="form-control" accept="image/png, image/jpeg">
                    </div>
                    
                  </div>

                  <div class="row mt-4">

                    <div class="col-md-12">
                      <label for="address" class="text-gray-700 font-black">Address</label>
                      <textarea name="address" id="address" placeholder="Enter address" class="form-control" rows="5">{{ old('address') }}</textarea>
                    </div>

                  </div>

                  <div class="row mt-4">
                    
                    <div class="col-md-3">
                      <label for="emr_name" class="text-gray-700 font-black">Emergency Person Name</label>
                      <input id="emr_name" type="text" name="emr_name" value="{{ old('emr_name') }}" class="form-control" />
                    </div>
                    <div class="col-md-2">
                      <label for="relationship" class="text-gray-700 font-black">Relationship</label>
                      <input id="relationship" type="text" name="relationship" value="{{ old('relationship') }}" class="form-control" />
                    </div>
                    <div class="col-md-2">
                      <label for="emr_phone" class="text-gray-700 font-black">Emergency Number</label>
                      <input type="tel" id="emr_phone" name="emr_phone" placeholder="XXXXXXXXXXX" pattern="[0-9]{4}[0-9]{7}" value="{{ old('phone') }}" class="form-control" />
                    </div>
                    <div class="col-md-1">
                      <label for="weight" class="text-gray-700 font-black">Weight</label>
                      <input id="weight" type="text" name="weight" value="{{ old('weight') }}" class="form-control" />
                    </div>
                    <div class="col-md-1">
                      <label for="height" class="text-gray-700 font-black">Height</label>
                      <input id="height" type="text" name="height" value="{{ old('height') }}" class="form-control" />
                    </div>
                    <div class="col-md-3">
                      <label for="reffered_by" class="text-gray-700 font-black">Reffered By</label>
                      <input id="reffered_by" type="text" name="reffered_by" value="{{ old('reffered_by') }}" class="form-control" />
                    </div>

                  </div>

                  <div class="row mt-4">

                    <div class="col-md-12">
                      <label for="history" class="text-gray-700 font-black">History</label>
                      <textarea name="history" id="history" placeholder="Enter history" class="form-control" rows="5">{{ old('history') }}</textarea>
                    </div>

                  </div>
                  
                  <div class="row mt-5">

                    <div class="col-md-12 text-center">
                      <a class="btn btn-info mx-2" href="{{ route('admin.patients.index')}}" role="button">Back</a>
                      <button type="submit" class="btn btn-success mx-2">Submit</button>
                    </div>

                  </div>

                </form> 
            </div>
        </main>
    </div>
</div>
</x-app-layout>
