<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Purchase;

class PurchaseController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:Purchase access|Purchase create|Purchase edit|Purchase delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Purchase create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Purchase edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Purchase delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = DB::table('purchases')
                        ->join('suppliers', 'suppliers.id', 'fk_supplier_id')
                        ->join('products', 'products.id','fk_product_id')
                        ->select('purchases.*', 'products.name as pName', 'suppliers.name as sName')
                        ->get();

        return view('purchase.index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = [];

        $products = DB::table('products')
                        ->select('products.id','name as pName')
                        ->where('status', 1)
                        ->get();

        $suppliers = DB::table('suppliers')
                        ->select('suppliers.id','name as sName')
                        ->get();

        $data = [
            "products" => $products,
            "suppliers" => $suppliers,
        ];
        
        return view('purchase.new', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productlist(Request $request)
    {
        
        $res = Product::select("products.id", "products.name")
                ->where("products.name","LIKE","%{$request->term}%")
                ->where('status', 1)
                ->get();

        return response()->json($res);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data= $request->all();
        // $data['user_id'] = Auth::user()->id;
        
        // $Purchase = Purchase::create($data);
        // return redirect('/admin/purchases')->withSuccess('Purchase added !!!');


        dd($request->all());

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
