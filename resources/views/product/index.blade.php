<x-app-layout>
  <main class="flex-1 bg-gray-200">
      <div class="container-fluid py-10">
          <div class="text-right">
            @can('Product create')
              <a href="{{route('admin.products.create')}}" class="text-decoration-none bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Product</a>
            @endcan
          </div>
        <div class="bg-white shadow-md rounded mt-5 overflow-auto">

          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Product Id</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Product Name</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Generic Name</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Pack Size</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Trade Price</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Retail Price</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Company Name</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Status</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Purchase Qty</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Batch No.</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Expiry Date</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Remarks</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Created At</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Updated At</th>
                <th class="py-2 px-2 bg-success font-bold text-sm text-white text-center border border-grey-light">Actions</th>
              </tr>
            </thead>
            <tbody>
              @can('Product access')
                @foreach($products as $product)
                  <tr class="hover:bg-grey-lighter">
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->id }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->name }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->generic }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->packing }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->trade_price }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->retail_price }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->company_name }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->status }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->quantity }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->batch_number }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->expiry_date }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->remarks }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->created_at }}</td>
                    <td class="text-xs py-4 px-6 border border-grey-light">{{ $product->updated_at }}</td>
                    
                    <td class="py-4 px-6 border-b border-grey-light">
  
                      @can('Product edit')
                      <a href="{{route('admin.products.edit',$product->id)}}" class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                      @endcan
  
                      @can('Product delete')
                      <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                          @csrf
                          @method('delete')
                          <button class="text-decoration-none text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                @endforeach
                @endcan
            </tbody>
          </table>

          @can('Product access')
          <div class="py-3 px-5">
            {{ $products->links() }}
          </div>
          @endcan
        </div>

      </div>
  </main>
</div>
</x-app-layout>
