<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Token access|Token add|Token edit|Token delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Token access', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Token edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Token delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tokens = DB::table('tokens')
        ->select('tokens.id', 'tokens.fk_patients_id', 'patients.name', 'tokens.fees', 'tokens.denomination', 'tokens.balance', 'tokens.created_at', 'tokens.updated_at')
        ->leftJoin('patients','tokens.fk_patients_id','=','patients.id')
        ->get();
        
        return view('token.index', ['tokens' => $tokens]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $search = $request['search'] ?? "";
        
        $patients = DB::table('patients')
                    ->where('patients.id','LIKE',"%$search%")
                    ->get();
            
        return view('token.new', ['search' => $search], ['patients' => $patients]);
        
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
        $token = Token::create($data);
        
        
        return redirect('/admin/tokens')->withSuccess('Token created !!!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Token $token)
    {
        $titles = DB::table('hospitals')->pluck('title');
        $id = $token->id;
        $token = DB::table('patients')
                    ->join('tokens','tokens.fk_patients_id','patients.id')
                    ->select('tokens.*','patients.name')
                    ->where('tokens.id', $id)
                    ->get();

        

        //dd($token);
        return view('token.show',['token' => $token], ['hospitals' => $titles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Token $token)
    {

        return view('token.edit',['token' => $token]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Token $token)
    {
        
        $token->update($request->all());
        return redirect('/admin/tokens')->withSuccess('Patient token updated !!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Token $token)
    {
        $token->delete();
        return redirect('/admin/tokens')->withSuccess('Patient token deleted !!!');
    }
}
