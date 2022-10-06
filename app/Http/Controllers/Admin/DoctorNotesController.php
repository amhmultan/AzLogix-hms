<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DoctorNotes;
use App\Models\Patient;
use App\Models\Token;

class DoctorNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:DoctorNotes access|DoctorNotes add|DoctorNotes edit|DoctorNotes delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:DoctorNotes add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:DoctorNotes edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:DoctorNotes delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor_notes = DoctorNotes::all();
        
        return view('doctor_notes.index', ['doctor_notes' => $doctor_notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $search = $request['search'] ?? "";

        $tokens = DB::table('tokens')
                    ->join('patients', 'patients.id', '=', 'tokens.fk_patients_id')
                    ->select('tokens.id', 'tokens.fk_patients_id', 'patients.name', 'tokens.created_at')
                    ->where('tokens.id','LIKE',"%$search%")
                    ->get();
        
        

        return view('doctor_notes.new', ['search' => $search], ['tokens' => $tokens]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new DoctorNotes();
        $prescription = $request->prescription;
        $prescriptionName = time().'.'.$prescription->getClientOriginalExtension();
        $request->prescription->move('assets', $prescriptionName);
        
        $data->fk_patient_id = $request->fk_patient_id;
        $data->fk_token_id = $request->fk_token_id;
        $data->fk_patient_name = $request->fk_patient_name;
        $data->fk_token_created_at = $request->fk_token_created_at;
        $data->prescription = $prescriptionName;
        $data->save();
        
        return redirect('/admin/doctor_notes')->withSuccess('Notes uploaded !!!');
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
