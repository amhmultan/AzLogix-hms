<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


use App\Models\Doctor;
use App\Models\Speciality;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Doctor access|Doctor create|Doctor edit|Doctor delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Doctor create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Doctor edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Doctor delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = DB::table('doctors')
                    ->join('specialities','specialities.id','specialty')
                    ->select('doctors.*','specialities.title as sTitle')
                    ->get();

        return view('doctor.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $specialty = DB::table('specialities')
                        ->select('specialities.id','specialities.title')
                        ->get();
        
        return view('doctor.new', ['specialty' => $specialty]);
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
        $data['fk_user_id'] = Auth::user()->id;

        if ($image = $request->file('pic')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['pic'] = "$profileImage";
        }

        $Doctor = Doctor::create($data);

        return redirect('/admin/doctors')->withSuccess('Doctor information created !!!');
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
    public function edit(Doctor $doctors, $id)
    {
        $data = [];

        $doctors = DB::table('doctors')
                    ->join('specialities','specialities.id','specialty')
                    ->select('doctors.*','specialities.title as sTitle')
                    ->where('doctors.id', '=', $id)
                    ->get();

        $specialities = DB::table('specialities')
                    ->select('specialities.id','specialities.title as sTitle')
                    ->get();

        
        $data = [
            "doctors" => $doctors,
            "specialities" => $specialities,
        ];

        return view('doctor.edit',['data' => $data]);
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
        $doctors = Doctor::find($id);
        
        $request->validate([
            'name' => 'required',
            'dob' => 'nullable',
            'contact' => 'nullable',
            'pic' => 'nullable',
            'email' => 'nullable|email',
            'cnic' => 'nullable',
            'pmdc' => 'nullable',
            'schedule' => 'nullable',
            'specialty' => 'required',
            'address' => 'nullable',
            'remarks' => 'nullable',
            
        ]);
        
        $image = $request->file('pic');
        $destinationPath = 'img/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $data['pic'] = "$profileImage";
        
        $update =   [
                    'name' => $request->name, 'dob' => $request->dob,
                    'contact' => $request->contact, 'email' => $request->email,
                    'cnic' => $request->cnic, 'address' => $request->address,
                    'pmdc' => $request->pmdc, 'schedule' => $request->schedule,
                    'specialty' => $request->specialty, 'remarks' => $request->remarks,
                    'pic' => $profileImage
                    ];
        
        $doctors->update($update);
                    
        return redirect('/admin/doctors')->withSuccess('Doctor information updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect('/admin/doctors')->withSuccess('Doctor information deleted !!!');
    }
}
