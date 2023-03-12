<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:HospitalConfig access|HospitalConfig create|HospitalConfig edit|HospitalConfig delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:HospitalConfig create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:HospitalConfig edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:HospitalConfig delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Patient= Patient::paginate(10);
        // return view('patient.index',['patients'=>$Patient]);

        $hospitals = Hospital::all();

        return view('hospital.index', ['hospitals' => $hospitals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.new');
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

        
        if ($image = $request->file('logo')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['logo'] = "$profileImage";
        }

        
        $hospital = Hospital::create($data,);
        return redirect('/admin/hospitals')->withSuccess('Hospital created !!!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
       return view('hospital.edit',['hospital' => $hospital]);
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
        
        $hospitals = Hospital::find($id);
        
        $request->validate([
            'title' => 'required',
            'phc_no' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'address' => 'required',
            'remarks' => 'required',
            
        ]);

        $file = $request->file('logo');
        $filename = date('YmdHis') . "." . $file->getClientOriginalName();
        $path = 'img/';
        $file->move($path, $filename);

        $update = [
            'title' => $request->title, 'phc_no' => $request->phc_no,
            'contact' => $request->contact, 'email' => $request->email,
            'website' => $request->website, 'address' => $request->address,
            'remarks' => $request->remarks, 'logo' => $filename
        ];

        $hospitals->update($update);

        return redirect('/admin/hospitals')->withSuccess('Hospital updated !!!');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect('/admin/hospitals')->withSuccess('Hospital deleted !!!');
    }
}
