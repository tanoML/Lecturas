<?php

namespace App\Http\Controllers\cResponsable\configRole;

use App\Institute;
use App\temporalTitle;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','responsable','status:A']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $campus = DB::table('institutes')->select('id_campus')->where('id',auth()->user()->id_institute)->first();

        $allUser = DB::table('users')->join('institutes','users.id_institute','=','institutes.id')
            ->select('users.id','users.name','users.lastName')
            ->where([ ['institutes.id_campus', $campus->id_campus ],['users.role','E']  ])->get();

        $allRespUser =  DB::table('users')->join('institutes','users.id_institute','=','institutes.id')
        ->select('users.id','users.name','users.lastName')
        ->where([ ['institutes.id_campus', $campus->id_campus ],['users.role','R']  ])->get();
        

        return view('vResponsable.listConfigEmployee',[
            'allUser' => $allUser,
            'allRepUser' => $allRespUser,
            'sizeTempTitles' => temporalTitle::SizeOfTemporalTitles(),
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function updateEployeeToResponsable(Request $request){
        $roleResp = User::find($request->employee);
        $roleResp->role = 'R';
        $roleResp->save();
        return redirect()->route('viewConfigEmployee')->with('success','Cambio realizado de forma correcta');
    }

    public function changeRolOfResponsable(Request $request)
    {
        DB::transaction(function() use($request) {
            $newUserResp = User::find($request->userToChange);
            $newUserResp->role = 'R';
            $newUserResp->save();
            $current_date_time_update = date('Y-m-d H:i:s');
            $updateCarrerToNewUser = DB::table('responsables_carreras')
                    ->where('id_responsable',auth()->user()->id)
                    ->update(['id_responsable' => $request->userToChange,'updated_at' => $current_date_time_update]);
            $OldUserResp = User::find(auth()->user()->id);
            $OldUserResp->role = 'E';
            $OldUserResp->save();
            return redirect()->route('inicioDocente')->with('success','Muchas gracias por haber estado en el programa permanente de lecturas!!');
        });
        return redirect()->route('inicioResponsable')->with('failed','Oooops! Al parecer no se pudo completar la accion');
    }


    public function deleteTheRolOfResp(Request $request){
        DB::transaction(function() use($request)
        {
            $deleteUserResp = User::find(auth()->user()->id);
            $deleteUserResp->role = 'E';
            $deleteUserResp->save();
            DB::table('responsables_carreras')->where('id_responsable',auth()->user()->id)->delete();
            return redirect()->route('inicioDocente')->with('success','Muchas gracias por haber estado en el programa permanente de lecturas!!');
        });
        return redirect()->route('inicioResponsable')->with('failed','Oooops! Al parecer no se pudo completar la accion');
    }


}
