<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pharmacy;
use Facade\FlareClient\Stacktrace\File;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:PharmacyConfig access|PharmacyConfig add|PharmacyConfig edit|PharmacyConfig delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:PharmacyConfig add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:PharmacyConfig edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:PharmacyConfig delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pharmacies = Pharmacy::all();

        return view('pharmacy.index', ['pharmacies' => $pharmacies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy.new');
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

        
        if ($image = $request->file('pic')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['pic'] = "$profileImage";
        }

        
        $pharmacy = Pharmacy::create($data,);
        return redirect('/admin/pharmacies')->withSuccess('Pharmacy created !!!');
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
    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacy.edit',['pharmacy' => $pharmacy]);
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

        $pharmacies = Pharmacy::find($id);
        
        $request->validate([
            'name' => 'required',
            'reg_no' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'remarks' => 'required',
            
        ]);

        if($request->pic != ''){
            
             //upload new file
             $file = $request->pic;
             $filename = time(). '.' .$file->getClientOriginalExtension();
             $request->pic->move('img', $filename);
             
        }

        $update = [
            'name' => $request->name, 'reg_no' => $request->reg_no,
            'phone' => $request->phone, 'address' => $request->address,
            'remarks' => $request->remarks, 'pic' => $filename
        ];

        
        $pharmacies->update($update);
        
        return redirect('/admin/pharmacies')->withSuccess('Pharmacy details updated !!!');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pharmacies = Pharmacy::find($id);
        $pharmacies->delete();
        return redirect('/admin/pharmacies')->withSuccess('Pharmacy deleted !!!');
    }
}
