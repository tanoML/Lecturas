<?php

namespace App\Http\Controllers\cStudent;

use App\Campus;
use App\Institute;
use App\Tstudent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TstudentController extends Controller
{
    //we need to check if pass all the rules then has access
    public function __construct()
    {
        $this->middleware(['auth','verified','student','status:A']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(user());

        return view('vAlumno.welcome');
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
     * @param  \App\Tstudent  $tstudent
     * @return \Illuminate\Http\Response
     */
    public function show(Tstudent $tstudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tstudent  $tstudent
     * @return \Illuminate\Http\Response
     */
    public function edit(Tstudent $tstudent)
    {
        //We retrieve data for show in config view 
        $allCampus = DB::select('select id,name from campuses');
        $allData = DB::select('select matricula,id_semestre,sexo from tstudents where id_student = ?', [ auth()->user()->id ]);
        $dataInst = DB::table('institutes')
            ->join('campuses','institutes.id_campus','=','campuses.id')
            ->select('institutes.id','institutes.id_campus','institutes.carrera','campuses.name')
            ->where('institutes.id',auth()->user()->id_institute)
            ->first();

        return view('vAlumno.updateData', [
            'instituto' => $dataInst,
            'allData' => $allData,
            'allCampus' => $allCampus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tstudent  $tstudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tstudent $tstudent)
    {
        //


        if($request->has('campus')){
            if($request->has('carrer')){

                $user = User::find(auth()->user()->id);
                $user->name = $request->name;
                $user->lastName = $request->lastName;
                $user->id_institute = $request->carrer;
                $user->email = $request->email;
                $user->save();

                $addMore = Tstudent::find(Auth::id());
                $addMore->matricula = $request->matricula;
                $addMore->id_semestre = $request->semestre;
                $addMore->save();
            }
        }else{
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->lastName = $request->lastName;
            $user->email = $request->email;
            $user->save();

            $addMore = Tstudent::where('id_student',Auth::id())->first();
            $addMore->matricula = $request->matricula;
            $addMore->id_semestre = $request->semestre;
            $addMore->save();
        }

        return redirect()->route('updateData')->with('updateChanges','Datos actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tstudent  $tstudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tstudent $tstudent)
    {
        //
    }
    
    public function updatePassword(Request $request)
    {
        $this->validate($request, 
        [
            'password_old'          => 'required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ],
        [
            'required'  => 'El :attribute es requerido',
            'same'      => 'Las contrasenias nuevas no coinciden por favor ingrese de nuevo',
            'min'       => 'Las contrasenias deben ser mayor a 6',
        ]);
        $data = $request->all();
        if(! Hash::check($data['password_old'], Auth::user()->password) ){
            return back()->with('error','Ooops! al parecer la contrasenia actual no coincide con el ingresado');
        }elseif(Hash::check($data['password'], Auth::user()->password )){
            return redirect()->route('updateData')->with('updateChanges','Vaya, al parecer ingresaste la misma contrasenia');
        }
        else{
            $input['email'] = Auth::user()->email;
            $input['password'] = Hash::make($data['password']);
            User::find(Auth::id())->update($input);
            return redirect()->route('updateData')->with('updateChanges','La contrasenia ha sido actualizado de forma correcta');
        }
    }
}
