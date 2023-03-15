<x-app-layout>
    <div>
         <main>
          <div class="container-fluid py-4 px-5">
               
  
                 <form method="POST" action="{{ route('admin.specialities.update',$speciality->id)}}">
                  @csrf
                  @method('put')
                  <p class="text-center text-yellow-600 font-black text-4xl">Edit <span class="text-green-600 font-black text-4xl">Specialty</span></p>
                  <hr class="my-4" />
                  <span class="text-danger fw-bold italic"> * </span><span class="fw-bold text-primary italic">Required Fields</span>
  
                  
                   <div class="row pt-5 pb-4">
                     <div class="col-md-4">
                       <label for="title" class="text-gray-700 font-black">Patient Name:<span class="text-danger"> * </span></label>
                       <input id="title" type="text" name="title" value="{{ old('title',$speciality->title) }}" class="form-control" required/>
                     </div>
                   </div>

                   <div class="row mt-4">
                     <div class="col-md-12">
                       <label for="remarks" class="text-gray-700 font-black">Remarks</label>
                       <input id="remarks" type="text" name="remarks" value="{{ old('remarks',$speciality->remarks) }}" class="form-control" />
                     </div>
                   </div>
                   
                   <div class="row mt-5">
  
                     <div class="col-md-12 text-center">
                       <a class="btn btn-warning text-primary mx-2" accesskey="b" href="{{ route('admin.specialities.index')}}" role="button"><u>B</u>ack</a>
                       <button type="submit" class="btn btn-success mx-2">Submit</button>
                     </div>
  
                   </div>
  
                 </form> 
             </div>
         </main>
     </div>
  </div>
  </x-app-layout>
  