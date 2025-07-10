<x-app-layout>
  <div>
       <main>
           <div class="container bg-white shadow-md rounded my-6 px-5 py-4">

                <form method="POST" action="{{ route('admin.products.store') }}">
                  @csrf

                  <p class="h3 text-danger"><strong><em>Add <span class="text-success">Product</span></em></strong></p>
                  <hr />
                  
                  <div class="row pt-4 pb-4">

                    <div class="col-md-6">
                      
                      <label for="name" class="text-gray-700 font-black mr-2">Manufacturer Name:</label>
                      
                      <select class="form-control" name="fk_manufacturer_id" id="fk_manufacturer_id">
                        @foreach($manufacturers as $manufacturer)
                          <option class="text-center" value="{{ $manufacturer->id }}">{{ $manufacturer->mName }}</option>
                        @endforeach
                      </select>

                    </div>

                  </div>

                  <div class="row pb-4">

                    <div class="col-md-4">
                      <label for="name" class="text-gray-700 font-black mr-2">Product Name:</label>
                      <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" />
                    </div>
                    <div class="col-md-4">
                      <label for="generic" class="text-gray-700 font-black">Generic Name:</label>
                      <input id="generic" type="text" name="generic" value="{{ old('generic') }}" class="form-control" />
                    </div>
                    <div class="col-md-4">
                      <label for="drug_class" class="text-gray-700 font-black">Drug Class:</label>
                      <input id="drug_class" type="text" name="drug_class" value="{{ old('drug_class') }}" class="form-control" />
                    </div>

                  </div>
                  
                  <div class="row pb-4">
                    
                    <div class="col-md-12">
                      <label for="description" class="text-gray-700 font-black">Product Description:</label>
                      <input id="description" type="text" name="description" value="{{ old('description') }}" class="form-control" />
                    </div>
                    
                  </div>

                  <div class="row pb-4">

                    <div class="col-md-3">
                      <label for="pack_size" class="text-gray-700 font-black">Pack Size</label>
                      <input id="pack_size" type="text" name="pack_size" value="{{ old('pack_size') }}" class="form-control" />
                    </div>
                    
                    <div class="col-md-3">
                      <label for="status" class="text-gray-700 font-black">Status:</label>
                      <select class="form-control" name="status">
                        <option class="text-center">------- SELECT -------</option>
                        <option class="text-center" value="1">Active</option>
                        <option class="text-center" value="0">Deactivate</option>
                      </select>
                    </div>
                    
                  </div>

                  <div class="row">

                    <div class="col-md-12">
                      <label for="remarks" class="text-gray-700 font-black">Remarks:</label>
                      <textarea name="remarks" id="remarks" placeholder="Enter Remarks" class="form-control" rows="5">{{ old('remarks') }}</textarea>
                    </div>

                  </div>
                  
                  <div class="row mt-5">

                    <div class="col-md-12 text-center">
                      <a class="btn btn-info mx-2" href="{{ route('admin.products.index')}}" role="button">Back</a>
                      <button type="submit" class="btn btn-success mx-2">Submit</button>
                    </div>

                  </div>

                </form> 
            </div>
        </main>
    </div>
</div>
</x-app-layout>
