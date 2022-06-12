<x-app-layout>
  <div>
       <main>
           <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
             

               <form method="POST" action="{{ route('admin.p_lab.update',$p_lab->id)}}">
                @csrf
                @method('put')

               <h3 class="h2 mb-4 fw-bold text-success">Update Pathology Lab Details</h3>
               <hr />
               <div class="row pt-5 pb-4">

                <div class="col-md-2">
                  <label for="p_lab_id" class="text-gray-700 font-black mr-2">Pathology Lab ID:</label>
                  <input id="p_lab_id" type="number" name="p_lab_id" value="{{ old('p_lab_id',$p_lab->id) }}" class="form-control" />
                </div>
                <div class="col-md-4">
                  <label for="p_lab_name" class="text-gray-700 font-black">Pathology Lab Name:</label>
                  <input id="p_lab_name" type="text" name="p_lab_name" value="{{ old('p_lab_name',$p_lab->p_lab_name) }}" class="form-control" />
                </div>

              </div>
              
              <div class="row">

                <div class="col-md-3">
                  <label for="p_lab_email" class="text-gray-700 font-black">Lab Email</label>
                  <input id="p_lab_email" type="email" name="p_lab_email" value="{{ old('p_lab_email',$p_lab->p_lab_email) }}" placeholder="Please enter lab email address" class="form-control" />
                </div>
                <div class="col-md-5">
                  <label for="p_lab_pic" class="text-gray-700 font-black">Lab Logo</label>
                  <input type="file" id="p_lab_pic" name="p_lab_pic" value="{{ old('p_lab_pic',$p_lab->p_lab_pic) }}" class="form-control" accept="image/png, image/jpeg">
                </div>
                
              </div>

              <div class="row mt-4">

                <div class="col-md-12">
                  <label for="p_lab_address" class="text-gray-700 font-black">Lab Address</label>
                  <textarea name="p_lab_address" id="p_lab_address" placeholder="Enter lab address" class="form-control" rows="5">{{ old('p_lab_address',$p_lab->p_lab_address) }}</textarea>
                </div>

              </div>

              <div class="row mt-4">
                
                <div class="col-md-2">
                  <label for="p_lab_contact" class="text-gray-700 font-black">Contact Number:</label>
                  <input type="tel" id="p_lab_contact" name="p_lab_contact" placeholder="XXXXXXXXXXX" pattern="[0-9]{4}[0-9]{7}" value="{{ old('p_lab_contact',$p_lab->p_lab_contact) }}" class="form-control" />
                </div>

              </div>

              <div class="row mt-4">

                <div class="col-md-12">
                  <label for="p_lab_remarks" class="text-gray-700 font-black">Remarks:</label>
                  <textarea name="p_lab_remarks" id="p_lab_remarks" placeholder="Enter remarks" class="form-control" rows="3">{{ old('p_lab_remarks',$p_lab->p_lab_remarks) }}</textarea>
                </div>

              </div>

                 <div class="row mt-5">

                   <div class="col-md-12 text-center">
                     <a class="btn btn-info mx-2" href="{{ route('admin.p_lab.index')}}" role="button">Back</a>
                     <button type="submit" class="btn btn-success mx-2">Submit</button>
                   </div>

                 </div>

               </form> 
           </div>
       </main>
   </div>
</div>
</x-app-layout>
