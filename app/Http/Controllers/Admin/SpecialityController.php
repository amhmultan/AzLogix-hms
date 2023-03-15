<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Speciality access|Speciality create|Speciality edit|Speciality delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Speciality create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Speciality edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Speciality delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::all();

        return view('speciality.index', ['specialities' => $specialities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('speciality.new');
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
        $Speciality = Speciality::create($data);

        return redirect('/admin/specialities')->withSuccess('Specialty created !!!');
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
    public function edit(Speciality $speciality)
    {
        return view('speciality.edit',['speciality' => $speciality]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        $speciality->update($request->all());
        return redirect('/admin/specialities')->withSuccess('Specialty updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return redirect('/admin/specialities')->withSuccess('Specialty deleted !!!');
    }
}
