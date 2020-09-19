<?php

namespace App\Http\Controllers\cEmployee;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Campus;
use App\Institute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Temployee extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','employee','status:A']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vDocente.welcome');
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
        //we need to get all data of the user for show
        $allCampus = DB::table('campuses')->selectRaw('id,name')->get();
        $dataInst = DB::table('institutes')
            ->join('campuses','institutes.id_campus','=','campuses.id')
            ->select('institutes.id','institutes.id_campus','institutes.carrera','campuses.name as nameCampus')
            ->where('institutes.id','=',auth()->user()->id_institute)
            ->first();
        //then send the data
        return view('vDocente.updateDataDocente',[
            'allCampus' => $allCampus,
            'instituto' => $dataInst,
        ]);
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
        if($request->has('campus')){
            if($request->has('carrer')){

            $userData = $user::find(auth()->user()->id);
            $userData->name = $request->name;
            $userData->lastName = $request->lastName;
            $userData->email = $request->email;
            $userData->id_institute = $request->carrer;
            $userData->save();

            }
        }else{

            $userData = User::find(auth()->user()->id);
            $userData->name = $request->name;
            $userData->lastName = $request->lastName;
            $userData->email = $request->email;
            $userData->save();
        }

        return redirect()->route('updateDataDoc')->with('updateDoc','Datos actualizados correctamente');
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

    public function updatePasswordDoc(Request $request){

        $this->validate($request, 
        [
            'old_password'          => 'required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ],
        [
            'required'  => 'El :attribute es requerido',
            'same'      => 'Las contrasenias nuevas no coinciden por favor ingrese de nuevo',
            'min'       => 'Las contrasenias deben ser mayor a 6',
        ]);
        $data = $request->all();
        if(! Hash::check($data['old_password'], auth()->user()->password)){
            return back()->with('error','Ooops! al parecer la contrasenia actual no coincide con el ingresado');
        }elseif(Hash::check($data['password'], auth()->user()->password)){
            return redirect()->route('updateDataDoc')->with('updateChanges','Vaya, al parecer ingresaste la misma contrasenia');
        }
        else{
            $input['email'] = auth()->user()->email;
            $input['password'] = Hash::make($data['password']);
            User::find(auth()->user()->id)->update($input);
            return redirect()->route('updateDataDoc')->with('updateChanges','La contrasenia ha sido actualizado de forma correcta');
        }


    }
}
