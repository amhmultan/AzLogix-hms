<x-app-layout>
  <div>
       <main>
           <div class="container bg-white shadow-md rounded my-6 px-5 py-4">
             

               <form method="POST" action="{{ route('admin.products.update',$product->id)}}">
                @csrf
                @method('put')

               <h3 class="h2 mb-4 fw-bold text-success">Update Product Details</h3>
               <hr />
               <div class="row pt-5 pb-4">

                <div class="col-md-6">
                  <label for="name" class="text-gray-700 font-black mr-2">Product Name:</label>
                  <input id="name" type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" />
                </div>
                <div class="col-md-6">
                  <label for="generic" class="text-gray-700 font-black">Generic Name:</label>
                  <input id="generic" type="text" name="generic" value="{{ old('generic', $product->generic) }}" class="form-control" />
                </div>

              </div>
              
              <div class="row">

                <div class="col-md-3">
                  <label for="packing" class="text-gray-700 font-black">Pack Size</label>
                  <input id="packing" type="text" name="packing" value="{{ old('packing', $product->packing) }}" class="form-control" />
                </div>
                <div class="col-md-2">
                  <label for="trade_price" class="text-gray-700 font-black">Trade Price</label>
                  <input type="text" name="trade_price" id="trade_price" pattern="^\Rs.\d{1,3}*(\.\d+)?$" value="{{ old('trade_price', $product->trade_price) }}" data-type="currency" placeholder="Rs.1,000.00" class="form-control">
                </div>
                <div class="col-md-2">
                  <label for="retail_price" class="text-gray-700 font-black">Retail Price</label>
                  <input type="text" name="retail_price" id="retail_price" pattern="^\Rs.\d{1,3}*(\.\d+)?$" value="{{ old('retail_price', $product->retail_price) }}" data-type="currency" placeholder="Rs.1,000.00" class="form-control">
                </div>
                <div class="col-md-3">
                  <label for="company_name" class="text-gray-700 font-black">Company Name:</label>
                  <input id="company_name" type="text" name="company_name" value="{{ old('company_name', $product->company_name) }}" class="form-control" />
                </div>
                <div class="col-md-2">
                  <label for="status" class="text-gray-700 font-black">Status:</label>
                  <select class="form-control" name="status">
                    <option value="0">----- SELECT ------</option>
                    <option value="active" @if($product->status) selected @endif>Active</option>
                    <option value="deactivate" @if($product->status) selected @endif>Deactivate</option>
                  </select>
                </div>
                
              </div>

              <div class="row mt-4">
                
                <div class="col-md-4">
                  <label for="quantity" class="text-gray-700 font-black">Quantity:</label>
                  <input id="quantity" type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control" />
                </div>
                <div class="col-md-4">
                  <label for="batch_number" class="text-gray-700 font-black">Batch No.</label>
                  <input id="batch_number" type="text" name="batch_number" value="{{ old('batch_number', $product->batch_number) }}" class="form-control" />
                </div>
                <div class="col-md-2">
                  <label for="expiry_date" class="text-gray-700 font-black">Expiry Date:</label>
                  <input id="expiry_date" type="date" name="expiry_date" value="{{ old('expiry_date', $product->expiry_date) }}" class="form-control" />
                </div>

              </div>

              <div class="row mt-4">

                <div class="col-md-12">
                  <label for="remarks" class="text-gray-700 font-black">Remarks:</label>
                  <textarea name="remarks" id="remarks" placeholder="Enter Remarks" class="form-control" rows="5">{{ old('remarks', $product->remarks) }}</textarea>
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
