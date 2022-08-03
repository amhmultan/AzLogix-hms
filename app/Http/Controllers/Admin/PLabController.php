<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PLab= PLab::paginate(5);
        return view('p_lab.lab_index',['p_lab'=>$PLab]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('p_lab.lab_new');
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
        $data['p_lab_id'] = Auth::user()->id;
        $PLab = PLab::create($data);
        return redirect('/admin/p_lab')->withSuccess('Pathology Lab Created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PLab  $pLab
     * @return \Illuminate\Http\Response
     */
    public function show(PLab $pLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PLab  $pLab
     * @return \Illuminate\Http\Response
     */
    public function edit(PLab $pLab)
    {
        return view('p_lab.lab_edit',['p_lab' => $pLab]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PLab $pLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PLab $pLab)
    {
        $pLab->update($request->all());
        return redirect('/admin/p_lab')->withSuccess('Pathology Lab Updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PLab  $pLab
     * @return \Illuminate\Http\Response
     */
    public function destroy(PLab $pLab)
    {
        $pLab->delete();
        return redirect('/admin/p_lab')->withSuccess('Pathology Lab Deleted !!!');
    }
}
