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
                    ->join('specialities','specialities.id','speciality_id')
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
        $specialities = \App\Models\Speciality::all(); // Load all specialties

        return view('doctor.new', ['specialities' => $specialities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name'           => 'required|string',
        'dob'            => 'required|date',
        'contact'        => 'required|string',
        'email'          => 'nullable|email',
        'cnic'           => 'nullable|string',
        'pmdc'           => 'required|string',
        'schedule'       => 'nullable|string',
        'address'        => 'nullable|string',
        'remarks'        => 'nullable|string',
        'speciality_id'  => 'required|exists:specialities,id',
        'pic'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('pic')) {
            $fileName = time() . '.' . $request->pic->extension();
            $request->pic->move(public_path('uploads'), $fileName);
            $validated['pic'] = $fileName;
        }

        $validated['fk_user_id'] = auth()->id(); // If you track user

        Doctor::create($validated);

        return redirect()->route('admin.doctors.index')
            ->withSuccess('Doctor information created successfully!');
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
        $doctor = Doctor::findOrFail($id);
        $specialities = Speciality::select('id', 'title')->get();

        return view('doctor.edit', compact('doctor', 'specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
        'name'           => 'required|string',
        'dob'            => 'required|date',
        'contact'        => 'required|string',
        'email'          => 'nullable|email',
        'cnic'           => 'nullable|string',
        'pmdc'           => 'required|string',
        'schedule'       => 'nullable|string',
        'address'        => 'nullable|string',
        'remarks'        => 'nullable|string',
        'speciality_id'  => 'required|exists:specialities,id',
        'pic'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('pic')) {
            // Optionally delete old file
            if ($doctor->pic && file_exists(public_path('uploads/' . $doctor->pic))) {
                unlink(public_path('uploads/' . $doctor->pic));
            }

            $fileName = time() . '.' . $request->pic->extension();
            $request->pic->move(public_path('uploads'), $fileName);
            $validated['pic'] = $fileName;
        }

        $doctor->update($validated);

        return redirect()->route('admin.doctors.index')
            ->withSuccess('Doctor information updated successfully!');
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
