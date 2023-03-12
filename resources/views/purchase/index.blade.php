<x-app-layout>
    <main>
        
        <div class="container-fluid py-4 px-5">

            <div class="row mb-5">
              <div class="col-sm-6">
                <p class="h3 text-danger"><strong><em>Purchase <span class="text-success">Dashboard</span></em></strong></p>
              </div>
              <div class="col-sm-6 text-right">
                @can('Purchase create')
                  <a href="{{route('admin.purchases.create')}}" class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors" accesskey="a"><u>A</u>dd Purchase Invoice</a>
                @endcan
              </div>
            </div>
          
          @if (!$purchases->isEmpty())
            
              <table id="purchasesTable" class="table-responsive bg-white shadow-md rounded text-left w-full border-collapse">
                <thead>
                  <tr>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PURCHASE ID</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PURCHASE DATE</th>
                    
                    
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">SUPPLIER</th>
                    
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PURCHASE AMOUNT</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PURCHASE UPDATE DATE</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">REMARKS</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  @can('Purchase access')
                  
                    @foreach($purchases as $purchase)
                      <tr>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $purchase->id }}</td>
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $purchase->created_at }}</td>
                        
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $purchase->sName  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $purchase->gross_amount  }}</td>
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $purchase->updated_at }}</td>
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $purchase->remarks }}</td>
                        
                        
                        <td class="text-nowrap text-xs px-3 border-grey-light">
                          
                          @can('Purchase edit')
                          <a href="{{route('admin.purchases.edit',$purchase->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                          @endcan
      
                          @can('Purchase delete')
                          <form action="{{ route('admin.purchases.destroy', $purchase->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="text-decoration-none text-grey-lighter font-bold py-1 px-1 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                          </form>
                          @endcan
                        </td>
                      </tr>
                    @endforeach
                    @endcan
                </tbody>
              </table>
            
                    
        @else

          <div class="row flex text-center mt-5 pt-5">
            <div class="col-sm-12">
              <h1 class="h4 italic text-danger">NO RECORD FOUND</h1>
            </div>
          </div>
        
        @endif

      </div>

    </main>

    @section('script')
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready( function () {
            $('#purchasesTable').DataTable(
            {
            order: [[0, 'desc']],
            });
        } );
        </script>
    @stop

</x-app-layout>