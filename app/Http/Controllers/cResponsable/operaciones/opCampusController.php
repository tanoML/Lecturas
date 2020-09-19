<?php

namespace App\Http\Controllers\cResponsable\operaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campus;
use App\temporalTitle;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class opCampusController extends Controller
{
    //
    /* 
    auth: authentication by the user
    verified: flag for the email user
    responsable: flag for type of user 
    status: flag for the current status 
    */
    public function __construct()
    {
        $this->middleware(['auth','verified','responsable','status:A']);
    }
    //the main function for edit, delete or add new Campus
    public function index()
    {
        //$allCampus = Campus::all();
        //we need only the name and id for the campus
        $allCampus = DB::select('select name,id from campuses');

        return view('vResponsable.opToaddCampus',[
            'allCampus' => $allCampus,
            'sizeTempTitles' => temporalTitle::SizeOfTemp()->total_temp_titles,
        ]);
    }

    //method for add campus to db
    public function addCampusRespCon(Request $request)
    {
        //we need message to validate the campus field
        $messagesValidate = [
            'required' => 'Por favor rellena el campo para campus.',
            'unique' => 'Al parecer ya existe un campus con el mismo nombre, por favor agregue uno distinto.',
            'max' => 'Por favor solo ingresa el nombre del campus, con un maximo de 20 caracteres.',
            'alpha' => 'Por favor ingresa solo letras sin numeros.',
        ];
        //then we send to validate each field
        $this->validate($request,['campusNew' => 'required|unique:campuses,name|max:20|alpha'],$messagesValidate);
        //if all it's ok then save the data
        $campus = new Campus;
        $campus->name = $request->campusNew;
        $campus->save();
        return redirect()->route('OpWithCarrers')->with('success','El campus ha sido agregado con exito');
    }

    //method for delete campus to db
    public function deleteCampusRespCon(Request $request, $id)
    {
        session()->flash('campusChoice',$request->campus);
        try {
            //if the campus don't have carrers then it will be delete safe
            Campus::destroy($id);
            return redirect()->route('ViewAddCampus')->with('success','El campus se ha eliminado de forma correcta');
        } catch (QueryException $e) {
            //but if there is elements, then return back with message to the client
            return back()->with('wrong','Ooops!, no puede eliminar el campus ');
        }
    }

     //method for show the form for edit a Campus
    public function editCampusRespcon($id)
    {
        $campusses = Campus::all();
        $campusEdit =  $campusses->find($id);

        return view('vResponsable.viewEditCampus', [
            'campusEdit' => $campusEdit,
            'idCampus' => $id,
            'sizeTempTitles' => temporalTitle::SizeOfTemporalTitles(),
            ])->with('success','Por favor se responsable al editar un campus');
    }

    // //method for update a Campus
    public function updateCampus(Request $request,$id)
    {
        $updateCampus = Campus::find($id);
        $updateCampus->name = $request->editcampus;
        $updateCampus->save();
        return redirect()->route('ViewAddCampus')->with('success','El campus ha sido actualizado de forma correcta');
    }

}
