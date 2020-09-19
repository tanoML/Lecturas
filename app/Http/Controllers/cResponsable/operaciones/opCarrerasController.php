<?php

namespace App\Http\Controllers\cResponsable\operaciones;

use App\Campus;
use App\Http\Controllers\Controller;
use App\Institute;
use App\User;
use App\temporalTitle;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class opCarrerasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified','responsable','status:A']);
    }

    public function index()
    {
        $idCampus = Institute::GetIdOfCampus(auth()->user()->id);
        $carreras = Institute::where('id_campus',$idCampus->id_campus)->paginate(5);
        $nameCampus = Campus::select('name')->where('id',$idCampus->id_campus)->first();

        return view('vResponsable.opWithCarrera.opToaddCarrera',[
            'allCarreras' => $carreras,
            'idCampus' => $idCampus->id_campus,
            'nameCampus' => $nameCampus,
            'sizeTempTitles' => temporalTitle::SizeOfTemp()->total_temp_titles,
            ])->with('success','Por favor se cuidadoso al realizar alguna operacion, en este apartado. Gracias.');
    }

    public function addNewCarrera(Request $request, $id)
    {
       if((Institute::GetIdOfCampus(auth()->user()->id))->id_campus == $id)
       {
           $newCampus = new Institute;
           $newCampus->id_campus = (Institute::GetIdOfCampus(auth()->user()->id))->id_campus;
           $newCampus->carrera = $request->newCarrera;
           $newCampus->save();
           return redirect()->route('viewPropertyCarrera')->with('success', 'La carrera se agrego de forma correcta.');
       }else{
           return back()->withInput();
       }
    }
    //method to delete carrer
    public function deleteCarrera($id)
    {
        try {
            //delete the carrer
            Institute::destroy($id);
            return redirect()->route('viewPropertyCarrera')->with('success','la carrera fue eliminada de forma correcta');
        } catch (QueryException $e) {
            //if there is a foreign key then you can't delete the current carrer
            return back()->with('success','Ooops!, al parecer esta tratando de eliminar una carrera que tiene alumnos, para poder eliminar la carrera debe eliminar sus alumnos.');
        }
    }

    public function showEditCarrera($id)
    {
        $carrertoedit = Institute::all();
        $carrer = $carrertoedit->find($id);

        return view('vResponsable.opWithCarrera.viewCarreraEdit',[
            'nameCarrera' => $carrer->carrera,
            'idCarrera' => $id,
            'sizeTempTitles' => temporalTitle::SizeOfTemp()->total_temp_titles,
        ]);
    }


    public function updateCarrera(Request $request, $id)
    {
        $updateCarrera = Institute::find($id);
        $updateCarrera->carrera = $request->editCarrera;
        $updateCarrera->save();
        return redirect()->route('viewPropertyCarrera')->with('success', 'la carrera ha sido actualizado de forma correcta.');
    }

    //this section contain the operation for the carreras from another campus

    public function addCarreraAnotherCampus()
    {
        $idCampus = Institute::GetIdOfCampus(auth()->user()->id);
        return view('vResponsable.opWithCarrera.addCarreraToAnotherCampus',[
            'allCampus' => Campus::all(),
            'idCampus' => $idCampus->id_campus,
            'sizeTempTitles' => temporalTitle::SizeOfTemp()->total_temp_titles,
        ]);
    }

    public function showcarrerasC(Request $request)
    {
        $allCarrerasByCampus = Institute::where('id_campus',$request->selectCampus)->get();
        $idCampus = Institute::GetIdOfCampus(auth()->user()->id);//id of campus of current user
        $allCampus = Campus::all();
        $campusSel = $allCampus->find($request->selectCampus);

        return view('vResponsable.opWithCarrera.addCarreraToAnotherCampus',[
            'allCampus' => Campus::all(),
            'allCarrerasByCampus' => $allCarrerasByCampus,
            'idCampus' => $idCampus->id_campus,
            'idCampusSelected' => $request->selectCampus,
            'campusSel' => $campusSel,
        ]);
    }

    public function addCarreraOfAnotherCampus(Request $request, $id)
    {
        DB::transaction(function() use ($id, $request) {

            $newCarrera = new Institute;
            $newCarrera->id_campus = $id;
            $newCarrera->carrera = $request->carreraToAdd;
            $newCarrera->save();
        });
        return redirect()->route('viewPropertyCarrera')->with('success','La carrera ha sido agregado con exito');
    }


}
