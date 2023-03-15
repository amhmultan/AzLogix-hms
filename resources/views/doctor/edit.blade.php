<x-app-layout>
    <div>
         <main>
          <div class="container-fluid py-4 px-5">
            @foreach ($data['doctors'] as $doctor)
                 <form method="POST" action="{{ route('admin.doctors.update',$doctor->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <p class="text-center text-yellow-600 font-black text-4xl">Update Doc<span class="text-green-600 font-black text-4xl">tor Details</span></p>
                  <hr class="my-4" />
                  <span class="text-danger fw-bold italic"> * </span><span class="fw-bold text-primary italic">Required Fields</span>
                  
                  <div class="row pt-4 pb-4">
            
                    <div class="col-md-4">
                      <label for="name" class="text-gray-700 font-black">Name:<span class="text-danger"> * </span></label>
                      <input id="name" type="text" name="name" value="{{ old('name',$doctor->name) }}" class="form-control" placeholder="Enter name" required/>
                    </div>
        
                    <div class="col-md-2">
                      <label for="name" class="text-gray-700 font-black">Date Of Birth:</label>
                      <input id="dob" type="date" name="dob" value="{{ old('dob',$doctor->dob) }}" class="form-control" />
                    </div>

                    <div class="col-md-3">
                        <label for="contact" class="text-gray-700 font-black">Cell Number</label>
                        <input type="tel" id="contact" name="contact" placeholder="xxxxxxxxxxx" pattern="[0-9]{4}[0-9]{7}" value="{{ old('contact',$doctor->contact) }}" class="form-control">
                    </div>
                    
                    <div class="col-md-3">
                        <label for="pic" class="text-gray-700 font-black">Picture:<span class="text-danger"> * </span></label>
                        <div class="border-4 rounded-lg border-black p-3 m-1"><img src="{{ asset('img/'.$doctor->pic) }}" width="120px"></div>
                        <input type="file" id="pic" name="pic" value="{{ old('pic',$doctor->pic) }}" class="form-control" required/>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <label for="email" class="text-gray-700 font-black">Email</label>
                      <input id="email" type="email" name="email" value="{{ old('email',$doctor->email) }}" placeholder="Enter email address" class="form-control" />
                    </div>
                    <div class="col-md-4">
                      <label for="cnic" class="text-gray-700 font-black">CNIC <span class="fw-bold text-success italic">(with dashes)</span></label>
                      <input type="tel" id="cnic" name="cnic" placeholder="xxxxx-xxxxxxx-x" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" value="{{ old('cnic',$doctor->cnic) }}" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <label for="pmdc" class="text-gray-700 font-black">PMDC Number<span class="text-danger"> * </span></label>
                        <input type="text" id="pmdc" name="pmdc" placeholder="Enter PMDC Number" value="{{ old('pmdc',$doctor->pmdc) }}" class="form-control" required/>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-9">
                      <label for="schedule" class="text-gray-700 font-black">Schedule</label>
                      <input id="schedule" type="text" name="schedule" value="{{ old('schedule',$doctor->schedule) }}" class="form-control" />
                    </div>
                    @endforeach
                    <div class="col-md-3">
                      <label for="specialty" class="text-gray-700 font-black">Specialty:<span class="text-danger"> * </span></label>
                        <select class="form-control" name="specialty" id="specialty" required>
                          <option value=""> -- Please Select -- </option>
                            @foreach ($data['specialities'] as $specialty)
                              <option value="{{ $specialty->id }}">{{ $specialty->sTitle }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($data['doctors'] as $doctor)
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <label for="address" class="text-gray-700 font-black">Address</label>
                      <textarea name="address" id="address" placeholder="Enter address" class="form-control" rows="3">{{ old('address',$doctor->address) }}</textarea>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <label for="remarks" class="text-gray-700 font-black">Remarks</label>
                      <textarea name="remarks" id="remarks" placeholder="Enter history" class="form-control" rows="3">{{ old('remarks',$doctor->remarks) }}</textarea>
                    </div>
                  </div>
                   @endforeach
                   <div class="row mt-5">
  
                     <div class="col-md-12 text-center">
                       <a class="btn btn-warning text-primary mx-2" accesskey="b" href="{{ route('admin.doctors.index')}}" role="button"><u>B</u>ack</a>
                       <button type="submit" class="btn btn-success mx-2">Submit</button>
                     </div>
  
                   </div>
  
                 </form> 
             </div>
         </main>
     </div>
  </div>
  </x-app-layout>
  