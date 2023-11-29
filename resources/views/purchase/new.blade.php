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
                            <td><input type="number" id="productsetid" name="product-id[]" class="form-control" disabled /></td>
                            <td><input type="text" id="product-name" name="product-name[]" class="form-control" /></td>
                            <td><input type="text" name="batch_no[]" class="form-control" /></td>
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
                      <div class="col-md-2">
                        <label for="name" class="text-gray-700 font-black mr-2">Supplier Name:</label>
                        <select class="form-control" name="fk_supplier_id" id="fk_supplier_id">
                          <option class="text-center" value="">-- Please Select -- </option>
                          @foreach ($data['suppliers'] as $supplier)
                            <option class="text-center" value="{{ $supplier->id }}">{{ $supplier->sName }}</option>
                          @endforeach
                        </select>
                      </div>
                        
                        <div class="col-md-1 pt-4">
                          <a class="btn btn-lg btn-warning text-dark fw-bold" href="{{route('admin.suppliers.create')}}" role="button" target="_blank">Add</a>
                        </div>
                      
                      <div class="col-md-9">
                        <label for="remarks" class="text-gray-700 font-black">Remarks:</label>
                        <textarea name="remarks" id="remarks" placeholder="Enter Remarks" class="form-control" rows="1">{{ old('remarks') }}</textarea>
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
  
  <script language="JavaScript" type="text/javascript">
      
      
      $( document ).ready(function() {
      
      // Searching Ajax Products scripts
        $( "#product-name").autocomplete({
          autoFill: true,
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
                        console.log(val);
                          $('#productsetid').val(val.id);
                        return {
                          value: val.name
                        };
                    }));

                }
            });
          }
          });

      

      // Appending row
        $('tbody tr:last td:first input').focus();
        var i = 0;
        $('thead').on('click', '.addRow', function(){
        i = i + 1;
        var tr = "<tr>"+
                    "<td><input type='number' id='Productsetid' name='product-id[]' class='form-control' disabled /></td>"+
                    "<td><input type='text' id='product-name"+i+"' name='product-name[]' class='form-control' /></td>"+
                    "<td><input type='text' name='batch_no[]' class='form-control' /></td>"+
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
                
        $( "#product-name"+i ).autocomplete({
        autoFill: true,
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
                      //console.log(val);
                      $('#Productsetid').val(val.id);
                      return {
                        value: val.name
                      };
                  }));

              }
          });
        }
        });
        
        $('tbody tr:last td:first input').focus();

        });

      // Deleting row
      $('tbody').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
      });
    });
    </script>
  @stop

  </x-app-layout>
  