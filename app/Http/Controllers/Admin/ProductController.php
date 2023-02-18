<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Product access|Product create|Product edit|Product delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Product create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Product edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Product delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
                        ->join('manufacturers', 'manufacturers.id','fk_manufacturer_id')
                        ->join('suppliers', 'suppliers.id', 'fk_supplier_id')
                        ->select('products.*','manufacturers.name as manufacturersName', 'suppliers.name as suppliersName')
                        ->get();

        return view('product.index', ['products' => $products]);
    }

    /**as
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = [];

        $suppliers = DB::table('suppliers')
                        ->select('suppliers.id','suppliers.name as sName')
                        ->get();
        
        
        $manufacturers = DB::table('manufacturers')
                        ->select('manufacturers.id','manufacturers.name as mName')
                        ->get();

        $data = [
            "suppliers" => $suppliers,
            "manufacturers" => $manufacturers,
        ];
        

        return view('product.new', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();
        $data['user_id'] = Auth::user()->id;
        
        $Product = Product::create($data);
        return redirect('/admin/products')->withSuccess('Product created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products, $id)
    {
        
        $data = [];

        $products = DB::table('products')
                        ->join('suppliers','suppliers.id','products.fk_supplier_id')
                        ->join('manufacturers', 'manufacturers.id','products.fk_manufacturer_id')
                        ->select('products.*', 'manufacturers.name as mName', 'suppliers.name as sName')
                        ->where('products.id', '=', $id)
                        ->get();

        
        $suppliers = DB::table('suppliers')
                        ->select('suppliers.id','suppliers.name as sName')
                        ->get();
        
        
        $manufacturers = DB::table('manufacturers')
                        ->select('manufacturers.id','manufacturers.name as mName')
                        ->get();

        $data = [
            "suppliers" => $suppliers,
            "manufacturers" => $manufacturers,
            "products" => $products,
        ];

        return view('product.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->update($request->all());
        
        return redirect('/admin/products')->withSuccess('Product updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('/admin/products')->withSuccess('Product deleted !!!');
    }
}
