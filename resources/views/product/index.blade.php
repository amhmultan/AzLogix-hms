<x-app-layout>
  <main>
      <div class="container-fluid py-4 px-5 overflow-x-auto w-full">

            <div class="row mb-5">
              <div class="col-sm-6">
                <p class="h3 text-danger"><strong><em>Products <span class="text-success">Dashboard</span></em></strong></p>
              </div>
              <div class="col-sm-6 text-right">
                @can('Product create')
                  <a href="{{route('admin.products.create')}}" class="text-decoration-none bg-black text-white font-bold px-5 py-2 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors" accesskey="a"><u>A</u>dd Product</a>
                @endcan
              </div>
            </div>
          
          @if (!$products->isEmpty())
            
              <table id="productsTable" class="min-w-full bg-white shadow-md rounded text-left border-collapse">
                <thead>
                  <tr>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ID</th>
                    <th class="py-3 px-5 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">MANUFACTURER</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">NAME</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">GENERIC</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CLASS</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">PACK SIZE</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">STATUS</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">CREATED ON</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">UPDATED ON</th>
                    <th class="py-3 px-4 bg-indigo-500 font-bold text-sm text-white text-center border border-grey-light">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  @can('Product access')
                  
                    @foreach($products as $product)
                      <tr>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $product->id }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $product->manufacturersName }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $product->name  }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $product->generic }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $product->drug_class }}</td>
                        <td class="text-nowrap text-xs px-4 text-center border-grey-light">{{ $product->pack_size }}</td>
                        
                        {{-- Status --}}
                        @if ($product->status == '1')
                          <td class="text-nowrap text-xs px-4 text-success text-center border-grey-light">Active</td>
                        @else
                          <td class="text-nowrap text-xs px-4 text-danger text-center border-grey-light">Deactive</td>
                        @endif
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $product->created_at }}</td>
                        <td class="text-nowrap text-xs px-4 border-grey-light">{{ $product->updated_at }}</td>
                        
                        
                        <td class="text-nowrap text-xs px-3 border-grey-light">
                          
                          @can('Product edit')
                          <a href="{{route('admin.products.edit',$product->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                          @endcan
      
                          @can('Product delete')
                          <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
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
</div>
@section('script')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#productsTable').DataTable(
    {
      order: [[0, 'desc']],
    });
} );
</script>
@stop
</x-app-layout>