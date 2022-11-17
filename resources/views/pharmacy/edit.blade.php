<x-app-layout>
  <div>
       <main>
           <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
             

               <form method="POST" action="{{ route('admin.pharmacies.update',$pharmacy->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')

               <h3 class="h2 mb-4 fw-bold text-success">Update Pharmacy Details</h3>
               <hr />
               <div class="row pt-5 pb-4">
                
                <div class="col-md-4">
                  <label for="name" class="text-gray-700 font-black">Pharmacy Title:</label>
                  <input id="name" type="text" name="name" value="{{ old('name',$pharmacy->name) }}" class="form-control" />
                </div>

              </div>
              
              <div class="row">

                <div class="col-md-3">
                  <label for="reg_no" class="text-gray-700 font-black">REG No.</label>
                  <input id="reg_no" type="number" name="reg_no" value="{{ old('reg_no',$pharmacy->reg_no) }}" placeholder="Please enter registration number" class="form-control" />
                </div>

                <div class="col-md-5">
                  <label for="pic" class="text-gray-700 font-black">Pharmacy Logo</label>
                  <input type="file" id="pic" name="pic" value="{{ old('pic',$pharmacy->pic) }}" class="form-control" accept="image/png, image/jpeg">
                  
                </div>
                
              </div>

              <div class="row mt-4">

                <div class="col-md-12">
                  <label for="address" class="text-gray-700 font-black">Pharmacy Address</label>
                  <textarea name="address" id="address" placeholder="Enter pharmacy address" class="form-control" rows="5">{{ old('address',$pharmacy->address) }}</textarea>
                </div>

              </div>

              <div class="row mt-4">
                
                <div class="col-md-2">
                  <label for="phone" class="text-gray-700 font-black">Contact Number:</label>
                  <input type="tel" id="phone" name="phone" placeholder="XXXXXXXXXXX" pattern="[0-9]{4}[0-9]{7}" value="{{ old('phone',$pharmacy->phone) }}" class="form-control" />
                </div>

              </div>

              <div class="row mt-4">

                <div class="col-md-12">
                  <label for="remarks" class="text-gray-700 font-black">Remarks:</label>
                  <textarea name="remarks" id="remarks" placeholder="Enter remarks" class="form-control" rows="3">{{ old('remarks',$pharmacy->remarks) }}</textarea>
                </div>

              </div>

                 <div class="row mt-5">

                   <div class="col-md-12 text-center">
                     <a class="btn btn-info mx-2" href="{{ route('admin.pharmacies.index')}}" role="button">Back</a>
                     <button type="submit" class="btn btn-success mx-2">Submit</button>
                   </div>

                 </div>

               </form> 
           </div>
       </main>
   </div>
</div>
</x-app-layout>
