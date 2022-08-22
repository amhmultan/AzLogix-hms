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
        $this->middleware('role_or_permission:Hospital access|Hospital create|Hospital edit|Hospital delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Hospital create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Hospital edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Hospital delete', ['only' => ['destroy']]);
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
        return view('hospital.show',['hospital' => $hospital]);
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
    public function update(Request $request, Hospital $hospital)
    {
        $hospital->update($request->all());
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
