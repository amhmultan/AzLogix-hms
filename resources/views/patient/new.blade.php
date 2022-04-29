<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.patients.store') }}">
                  @csrf
                  
                <div class="flex flex-col space-y-2">
                    <label for="mr_number" class="text-gray-700 select-none font-medium">MR No.</label>
                    <input id="mr_number" type="number" name="mr_number" value="{{ old('mr_number') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                    </div>
        
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-gray-700 select-none font-medium">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>
                
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-gray-700 select-none font-medium">Date Of Birth</label>
                    <input id="dob" type="date" name="dob" value="{{ old('dob') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>
                    
                <h3 class="text-xl my-4 text-gray-600">Gender</h3>
                <div class="grid grid-cols-3 gap-4">
                  <div class="relative inline-flex">
                    {{-- <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg> --}}
                    <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="gender">
                      <option value="0">Male</option>
                      <option value="1">Female</option>
                      <option value="2">Others</option>
                    </select>
                  </div>
                </div>

                <h3 class="text-xl my-4 text-gray-600">Marital Status</h3>
                <div class="grid grid-cols-3 gap-4">
                  <div class="relative inline-flex">
                    {{-- <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg> --}}
                    <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="marital_status">
                      <option value="0">Single</option>
                      <option value="1">Married</option>
                      <option value="2">Widowed</option>
                      <option value="3">Divorced</option>
                      <option value="4">Separated</option>
                    </select>
                  </div>
                </div>
                
                <div class="flex flex-col space-y-2">
                  <label for="phone" class="text-gray-700 select-none font-medium">Phone Number</label>
                  <input type="tel" id="phone" name="phone" placeholder="XXXXXXXXXXX" pattern="[0-9]{4}[0-9]{7}" value="{{ old('phone') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" required> e.g 03001234567<br>
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="email" class="text-gray-700 select-none font-medium">Email</label>
                  <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Please enter your email address" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="cnic" class="text-gray-700 select-none font-medium">CNIC</label>
                  <input type="tel" id="cnic" name="cnic" placeholder="XXXXX-XXXXXXX-X" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" value="{{ old('cnic') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" > with dashes
                </div>
                
                <div class="flex flex-col space-y-2">
                  <label for="pic" class="text-gray-700 select-none font-medium">Picture</label>
                  <input type="file" id="pic" name="pic" value="{{ old('pic') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" accept="image/png, image/jpeg">
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="address" class="text-gray-700 select-none font-medium">Address</label>
                  <textarea name="address" id="address" placeholder="Enter address" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" rows="5">{{ old('address') }}</textarea>
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="emr_name" class="text-gray-700 select-none font-medium">Emergency Person Name</label>
                  <input id="emr_name" type="text" name="emr_name" value="{{ old('emr_name') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="relationship" class="text-gray-700 select-none font-medium">Relationship</label>
                  <input id="relationship" type="text" name="relationship" value="{{ old('relationship') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="emr_phone" class="text-gray-700 select-none font-medium">Emergency Number</label>
                  <input type="tel" id="emr_phone" name="emr_phone" placeholder="XXXXXXXXXXX" pattern="[0-9]{4}[0-9]{7}" value="{{ old('phone') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" > e.g 03001234567<br>
                </div>
                
                <div class="flex flex-col space-y-2">
                  <label for="weight" class="text-gray-700 select-none font-medium">Weight</label>
                  <input id="weight" type="text" name="weight" value="{{ old('weight') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="height" class="text-gray-700 select-none font-medium">Height</label>
                  <input id="height" type="text" name="height" value="{{ old('height') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="history" class="text-gray-700 select-none font-medium">History</label>
                  <textarea name="history" id="history" placeholder="Enter history" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" rows="5">{{ old('history') }}</textarea>
                </div>

                <div class="flex flex-col space-y-2">
                  <label for="reffered_by" class="text-gray-700 select-none font-medium">Reffered By</label>
                  <input id="reffered_by" type="text" name="reffered_by" value="{{ old('reffered_by') }}" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                </div>

                <div class="text-center mt-16 mb-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-app-layout>
