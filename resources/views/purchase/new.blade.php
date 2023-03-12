<x-app-layout>
    <div>
         <main>
             <div class="container-fluid bg-white py-4 px-4">
  
                  <form method="POST" action="{{ route('admin.purchases.store') }}">
                    @csrf
  
                    <p class="h3 text-danger"><strong><em>Add <span class="text-success">Purchase Invoice</span></em></strong></p>
                    <hr />

                    {{-- Purchase Table Starting here --}}
                    <table class="table table-responsive table-bordered">
                        <thead class="bg-primary text-light fw-bold text-center">
                          <tr>
                            <th class="align-middle">Product ID</th>
                            <th class="align-middle">Product Name</th>
                            <th class="align-middle">Batch Number</th>
                            <th class="align-middle">Quantity</th>
                            <th class="align-middle">Trade Price</th>
                            <th class="align-middle">Retail Price</th>
                            <th class="align-middle">Net Amount</th>
                            <th class="align-middle">Discount</th>
                            <th class="align-middle">Tax</th>
                            <th class="align-middle">Gross Amount</th>
                            <th class="align-middle"><a href="javascript:void(0)" class="btn btn-success addRow">+</a></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input type="number" id="product-id" class="form-control" autofocus /></td>
                            <td><input type="text" id="product-name" class="form-control" /></td>
                            <td><input type="number" name="batch_no[]" class="form-control" /></td>
                            <td><input type="number" name="quantity[]" class="form-control" /></td>
                            <td><input type="number" name="trade_price[]" class="form-control" /></td>
                            <td><input type="number" name="retail_price[]" class="form-control" /></td>
                            <td><input type="number" name="net_amount[]" class="form-control" /></td>
                            <td><input type="number" name="discount[]" class="form-control" /></td>
                            <td><input type="number" name="tax[]" class="form-control" /></td>
                            <td><input type="number" name="gross_amount[]" class="form-control" /></td>
                            <td><a href="javascript:void(0)" class="btn btn-danger deleteRow">-</a></td>
                          </tr>
                        </tbody>
                    </table>
                    
                    {{-- Purchase Table Ending here --}}
                    
                    <hr />
                    
                    <div class="row pb-4">
                      <div class="col-md-11">
                        <label for="name" class="text-gray-700 font-black mr-2">Supplier Name:</label>
                        <select class="form-control" name="fk_supplier_id" id="fk_supplier_id">
                          <option class="text-center">-- Please Select -- </option>
                          @foreach ($data['suppliers'] as $supplier)
                            <option class="text-center" value="{{ $supplier->id }}">{{ $supplier->sName }}</option>
                          @endforeach
                        </select>
                      </div>
                      
                      <div class="col-md-1 pt-4">
                        <a class="btn btn-lg btn-warning text-dark fw-bold" href="{{route('admin.suppliers.create')}}" role="button" target="_blank">Add</a>
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
                        <a class="btn btn-info mx-2" href="{{ route('admin.purchases.index')}}" role="button">Back</a>
                        <button type="submit" class="btn btn-success mx-2">Submit</button>
                      </div>
  
                    </div>
  
                  </form> 
              </div>
          </main>
      </div>
  </div>

  @section('script')
  
    <script>
      
      // Appending row
      $('thead').on('click', '.addRow', function(){
        var tr = "<tr>"+
                    "<td><input type='number' id='product-id' class='form-control' autofocus/></td>"+
                    "<td><input type='text' id='product-name' name='product_name[]' class='form-control' /></td>"+
                    "<td><input type='number' name='batch_no[]' class='form-control' /></td>"+
                    "<td><input type='number' name='quantity[]' class='form-control' /></td>"+
                    "<td><input type='number' name='trade_price[]' class='form-control'/></td>"+
                    "<td><input type='number' name='retail_price[]' class='form-control' /></td>"+
                    "<td><input type='number' name='net_amount[]' class='form-control' /></td>"+
                    "<td><input type='number' name='discount[]' class='form-control' /></td>"+
                    "<td><input type='number' name='tax[]' class='form-control' /></td>"+
                    "<td><input type='number' name='gross_amount[]' class='form-control' /></td>"+
                    "<td><a href='javascript:void(0)' class='btn btn-danger deleteRow'>-</a></td>"+
                  "</tr>"
        $('tbody').append(tr);
        });

      // Deleting row
      $('tbody').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
      });





      // Searching Ajax Products scripts

      $( document ).ready(function() {
      $( "#product-id" ).autocomplete({
        minLength: 1,
        dataType: "json",
        cache: false,
        source : function(request, response) 
        {
          $.ajax({
              url : "/AzLogix-hms/public/admin/productlist",
              dataType : "json",
              method:'GET',
              data : { term: request.term },
              success: function(data){
                  response(data.map(function(value){
                      // console.log(value);
                      return {
                        value: value.id
                      };
                  }));

              }
          });
        }
        });
      });

      $( document ).ready(function() {
      $( "#product-name" ).autocomplete({
        minLength: 1,
        dataType: "json",
        cache: false,
        source : function(request, response) 
        {
          $.ajax({
              url : "/AzLogix-hms/public/admin/productlist",
              dataType : "json",
              method:'GET',
              data : { term: request.term },
              success: function(data){
                  response(data.map(function(val){
                      // console.log(val);
                      return {
                        value: val.name
                      };
                  }));

              }
          });
        }
        });
      });

    </script>
  @stop

  </x-app-layout>
  